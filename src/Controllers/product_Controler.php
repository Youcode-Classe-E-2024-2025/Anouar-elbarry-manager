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
        $stmt = $conn->prepare("DELETE FROM `product` WHERE `id` = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo " the product have been deleted successfully.";
        } else {
            echo "Failed to delete product: " . $conn->error;
        }
        
        $stmt->close();

    } catch (mysqli_sql_exception $e) {
        echo "Database error: " . $e->getMessage();
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form data
  $name = $_POST['name'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];
  $supplierpr = $_POST['supplierpr'];
  $CategoryPr = $_POST['CategoryPr'];

  // Validate and sanitize data
  $name = $conn->real_escape_string(trim($name));
  $price = $conn->real_escape_string(trim($price));
  $quantity = $conn->real_escape_string(trim($quantity));
  $supplierpr = $conn->real_escape_string(trim($supplierpr));
  $CategoryPr = $conn->real_escape_string(trim($CategoryPr));

   // Get supplier ID
   $stmt1 = $conn->prepare("SELECT id FROM supplier WHERE supplier_name = ?");
   $stmt1->bind_param("s", $supplierpr);
   $stmt1->execute();
   $result1 = $stmt1->get_result();
   $supplierId = $result1->fetch_assoc()['id'] ?? null;
   $stmt1->close();

   // Get category ID
   $stmt2 = $conn->prepare("SELECT id FROM category WHERE category_name = ?");
   $stmt2->bind_param("s", $CategoryPr);
   $stmt2->execute();
   $result2 = $stmt2->get_result();
   $categoryId = $result2->fetch_assoc()['id'] ?? null;
   $stmt2->close();
    
        $insertSql = "INSERT INTO `product` (`name`,price,quantity_instock,category_id,supplier_id) 
       
        VALUES ('$name','$price','$quantity','$categoryId','$supplierId')";
if ($conn->query($insertSql) === TRUE) {
echo "Product added successfully!";
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