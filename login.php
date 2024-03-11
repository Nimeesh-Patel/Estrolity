<?php
$E_mail_id = $_POST["username"];
$PASSWORD = $_POST["password"];

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

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hashed_password = $row['PASSWORD']; // Adjust the column name if different
    
    if (password_verify($PASSWORD, $hashed_password)) {
        header("Location: quiz-intro.html");
        exit();
    } else {
        echo "<script>alert('Incorrect password');window.location.href='login.html';</script>";
    }
} else {
    echo "<script>alert('Email does not exist');window.location.href='login.html';</script>";
}

$stmt->close();
$conn->close();
?>
