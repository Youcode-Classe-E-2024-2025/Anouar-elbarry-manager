<?php 
require_once("./../database/configuration.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['regester'])) {
    // Retrieve form data
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
  
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
        // Redirect based on role
        if ($roleId == 1) {
            header("Location: ./../dashboards\admin_dashboard.php");
        } else {
            header("Location: ./../dashboards\user_dashboard.php");
        }
        exit(); // Ensure no further code is executed after redirection
    } else {
        echo "Error: " . $insertSql . "<br>" . $conn->error;
    }
}
?>
