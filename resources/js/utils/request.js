class HttpResponse {

    /**
     *
     * @param {XMLHttpRequest} xhr
     */
    constructor(xhr) {
        this.body = xhr.response
        this.status = xhr.status
        this.headers = {}
        xhr.getAllResponseHeaders().split("\r\n").forEach(current => {
            let [name, value] = current.split(': ');
            this.headers[name] = value;
        })
        this.parser = new DOMParser();
    }

    json() {
        return JSON.parse(this.body)
    }

    getAsDOM() {
        return this.parser.parseFromString(this.body, "text/html")
    }
}

class HttpError {
    /**
     *
     * @param {XMLHttpRequest} xhr
     */
    constructor(xhr) {
        this.body = xhr.response
        this.status = xhr.status
        this.headers = {}
        xhr.getAllResponseHeaders().split("\r\n").forEach(current => {
            let [name, value] = current.split(': ');
            this.headers[name] = value;
        })
    }

    toString() {
        let json = JSON.parse(this.body)
        return "[" + this.status + "] Error: " + json.error || json.errors.join(", ")
    }
}


/**
 *
 * @param { string } method
 * @param { string } url
 * @param headers
 * @param body
 * @param options
 */
export function httpRequest(method, url, {headers, body, options} = {}) {
    method = method.toUpperCase()

    let xhr = new XMLHttpRequest()
    xhr.withCredentials = true
    xhr.open(method, url)

    // xhr.setRequestHeader('Content-Type', 'application/json')
    for (const key in headers) {
        xhr.setRequestHeader(key, headers[key])
    }

    if (options && options.hasOwnProperty("checkProgress")) {
        xhr.upload.onprogress = options.checkProgress
    }

    xhr.send(body)

    return new Promise((resolve, reject) => {
        xhr.onload = function () {
            resolve(new HttpResponse(xhr))
        }

        xhr.onerror = function () {
            reject(new HttpError(xhr))
        }

        xhr.onabort = function () {
            reject(new HttpError(xhr))
        }
    })
}