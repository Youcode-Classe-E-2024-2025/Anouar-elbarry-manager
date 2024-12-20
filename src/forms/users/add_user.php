<div class="hidden pt-14 adduser_modal h-screen sm:ml-64 overflow-x-auto shadow-md sm:rounded-lg px-8">
        <h2 class="text-2xl font-bold mb-4">User Information</h2>
        <form id="userForm" action="./../src\Controllers\user_Controller.php" class="grid grid-cols-2 gap-6" method="POST">
        <input type="hidden" name="action" value="add_user">
            <div class="mb-4 col-start-1">
                <label for="username" class="block text-gray-700 font-medium mb-2">Username</label>
                <input type="text" id="username" name="username" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" >
            </div>

            <div class="mb-4 col-start-2">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" >
            </div>
            <div class="mb-4 col-start-1">
                <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" >
            </div>
            <div class="mb-4 col-start-2">
                <label for="password2" class="block text-gray-700 font-medium mb-2">rewrite your Password again</label>
                <input type="password" id="password2" name="password2" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" >
            </div>
            <div class="col-start-2 flex justify-end">
            <button type="submit" class="relative inline-block text-lg group">
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
    <script>

const usernameRegex = /^[a-zA-Z0-9_]{3,20}$/;
const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

document.getElementById("userForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission for validation

    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    const password2 = document.getElementById("password2").value;

    if (!usernameRegex.test(username)) {
        alert("Invalid username. It should be 3-20 characters long and can only contain letters, numbers, and underscores.");
        return;
    }

    if (!passwordRegex.test(password)) {
        alert("Invalid password. It should be at least 8 characters long, contain uppercase and lowercase letters, a number, and a special character.");
        return;
    }

    if (password !== password2) {
        alert("Passwords do not match.");
        return;
    }

    // If all validations pass, you can submit the form
    this.submit();
});


    </script>