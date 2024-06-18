const links = document.querySelectorAll('nav ul li a');

links.forEach((link) => {
    link.addEventListener('click', () => {
    links.forEach((otherLink) => {
            otherLink.classList.remove('navlinks-bold');
        })
        link.classList.add('navlinks-bold');
    })
});