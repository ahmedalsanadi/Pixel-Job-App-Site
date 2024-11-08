import './bootstrap';

document.addEventListener('DOMContentLoaded', function() {
    const menuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    const closeIcon = document.getElementById('close-icon');
    let isMenuOpen = false;

    function toggleMenu() {
        isMenuOpen = !isMenuOpen;

        if (isMenuOpen) {
            mobileMenu.classList.remove('translate-x-full');
            mobileMenu.classList.add('translate-x-0');
            menuIcon.classList.add('hidden');
            menuIcon.classList.remove('block');
            closeIcon.classList.add('block');
            closeIcon.classList.remove('hidden');
        } else {
            mobileMenu.classList.add('translate-x-full');
            mobileMenu.classList.remove('translate-x-0');
            menuIcon.classList.add('block');
            menuIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
            closeIcon.classList.remove('block');
        }
    }

    menuButton.addEventListener('click', toggleMenu);
});
