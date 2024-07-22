/*
*Create:Thiha Thwin(18/07/2024)
*Update:Thiha Thwin(22/07/2024)
*Splide container mounting and navbar burger menu dropdown function
*/
document.addEventListener("DOMContentLoaded", function () {
    var splide = new Splide(".splide");
    splide.mount();
});

document.addEventListener('DOMContentLoaded', () => {
    const burgerMenu = document.getElementById('burgerMenu');
    const rightNav = document.querySelector('.right-nav-col');

    burgerMenu.addEventListener('click', () => {
        rightNav.classList.toggle('show');
    });
});
