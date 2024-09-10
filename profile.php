<?php
require_once '../config.php';
// Initialize the session
session_start();
$total_items_in_cart = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $total_items_in_cart += $item['quantity'];
    }}
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}


if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    $out = '<li class="navListItem loggedinListItem LastList nav-item dropdown" id="outProfile">▾<i class="fa-regular fa-user"></i>

            <div class="dropdownMenuProfile ">
            <a href="profile.php" class="dropdown-item">My Profile</a>
            <a href="../logout.php" class="dropdown-item">logout</a>
</div>
          </li>
          <li class="navListItem shoppingList "><a href="orderDetails.php" class="navLink " ><i class="fa-solid fa-cart-shopping" ><span data-product-id="1" id="cart-count">'.$total_items_in_cart.'</span></i></a></li>';
}else{
    $out = '<li class="navListItem loginListItem "><a href="../login.php" class="navLink " >login</a></li>';
}
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['changeUserData'])) {

    // Retrieve and sanitize form data
    $fname = htmlspecialchars($_POST["fname"]);
    $email = htmlspecialchars($_POST["email"]);
    $phoneNum = htmlspecialchars($_POST["phoneNum"]);
    $location = htmlspecialchars($_POST["location"]);

    // Update session variables with new values
    $_SESSION["username"] = $fname;
    $_SESSION["email"] = $email;
    $_SESSION["phone_number"] = $phoneNum;
    $_SESSION["location"] = $location;

    $userId = $_SESSION["id"]; // Assuming you have user ID stored in session
       $stmt = $conn->prepare("UPDATE users SET username=?, email=?, phone_number=?, location=? WHERE id=?");
       $stmt->bind_param("ssssi", $fname, $email, $phoneNum, $location, $userId);

       if ($stmt->execute()) {
           // Redirect to profile page or show success message
           header("Location: profile.php");
           exit();
       } else {
           // Handle error
           echo "Error updating record: " . $conn->error;
       }

       $stmt->close();
       $conn->close();
   }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="../styles/style.css">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>  <!-- fontawesome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- google fonts link -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@1,300&family=Lateef:wght@200;300;400;500;600;700;800&display=swap&family=Almarai:wght@300;400;700;800&display=swap&family=El+Messiri:wght@400..700&display=swap&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
<!--  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="https://kit.fontawesome.com/a6445728fe.js" crossorigin="anonymous"></script>
<title>Profile</title>
</head>

<body >
  <!-- <div class="upperdiv">
  <p class="callus" >اتصل بنا</p>
  <i class='fa fa-phone phoneicon' style="font-size:24px;"></i>
  <p class="callnum">+962 780 5620 54</p>
  <i class="fa fa-facebook-square icon1" style="font-size:24px;padding-left: 200px;padding-top: 10px;color: white;"></i>
  <i class="fa fa-instagram icon2" style="font-size:24px;color:white;"></i>

  </div> -->


  <!-- <div class="profileAndcart">
<img src="../images/user-profile.png" alt="">
  </div> -->
  <nav class="navbar" >
    <img src="../images/shape.png"  class="imgbrand" alt="">
  <!-- <img src="../images/user.png" alt="not found"> -->

      <ul class="navlist" >
        <li class="navListItem"><a href="Home.php" class="navLink">Home</a></li>
          <li class="navListItem dropdownList "><a href="products.php" class="navLink " >Products</a>

  <div class="dropdownMenu">
  <a href="FoodSuppliments.php">Food Suppliments</a>
  <a href="PersonalCare.php">Personal Care</a>
  <!-- <a href="MedicalDevices.php">Medical Devices</a> -->
  <a href="WomenSupplies.php">Women Care</a>
  <a href="BabySupplies.php">Baby Care</a>

  </div>
  </li>
          <!-- <li class="navListItem"><a href="Home.php#Caring" class="navLink" >رعاية  إضافية</a></li> -->
            <!-- <li class="navListItem"><a href="Home.php#Insurance" class="navLink" ></a></li> -->
              <!-- <li class="navListItem"><a href="Home.php#Location" class="navLink" >موقعنا</a></li> -->
              <li class="navListItem"><a href="Home.php#Contact" class="navLink" >Contact</a></li>

              <?php echo $out;?>
              <button class="navbarToggler" id="navbarToggler">
                              &#9776; <!-- This is a hamburger icon -->
                          </button>
                          <div class="navbarMenu" id="navbarMenu">
                            <img src="../images/shape.png"   alt="">

  <a href="Home.php" class="navLink">Home</a>
  <a href="orderDetails.php" class="navLink " >Shopping Cart<i class="fa-solid fa-cart-shopping" ><span data-product-id="1" id="cart-count"><?=$total_items_in_cart?></span></i></a>
    <a href="products.php" class="navLink "id="productsLink" >Products<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
  </svg></a><div class="dropdownMenuToggle" id="dropdownMenuToggle">
  <a href="FoodSuppliments.php">Food Suppliments</a>
  <a href="PersonalCare.php">Personal Care</a>
  <!-- <a href="MedicalDevices.php">مستلزمات وأجهزة طبية</a> -->
  <a href="WomenSupplies.php">Woman Care</a>
  <a href="BabySupplies.php">Baby Care</a>

  </div>
  <?php
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){

    $out='<a href="profile.php" class="dropdown-item profileLink">My Profile<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/>
  </svg></a>
    <a href="../logout.php" class="dropdown-item profileLink">logout<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
    <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
  </svg></a>';
  }else {$out='<a class="profileLink" href="../login.php">login</a>';}

  echo $out;

  ?>
                          </div>
      </ul>
  </nav>
<div class="profile">
  <img src="../images/userP.png" alt="profilepicture" id="profileimg">
  <div id="PInfo">
<h2>Personal Info</h2>
</div>

<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="profileInfo">
  <!-- <label for="fname" class="label1">الاسم الكامل</label> -->
  <br>

  <input type="text" class="changeinputRead" name="fname" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>" dir="rtl" readonly>

  <!-- <label for="email" class="label2" >البريد الالكتروني</label> -->
  <br>

<input type="email" class="changeinputRead" name="email" value="<?php echo htmlspecialchars($_SESSION["email"]);  ?>" readonly dir="rtl">
<!-- <label for="password">كلمة السر</label><br>

<input type="password" name="password" value="" required> -->
<!-- <label for="phoneNum" class="label3">رقم الهاتف</label> -->
<br>

<input type="tel" class="changeinputRead" name="phoneNum" value="0<?php echo htmlspecialchars($_SESSION["phone_number"]); ?>"  dir="rtl" readonly>
<!-- <label for="location" class="label4">العنوان</label> -->
<br>

<input type="text"class="changeinputRead" name="location" value="<?php echo htmlspecialchars($_SESSION["location"]); ?>"readonly dir="rtl">
<br>
<input type="submit" name="changeUserData"class="submit-btn" id="submit-btnUser" value="save " style="display: none;">
</form>
<a href="" class="change-link">Change Info</a>

<div id="OInfo">
<h2>My Orders</h>
</div>
<div class="AllOrdedrsDiv">

<?php
$id=$_SESSION["id"];
$stmt = $conn->prepare("SELECT * FROM orders WHERE id = ? ORDER BY date_added DESC");
$stmt->bind_param("i", $id); // "i" indicates $id is an integer, adjust if $id is another type
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
    <p class="totalmargin">Total:<?= $row["totalprice"] ?> </p>
<p class="orderDate">Date:<?= $formattedDate ?> </p>
    <a href="showProducts.php?orderID='<?=$row['orderID']?>'">show order details</a>
  </div>
</div>
<?php } }else{
  echo '<div class="myOrder" id="NoOrderUser"><p>No previous Orders </p></div>';
}$stmt->close(); ?>
</div>

</div>
<!-- <div class="PreviousOrders">
  <span id="PInfo">
<h2>طلباتي</h2>
</span>
</div> -->
<script type="text/javascript">
// navbar menu toggle
$('#navbarToggler').click(function() {
    $('#navbarMenu').toggleClass('show');
});

$('#productsLink').on('click', function(event) {
event.preventDefault();

// Toggle the dropdown menu
$('.dropdownMenuToggle').slideToggle();
});

// Close the dropdown if the user clicks outside of it
$(document).on('click', function(event) {
if (!$(event.target).closest('#productsLink').length) {
  $('.dropdownMenuToggle').slideUp();
}
});

</script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
<script src="../script.js" charset="utf-8"></script>

</body>
</html>
