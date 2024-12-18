const menu = document.getElementById('menu');
const sidebar = document.getElementById('logo-sidebar');
// buttens
const users = document.getElementById('users');
const orders = document.getElementById('orders');
const products = document.getElementById('products');
const categories = document.getElementById('categories');
const suppliers = document.getElementById('suppliers');

// TABLES
const users_table = document.querySelector('.users_table');
const order_table = document.querySelector('.order_table');
const supplier_table = document.querySelector('.supplier_table');
const category_table = document.querySelector('.category_table');
const products_table = document.querySelector('.products_table');
// menu
menu.addEventListener('click', () => {
    sidebar.classList.toggle('sm:translate-x-0');
    sidebar.classList.toggle('-translate-x-full');
})
// products
products.addEventListener('click', () => {
    products_table.classList.toggle('hidden');
    order_table.classList.add('hidden');
    users_table.classList.add('hidden');
    supplier_table.classList.add('hidden');
    category_table.classList.add('hidden');
})
// categories
categories.addEventListener('click', () => {
    category_table.classList.toggle('hidden');
    order_table.classList.add('hidden');
    users_table.classList.add('hidden');
    supplier_table.classList.add('hidden');
    products_table.classList.add('hidden');
})
// orders
orders.addEventListener('click', () => {
    order_table.classList.toggle('hidden');
    products_table.classList.add('hidden');
    users_table.classList.add('hidden');
    supplier_table.classList.add('hidden');
    category_table.classList.add('hidden');
})
// users
users.addEventListener('click', () => {
    users_table.classList.toggle('hidden');
    order_table.classList.add('hidden');
    products_table.classList.add('hidden');
    supplier_table.classList.add('hidden');
    category_table.classList.add('hidden');
})
// supplier
suppliers.addEventListener('click', () => {
    supplier_table.classList.toggle('hidden');
    order_table.classList.add('hidden');
    users_table.classList.add('hidden');
    products_table.classList.add('hidden');
    category_table.classList.add('hidden');
})

