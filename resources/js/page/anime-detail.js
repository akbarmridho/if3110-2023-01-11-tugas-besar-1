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

    const updateStatusButton = document.getElementById('anime-update-status')

    updateStatusButton.addEventListener('click', () => {
        const statusElement = document.getElementById('watch-status')

        const status = statusElement.options[statusElement.selectedIndex].value
        const id = parseInt(updateStatusButton.dataset.id)

        httpRequest("POST", `/anime/${id}/status`, {
            body: `status=${status}`,
            headers: {'Content-type': 'application/x-www-form-urlencoded'}
        }).then(res => {
            // update text
            const text = document.getElementById('status-text')
            text.innerText = status.charAt(0).toUpperCase() + status.toLowerCase().slice(1);

            // update button text
            const updateModalButton = document.getElementById('update-status-modal-button')
            updateModalButton.innerText = 'Update list'

            // tampilkan remove button
            const removeButton = document.getElementById('status-delete-button')
            removeButton.classList.remove('hidden')

            // update modal
            const modal = document.getElementById('status-update')
            modal.classList.remove('open')

            // update status di tampilan dan toaster
            const toast = document.querySelector('#toast-update')
            toast.classList.add('visible')
            setTimeout(() => {
                toast.classList.remove('visible')
            }, 2000)
        }).catch((res) => {
            console.log('nooo errorr T_T')
        })
    })

    const deleteStatusButton = document.getElementById('status-delete-form')

    deleteStatusButton.addEventListener('click', () => {
        deleteStatusButton.disabled = true;

        const id = parseInt(deleteStatusButton.dataset.id)

        httpRequest('DELETE', `/anime/${id}/status`).then((res) => {
            // update text
            const text = document.getElementById('status-text')
            text.innerText = 'Not yet added'

            // update button text
            const updateModalButton = document.getElementById('update-status-modal-button')
            updateModalButton.innerText = 'Add to list'

            // hide remove button
            const removeButton = document.getElementById('status-delete-button')
            removeButton.classList.add('hidden')

            // update modal
            const modal = document.getElementById('status-delete')
            modal.classList.remove('open')

            // update status di tampilan dan toaster
            const toast = document.querySelector('#toast-delete')
            toast.classList.add('visible')
            setTimeout(() => {
                toast.classList.remove('visible')
            }, 2000)
        }).catch(() => {
            console.log('Failed to delete')
            deleteStatusButton.disabled = false;
        })
    })

    // delete review
    const deleteReviewButton = document.getElementById('review-delete-form')

    deleteReviewButton.addEventListener('click', () => {
        deleteReviewButton.disabled = true;

        const id = parseInt(deleteReviewButton.dataset.id)

        httpRequest('DELETE', `/review/delete/${id}`).then((res) => {
            // hide remove button
            const removeReviewButton = document.getElementById('review-delete-button')
            removeReviewButton.classList.add('hidden')

            // hide review
            const removedReview = document.getElementById(`review-${id}`)
            removedReview.classList.add('hidden')

            // update modal
            const modal = document.getElementById('review-delete')
            modal.classList.remove('open')

            // update status di tampilan dan toaster
            const toast = document.querySelector('#toast-review-delete')
            toast.classList.add('visible')
            setTimeout(() => {
                toast.classList.remove('visible')
            }, 2000)
        }).catch(() => {
            console.log('Failed to delete')
            deleteStatusButton.disabled = false;
        })
    })
})