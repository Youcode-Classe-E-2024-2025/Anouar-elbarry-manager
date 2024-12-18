const menu = document.getElementById('menu');
const sidebar = document.getElementById('logo-sidebar');

menu.addEventListener('click', () => {
    console.log("hhbd");
    sidebar.classList.toggle('sm:translate-x-0');
    sidebar.classList.toggle('-translate-x-full');
})