<?php 
require_once('./../../database/configuration.php');

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../src/output.css">
    <title>controlle</title>
</head>
<body class="flex justify-center items-center">

<div
  id="success-modal"
  class="fixed inset-0 z-[60] flex items-center justify-center bg-black/50"
>
  <div
    class="bg-white rounded-2xl p-6 w-full max-w-sm transform translate-y-0 opacity-100 transition-all duration-500"
  >
    <div class="flex items-center justify-between pb-4 border-b border-gray-200">
      <h4 class="text-lg font-medium text-gray-900">Message</h4>
      <button
        class="text-gray-500 hover:text-gray-700 focus:outline-none"
        onclick="document.getElementById('success-modal').remove();"
      >
        <svg
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M7.75732 7.75739L16.2426 16.2427M16.2426 7.75739L7.75732 16.2427"
            stroke="black"
            stroke-width="1.6"
            stroke-linecap="round"
          ></path>
        </svg>
      </button>
    </div>
    <div class="py-4 text-center">
      <p class="text-gray-600 text-sm">
      <?php 


if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 

    try {
        $stmt = $conn->prepare("UPDATE `app_user` SET `deleted_at` = NOW() WHERE `id` = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo " User has been archived successfully.";
        } else {
            echo "Failed to archive user: " . $conn->error;
        }
        
        $stmt->close();

    } catch (mysqli_sql_exception $e) {
        echo "Database error: " . $e->getMessage();
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset( $_POST['add'])) {
  // Retrieve form data
  $username = trim($_POST['username']);
  $email = trim($_POST['email']);
  $password = password_hash(password: trim($_POST['password']), algo: PASSWORD_DEFAULT);

  // Sanitize inputs
  $username = $conn->real_escape_string($username);
  $email = $conn->real_escape_string($email);

  // Check the number of users in the `app_user` table
  $userQuery = "SELECT COUNT(*) AS user_count FROM `app_user`";
  $userResult = $conn->query($userQuery);

  if (!$userResult) {
      die("Query failed: " . $conn->error);
  }

  $userRow = $userResult->fetch_assoc();
  $userCount = $userRow['user_count'];

  // Determine role based on user count
  $roleId = ($userCount == 0) ? 1 : 2; // First user gets role_id = 1, others get role_id = 2

  // Insert data into the `app_user` table
  $insertSql = "INSERT INTO `app_user` (username, email, user_password, role_id) 
                VALUES ('$username', '$email', '$password', $roleId)";

  if ($conn->query($insertSql) === true) {
      echo "User added successfully!";
  } else {
      echo "Error: " . $insertSql . "<br>" . $conn->error;
  }
}

      ?>
      </p>

    </div>
    <div class="flex justify-end pt-4 border-t border-gray-200">
    <a href="./../../dashboards\user_dashboard.php">
        <button
        class="py-2 px-4 text-xs bg-orange-500 text-white rounded-full cursor-pointer font-semibold text-center shadow-sm transition-all duration-300 hover:bg-orange-700"
        onclick="document.getElementById('success-modal').remove();"
      >
        go to Dashboard
      </button>
        </a>
      
    </div>
  </div>
</div>

</body>
</html>