
<?php
require_once '../config.php';
session_start(); // Start or resume session

// Check if user is logged in and if cart session exists
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || !isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    // Redirect to orderDetails.php or any other page if user is not logged in or cart is empty
    header("Location: orderDetails.php");
    exit();
}

function calculateTotalPrice($cart) {
    $total_price = 0;

    foreach ($cart as $item) {
        $total_price += $item['price'] * $item['quantity'];
    }

    return $total_price;
}

// Calculate the total price
$total_price = calculateTotalPrice($_SESSION['cart']);
$delivery_price = 2;
$total_price_with_delivery = $total_price + $delivery_price;
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Confirm'])){
  $user_id = $_SESSION["id"];

$order_date = date('Y-m-d H:i:s'); // Current date and time
$status="preparing";
$sql_order = "INSERT INTO orders (id, totalprice, date_added, status)
              VALUES ('$user_id', '$total_price_with_delivery', '$order_date', '$status')";
              if ($conn->query($sql_order) === TRUE) {
                  $order_id = $conn->insert_id; // Get the inserted orderID

                  // Insert each product into orderproducts table
                  foreach ($_SESSION['cart'] as $item_id => $item) {
                      $product_id = $item_id;
                      $quantity = $item['quantity'];

                      $sql_order_product = "INSERT INTO orderproducts (orderID, productID, quantity)
                                            VALUES ('$order_id', '$product_id', '$quantity')";

                      if ($conn->query($sql_order_product) !== TRUE) {
                          echo "Error inserting order product: " . $conn->error;
                          // Handle error scenario if needed
                      }

                  }
                  // $sql_update_flag = "UPDATE orders SET admin_Notify = 0 WHERE orderID = '$order_id'";
                  //        if ($conn->query($sql_update_flag) !== TRUE) {
                  //            echo "Error updating admin notified flag: " . $conn->error;
                  //            // Handle error scenario if needed
                  //        }

                  // Clear the shopping cart session after successful insertion
                  unset($_SESSION['cart']);

                  // Redirect to order placed confirmation page
                  echo'<div class="confirmed" id="confirmed">
                    <img src="../images/booking.png" alt="">
                    <p>order placed successfully</p>
                  </div>  ';
  echo '<meta http-equiv="refresh" content="3;URL='.$_SERVER['PHP_SELF'].'">';
                                  exit();
              } else {
                  echo "Error inserting order: " . $conn->error;
              }


}
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

<title>Order confirmation</title>
</head>
<body >
  <!-- <div class="upperdiv">
  <p class="callus" >اتصل بنا</p>
  <i class='fa fa-phone phoneicon' style="font-size:24px;"></i>
  <p class="callnum">+962 780 5620 54</p>
  <i class="fa fa-facebook-square icon1" style="font-size:24px;padding-left: 200px;padding-top: 10px;color: white;"></i>
  <i class="fa fa-instagram icon2" style="font-size:24px;color:white;"></i>

  </div> -->
  <nav  id="ordernavbar">
      <img src="../images/shape2.png" alt="logoimg" class="imgbrand" id="forOrderSubmission"/>



  </nav>





<div class="orderconfirm-flex-container" >
  <h1>Shopping Cart</h1>

  <?php
 // Start the session to access $_SESSION variables

  // Check if user is logged in and if cart session exists

          // Loop through each item in the cart and display it
          foreach ($_SESSION['cart'] as $item_id => $item) {
  ?>
  <div class="orderconfirm-productCard2" id="orderconfirm-lastpage">
      <img src="<?= $item['img_path']?>" alt="" class="orderproductimg">
      <div class="number numberConf">
      <input type="text" value="<?= $item['quantity']?>"/>

      </div>
  <div class="orderproductdetails2">
    <p><?= $item['title']?></p>
    <h4><?= $item['price']?> </h4>
  </div>

  </div>
<?php } ?>

  </div>
<!-- <button type="button" name="button">التالي</button> -->

<div class="OCP">

<table class="total">

  <tr>
    <td class="leftAlign">sub Total</td>

    <td class="rightAlign"> <?= number_format($total_price, 2) ?></td>

  </tr>
  <tr>
    <td class="leftAlign">Delivery</td>

    <td class="rightAlign"><?=$delivery_price?></td>

  </tr>
  <tr >
    <td  class="totalLine leftAlign">Total </td>

    <td class="totalLine rightAlign"><?= number_format($total_price + 2, 2) ?></td>

  </tr>
</table>
<form class="orderC" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <input type="submit" name="Confirm" value="Confirm Order" id="submitOrder">
</form>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="../script.js" charset="utf-8"></script>

  </body>
</html>
