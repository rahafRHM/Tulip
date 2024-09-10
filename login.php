<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  if ($_SESSION['role'] === 'admin') {
      header("location: Admin/AdminHome.php");
  } else {
      header("location:User/Home.php");
  }
  exit;
}

// Include config file
require_once "config.php";
// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";
    } else{
        $email = trim($_POST["email"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, email,username, location, phone_number, password, role FROM users WHERE email = ?";

        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameters
            $param_email = $email;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if email exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $email,$username,$location ,$phoneNum,$hashed_password,$role);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;
                            $_SESSION["username"] = $username;
                            $_SESSION["phone_number"]=$phoneNum;
                            $_SESSION["location"]=$location;
                            $_SESSION['role']=$role;
                            if ($role === 'admin') {
                                  header("location:Admin/AdminHome.php");
                              } else {
                                  header("location:User/Home.php");
                              }
                              exit();
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid email or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid email or password.";
                }
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
    <title>Login</title>
  </head>
  <body >
    <div class="signFormContainer">
      <!-- <div class="back">
        <img src="images/arrow.png" alt="">
      </div> -->

            <div class="signupcontainer">
              <img src="images/shape2.png" alt="">

              <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="signupForm">


                <label for="email" id="first">Email</label><br>

          <input type="email" name="email" value="" <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>>
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
          <label for="password" class="loginPassword">Password</label><br>
          <input type="password" name="password" value="" <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>>
     <span class="invalid-feedback"><?php echo $password_err; ?></span>
      <input type="submit" name="" value="login">
              </form>
              <p id="plink2">Don't have account?<a href="signup.php" id="signlink2">Sign Up</a></p>

            </div>
    </div>

    <script src="script.js" charset="utf-8"></script>

  </body>
</html>
