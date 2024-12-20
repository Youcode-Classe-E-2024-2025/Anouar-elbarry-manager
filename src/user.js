const menu = document.getElementById('menu');
const sidebar = document.getElementById('logo-sidebar');

// Buttons
const buttons = {
  orders: document.getElementById('orders'),
  products: document.getElementById('products'),
  categories: document.getElementById('categories'),
  suppliers: document.getElementById('suppliers'),
  home: document.getElementById('home'),
  customer: document.getElementById('customer'),
  add_order: document.getElementById('add_order'),
};

// Tables
const tables = {
  orders: document.querySelector('.order_table'),
  suppliers: document.querySelector('.supplier_table'),
  categories: document.querySelector('.category_table'),
  products: document.querySelector('.products_table'),
  customer_table: document.querySelector('.customer_table'),
  home_section: document.querySelector('#home_section'),
  addorder_modal: document.querySelector('.Addorder_modal'),
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

function toggleTableVisibility(tableKey) {
    console.log(`Toggling visibility for: ${tableKey}`); // Debug
    hideAllTables();
    tables[tableKey].classList.toggle('hidden');
  }
  

// Event listeners for each button
buttons.products.addEventListener('click', () => toggleTableVisibility('products'));
buttons.categories.addEventListener('click', () => toggleTableVisibility('categories'));
buttons.orders.addEventListener('click', () => toggleTableVisibility('orders'));
buttons.suppliers.addEventListener('click', () => toggleTableVisibility('suppliers'));
buttons.customer.addEventListener('click', () => toggleTableVisibility('customer_table'));
buttons.add_order.addEventListener('click', () => toggleTableVisibility('addorder_modal'));



buttons.orders.addEventListener('click',()=>{
  buttons.add_order.classList.toggle('hidden');
  buttons.add_order.classList.toggle('flex');
})
