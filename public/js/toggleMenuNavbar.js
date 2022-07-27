const menuNavbar = document.getElementById("menu-navbar");
const closeMenuNavbar = document.getElementById("close-menu-navbar");
const navbarLinksList = document.getElementById("navbar-links-list");

closeMenuNavbar.style.display = "none";

menuNavbar.addEventListener("click", (event) => {
    navbarLinksList.style.display = "flex";
    menuNavbar.style.display = "none"; 
    closeMenuNavbar.style.display = "flex";
});

closeMenuNavbar.addEventListener("click", (event) => {
    navbarLinksList.style.display = "none";
    menuNavbar.style.display = "flex"; 
    closeMenuNavbar.style.display = "none";
});
