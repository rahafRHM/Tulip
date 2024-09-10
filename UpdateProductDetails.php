
<?php
require_once 'config.php';

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])){
    $item_id = $_POST['product_id'];
    $productName=$_POST['title'];
    $price=$_POST['price'];
    $quantity = $_POST['quantity'];
$description=$_POST['description'];
$image=$_POST['image'];
    // Fetch item details from database
    $sql = "UPDATE shoppingcart SET title=?, price=?, quantity=?, description=?, img=? WHERE productID=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssssss", $productName, $price, $quantity, $description, $image, $item_id);

        if (mysqli_stmt_execute($stmt)) {
            echo "Product updated successfully";
        } else {
            echo "Error updating product: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
} ?>
