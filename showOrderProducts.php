<?php require_once '../config.php';

require_once 'adminNavBar.php';
 ?>
<!DOCTYPE html>
<html lang="ar" dir="ltr">
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

<title>show order details</title>
</head>
<body>
<div class="UserOrderDetails">
  <?php
if (isset($_GET['orderID']) && !empty($_GET['orderID'])) {
  $orderid = $_GET['orderID'];

  // Check if the form is submitted via POST and handle status update
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitStatus'])) {
    $statusAdmin = $_POST['changeStatusoption'];
    $sqlst = "UPDATE orders SET status = ? WHERE orderID = ?";
    $stmt1 = mysqli_prepare($conn, $sqlst);
    mysqli_stmt_bind_param($stmt1, "si", $statusAdmin, $orderid);
    if (mysqli_stmt_execute($stmt1)) {
      $confirm='<p id="orderStatusChanged">✔order status changed</p>';
    } else {
      echo "Error updating record: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt1);
  }

  // Prepare SQL query to fetch order details and user information
  $sql = "SELECT o.orderID, o.id AS orderUserID, o.totalprice, o.date_added, o.status,
                 u.id AS userID, u.username, u.phone_number, u.location,
                 op.productID, s.title AS pName, s.price AS Uprice, op.quantity, s.img_path
          FROM orders o
          INNER JOIN orderproducts op ON o.orderID = op.orderID
          INNER JOIN shoppingcart s ON op.productID = s.productID
          INNER JOIN users u ON o.id = u.id
          WHERE o.orderID = ?";

  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "i", $orderid);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  $orderDetails = []; // Array to store order details
  $userInfo = null;   // Variable to store user information

  if (mysqli_num_rows($result) > 0) {
    // Fetch all details and store user information
    while ($row = mysqli_fetch_assoc($result)) {
      if (!$userInfo) {
        $userInfo = $row; // Store user info once
      }
      $orderDetails[] = $row; // Store order details
    }
    $odate=new DateTime($userInfo['date_added']);
    $fodate=$odate->format('Y-m-d');
    ?>
  <div class="adminODetails">
    <div class="oNoDate">
      <p>Order #  <?=$userInfo['orderID']?> </p>
      <p >Date :        <?=$fodate?> </p>
    </div>
  <div class="">
    <p> Status :      <?=$userInfo['status']?></p>


<form class="" action="<?php echo $_SERVER['PHP_SELF'] . '?orderID=' . $orderid; ?>" method="post">
 change Status  <select class="changeStatusSelect" name="changeStatusoption" >
    <option value="Preparing" >Preparing </option>
    <option value="Delivering">Delvering</option>
    <option value="Delivered">Delivered</option>

  </select>
  <input class="confirmStatus" type="submit" name="submitStatus" value="confirm">
</form>

  </div>

</div>
  <div class="headesrP">
<h4 class="headerFirst">product Name</h4>
<h4 class="headersecond">Quantity</h4>
<h4 class="headerThird">Price</h4>
  </div>

  <?php
     // Output product details
     foreach ($orderDetails as $row) {
       ?>
       <div class="podetails">
         <div class="imgAndName">
           <img src="<?= $row['img_path']?>" alt="">
           <h4><?= $row['pName']?></h4>
         </div>
         <div class="OrderPQuantity">
           <h4><?= $row['quantity']?></h4>
         </div>
         <div class="OrderPPrice">
           <h4><?= $row['Uprice']?></h4>
         </div>
       </div>
       <?php
     }

     // Output invoice details
     ?>
     <div class="invoice">
       <div class="invoiceLocation">
         <p>username</p>
         <p><?=$userInfo['username']?></p>
       </div>
       <div class="invoiceLocation">
         <p>Location</p>
         <p><?=$userInfo['location']?></p>
       </div>
       <div class="invoicephone">
         <p>Phone Number</p>
         <p><?=$userInfo['phone_number']?></p>
       </div>
       <hr>
       <div class="invoicetotal">
         <p>SubTotal</p>
         <p><?= $userInfo['totalprice'] - 2 ?></p>
       </div>
       <div class="invoicedelivery">
         <p>Delivery</p>
         <p>2</p>
       </div>
       <hr>
       <div class="invoicetotal">
         <p>Total</p>
         <p><?= $userInfo['totalprice'] ?></p>
       </div>
     </div>
     <?php
   } else {
     echo "Item not found";
   }
   mysqli_stmt_close($stmt);
   mysqli_free_result($result);
 } else {
   echo "orderID is empty";
 }
 ?>

</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="../script.js" charset="utf-8"></script>
</body>
</html>
