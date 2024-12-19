/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js}","index.php","dashboards/admin_dashboard.php",
    "dashboards/user_dashboard.php","src/modal/supplier/add_supplier.php","src/modal/categories/add_category.php","src/modal/users/add_user.php",
    "src/modal/order/add_order.php",
     "src/Controllers/product_Controler.php",
     "src/Controllers/category_Controler.php",
     "src/Controllers/order_Controler.php",
     "src/Controllers/supplier_Controler.php",
     "src/Controllers/customer_Controler.php",
     "src/Controllers/user_Controler.php"
    ],
  theme: {
    extend: {},
  },
  plugins: [],
}