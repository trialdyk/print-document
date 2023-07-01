import './bootstrap';
import $ from "jquery";
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


const menuLinks = document.querySelectorAll(".menu-link");

    // Loop melalui setiap elemen menu-link
    menuLinks.forEach((menuLink) => {
      // Tambahkan event click pada setiap menu-link
      menuLink.addEventListener("click", (event) => {
        // Dapatkan elemen ul dengan class submenu yang terkait dengan menu-link
        const submenu = event.currentTarget.nextElementSibling;
        // Toggle class 'active' pada submenu
        submenu.classList.toggle("submenu-open");
      });
});