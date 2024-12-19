<div class="hidden pt-14 adduser_modal h-screen sm:ml-64 overflow-x-auto shadow-md sm:rounded-lg px-8">
        <h2 class="text-2xl font-bold mb-4">User Information</h2>
        <form action="./../src\Controllers\user_Controller.php" class="grid grid-cols-2 gap-6" method="POST">
            <div class="mb-4 col-start-1">
                <label for="username" class="block text-gray-700 font-medium mb-2">Username</label>
                <input type="text" id="username" name="username" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4 col-start-2">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4 col-start-1">
                <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4 col-start-2">
                <label for="password2" class="block text-gray-700 font-medium mb-2">rewrite your Password again</label>
                <input type="password" id="password2" name="password2" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="col-start-2 flex justify-end">
                <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600">Submit</button>
            </div>
            <div class="hidden justify-end">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">update</button>
            </div>
        </form>
    </div>    