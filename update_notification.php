<?php
require '../config.php';

// Fetch new orders where admin_notified is FALSE
// Fetch orders where admin_Notify is 0 and order by date_added descending
$sql_check_orders = "SELECT * FROM orders WHERE admin_Notify = 0 ORDER BY date_added DESC";
$result = $conn->query($sql_check_orders);

$orders = [];

while ($row = $result->fetch_assoc()) {
    $orders[] = $row;
}

// Check for status change and update admin_Notify if needed
foreach ($orders as $order) {
    if ($order['status'] == 'Delivering'|| $order['status']=="Delivered") {
        // Update admin_Notify to 1 or whatever value indicates it has been notified
        $update_sql = "UPDATE orders SET admin_Notify = 1 WHERE orderID = " . $order['orderID'];
        $conn->query($update_sql);
    }
}

// Fetch updated orders after potential status change
$sql_check_orders_updated = "SELECT * FROM orders WHERE admin_Notify = 0 ORDER BY date_added DESC";
$result_updated = $conn->query($sql_check_orders_updated);

$orders_updated = [];

while ($row_updated = $result_updated->fetch_assoc()) {
    $orders_updated[] = $row_updated;
}

// Return updated orders as JSON
header('Content-Type: application/json');
echo json_encode($orders_updated);

$conn->close();
?>
