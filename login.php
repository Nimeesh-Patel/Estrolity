<?php
session_start();
$E_mail_id = $_POST["username"];
$PASSWORD = $_POST["password"];
// $hash = password_hash($PASSWORD,PASSWORD_DEFAULT);


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
// $stmt = $conn->prepare("SELECT * FROM datatable WHERE E_mail_id = ?");
// $stmt->bind_param("s", $E_mail_id);
// $stmt->execute();
// $result = $stmt->get_result();

// $loginQuery = "SELECT * FROM datatable WHERE E_mail_id='$E_mail_id' and pass='$PASSWORD'";
// $authRes = mysqli_query($conn, $loginQuery);
// $row = mysqli_fetch_array($authRes, MYSQLI_ASSOC);
// $count = mysqli_num_rows($authRes);

// if($count == 1) {
//     $sql = "SELECT * FROM datatable WHERE E_mail_id = $E_mail_id";
//     $result = $conn->query($sql);
//     if ($result->num_rows > 0) 
//     {
//         // Fetch the row data
//         $row = $result->fetch_assoc();
//         // Access data from the row using column names
//         $First_Name = $row["First_Name"]; // Replace 'column1' with the name of your column
//         $Last_Name = $row["Last_Name"];
//         $Date_of_birth = $row["Date_of_birth"];
//         $Place_of_birth = $row["Place_of_birth"];
//         $Gender = $row["Gender"];
//         $zodiac_sign = $row["zodiac_sign"];
//         $pass = $row["pass"];// Replace 'column2' with the name of another column
        
//     }

//     echo "<script>alert('Login successfully . $First_Name .'); window.location.href='quiz-intro.html';</script>";
// } else {
//     echo "<script>alert('Password Invalid'); window.location.href='login.html';</script>";
// }


$stmt = $conn->prepare("SELECT * FROM datatable WHERE E_mail_id = ?");
$stmt->bind_param("s", $E_mail_id);
$stmt->execute();
$result = $stmt->get_result();

$loginQuery = "SELECT * FROM datatable WHERE E_mail_id = ? and pass = ?";
$stmt = $conn->prepare($loginQuery);
$stmt->bind_param("ss", $E_mail_id, $PASSWORD);
$stmt->execute();
$authRes = $stmt->get_result();

$count = $authRes->num_rows;

if ($count == 1) {
    // Fetch the row data
    $row = $result->fetch_assoc();
    // Access data from the row using column names
    $First_Name = $row["First_Name"]; // Replace 'First_Name' with the actual column name
    $Last_Name = $row["Last_Name"];
    $Date_of_birth = $row["Date_of_birth"];
    $Place_of_birth = $row["Place_of_birth"];
    $Gender = $row["Gender"];
    $zodiac_sign = $row["zodiac_sign"];
    $pass = $row["pass"];
    
    $_SESSION['E_mail_id'] = $E_mail_id;
    $_SESSION['PASSWORD'] = $PASSWORD ;
    $_SESSION['First_Name'] = $First_Name;
    $_SESSION['Last_Name'] = $Last_Name;
    $_SESSION['Date_of_birth'] = $Date_of_birth;
    $_SESSION['Place_of_birth'] = $Place_of_birth;
    $_SESSION['Gender'] = $Gender;
    $_SESSION['zodiac_sign'] = $zodiac_sign;
    echo "<script>alert('Login successfully  $First_Name '); window.location.href='quiz-intro.php';</script>";
} else {
    echo "<script>alert('Password Invalid'); window.location.href='login.html';</script>";
}
$stmt->close();
$conn->close();
?>