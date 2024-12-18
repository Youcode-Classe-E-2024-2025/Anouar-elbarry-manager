<?php
require_once './../database/configuration.php';
?>
<div class="hidden pt-14 Addorder_modal h-screen sm:ml-64 overflow-x-auto shadow-md sm:rounded-lg px-8">
        <h2 class="text-2xl font-bold mb-4">Product Information</h2>
        <form action="./../src/controllers/packageController.php" method="POST">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="supplier" class="block text-gray-700 font-medium mb-2">customer</label>
                <select name="supplier" id="supplier"  class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
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
                <label for="quantity" class="block text-gray-700 font-medium mb-2">quantity in-Stock</label>
                <input type="number" id="quantity" name="quantity" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
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
                <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600">Submit</button>
            </div>
            <div class="hidden  justify-end">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">update</button>
            </div>
        </form>
    </div>    