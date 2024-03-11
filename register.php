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

// Assuming $Date_of_birth is in 'YYYY-MM-DD' format
$birthDate = date_create_from_format('Y-m-d', $Date_of_birth);
$birthMonth = $birthDate->format('m');
$birthDay = $birthDate->format('d');

$zodiacSign = '';

if (($birthMonth == 3 && $birthDay >= 21) || ($birthMonth == 4 && $birthDay <= 19)) {
    $zodiacSign = 'Aries';
} elseif (($birthMonth == 4 && $birthDay >= 20) || ($birthMonth == 5 && $birthDay <= 20)) {
    $zodiacSign = 'Taurus';
} elseif (($birthMonth == 5 && $birthDay >= 21) || ($birthMonth == 6 && $birthDay <= 20)) {
    $zodiacSign = 'Gemini';
} elseif (($birthMonth == 6 && $birthDay >= 21) || ($birthMonth == 7 && $birthDay <= 22)) {
    $zodiacSign = 'Cancer';
} elseif (($birthMonth == 7 && $birthDay >= 23) || ($birthMonth == 8 && $birthDay <= 22)) {
    $zodiacSign = 'Leo';
} elseif (($birthMonth == 8 && $birthDay >= 23) || ($birthMonth == 9 && $birthDay <= 22)) {
    $zodiacSign = 'Virgo';
} elseif (($birthMonth == 9 && $birthDay >= 23) || ($birthMonth == 10 && $birthDay <= 22)) {
    $zodiacSign = 'Libra';
} elseif (($birthMonth == 10 && $birthDay >= 23) || ($birthMonth == 11 && $birthDay <= 21)) {
    $zodiacSign = 'Scorpio';
} elseif (($birthMonth == 11 && $birthDay >= 22) || ($birthMonth == 12 && $birthDay <= 21)) {
    $zodiacSign = 'Sagittarius';
} elseif (($birthMonth == 12 && $birthDay >= 22) || ($birthMonth == 1 && $birthDay <= 19)) {
    $zodiacSign = 'Capricorn';
} elseif (($birthMonth == 1 && $birthDay >= 20) || ($birthMonth == 2 && $birthDay <= 18)) {
    $zodiacSign = 'Aquarius';
} elseif (($birthMonth == 2 && $birthDay >= 19) || ($birthMonth == 3 && $birthDay <= 20)) {
    $zodiacSign = 'Pisces';
}

if (mysqli_num_rows($result_check_email) > 0) {
    // Email already exists, redirect back with error
    echo "<script>alert('Email already exists. Please use a different email.'); window.location.href='register.html';</script>";
} else {
    // Email does not exist, proceed with inserting record
    $sql = "INSERT INTO datatable (E_mail_id, First_Name, Last_Name, Date_of_birth, Age, Place_of_birth, Gender, PASSWORD, ZodiacSign) VALUES ('$E_mail_id', '$First_Name', '$Last_Name', '$Date_of_birth', '$Age', '$Place_of_birth', '$Gender', '$PASSWORD', $zodiacSign')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Record inserted successfully'); window.location.href='register.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
