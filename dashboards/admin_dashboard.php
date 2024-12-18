<?php
require_once('./../database/configuration.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../src\output.css">
    <title>STOCK WISE Admin</title>
</head>

<body style="background-image: url('./../src/imges/bg.png'); background-size:cover;">

    <nav class="fixed top-0 z-50 w-full bg-black border-b border-gray-600">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button id="menu" data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <a href="#" class="flex ms-2 md:me-24">

                        <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap text-white">
                            STOCK WISE</span>
                    </a>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center ms-3">
                        <div>
                            <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full"
                                    src="data:image/png;base64,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"
                                    alt="user photo">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- aside -->
    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-transparent shadow-[4.0px_8.0px_8.0px_rgba(0,0,0,0.38)] dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="./../dashboards\admin_dashboard.php"
                    id="home"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-orange-600 dark:group-hover:text-white"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>

                        <span class="ms-3">Home</span>
                    </a>
                </li>

                <!-- products -->
                <li>
                    <a href="#"
                     id="products"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-orange-600 dark:group-hover:text-white"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Products</span>
                    </a>
                </li>

                <!-- Categories -->
                <li>
                    <a href="#"
                     id="categories"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-orange-600 dark:group-hover:text-white"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 4.5v15m6-15v15m-10.875 0h15.75c.621 0 1.125-.504 1.125-1.125V5.625c0-.621-.504-1.125-1.125-1.125H4.125C3.504 4.5 3 5.004 3 5.625v12.75c0 .621.504 1.125 1.125 1.125Z" />
                        </svg>

                        <span class="flex-1 ms-3 whitespace-nowrap">Categories</span>
                    </a>
                </li>

                <!-- Supplier -->
                <li>
                    <a href="#"
                     id="suppliers"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-orange-600 dark:group-hover:text-white"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                        </svg>

                        <span class="flex-1 ms-3 whitespace-nowrap">Supplier</span>
                    </a>
                </li>

                <!-- Orders -->
                <li>
                    <a href="#"
                     id="orders"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-orange-600 dark:group-hover:text-white"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 9.75h4.875a2.625 2.625 0 0 1 0 5.25H12M8.25 9.75 10.5 7.5M8.25 9.75 10.5 12m9-7.243V21.75l-3.75-1.5-3.75 1.5-3.75-1.5-3.75 1.5V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0c1.1.128 1.907 1.077 1.907 2.185Z" />
                        </svg>

                        <span class="flex-1 ms-3 whitespace-nowrap">Orders</span>
                    </a>
                </li>

                <!-- Users -->
                <li>
                    <a href="#"
                    id="users"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-orange-600 dark:group-hover:text-white"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
                    </a>
                </li>

                <!-- Statistics -->
                <li>
                    <a href="#"
                        class="flex Statistics items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-orange-600 dark:group-hover:text-white"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                        </svg>

                        <span class="flex-1 ms-3 whitespace-nowrap">Statistics</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <!-- home -->
    <section id="home_section" class="h-screen sm:ml-64 overflow-x-auto shadow-md sm:rounded-lg relative">
  <div class="absolute inset-0 bg-black opacity-50"></div>
  <div class="relative z-10 text-center text-white pt-40">
    <h1 class="text-4xl md:text-5xl font-bold leading-tight">Welcome to <span class="text-emerald-500">STOK</span> <span class="text-orange-600">WISE</span></h1>
    <p class="mt-4 text-lg md:text-xl">Your smart inventory management solution</p>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-3 h-64 gap-6 p-6">
    <div class="overflow-hidden rounded-lg shadow-lg transition-shadow duration-300 hover:shadow-2xl">
      <img src="./../src/imges/stock1.jpg" alt="Inventory stock displayed neatly on shelves" class="w-full h-auto transform transition-transform duration-300 hover:scale-105">
    </div>
    <div class="overflow-hidden rounded-lg shadow-lg transition-shadow duration-300 hover:shadow-2xl">
      <img src="./../src/imges/stock2.jpg" alt="Technicians monitoring inventory levels with digital tools" class="w-full h-auto transform transition-transform duration-300 hover:scale-105">
    </div>
    <div class="overflow-hidden rounded-lg shadow-lg transition-shadow duration-300 hover:shadow-2xl">
      <img src="./../src/imges/stock3.jpg" alt="Graphical representation of stock data and analysis" class="w-full h-auto transform transition-transform duration-300 hover:scale-105">
    </div>
  </div>
</section>

    <!-- products table -->
    <div class="pt-14 hidden products_table h-screen sm:ml-64 overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-center text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Supplier
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Current Stock
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = 'SELECT 
    product.price,
    product.name AS product_name,
    supplier.supplier_name,
    category.category_name,
    product.quantity_instock
FROM 
    product
INNER JOIN 
    supplier ON product.supplier_id = supplier.id
INNER JOIN 
    category ON product.category_id = category.id;
                            ';
                $result = $conn->query($sql);
                if (!$result) {
                    die("Invalide query :" . $conn->error);
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                         <tr
                      class='bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'>
                      <td class='px-6 py-4'>{$row['product_name']}</td>
                      <td class='px-6 py-4'>{$row['price']} DH</td>
                      <td class='px-6 py-4'>{$row['category_name']} </td>
                      <td class='px-6 py-4'>{$row['supplier_name']} </td>
                      <td class='px-6 py-4'>{$row['quantity_instock']}</td>
                      <td class='px-2 py-4 flex  justify-around'>
                          <a href='#' class='font-medium text-blue-600 dark:text-blue-500 hover:underline'>Edit</a>
                          <a href='' class='font-medium text-red-600 dark:text-red-500 hover:underline'>delet</a>
                      </td>
              </tr>
                 ";
                }
                ?>

            </tbody>
        </table>
    </div>

    <!-- Categories table -->
    <div class="pt-14  hidden category_table h-screen sm:ml-64 overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-center text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        number of Products
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Created At
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = 'SELECT *FROM category';
                $result = $conn->query($sql);
                if (!$result) {
                    die("Invalide query :" . $conn->error);
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                         <tr
                      class='bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'>
                      <td class='px-6 py-4'>{$row['id']}</td>
                      <td class='px-6 py-4'>{$row['category_name']} </td>
                      <td class='px-6 py-4'>{$row['products_nbr']} </td>
                      <td class='px-6 py-4'>{$row['created_at']}</td>
                      <td class='px-2 py-4 flex  justify-around'>
                          <a href='#' class='font-medium text-blue-600 dark:text-blue-500 hover:underline'>Edit</a>
                          <a href='' class='font-medium text-red-600 dark:text-red-500 hover:underline'>delet</a>
                      </td>
              </tr>
                 ";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Suppliers table -->
    <div class="pt-14 hidden supplier_table h-screen sm:ml-64 overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-center text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone Number
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Address
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Products Supplied
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Created At
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = 'SELECT * FROM supplier';
                $result = $conn->query($sql);
                if (!$result) {
                    die("Invalide query :" . $conn->error);
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                         <tr
                      class='bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'>
                      <td class='px-6 py-4'>{$row['id']}</td>
                      <td class='px-6 py-4'>{$row['supplier_name']} </td>
                      <td class='px-6 py-4'>{$row['email']} </td>
                      <td class='px-6 py-4'>{$row['phone']} </td>
                      <td class='px-6 py-4'>{$row['address']}</td>
                      <td class='px-6 py-4'>{$row['products_supplied']}</td>
                      <td class='px-6 py-4'>{$row['created_at']}</td>
                      <td class='px-2 py-4 flex  justify-around'>
                          <a href='#' class='font-medium text-blue-600 dark:text-blue-500 hover:underline'>Edit</a>
                          <a href='' class='font-medium text-red-600 dark:text-red-500 hover:underline'>delet</a>
                      </td>
              </tr>
                 ";
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Orders table -->
    <div class="pt-14 hidden order_table h-screen sm:ml-64 overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-center text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Customer
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Supplier
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Order Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Order Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Quantity Ordered
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Created At
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = 'SELECT    
    orders.id AS order_id,
    supplier.supplier_name,
    product.name AS product_name,
    customer.first_name,
    customer.last_name,
    orders.order_date,
    orders.order_status,
    orders.quantity_ordered,
    orders.created_at
FROM 
    orders
INNER JOIN 
    supplier ON orders.supplier_id = supplier.id
INNER JOIN 
    product ON orders.product_id = product.id
INNER JOIN 
    customer ON orders.customer_id = customer.id;';
                $result = $conn->query($sql);
                if (!$result) {
                    die("Invalide query :" . $conn->error);
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                         <tr
                      class='bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'>
                      <td class='px-6 py-4'>{$row['order_id']}</td>
                      <td class='px-6 py-4'>{$row['supplier_name']} </td>
                      <td class='px-6 py-4'>{$row['product_name']} </td>
                      <td class='px-6 py-4'>{$row['first_name']} {$row['last_name']} </td>
                      <td class='px-6 py-4'>{$row['order_date']}</td>
                      <td class='px-6 py-4'>{$row['order_status']}</td>
                      <td class='px-6 py-4'>{$row['quantity_ordered']}</td>
                      <td class='px-6 py-4'>{$row['created_at']}</td>
                      <td class='px-2 py-4 flex  justify-around'>
                          <a href='#' class='font-medium text-blue-600 dark:text-blue-500 hover:underline'>Edit</a>
                          <a href='' class='font-medium text-red-600 dark:text-red-500 hover:underline'>delet</a>
                      </td>
              </tr>
                 ";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- users table -->
    <div class="pt-14  hidden users_table h-screen sm:ml-64 overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-center text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Username
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Role
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Created At
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = 'SELECT 
                          
                      app_user.id as user_id,
                      app_user.username,
                      app_user.email,
                      role.role_name,
                      app_user.created_at

                      FROM app_user
                      INNER JOIN role ON app_user.role_id = role.id';
                $result = $conn->query($sql);
                if (!$result) {
                    die("Invalide query :" . $conn->error);
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                         <tr
                      class='bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600'>
                      <td class='px-6 py-4'>{$row['user_id']}</td>
                      <td class='px-6 py-4'>{$row['username']} </td>
                      <td class='px-6 py-4'>{$row['email']} </td>
                      <td class='px-6 py-4'>{$row['role_name']} {$row['last_name']} </td>
                      <td class='px-6 py-4'>{$row['created_at']}</td>
                      <td class='px-2 py-4 flex  justify-around'>
                          <a href='#' class='font-medium text-blue-600 dark:text-blue-500 hover:underline'>Edit</a>
                          <a href='' class='font-medium text-red-600 dark:text-red-500 hover:underline'>delet</a>
                      </td>
              </tr>
                 ";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="./../src/script.js"></script>
</body>

</html>