document.addEventListener('DOMContentLoaded', () => {
    const toast = document.querySelector('#toast')

    if (toast) {
        setTimeout(() => {
            toast.classList.remove('visible')
        }, 2000)
    }
});

const modals = document.querySelectorAll('[data-modal]');

modals.forEach(function (trigger) {
    trigger.addEventListener('click', function (event) {
        event.preventDefault()
        const modal = document.getElementById(trigger.dataset.modal)

        modal.classList.add('open')
        const exits = modal.querySelectorAll('.modal-exit')

        exits.forEach(function (exit) {
            exit.addEventListener('click', function (event) {
                event.preventDefault()
                modal.classList.remove('open')
            })
        })
    })
})