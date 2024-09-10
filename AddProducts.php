<?php
require_once 'adminNavBar.php';
require_once '../config.php';
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['AddProduct'])){
  $title=$_POST['title'];
  $description=$_POST['description'];
  $quantity=$_POST['quantity'];
  $price=$_POST['price'];
  $discount=$_POST['discount'];

$section=$_POST['SectionS'];

$targetDir = "../uploadImages/";
  $targetFile = $targetDir . basename($_FILES["imgToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

  // Check if image file is a actual image or fake image
  $check = getimagesize($_FILES["imgToUpload"]["tmp_name"]);
  if($check !== false) {
      // echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
  } else {
      echo "File is not an image.";
      $uploadOk = 0;
  }

  // Check if file already exists
  if (file_exists($targetFile)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["imgToUpload"]["size"] > 1000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
  }
      // if everything is ok, try to upload file
      if (move_uploaded_file($_FILES["imgToUpload"]["tmp_name"], $targetFile)) {

          // Insert file path into database
          $filename = basename($_FILES["imgToUpload"]["name"]);
          $filepath = $targetFile;
  $sql = "INSERT INTO shoppingcart (title, description, quantity, price, rrp, img_path,img_name,Section) VALUES (?, ?, ?, ?, ?, ?,?,?)";
   $stmt = mysqli_prepare($conn, $sql);
   mysqli_stmt_bind_param($stmt, "ssssssss", $title, $description, $quantity, $price, $discount, $filepath,$filename,$section);
  if (mysqli_stmt_execute($stmt)) {
    echo '<div class="addedS" id="confirmed">
      <img src="../images/check-mark.png" alt="">
      <p>product added successfully</p>
    </div>';
      echo '<meta http-equiv="refresh" content="3;URL='.$_SERVER['PHP_SELF'].'">';
    mysqli_stmt_close($stmt); // Close statement
          mysqli_close($conn); // Close connection
          exit();

} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}}}
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
<title>Add Product</title>
</head>

<body>


<form class="productAddForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <div class="productAddDiv">
  <label for="title" class="title">Product Name</label>

  <input type="text" name="title" value="">
</div>

  <div class="productAddDiv">

  <label for="SectionS" class="title">Category</label>

    <select class="sectionSel" name="SectionS" >
      <option value="FoodSupplements">Food Supplements</option>
      <option value="BSD" name="">Diapers & body care</option>
      <option value="BSF">Food & Milk</option>
      <option value="BST">Toys & Tools</option>
      <option value="hairS">Shampoo</option>
      <option value="hairB">Hair Brushes</option>
      <option value="hairC">Hair Oils & Treatments</option>
      <option value="hairT">Hair Coloring</option>
      <!-- <option value="MD">المستلزمات والاجهزة الطبية</option> -->
      <option value="body">Body Care</option>
      <option value="face">Face Care</option>
      <option value="HFN">Hand,Foot,Nails</option>
      <option value="suncare">sunblock & tanning products</option>
      <option value="eyes_Lips">Eyes & Lips</option>
      <option value="WS">Woman Care</option>

    </select>
</div>
<div class="productAddDiv">

<label for="description" class="dP">Description </label>

  <input type="text" name="description" value="">
</div>

<div class="productAddDiv">

<label for="quantity" class="QPD">Quantity</label>

  <input type="text" name="quantity" value="">
</div>

<div class="productAddDiv">

<label for="price" class="QPD">Price</label>

  <input type="text" name="price" value="">
</div>

  <div class="productAddDiv">

  <label for="discount" class="QPD">price after disccount</label>

 <input type="text" name="discount" value="0.0" >
</div>

<div class="productAddDiv">

<label for="imgToUpload" class="dP">product Image</label>

  <input type="file" name="imgToUpload" value="">
</div>
  <br>
  <input type="submit" name="AddProduct" value="Add Product">
<!-- </div> -->

</form>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="../script.js" charset="utf-8"></script>
</body>
</html>
