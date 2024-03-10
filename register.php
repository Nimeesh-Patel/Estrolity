<?php
$E_mail_id = $_POST["username"];
$First_Name = $_POST["firstName"];
$Last_Name = $_POST["lastName"];
$Date_of_birth = $_POST["birth_date"];
$Age = $_POST["age"];
$Place_of_birth = $_POST["placeOfBirth"];
$Gender = $_POST["gender"];
$PASSWORD = $_POST["password"];

$servername = "localhost";
$username = "root";
$password = "";
$database = "project";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if email already exists
$sql_check_email = "SELECT * FROM datatable WHERE E_mail_id = '$E_mail_id'";
$result_check_email = mysqli_query($conn, $sql_check_email);

if (mysqli_num_rows($result_check_email) > 0) {
    // Email already exists, redirect back with error
    echo "<script>alert('Email already exists. Please use a different email.'); window.location.href='register.html';</script>";
} else {
    // Email does not exist, proceed with inserting record
    $sql = "INSERT INTO datatable (E_mail_id, First_Name, Last_Name, Date_of_birth, Age, Place_of_birth, Gender, PASSWORD) VALUES ('$E_mail_id', '$First_Name', '$Last_Name', '$Date_of_birth', '$Age', '$Place_of_birth', '$Gender', '$PASSWORD')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Record inserted successfully'); window.location.href='register.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
