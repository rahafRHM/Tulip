<?php
session_start();
require_once '../config.php';

// Get the posted data
$product_id = intval($_POST['item_id']);

// Initialize variables
$session_quantity = 0;

// Retrieve the session quantity if it exists
if (isset($_SESSION['cart'][$product_id])) {
    $product_details = $_SESSION['cart'][$product_id];
    $session_quantity = $product_details['quantity'];
}

// Query to get the current quantity of the product
$sql = "SELECT quantity FROM shoppingcart WHERE productID = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    // Handle SQL prepare error
    echo 'error';
    exit();
}

$stmt->bind_param("i", $product_id);
$stmt->execute();
$stmt->bind_result($current_quantity);
$stmt->fetch();
$stmt->close();
$conn->close();

// Check if the product exists in the database
if ($current_quantity === null) {
    echo 'error';
    exit();
}

// Compare session quantity with current quantity
if ($session_quantity == $current_quantity) {
    echo 'match';
} else {
    echo 'no_match';
}
?>
