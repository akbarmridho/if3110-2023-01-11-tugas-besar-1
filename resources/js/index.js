document.addEventListener('DOMContentLoaded', () => {
    const toast = document.querySelector('#toast')

    if (toast) {
        setTimeout(() => {
            toast.classList.remove('visible')
        }, 2000)
    }
})