<?php
session_start();
$Username = $_POST["username"];
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
$stmt->bind_param("s", $Username);
$stmt->execute();
$result = $stmt->get_result();

$loginQuery = "SELECT * FROM datatable WHERE E_mail_id='$Username' and pass='$PASSWORD'";
$authRes = mysqli_query($conn, $loginQuery);
$row = mysqli_fetch_array($authRes, MYSQLI_ASSOC);
$count = mysqli_num_rows($authRes);

if($count == 1) {
    echo "<script>alert('Login successfully'); window.location.href='quiz-intro.html';</script>";
   
    $select = mysqli_query($conn,"SELECT * FROM datatable WHERE E_mail_id = '$Username' AND pass = '$PASSWORD' ");
    $row = mysqli_fetch_array($select);
    if(is_array($row))
    {
       $_SESSION["Username"] = $row["E_mail_id"];
       $_SESSION["PASSWORD"] = $row["pass"];
    }
    else
    {
        echo "<script>alert('Invalid username   or password'); window.location.href='login.html';</script>";
    }
}   
    if(isset($_SESSION["Username"]))
    {
        header("Location:index.html");
    }




// if(isset($_POST["btn"]))
// {
//     $s_EMAIL = $_POST["username"];
//     $s_PASSWORD = $_POST["password"];

//     $select = mysqli_query($conn,"SELECT * FROM datatable WHERE E_mail_id = "$s_EMAIL" AND pass = "$s_PASSWORD" ");
//     $row = mysqli_fetch_array($select);
//     else
//     {
//         echo "<script>alert('Invalid username   or password'); window.location.href='login.html';</script>";
//     }
// }

// if(isset($_POST["username"]))
// {
//     header("location:index.php");
// }

$stmt->close();
$conn->close();
?>


