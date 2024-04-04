
<?php
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
    $stmt = $conn->prepare("SELECT * FROM datatable WHERE E_mail_id = ?");
    $stmt->bind_param("s", $E_mail_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if email exists
    if ($result->num_rows == 1) {
        // Fetch the row data
        $row = $result->fetch_assoc();
        $stored_hash = $row["pass"];

        // Verify password against hashed password stored in the database
        if (password_verify($PASSWORD, $stored_hash)) {
            // Password is correct, set session variables
            $sql = "DELETE FROM datatable WHERE E_mail_id = '$E_mail_id'";
            if ($conn->query($sql) === TRUE) {
                
                echo "<script>alert('Record deleted successfully'); window.location.href='logout.php';</script>";
              } else {
                echo "Error deleting record: " . $conn->error;
              }
            // Redirect to the desired page
            
            exit();
        } else {
            // Password is incorrect, display alert message
            echo "<script>alert('Password is incorrect'); window.location.href='login.html';</script>";
            exit();
        }
    } else {
        // Email does not exist, display alert message
        echo "<script>alert('Email not found'); window.location.href='login.html';</script>";
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
