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

<title>Eyes & Lips</title>
<?php require_once 'navChange.php';
 ?>
</head>
    <body>


      <?php
      if (isset($_GET['sectionId'])) {
        $sectionId = $_GET['sectionId'];
      $sql="SELECT * FROM shoppingCart WHERE Section=?";
      $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $sectionId); // Assuming sectionId is a string

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
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


    <?php }}} ?>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

      <script src="../script.js" charset="utf-8"></script>

    </body>
  </html>
