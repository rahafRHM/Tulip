<?php require_once '../config.php';

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/style.css">
  <!-- fontawesome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- google fonts link -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@1,300&family=Lateef:wght@200;300;400;500;600;700;800&display=swap&family=Almarai:wght@300;400;700;800&display=swap&family=El+Messiri:wght@400..700&display=swap&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
<!--  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="https://kit.fontawesome.com/a6445728fe.js" crossorigin="anonymous"></script>

<title>show order products</title>
<?php require_once 'navChange.php';
 ?>
</head>
<body>

  <div class="orderconfirm-flex-containershow " >
<?php if (isset($_GET['orderID']) && !empty($_GET['orderID'])) {
    $orderid = $_GET['orderID'];

    // Prepare a SQL query to fetch item details
    $sql = "SELECT o.orderID, o.id, o.totalprice, o.date_added, o.status,
                      s.productID, s.title AS pName, s.price AS Uprice,
                      op.quantity, s.img_path
               FROM orders o
               INNER JOIN orderproducts op ON o.orderID = op.orderID
               INNER JOIN shoppingcart s ON op.productID = s.productID
               WHERE o.orderID = $orderid";// Assuming 'id' is the primary key

    // Using prepared statements to prevent SQL injection
    $result = $conn->query($sql);

    // Check if item exists
    if ($result->num_rows > 0) {
        // Fetch item details
        while ($row = $result->fetch_assoc()) {

?>
<div class="orderconfirm-productCard2" >
    <img src="<?= $row['img_path']?>" alt="" class="orderproductimg">
    <div class="number QNumShow">
    <input type="text" value="<?= $row['quantity']?>"/>

    </div>
<div class="orderproductdetails2  showPageD">
  <p><?= $row['pName']?></p>
  <h4><?= $row['Uprice']?> </h4>
</div>

</div>
<?php
}}
 else {
    echo "Item not found";
}
      $result->close();

} else {
echo "";
}?>
</div>

<script src="../script.js" charset="utf-8"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

</body>
</html>
