const burger = document.querySelector('#burger svg')
const nav = document.getElementById('nav')




burger.addEventListener('click', () => {
    nav.style.display === 'none' ? nav.style.display = 'flex' : nav.style.display = 'none'
})