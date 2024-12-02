document.addEventListener("DOMContentLoaded", function () {
    const hamburgerMenu = document.getElementById("hamburger-menu");
    const menu = document.getElementById("menu");

    hamburgerMenu.addEventListener("click", function () {
        // Alternar estado ativo
        hamburgerMenu.classList.toggle("active");
        menu.classList.toggle("active");
    });
});