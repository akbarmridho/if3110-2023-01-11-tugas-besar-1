import {httpRequest} from '../utils/request.js'

document.addEventListener('DOMContentLoaded', () => {
    const deleteButton = document.getElementById('account-delete-form')

    if (deleteButton === null) {
        return
    }

    deleteButton.addEventListener('click', () => {
        deleteButton.disabled = true;

        httpRequest('DELETE', `/profile`).then((res) => {
            console.log(res)

            window.location = '/'
        }).catch(() => {
            console.log('Failed to delete')
            deleteButton.disabled = false;
        })
    })
})