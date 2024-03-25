<?php
// Retrieve form data
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$qualification = $_POST['qualification'];
$experience = $_POST['experience'];
$contact = $_POST['contact'];
$address = $_POST['address'];
$expertise = $_POST['expertise'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

// Database credentials
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "project"; 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql_check_email = "SELECT * FROM registrationform WHERE email = '$email'";
$result_check_email = mysqli_query($conn, $sql_check_email);

if (mysqli_num_rows($result_check_email) > 0) {
    echo "<script>alert('Email already exists. Please use a different email.'); window.location.href='register_astro.html';</script>";
} else {
    $sql = "INSERT INTO registrationform (email,firstName,lastName,qualification,experience,contact,addr, expertise,pass,confirmPassword ) VALUES ('$email', '$firstName', '$lastName', '$qualification', '$experience', '$contact', '$address', '$expertise', '$password','$confirmPassword')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Record inserted successfully Welcome $firstName'); window.location.href='about_us_page.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>