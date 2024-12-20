<?php 
require_once('./../../database/configuration.php');

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../src/output.css">
    <title>add</title>
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
        $stmt = $conn->prepare("DELETE FROM `orders` WHERE `id` = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo " the Order have been deleted successfully.";
        } else {
            echo "Failed to delete Order: " . $conn->error;
        }
        
        $stmt->close();

    } catch (mysqli_sql_exception $e) {
        echo "Database error: " . $e->getMessage();
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' &&  isset($_POST['ajoute']) ) {
  // Retrieve form data
  $customer = $_POST['customer_email'];
  $status = $_POST['status'];
  $quantity = $_POST['quantity'];
  $supplier = $_POST['supplier'];
  $product = $_POST['product'];
  $OrderDate = $_POST['OrderDate'];
  // Validate and sanitize data
  $customer = $conn->real_escape_string(trim($customer));
  $status = $conn->real_escape_string(trim($status));
  $quantity = $conn->real_escape_string(trim($quantity));
  $supplier = $conn->real_escape_string(trim($supplier));
  $product = $conn->real_escape_string(trim($product));
  $OrderDate = $conn->real_escape_string(trim($OrderDate));
  
 // Fetch the IDs for customer, supplier, and product
 $sql1 = "SELECT id FROM customer WHERE email = '$customer'";
 $result1 = $conn->query($sql1);
 $customerId = $result1->fetch_assoc()['id']; // Get the customer ID

 $sql2 = "SELECT id FROM supplier WHERE supplier_name = '$supplier'";
 $result2 = $conn->query($sql2);
 $supplierId = $result2->fetch_assoc()['id']; // Get the supplier ID

 $sql3 = "SELECT id FROM product WHERE name = '$product'";
 $result3 = $conn->query($sql3);
 $productId = $result3->fetch_assoc()['id']; // Get the product ID



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

        $insertSql = "INSERT INTO `orders` (customer_id,order_status,product_id,quantity_ordered,supplier_id,order_date) 
        VALUES ('$customerId', '$status','$productId','$quantity','$supplierId','$OrderDate')";
if ($conn->query($insertSql) === TRUE) {
echo "order for Customer nbr:".$customerId." added successfully!";
} else {
echo "Error: " . $insertSql . "<br>" . $conn->error;
}
    }
      ?>
      </p>

    </div>
    <div class="flex justify-end pt-4 border-t border-gray-200">
    <a href="./../../dashboards\admin_dashboard.php">
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