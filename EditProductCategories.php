<?php
require_once 'adminNavBar.php';
// require_once '../config.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/style.css">
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

<title>product Caregories</title>
</head>
<body >
  <!-- <div class="upperdiv">
  <p class="callus" >اتصل بنا</p>
  <i class='fa fa-phone phoneicon' style="font-size:24px;"></i>
  <p class="callnum">+962 780 5620 54</p>
  <i class="fa fa-facebook-square icon1" style="font-size:24px;padding-left: 200px;padding-top: 10px;color: white;"></i>
  <i class="fa fa-instagram icon2" style="font-size:24px;color:white;"></i>

  </div> -->




<div class="flex-container" id="AdminFlex" dir="rtl">

   <a href='FoodSuppliments.php'><div class="AdminproductCard" >
     <div class="AdminproductimgDiv">
       <img src="../images/food.png" alt="food supplements" class="Adminproductimg">

     </div>
  <div class="Adminproductdetails">
    <h4 class="FS">Food Suppliments</h4>

  </div>
  <!-- <button type="button" name="button">أضف الى السلة</button> -->

  </div></a>

  <!-- <a href='MedicalDevices.php'><div class="AdminproductCard" >
    <div class="AdminproductimgDiv">

     <img src="../images/stethoscope.png" alt="" class="Adminproductimg">
   </div>
 <div class="Adminproductdetails">
   <h4>المستلزمات الطبية</h4>

 </div> -->
 <!-- <button type="button" name="button">أضف الى السلة</button> -->

 <!-- </div></a> -->
 <a href='BabySupplies.php'><div class="AdminproductCard" >
   <div class="AdminproductimgDiv">

    <img src="../images/baby.png" alt="" class="Adminproductimg">
  </div>
<div class="Adminproductdetails">
  <h4>Baby Care</h4>

</div>
<!-- <button type="button" name="button">أضف الى السلة</button> -->

</div></a>
<a href='WomenSupplies.php'><div class="AdminproductCard" >
  <div class="AdminproductimgDiv">

   <img src="../images/meditation.png" alt="" class="Adminproductimg">
 </div>
<div class="Adminproductdetails">
 <h4>Woman Care</h4>

</div>
<!-- <button type="button" name="button">أضف الى السلة</button> -->

</div></a>
<a href='SkinCare.php'><div class="AdminproductCard" >
  <div class="AdminproductimgDiv">

   <img src="../images/cosmetics.png" alt="" class="Adminproductimg">
 </div>
<div class="Adminproductdetails">
 <h4>Skin Care</h4>

</div>
<!-- <button type="button" name="button">أضف الى السلة</button> -->

</div></a>
<a href='HairCare.php'><div class="AdminproductCard" >
  <div class="AdminproductimgDiv">

   <img src="../images/comb.png" alt="" class="Adminproductimg">
 </div>
<div class="Adminproductdetails">
 <h4>Hair Care</h4>

</div>
<!-- <button type="button" name="button">أضف الى السلة</button> -->

</div></a>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="../script.js" charset="utf-8"></script>

  </body>
</html>
