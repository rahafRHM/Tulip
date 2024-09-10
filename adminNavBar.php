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
</head>

<body>

  <nav class="navbar">
      <img src="../images/shape.png" alt="logoimg" class="imgbrand"/>


      <ul class="navlist" >
          <li class="navListItem "><a href="AddProducts.php" class="navLink " >Add Products</a></li>
          <li class="navListItem  "><a href="EditProductCategories.php" class="navLink " >Edit Products</a></li>
          <li class="navListItem  " id="showOrderNotifi">    <i class="fa-solid fa-bell" style="color: #424242;"><a href="" class="navLink" ><span data-product-id="1" class="orderNotification"> </span></a></i>  <div id="oDetails">

             </div></li>

    <!-- <li class="navListItem "><a href="adminMessage.php" class="navLink" ><i class="fa-solid fa-message" style="color: #424242;"><span data-product-id="1" id="message-count"></span></i></a></li> -->
    <li class="navListItem LastList" id="outadminProfile">▾<i class="fa-solid fa-id-badge" style="color: #424242;"></i>

            <div class="dropdownMenuadminProfile">
            <a href="AdminHome.php">Admin Profile</a>
            <a href="../logout.php">logout</a>
    </div>
          </li>
          <button class="navbarToggler" id="navbarToggler">
                          &#9776; <!-- This is a hamburger icon -->
                      </button>
                      <div class="navbarMenu" id="navbarMenu">
                        <img src="../images/shape.png"   alt="">
                        <a href="AddProducts.php" class="navLink " >Add Products</a>
                        <a href="EditProductCategories.php" class="navLink " >Edit Products</a>
                      <a href="showOrders.php" class="navLink">UserOrders  <i class="fa-solid fa-bell" style="color: #424242;"><span data-product-id="1" class="orderNotification"> </span></i>  </a>


                                   <a class="profileAdminToggle" href="AdminHome.php">Admin Profile <i class="fa-solid fa-id-badge" style="color: #424242;"></i></a>
                                   <a class="profileAdminToggle" href="../logout.php">logout</a>

</div>
      </ul>
  </nav>
<script type="text/javascript">
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

  <script src="../script.js" charset="utf-8"></script>
</body>
</html>
