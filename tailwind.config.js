/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js}","index.php","dashboards/admin_dashboard.php",
    "dashboards/user_dashboard.php","src/modal/supplier/add_supplier.php","src/modal/categories/add_category.php","src/modal/users/add_user.php"],
  theme: {
    extend: {},
  },
  plugins: [],
}