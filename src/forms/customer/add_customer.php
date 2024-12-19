<div class="hidden pt-14 addcustomer_modal h-screen sm:ml-64 overflow-x-auto shadow-md sm:rounded-lg px-8">
        <h2 class="text-2xl font-bold mb-4">Supplier Information</h2>
        <form action="./src/controllers/authorController.php" class="grid grid-cols-2 gap-6" method="POST">
            <div class="mb-4 col-start-1">
                <label for="name" class="block text-gray-700 font-medium mb-2">First Name</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4 col-start-2">
                <label for="email" class="block text-gray-700 font-medium mb-2">Last Name</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4 col-start-1">
                <label for="number" class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="tel" id="number" name="phone" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4 col-start-2">
                <label for="number" class="block text-gray-700 font-medium mb-2">Phone</label>
                <input type="tel" id="number" name="phone" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4 col-start-1">
                <label for="address" class="block text-gray-700 font-medium mb-2">Adress</label>
                <input type="text" id="address" name="adress" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="col-start-2 flex justify-end">
                <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600">Submit</button>
            </div>
            <div class="hidden justify-end">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">update</button>
            </div>
        </form>
    </div>    