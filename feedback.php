<?php

$email = $_POST['email'];
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format"); // Changed: Added email validation
}

// Validate choice
$choice = $_POST['choice'];
if ($choice !== "yes" && $choice !== "no") {
    die("Invalid choice"); // Changed: Added validation for choice
}

// Validate feedback
$feedback = $_POST['feedback'];
// echo "Feedback received: " . $feedback; // Debugging statement
// if (empty($feedback)) {
//     die("Feedback cannot be empty");
// }

       $hashed_feedback = password_hash($feedback, PASSWORD_DEFAULT);

       $email=$_POST["email"];
       $choice=$_POST["choice"];
       $feedback=$_POST["feedback"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "project";

        try{
        $conn = mysqli_connect($servername, $username, $password,$database);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO feedback values('$email','$choice','$hashed_feedback')";
        if(mysqli_query($conn,$sql)){
            echo "<script>alert('Feedback submitted'); window.location.href='index.php';</script>";
        }
        }
        catch(Exception $e){
            echo "Error: Database not found " . $e->getMessage() . " ";
        }
        finally {
            // Close connection
            if (isset($conn)) {
                $conn->close();
            }
        }
?>

