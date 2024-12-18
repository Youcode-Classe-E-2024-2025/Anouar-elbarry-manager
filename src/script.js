const menu = document.getElementById('menu');
const sidebar = document.getElementById('logo-sidebar');

// Buttons
const buttons = {
  users: document.getElementById('users'),
  orders: document.getElementById('orders'),
  products: document.getElementById('products'),
  categories: document.getElementById('categories'),
  suppliers: document.getElementById('suppliers'),
};

// Tables
const tables = {
  users: document.querySelector('.users_table'),
  orders: document.querySelector('.order_table'),
  suppliers: document.querySelector('.supplier_table'),
  categories: document.querySelector('.category_table'),
  products: document.querySelector('.products_table'),
};

// Toggle sidebar visibility
menu.addEventListener('click', () => {
  sidebar.classList.toggle('sm:translate-x-0');
  sidebar.classList.toggle('-translate-x-full');
});

// Function to hide all tables
function hideAllTables() {
  Object.values(tables).forEach(table => table.classList.add('hidden'));
}

// Function to toggle the visibility of the clicked table
function toggleTableVisibility(tableKey) {
  hideAllTables();
  tables[tableKey].classList.toggle('hidden');
}

// Event listeners for each button
buttons.products.addEventListener('click', () => toggleTableVisibility('products'));
buttons.categories.addEventListener('click', () => toggleTableVisibility('categories'));
buttons.orders.addEventListener('click', () => toggleTableVisibility('orders'));
buttons.users.addEventListener('click', () => toggleTableVisibility('users'));
buttons.suppliers.addEventListener('click', () => toggleTableVisibility('suppliers'));
