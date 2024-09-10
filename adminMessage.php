<?php
// Include necessary files and establish database connection
require_once '../config.php';
require_once 'adminNavBar.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sendReply'])) {
    $message_id = $_POST['message_id'];
    $admin_reply = $_POST['adminmessage'];

    // Update the message with admin reply in the database
    $stmt = $conn->prepare("UPDATE messages SET adminReply = ?, isAdminReply = 1 WHERE messageID = ?");
    $stmt->bind_param("si", $admin_reply, $message_id);

    if ($stmt->execute()) {
        $success='<p>تم ارسال الرسالة</p>';
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Retrieve messages from the database

?>

<!DOCTYPE html>
<html lang="ar" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Messages</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
<?php
$sql = "SELECT * FROM messages ORDER BY time DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
      ?>
        <div class="messages">
          <p></p>

            <p><?= htmlspecialchars($row['message']) ?></p>
            <button class="MLink" onclick="">أرسل رد</button>
        </div>

        <div  id="adminForm<?= $row['messageID'] ?>" class="adminForm">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-container" method="post">

                <button type="button" class="cancelAdmin" >x</button>
                <input type='hidden' name='message_id' value="<?= $row['messageID'] ?>">
                <textarea name="adminmessage" rows="8" cols="50" placeholder="....."></textarea>
                <input type="submit" name="sendReply" class="btn" value="أرسل">
                <!-- <?php echo $success; ?> -->
            </form>
        </div>
        <?php
    }
}
?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="../script.js" charset="utf-8"></script>
</body>
</html>
