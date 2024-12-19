const menu = document.getElementById('menu');
const sidebar = document.getElementById('logo-sidebar');

// Buttons
const buttons = {
  users: document.getElementById('users'),
  orders: document.getElementById('orders'),
  products: document.getElementById('products'),
  categories: document.getElementById('categories'),
  suppliers: document.getElementById('suppliers'),
  home: document.getElementById('home'),
  customer: document.getElementById('customer'),
  add_supplier: document.getElementById('add_supplier'),
  add_category: document.getElementById('add_category'),
  add_product: document.getElementById('add_product'),
  add_order: document.getElementById('add_order'),
  add_user: document.getElementById('add_user'),
  add_customer: document.getElementById('add_customer'),
};

// Tables
const tables = {
  users: document.querySelector('.users_table'),
  orders: document.querySelector('.order_table'),
  suppliers: document.querySelector('.supplier_table'),
  categories: document.querySelector('.category_table'),
  products: document.querySelector('.products_table'),
  customer_table: document.querySelector('.customer_table'),
  home_section: document.querySelector('#home_section'),
  addsupplier_modal: document.querySelector('.addsupplier_modal'),
  addcategory_modal: document.querySelector('.addcategory_modal'),
  addproduct_modal: document.querySelector('.Addproduct_modal'),
  addorder_modal: document.querySelector('.Addorder_modal'),
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
buttons.users.addEventListener('click', () => toggleTableVisibility('users'));
buttons.suppliers.addEventListener('click', () => toggleTableVisibility('suppliers'));
buttons.customer.addEventListener('click', () => toggleTableVisibility('customer_table'));
buttons.add_supplier.addEventListener('click', () => toggleTableVisibility('addsupplier_modal'));
buttons.add_product.addEventListener('click', () => toggleTableVisibility('addproduct_modal'));
buttons.add_category.addEventListener('click', () => toggleTableVisibility('addcategory_modal'));
buttons.add_order.addEventListener('click', () => toggleTableVisibility('addorder_modal'));

// controll the buttons
buttons.products.addEventListener('click',()=>{
  buttons.add_product.classList.toggle('hidden');
  buttons.add_product.classList.toggle('flex');
})
buttons.categories.addEventListener('click',()=>{
  buttons.add_category.classList.toggle('hidden');
  buttons.add_category.classList.toggle('flex');
})
buttons.suppliers.addEventListener('click',()=>{
  buttons.add_supplier.classList.toggle('hidden');
  buttons.add_supplier.classList.toggle('flex');
})
buttons.orders.addEventListener('click',()=>{
  buttons.add_order.classList.toggle('hidden');
  buttons.add_order.classList.toggle('flex');
})
buttons.users.addEventListener('click',()=>{
  buttons.add_user.classList.toggle('hidden');
  buttons.add_user.classList.toggle('flex');
})
buttons.customer.addEventListener('click',()=>{
  buttons.add_customer.classList.toggle('hidden');
  buttons.add_customer.classList.toggle('flex');
})