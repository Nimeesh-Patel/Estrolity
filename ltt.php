<?php
$E_mail_id = $_POST["username"];
$PASSWORD = $_POST["password"];

$servername = "localhost";
$db_username = "root";
$db_password = "";
$database = "project";

// Create connection
$conn = mysqli_connect($servername, $db_username, $db_password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the email exists
$sql_check_email = "SELECT * FROM datatable WHERE E_mail_id = '$E_mail_id'";
$result = mysqli_query($conn, $sql_check_email);

if (mysqli_num_rows($result) > 0) {
    // Email exists, check password
    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row['PASSWORD']; // Assuming the password column in your database is named 'password'
    
    if (password_verify($PASSWORD,$hashed_password)) {
        // Passwords match, redirect to quiz-intro.html
        header("Location: quiz-intro.html");
        exit();
    } else {
        // Passwords do not match, send alert
        echo "<script>alert('Incorrect password');window.location.href='login.html';</script>";
    }
} else {
    // Email does not exist, send alert
    echo "<script>alert('Email does not exist');window.location.href='login.html';</script>";
}

mysqli_close($conn);
?>