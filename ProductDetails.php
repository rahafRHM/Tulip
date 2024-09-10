<?php
  // Include navigation file
session_start();
 require_once '../config.php';
// Initialize variables


 // Include database configuration file

// Check if productID is provided via GET request
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['productID']) && !empty($_GET['productID'])) {
    $item_id = $_GET['productID'];

    // Fetch item details from database
    $sql = "SELECT * FROM shoppingcart WHERE productID = $item_id";
    $result = $conn->query($sql);

    // Check if item exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $available_quantity = $row['quantity']; // Quantity available in database
        $response['dbQuantity'] = $available_quantity;
            } else {
                $response['error'] = 'Product not found';
            }
        // Check if session quantity exceeds available quantity



    $result->close();
}

// Handle form submission for adding to cart
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    $item_id = intval($_POST['item_id']);
    $quantity =intval( $_POST['quantity']);

    // Fetch item details from database
    $sql = "SELECT * FROM shoppingcart WHERE productID = $item_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $available_quantity = $row['quantity']; // Quantity available in database

        // Initialize session cart if not already set
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();

        }

        // Check if item already exists in cart
        if (array_key_exists($item_id, $_SESSION['cart'])) {
            // Update quantity if item is already in cart
            $_SESSION['cart'][$item_id]['quantity'] += $quantity;

        } else {
            // Add new item to cart
            $_SESSION['cart'][$item_id] = array(
                'title' => $row['title'],
                'price' => $row['price'],
                'img_path' => $row['img_path'],
                'quantity' => $quantity
            );
        }
        if ($_SESSION['cart'][$item_id]['quantity'] > $available_quantity) {
      $_SESSION['cart'][$item_id]['quantity'] = $available_quantity;
      $session_quantity=$_SESSION['cart'][$item_id]['quantity'] ;

     // Show message if the quantity is adjusted
  }
        // Check if session quantity matches available quantity to show text input

    } else {

      echo 'product not found';
    }

      $result->close();
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
<script src="https://kit.fontawesome.com/a6445728fe.js" crossorigin="anonymous"></script>

<title>product details</title>
<?php $total_items_in_cart = 0;
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
</head>
<body>

  <div class="productD">
       <img src="<?= $row['img_path'] ?>" >
       <div class="NameAndPrice">
           <h1><?= $row['title'] ?></h1>
           <h4><?= $row['price'] ?>
             <?php if ($row['rrp'] > 0): ?>
             <span class="rrp"><?=$row['rrp']?></span>
             <?php endif; ?>
           </h4>

       </div>
       <form class="addToCart" action="<?php  htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
           <input type="number" name="quantity" id="quantity" value="1" min="1" max="<?= $row['quantity'] ?>">
           <input type="hidden" id="item_id" name="item_id" value="<?= $row['productID']; ?>">
           <input type="submit" name="add_to_cart" value="add to cart" id="addToCartBtn">
           <input type="hidden" name="session_Q" id="session_Q" value="<?=htmlspecialchars( $item['quantity']); ?>" >


                </form>
       <img src="../images/order.png" alt="" id="addedToCartAnimation">
   </div>
   <div class="Description">
       <div class="DescriptionContent" dir="ltr">
           <ul>
               <li><?= $row['description'] ?></li>
           </ul>
       </div>
   </div>

   <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
   <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
   <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
   <script src="../script.js" charset="utf-8"></script>
   <script type="text/javascript">
   $(document).ready(function() {
       var $sessionQ = $('#session_Q');
       var $addToCartBtn = $('#addToCartBtn');
       var productId = $('#item_id').val(); // Get product ID from the form
   var $quantityInput = $('#quantity');
       function updateButtonState() {
           $.ajax({
               url: 'check_quantity.php',
               type: 'POST',
               data: {
                   item_id: productId
               },
               cache: false,
               success: function(response) {
                   if (response.trim() === 'match') {
                       $addToCartBtn.val("out of stock");
                       $addToCartBtn.prop('disabled', true);
                       $addToCartBtn.addClass('disabled');

                   } else {
                       $addToCartBtn.val("add to cart");
                       $addToCartBtn.prop('disabled', false);
                       $addToCartBtn.removeClass('disabled');
                   }
               }
           });
       }

       // Check button state initially and on quantity change
       updateButtonState();
       var debounceTimeout;
   $quantityInput.on('input change', function() {
       clearTimeout(debounceTimeout);
       debounceTimeout = setTimeout(function() {
           updateButtonState();
       }, 300); // Adjust debounce delay as needed
   });

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

        });



   </script>

  </body>
  </html>
