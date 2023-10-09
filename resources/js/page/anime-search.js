import {httpRequest} from '../utils/request.js'

const inputForm = document.querySelector('#q')
const container = document.querySelector('#anime-list-content')
const searchBy = document.querySelector('#search_by')

/**
 *
 * @param { string } searchValue
 */
function makeSearch(searchValue) {
    const params = (new URL(document.location)).searchParams
    const searchByValue = searchBy.options[searchBy.selectedIndex].value

    params.set('q', searchValue)
    params.delete('page')

    params.set('search_by', searchByValue)

    params.toString()

    const response = httpRequest('get', '/search?' + params.toString())

    response.then((res) => {
        /** @type {HttpResponse} */
        const response = res
        // need html satanizer??
        container.innerHTML = response.body

        if (history.pushState) {
            const newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?' + params.toString();
            window.history.pushState({path: newurl}, '', newurl);
        }

    }).catch(() => {
        console.log('Error during fetch')
    })
}

const debounce = (fn, delay = 500) => {
    let timerId = null

    return (...args) => {
        clearTimeout(timerId)
        timerId = setTimeout(() => fn(...args), delay)
    }
}

const onInput = debounce(makeSearch, 500);

inputForm.addEventListener('input', (e) => {
    onInput(e.target.value)
})