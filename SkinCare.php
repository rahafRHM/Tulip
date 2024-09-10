<?php
require_once '../config.php';
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

<title>Skin Care</title>
<?php require_once 'navChange.php';
 ?>
</head>
<body >
  <!-- <div class="upperdiv">
  <p class="callus" >اتصل بنا</p>
  <i class='fa fa-phone phoneicon' style="font-size:24px;"></i>
  <p class="callnum">+962 780 5620 54</p>
  <i class="fa fa-facebook-square icon1" style="font-size:24px;padding-left: 200px;padding-top: 10px;color: white;"></i>
  <i class="fa fa-instagram icon2" style="font-size:24px;color:white;"></i>

  </div> -->


<div class=" skinContainer">
  <div class="SCare sc" id="body">
    <p>Body Care</p>
  </div>
  <div class="SCare sc" id="face">
    <p>Face Care</p>
  </div>
  <div class="SCare sc foot" id="HFN">
    <p>Foot,Hand,Nails Care</p>
  </div>
  <div class="SCare sc sun" id="suncare">
    <p>Sunblock & Tanning products</p>
  </div>
  <div class="SCare sc" id="eyes_Lips">
    <p>Eyes & Lips</p>
  </div>
</div>
<div class="flex-container" id="skin_Container" dir="rtl" >

<?php require_once 'skinScript.php'; ?>
<?php
$sql="SELECT * FROM shoppingCart WHERE Section='face' OR Section='body' OR Section='eyes_Lips' OR Section='suncare' OR Section='HFN' ORDER BY RAND()LIMIT 8";
$stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()):
 ?> <a href='ProductDetails.php?productID="<?=$row['productID']?>"'><div class="productCard" >
   <div class="productimgDiv">

    <img src="<?= $row['img_path'] ?>" alt="" class="productimg">
  </div>
<div class="productdetails">
  <p><?= $row['title'] ?></p>
  <h4><?= $row['price'] ?> JD</h4>

</div>
<!-- <button type="button" name="button">أضف الى السلة</button> -->

</div></a>

<?php endwhile; ?>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="../script.js" charset="utf-8"></script>

  </body>
</html>