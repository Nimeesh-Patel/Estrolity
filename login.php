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

if ($result->num_rows > 0) {
    // Fetch the row
    $row = $result->fetch_assoc();
    // Check if the password matches
    $compare=$row['PASSWORD'];
    if (password_verify($PASSWORD, $compare)) {
        // Password matches, login successful
        echo "<h1><center>Login Successful</center></h1>";
    } else {
        // Password does not match, login failed
        echo "<h1><center>Login Failed</center></h1>";
    }
    
} else {
    echo "<h1> Invalid Credentials</h1>";
}

// if ($result->num_rows > 0) {
//     // Fetch the row
//     $row = $result->fetch_assoc();
//     // Check if the password matches
//     $compare=$row['PASSWORD'];
//     if (password_verify($PASSWORD, $compare)) {
//         // Password matches, login successful
//         echo "<h1><center>Login Successful</center></h1>";
//     } else {
//         // Password does not match, login failed
//         echo "<h1><center>Login Failed</center></h1>";
//     }
    
// } else {
//     // Email does not exist
//     echo "<h1><center>Email does not exist</center></h1>";
// }

$stmt->close();
$conn->close();
?>


