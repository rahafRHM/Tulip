<?php

session_start();

// Function to sanitize input data
function sanitize($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // if (isset($_POST['update_quantity'])) {
    //     // Update quantity for an item in the cart
    //     $item_id = sanitize($_POST['item_id']);
    //     $quantity = intval($_POST['quantity']); // Ensure quantity is an integer
    //
    //     // Validate quantity (e.g., ensure it's greater than 0)
    //     if ($quantity <= 0) {
    //         // Handle invalid quantity (optional: redirect back with error message)
    //         $_SESSION['error'] = "Invalid quantity. Please enter a valid quantity.";
    //         header("Location: orderDetails.php");
    //         exit;
    //     }
    //
    //     // Update quantity in the session cart
    //     if (isset($_SESSION['cart'][$item_id])) {
    //         $_SESSION['cart'][$item_id]['quantity'] = $quantity;
    //         $_SESSION['success'] = "Quantity updated successfully.";
    //         header("Location: orderDetails.php");
    //         exit;
    //     } else {
    //         $_SESSION['error'] = "Item not found in cart.";
    //         header("Location: orderDetails.php");
    //         exit;
    //     }
    // }
     if (isset($_POST['delete_item'])) {
        // Delete item from the cart
        $item_id = sanitize($_POST['item_id']);

        // Remove item from the session cart
        if (isset($_SESSION['cart'][$item_id])) {
            unset($_SESSION['cart'][$item_id]);
            $_SESSION['success'] = "Item deleted successfully.";
            header("Location: orderDetails.php");
            exit;
        } else {
            $_SESSION['error'] = "Item not found in cart.";
            header("Location: orderDetails.php");
            exit;
        }
    } else {
        $_SESSION['error'] = "Invalid request.";
        header("Location: orderDetails.php");
        exit;
    }
} else {
    $_SESSION['error'] = "Method not allowed.";
    header("Location: orderDetails.php");
    exit;
}
?>
