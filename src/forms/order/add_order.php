<?php
require_once './../database/configuration.php';
?>
<div class="hidden pt-14 Addorder_modal h-screen sm:ml-64 overflow-x-auto shadow-md sm:rounded-lg px-8">
        <h2 class="text-2xl font-bold mb-4">Product Information</h2>
        <form action="./../src\Controllers\order_Controller.php" method="POST">
           
            <div class="mb-4">
                <label for="product" class="block text-gray-700 font-medium mb-2">Product</label>
                <select name="product" id="product"  class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="choose product" selected>choose product</option>
                    <?php
                $sql = "SELECT `name` FROM product";
                $result = $conn->query($sql);
                if (!$result) {
                    die("Invalid query:" . $conn->error);
                }
                //read data of each row
                while ($option = $result->fetch_assoc()) {
                    echo "
                   <option id='$option[name]'>$option[name]</option>
                    ";
                }
                ?>
                </select>
            </div>
            <div class="mb-4">
                <label for="customer_email" class="block text-gray-700 font-medium mb-2">customer</label>
                <select name="customer_email" id="customer_email"  class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="choose customer's email" selected>choose customer's email</option>
                    <?php
                $sql = "SELECT email FROM customer";
                $result = $conn->query($sql);
                if (!$result) {
                    die("Invalid query:" . $conn->error);
                }
                //read data of each row
                while ($option = $result->fetch_assoc()) {
                    echo "
                   <option id='$option[email]'>$option[email]</option>
                    ";
                }
                ?>
                </select>
            </div>
            <div class="mb-4">
                <label for="status" class="block text-gray-700 font-medium mb-2">status</label>
                <select name="status" id="status"  class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="choose status" selected>choose status</option>
                <option value="shipped" >shipped</option>
                <option value="pending" >pending</option>
                <option value="delivered" >delivered</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="quantity" class="block text-gray-700 font-medium mb-2">quantity ordered</label>
                <input type="number" id="quantity" name="quantity" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="OrderDate" class="block text-gray-700 font-medium mb-2">Order Date</label>
                <input type="date" id="OrderDate" name="OrderDate" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="supplier" class="block text-gray-700 font-medium mb-2">supplier</label>
                <select name="supplier" id="supplier"  class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="choose a supplier" selected>choose a supplier</option>
                    <?php
                $sql = "SELECT supplier_name FROM supplier";
                $result = $conn->query($sql);
                if (!$result) {
                    die("Invalid query:" . $conn->error);
                }
                //read data of each row
                while ($option = $result->fetch_assoc()) {
                    echo "
                   <option id='$option[supplier_name]'>$option[supplier_name]</option>
                    ";
                }
                ?>
                </select>
            </div>

            <div class="flex justify-end">
            <button type="submit" name="ajoute" class="relative inline-block text-lg group">
            <span class="relative z-10 block px-5 py-3 overflow-hidden font-medium leading-tight text-gray-800 transition-colors duration-300 ease-out border-2 border-gray-900 rounded-lg group-hover:text-white">
              <span class="absolute inset-0 w-full h-full px-5 py-3 rounded-lg bg-gray-50"></span>
              <span class="absolute left-0 w-48 h-48 -ml-2 transition-all duration-300 origin-top-right -rotate-90 -translate-x-full translate-y-12 bg-gray-900 group-hover:-rotate-180 ease"></span>
              <span class="relative">Submit</span>
            </span>
            <span class="absolute bottom-0 right-0 w-full h-12 -mb-1 -mr-1 transition-all duration-200 ease-linear bg-gray-900 rounded-lg group-hover:mb-0 group-hover:mr-0" data-rounded="rounded-lg"></span>
          </button>
            </div>
        </form>
    </div>    