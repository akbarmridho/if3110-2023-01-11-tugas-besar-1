import {httpRequest} from '../utils/request.js'

document.addEventListener('DOMContentLoaded', () => {
    const deleteButton = document.getElementById('anime-delete-form')

    if (deleteButton === null) {
        return
    }

    deleteButton.addEventListener('click', () => {
        deleteButton.disabled = true;

        const id = parseInt(deleteButton.dataset.id)

        httpRequest('DELETE', `/admin/anime/${id}`).then((res) => {
            console.log(res)

            window.location = '/'
        }).catch(() => {
            console.log('Failed to delete')
            deleteButton.disabled = false;
        })
    })
})