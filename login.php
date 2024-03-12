<?php
$E_mail_id = $_POST["username"];
$PASSWORD = $_POST["password"];
$hash = password_hash($PASSWORD,PASSWORD_DEFAULT);

$servername = "localhost";
$db_username = "root";
$db_password = "";
$database = "project";

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Use prepared statement to prevent SQL injection
$stmt = $conn->prepare("SELECT * FROM datatable WHERE E_mail_id = ?");
$stmt->bind_param("s", $E_mail_id);
$stmt->execute();
$result = $stmt->get_result();

$loginQuery = "SELECT * FROM datatable WHERE E_mail_id='$E_mail_id' and pass='$PASSWORD'";
$authRes = mysqli_query($conn, $loginQuery);
$row = mysqli_fetch_array($authRes, MYSQLI_ASSOC);
$count = mysqli_num_rows($authRes);

if($count == 1) {
    echo "<script>alert('Login successfully'); window.location.href='quiz-intro.html';</script>";
} else {
    echo "<script>alert('Password Invalid'); window.location.href='login.html';</script>";
}

$stmt->close();
$conn->close();
?>


