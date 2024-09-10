<?php require_once '../config.php';


$sql = "SELECT COUNT(*) AS orderCount FROM orders";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    echo $row['orderCount'];
} else {
    echo "0";
}

mysqli_close($conn);

 ?>
