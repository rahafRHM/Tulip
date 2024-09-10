<?php
require_once 'config.php';

$username = $password =$email=$phoneNum=$location= "";
$username_err = $password_err =$email_err=$phoneNum_err=$location_err=  "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(empty(trim($_POST["username"]))){
            $username_err = "Please enter a username.";
  }elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";}

     else{
             $username = trim($_POST["username"]);
         }

////////email validation
if(empty(trim($_POST["email"]))){
     $email_err = "Please enter email.";
 }elseif(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $email_err = "Invalid email.";
} else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE email = ?";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_email = trim($_POST["email"]);

            // Execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $email_err = "This email is already taken.";
                } else {
                    $email = trim($_POST["email"]);
                }
            } else {
                $email_err = "Oops! Something went wrong. Please try again later.";
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
if(empty(trim($_POST["password"]))){
     $password_err = "Please enter a password.";
 } elseif(strlen(trim($_POST["password"])) < 6){
     $password_err = "Password must have atleast 6 characters.";
 } else{
     $password = trim($_POST["password"]);
 }
  if (empty(trim($_POST["phoneNum"]))) {
        $phoneNum_err = "Please enter your phone number.";
    } elseif (!preg_match('/^07[7,8,9][0-9]{7}$/', trim($_POST["phoneNum"]))) {
        // Check for Jordanian mobile number format
        $phoneNum_err = "Invalid phone number.";
    } else {
        $phoneNum = trim($_POST["phoneNum"]);
    }

  if(empty(trim($_POST["location"]))){
       $location_err = "Please enter your location.";
   }  else{
       $location = trim($_POST["location"]);
   }

   if(empty($username_err) && empty($password_err) && empty($phoneNum_err)&& empty($email_err)&& empty($location_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO users (username,email,password,phone_number,location) VALUES (?,?,?,?,?)";

        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssis", $param_username,$param_email, $param_password, $param_phoneNum,$param_location);

            // Set parameters
            $param_username = $username;
            $param_email=$email;
            $param_phoneNum=$phoneNum;
            $param_location=$location;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
              session_start();

              // Store data in session variables
              $_SESSION["loggedin"] = true;
              $_SESSION["id"] = $id;
              $_SESSION["email"] = $email;
              $_SESSION["username"] = $username;
              $_SESSION["phone_number"]=$phoneNum;
              $_SESSION["location"]=$location;

                // Redirect to Home page
                header("location:User/Home.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($conn);
}

 ?>

<!DOCTYPE html>
<html lang="ar" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <!-- fontawesome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- google fonts link -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@1,300&family=Lateef:wght@200;300;400;500;600;700;800&display=swap&family=Almarai:wght@300;400;700;800&display=swap&family=El+Messiri:wght@400..700&display=swap" rel="stylesheet">
<!--  -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>SignUp</title>
  </head>
  <body >

    <div class="signFormContainer">
      <!-- <div class="back">
        <img src="images/arrow.png" alt="">
      </div> -->

            <div class="signupcontainer">
              <img src="images/shape2.png" alt="">

              <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="signupForm">
                <label for="username" id="first">Full Name</label><br>

                <input type="text" name="username" value="<?php echo $username ?>" <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?> >
<span class="invalid-feedback"><?php echo $username_err; ?></span>
                <label for="email">Email</label><br>
          <input type="email" name="email" value="<?php echo $email ?>" <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?> >
          <span class="invalid-feedback"><?php echo $email_err; ?></span>

          <label for="password">Password</label><br>
          <input type="password" name="password" value="<?php echo $password?>" <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?> >
          <span class="invalid-feedback"><?php echo $password_err; ?></span>

          <label for="phoneNum">Phone Number</label><br>
          <input type="tel" name="phoneNum" value="<?php echo $phoneNum ?>" <?php echo (!empty($phoneNum_err)) ? 'is-invalid' : ''; ?>  >
          <span class="invalid-feedback"><?php echo $phoneNum_err; ?></span>

        <label for="location" class="resplocation">location-street-building NO.</label><br>
    <input type="text" name="location" value="<?php echo $location ?>"  <?php echo (!empty($location_err)) ? 'is-invalid' : ''; ?> >
    <span class="invalid-feedback"><?php echo $location_err; ?></span>

          <p id="plink">Have Account?<a href="login.php" id="signlink">login</a></p>

      <input type="submit" name="" value="Signup">
              </form>

            </div>
    </div>

    <script src="script.js" charset="utf-8"></script>

  </body>
</html>
