<?php
require_once '../config.php';
// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['send'])) {
//     $email = $_POST['email'];
//     $message = $_POST['message'];
//
//     // Check if the user exists based on email (assuming email is unique)
//     $checkUserQuery = "SELECT id FROM users WHERE email = ?";
//     $stmt = $conn->prepare($checkUserQuery);
//     $stmt->bind_param("s", $email);
//     $stmt->execute();
//     $stmt->store_result();
//
//     if ($stmt->num_rows == 0) {
//         echo "Error: User with email $email does not exist.";
//     } else {
//         // Insert message into database using prepared statement to prevent SQL injection
//         $insertMessageQuery = "INSERT INTO messages (id, message) VALUES (?, ?)";
//
//         // Retrieve the user's ID
//         $stmt->bind_result($user_id);
//         $stmt->fetch();
//         $stmt->close();
//
//         $stmt = $conn->prepare($insertMessageQuery);
//         $stmt->bind_param("is", $user_id, $message);
//
//         if ($stmt->execute()) {
//             // Redirect after successful insertion
//             header("location: messages.php");
//             exit();
//         } else {
//             echo "Error: " . $stmt->error;
//         }
//     }
//
//     $stmt->close();
// }


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=n">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../styles/style.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <!-- fontawesome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- google fonts link -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@1,300&family=Lateef:wght@200;300;400;500;600;700;800&display=swap&family=Almarai:wght@300;400;700;800&display=swap&family=El+Messiri:wght@400..700&display=swap&family=Itim&display=swap" rel="stylesheet">
<!--  -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="https://kit.fontawesome.com/a6445728fe.js" crossorigin="anonymous"></script>

 <title>Home</title>

<?php require_once 'navChange.php';
 ?>
  </head>
  <body>
    <!-- <div class="upperdiv">
    <p class="callus" >اتصل بنا</p>
    <i class='fa fa-phone phoneicon' style="font-size:24px;"></i>
    <p class="callnum">+962 780 5620 54</p>
    <i class="fa fa-facebook-square icon1" style="font-size:24px;padding-left: 200px;padding-top: 10px;color: white;"></i>
    <i class="fa fa-instagram icon2" style="font-size:24px;color:white;"></i>

    </div> -->
    <div class=" welcomeDiv">
  <div class="phimgdiv">
    <img src="../images/hello.png" alt="">
    <h1 class="">Tulip Care</h1>

  </div>
</div>
  <!-- <div class="welcomeDiv">
    <div class="phimgdiv">
      <img src="../images/hello.png" alt="">
      <h1></h1>

    </div>
  </div> -->
<!-- <div class="container-fluid care" id="Caring" >
  <h1>رعاية إضافية</h1>
  <div class="row carerow" >
<div class="care-grid-item care-grid-item1 col-sm">
  <img src="../images/24-7.png" alt="24/7 متاح" class="alwaysimg">
  <p >متاح 24/7</p>
</div>
<div class="care-grid-item care-grid-item2 talk col-sm" style="margin-top:125px;" >
  <img src="../images/pill.png" alt="استشارات دوائية" id="chatimg">
  <p id="chatMP">استشارات دوائية</p>
</div>
<div class="care-grid-item care-grid-item3 col-sm">
  <img src="../images/medical.png" alt="جهاز ضغط" class="blodp">

  <img src="../images/blood-test.png" alt="جهاز سكري" class="diab">
  <p>فحص سكر وضغط الدم مجاناً</p>
</div>
<div class="care-grid-item care-grid-item4 col-sm">

  <img src="../images/cream.png" alt="جهاز سكري" class="">
  <p>ايام مجانية لفحص البشرة</p>
</div>
</div>
</div> -->
<!--  <h1>شركات التأمين المعتمدة</h1> -->

  <!-- <img src="../images/left.png" alt="" class="insuranceArrow"  id="nextArrow"> -->
<div class="grid_container" id="Insurance" >

<div id="GI" >

  <div class="grid_item itemA ">
    <div class="item_img">
      <img src="../images/vitaminP.png" alt="">

    </div>
    <p>Food Suppliments</p>
    </div>
    <div class="grid_item itemD ">
      <div class="item_img">
        <img src="../images/cosmeticsP2.png" alt="">

      </div>
      <p>Skin Care</p>
    </div>
  <div class="grid_item itemC ">
    <div class="item_img">
      <img src="../images/hairbrush.png" alt="">

    </div>
    <p>Hair Care</p>
  </div>
  <div class="grid_item itemD ">
    <div class="item_img">
      <img src="../images/babyP.png" alt="">

    </div>
    <p>Baby Care</p>
  </div>
 <div class="grid_item itemE " >
    <div class="item_img">
      <img src="../images/meditationP2.png" alt="">

    </div>
    <p>Woman Care</p>
  </div>
</div>
</div>
 <!-- <div class="grid_item itemF ">
    <div class="item_img">
      <img src="../images/medexa.jpg" alt="">

    </div>
    <p>الشركة العربية <br/>لإدارة النفقات الصحية </p>
  </div> -->

<!--
   <div class="grid_item itemG" >
    <div class="item_img">
      <img src="../images/mednet.jpg" alt="">

    </div>
    <p>ميدنيت للتأمين</p>
  </div>
  <div class="grid_item itemH" >
 <div class="item_img ">
   <img src="../images/ajib.png" alt="">

 </div>
 <p>بنك الاستثمار العربي الاردني</p>
</div> -->
  <!-- <div class="grid_item itemI" >
       <div class="item_img">
        <img src="../images/gig.jpg" alt="">

      </div>
      <p>مجموعة الخليج للتأمين</p>
    </div> -->
  <!-- <div class="grid_item itemJ" >
    <div class="item_img">
      <img src="../images/globemed.png" alt="">

    </div>
    <p>غلوب ميد الاردن</p>
  </div> -->
<!-- </div> -->

<!-- <img src="../images/right.png" alt="" class="insuranceArrow1" id="prevArrow"> -->
<!-- </div> -->
<!-- <div class="google-map" id="Location">

  <h1>موقعنا</h1>
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5128.305505052391!2d35.71011686223886!3d31.104081936037144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x150377b0f00a8473%3A0x61f333f2539c6cb0!2z2LXZitiv2YTZitipINix2YrYp9mGINmI2YXZitix2Kc!5e0!3m2!1sen!2sjo!4v1712588951041!5m2!1sen!2sjo" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  <div class="card  ">
    <img class="card-img" src="../images/phL.png" alt="Card image">
    <div class="card-img-overlay " id="locationInWord" >
      <h5 class="card-title " > الكرك
<br>
        مؤتة شارع المؤسسة العسكرية</h5>

    </div>
  </div> -->
<!-- <div class="">
  <img src="../images/phL.png" alt="" class="">
  <pre>

  </pre>
</div> -->

<!-- </div> -->
<footer class="contact " id="Contact">
    <div class="contact-section2 contactSections">

      <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="27" fill="currentColor" class="bi bi-envelope-at-fill  Temail" viewBox="0 0 16 16">
        <path d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2zm-2 9.8V4.698l5.803 3.546zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.5 4.5 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586zM16 9.671V4.697l-5.803 3.546.338.208A4.5 4.5 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671"/>
        <path d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791"/>
      </svg>
      <p class="callnum" dir="ltr">TulipCare@gmail.com</p>

    </div>

  <div class="contact-section1 contactSections" >
    <h4>Contact us</h4>
    <svg  xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
      <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
    </svg>
    <a href="#" target="_blank"> <i class="fa fa-facebook-square " style=" color:#E6E6E6"></i></a>

  <a href="#" target="_blank"><i class="fa fa-instagram" style="color:#E6E6E6"></i></a>



  </div>

  <!-- <div class=" footerimgDiv contactSections">
    <a href="Home.php" ><img src="../images/logo3.jpg" alt="" class="footerlogoimg "></a>

  </div> -->
  </footer>
<!-- <div class="contact-section3" >
      <h4>راسلنا</h4>
  <img src="../images/message.png" alt="" class="footermessage">


  </div> -->
<!-- </button> -->







<!-- <div class="form-popup" id="myForm">
  <form action=" echo $_SERVER['PHP_SELF']; ?>" class="form-container" method="post">
    <button type="button" class="cancel" onclick="closeForm()">x</button>

    <label for="email"><b>البريد الالكتروني</b></label>
    <input type="text" placeholder="أدخل بريدك الالكتروني" name="email" required>

    <label for="psw"><b>اخبرنا استفسارك</b></label>
<textarea name="message" rows="8" cols="50" placeholder="....." ></textarea>
    <input type="submit" name="send" class="btn" value="أرسل"></input>
  </form>
</div> -->

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
<script src="../script.js" charset="utf-8"></script>

</body>

</html>
