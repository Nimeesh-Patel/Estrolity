<?php
// session_start();
// $E_mail_id = $_POST["username"];
// $PASSWORD = $_POST["password"];
// //$hash = password_hash($PASSWORD,PASSWORD_DEFAULT);

// $servername = "localhost";
// $db_username = "root";
// $db_password = "";
// $database = "project";
// try{
// // Create connection
// $conn = new mysqli($servername, $db_username, $db_password, $database);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// $stmt = $conn->prepare("SELECT * FROM datatable WHERE E_mail_id = ?");
// $stmt->bind_param("s", $E_mail_id);
// $stmt->execute();
// $result = $stmt->get_result();

// $loginQuery = "SELECT * FROM datatable WHERE E_mail_id = ? and pass = ?";
// $stmt = $conn->prepare($loginQuery);
// $stmt->bind_param("ss", $E_mail_id, $PASSWORD);
// $stmt->execute();
// $authRes = $stmt->get_result();

// $count = $authRes->num_rows;

// if ($count == 1) {
//     // Fetch the row data
//     $row = $result->fetch_assoc();
//     $stored_hash = $row["pass"];
//     if (password_verify($PASSWORD, $stored_hash)) {
//     // Access data from the row using column names
//     $First_Name = $row["First_Name"]; // Replace 'First_Name' with the actual column name
//     $Last_Name = $row["Last_Name"];
//     $Date_of_birth = $row["Date_of_birth"];
//     $Place_of_birth = $row["Place_of_birth"];
//     $Gender = $row["Gender"];
//     $zodiac_sign = $row["zodiac_sign"];
//     $pass = $row["pass"];
    
//     $_SESSION['E_mail_id'] = $E_mail_id;
//     $_SESSION['PASSWORD'] = $PASSWORD ;
//     $_SESSION['First_Name'] = $First_Name;
//     $_SESSION['Last_Name'] = $Last_Name;
//     $_SESSION['Date_of_birth'] = $Date_of_birth;
//     $_SESSION['Place_of_birth'] = $Place_of_birth;
//     $_SESSION['Gender'] = $Gender;
//     $_SESSION['zodiac_sign'] = $zodiac_sign;
//     echo "<script>alert('Login successfully  $First_Name '); window.location.href='quiz-intro.php';</script>";
// } else {
//     echo "<script>alert('Password Invalid'); window.location.href='login.html';</script>";
// }
// }
// }
// catch(Exception $e){
//     echo "Error: Database not found " . $e->getMessage() . " ";
// }
// finally {
//     // Close connection
//     if (isset($conn)) {
//         $conn->close();
//     }
// }


session_start();

$E_mail_id = $_POST["username"];
$PASSWORD = $_POST["password"];

$servername = "localhost";
$db_username = "root";
$db_password = "";
$database = "project";

try {
    // Create connection
    $conn = new mysqli($servername, $db_username, $db_password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute query to check if the email exists
    $stmt = $conn->prepare("SELECT * FROM registrationform WHERE email  = ?");
    $stmt->bind_param("s", $E_mail_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if email exists
    if ($result->num_rows == 1) {
        // Fetch the row data
        $row = $result->fetch_assoc();
        $stored_hash = $row["pass"];

        // Verify password against hashed password stored in the database
        if (password_verify($PASSWORD,$stored_hash)) {
            // Password is correct, set session variables
          

            // Redirect to the desired page
            echo "<script>alert('Login success'); window.location.href='login_astro.html';</script>";
            // header("Location: welcome.php");
            exit();
        } else {
            // Password is incorrect, display alert message
            echo "<script>alert('Password is incorrect'); window.location.href='login_astro.html';</script>";
            exit();
        }
    } else {
        // Email does not exist, display alert message
        echo "<script>alert('Email not found'); window.location.href='login_astro.html';</script>";
        exit();
    }
} catch (Exception $e) {
    // Handle any exceptions (e.g., database connection error)
    echo "Error: " . $e->getMessage();
} finally {
    // Close connection
    if (isset($conn)) {
        $conn->close();
    }
}
?>


