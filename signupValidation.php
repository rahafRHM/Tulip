<?php require_once '../config.php';

$response = ''; // Initialize an empty response string

// Validate username
if (empty(trim($_POST["username"]))) {
    $response .= '<span id="username-error" class="invalid-feedback">Please enter a username.</span>';
} elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
    $response .= '<span id="username-error" class="invalid-feedback">Username can only contain letters, numbers, and underscores.</span>';
}

// Validate email
if (empty(trim($_POST["email"]))) {
    $response .= '<span id="email-error" class="invalid-feedback">Please enter an email.</span>';
} elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
    $response .= '<span id="email-error" class="invalid-feedback">Invalid email format.</span>';
} else {
    $email = trim($_POST["email"]);
    $sql = "SELECT id FROM users WHERE email = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 1) {
                $response .= '<span id="email-error" class="invalid-feedback">This email is already taken.</span>';
            }

        }
        mysqli_stmt_close($stmt);
    }
}

// Validate password
if (empty(trim($_POST["password"]))) {
    $response .= '<span id="password-error" class="invalid-feedback">Please enter a password.</span>';
} elseif (strlen(trim($_POST["password"])) < 6) {
    $response .= '<span id="password-error" class="invalid-feedback">Password must have at least 6 characters.</span>';
}

// Validate phone number
if (empty(trim($_POST["phoneNum"]))) {
    $response .= '<span id="phoneNum-error" class="invalid-feedback">Please enter your phone number.</span>';
} elseif (!preg_match('/^07[0-9]{8}$/', trim($_POST["phoneNum"]))) {
    $response .= '<span id="phoneNum-error" class="invalid-feedback">Invalid phone number. Must start with 07 and be followed by 8 digits.</span>';
}

// Validate location
if (empty(trim($_POST["location"]))) {
    $response .= '<span id="location-error" class="invalid-feedback">Please enter your location.</span>';
}

// If no errors, handle the insertion
if (strpos($response, 'invalid-feedback') === false) {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $phoneNum = trim($_POST["phoneNum"]);
    $location = trim($_POST["location"]);

    $sql = "INSERT INTO users (username, email, password, phone_number, location) VALUES (?, ?, ?, ?, ?)";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Hash the password before storing it
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "sssss", $username, $email, $password_hashed, $phoneNum, $location);
        if (mysqli_stmt_execute($stmt)) {
                      $id = mysqli_insert_id($conn);
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $id;

            $_SESSION["username"] = $username;
            $_SESSION["email"] = $email;
            $_SESSION["phone_number"] = $phoneNum;
            $_SESSION["location"] = $location;

            $response .= '<div id="signup-success">Sign up successful.</div>';
        } else {
            $response .= '<div class="invalid-feedback">Oops! Something went wrong. Please try again later.</div>';
        }
        mysqli_stmt_close($stmt);
    }
}

echo $response;
mysqli_close($conn);
?>
