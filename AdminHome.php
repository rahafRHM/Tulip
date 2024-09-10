<?php
session_start();
require_once '../config.php';
require_once 'adminNavBar.php';

// Initialize the session

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  if ($_SESSION['role'] === 'admin') {
      header("location:AdminHome.php");
  } else {
      header("location:../login.php");
  }
  exit;
}
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
<title>Admin Home </title>
</head>

<body>
  <!-- <div class="upperdiv">
  <p class="callus" >اتصل بنا</p>
  <i class='fa fa-phone phoneicon' style="font-size:24px;"></i>
  <p class="callnum">+962 780 5620 54</p>
  <i class="fa fa-facebook-square icon1" style="font-size:24px;padding-left: 200px;padding-top: 10px;color: white;"></i>
  <i class="fa fa-instagram icon2" style="font-size:24px;color:white;"></i>

  </div> -->


  <!-- <div class="profileAndcart">
<img src="images/user-profile.png" alt="">
  </div> -->

<div class="profile">
  <img src="../images/userP.png" alt="profilepicture" id="profileimg">
  <div id="PInfoAdmin">
<h2>Personal Info</h2>
</div>

<form  action="Home.php" method="post" class="profileInfoA">
  <!-- <label for="fname" class="label1">الاسم الكامل</label> -->
  <br>

  <input type="text" name="fname" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>" dir="rtl" readonly>

  <!-- <label for="email" class="label2" >البريد الالكتروني</label> -->
  <br>

<input type="email" name="email" value="<?php echo htmlspecialchars($_SESSION["email"]);  ?>" readonly dir="rtl">
<!-- <label for="password">كلمة السر</label><br>

<input type="password" name="password" value="" required> -->
<!-- <label for="phoneNum" class="label3">رقم الهاتف</label> -->
<br>

</form>

<div id="OInfoAdmin">
<h2>Orders</h2>
</div>
<?php
$stmt = $conn->prepare("SELECT * FROM orders  ORDER BY date_added DESC ");
 // "i" indicates $id is an integer, adjust if $id is another type
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
  $dateAdded = new DateTime($row["date_added"]);
$formattedDate = $dateAdded->format('Y-m-d');
 ?>
 <div class="myOrder">
   <div class="status">
     <p> order No.:<?= $row["orderID"] ?></p>
     <p>Status : <?= $row["status"] ?> </p>

   </div>
   <div class="showD">
     <p>Total:<?= $row["totalprice"] ?> </p>
 <p class="orderDate">Date:<?= $formattedDate ?> </p>
     <a href="showOrderProducts.php?orderID=<?=$row['orderID']?>">show order details</a>
   </div>
 </div>
 <?php } }else{
   echo '<div class="myOrder" id="NoOrderUser"><p>No previous Orders </p></div>';
 }$stmt->close(); ?>
 </div>

 </div>
<!-- <div id="oDetails">

</div> -->
<!-- <div class="PreviousOrders">
  <span id="PInfo">
<h2>طلباتي</h2>
</span>
</div> -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script type="text/javascript">
$("#PInfoAdmin").click(function(){
$('.profileInfoA').slideToggle("slow");

});
$("#OInfoAdmin").click(function(){
$('.myOrder').slideToggle("slow");

});
function fetchNewOrders() {
       $.ajax({
           url: 'update_notification.php',
           type: 'GET',
           dataType: 'json',
           success: function(data) {
             let orderList = $('#oDetails');
             let orderCount = $('.orderNotification');
                orderList.empty();
                if (data.length === 0) {
                          // Display message when there are no orders
                          orderList.append(`<div class="adminOrder adminorderzero"><p>No New Orders</p></div>`);
                        } else {
                          // Display orders
                          data.forEach(function(order) {
                            let htmlContent = `
                              <div class="adminOrder">
                                <div class="statusAdmin">
                                  <p>order NO.: ${order.orderID}</p>
                                  <p class="orderDate"> order Date: ${order.date_added} </p>
                                </div>
                                <div class="showDAdmin">
                                  <p>Total: ${order.totalprice} </p>
                                  <a href="showOrderProducts.php?orderID=${order.orderID}">show order details</a>
                                </div>
                              </div>
                            `;
                            orderList.append(htmlContent);
                          });
                        }

                        orderCount.text(data.length); // Update total order count
                      },
                      error: function(xhr, status, error) {
                        console.error('Error fetching orders:', error);
                      }
                    });
                  }

                  // Fetch new orders every 5 seconds
                  setInterval(fetchNewOrders, 5000);

                  // Initial fetch
                  fetchNewOrders();
</script>

<script src="../script.js" charset="utf-8"></script>
</body>
</html>
