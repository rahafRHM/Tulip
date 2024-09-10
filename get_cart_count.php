<?php
// Start the session
session_start();

// Check if cart session variable exists
$total_items_in_cart = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $total_items_in_cart += $item['quantity'];
    }}
    echo $total_items_in_cart;
?>
