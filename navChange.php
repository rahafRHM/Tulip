<?php
session_start();
$total_items_in_cart = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $total_items_in_cart += $item['quantity'];
    }}
// Output the cart count

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
?>
<body>
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

<link rel="stylesheet" href="../styles/style.css">
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
<a href="orderDetails.php" class="navLink " >Shopping Cart<i class="fa-solid fa-cart-shopping" ><span data-product-id="1" id="cart-countToggle"><?=$total_items_in_cart?></span></i></a>
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
<!-- <nav class="navbar navbar-expand-lg navbar-light NavBARO" style="background-color:#FFFFFF;" dir="rtl">
  <a class="navbar-brand  " href="#">
  <img src="../images/logo3.jpg"  width="330" height="135" alt="">
</a>
  <button  class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" >
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown" >
    <ul class="navbar-nav  navlist">
      <li class="nav-item navListItem active">
        <a href="Home.php" class="navLink2 nav-link">الرئيسية</a>
      </li>


      <li class="navListItem nav-item d-none d-lg-block "><a href="Home.php#Caring" class="nav-link navLink2" >رعاية  إضافية</a></li>
        <li class="navListItem nav-item d-none d-lg-block"><a href="Home.php#Insurance" class="nav-link navLink2" >شركات التأمين</a></li>
          <li class="navListItem nav-item d-none d-lg-block"><a href="Home.php#Location" class="nav-link navLink2" >موقعنا</a></li>
          <li class="navListItem nav-item d-none d-lg-block"><a href="Home.php#Contact" class="nav-link navLink2" >تواصل معنا</a></li>
      <li class="nav-item dropdown navListItem dropdownList">
        <a class="nav-link navLink2 " href="products.php" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
المنتجات        </a>
        <div class="dropdownMenu dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a href="FoodSuppliments.php" class="dropdown-item">المكملات الغذائية</a>
        <a href="PersonalCare.php" class="dropdown-item">العناية الشخصية</a>
        <a href="MedicalDevices.php" class="dropdown-item">مستلزمات وأجهزة طبية</a>
        <a href="WomenSupplies.php" class="dropdown-item">مستلزمات المرأة</a>
        <a href="BabySupplies.php" class="dropdown-item">مستلزمات الطفل</a>

        </div>
      </li>


    </ul>

  </div>

</nav> -->
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
<script src="../script.js" charset="utf-8"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
</body>
