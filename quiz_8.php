<?php
session_start(); // Ensure session start at the beginning of the script

// Assuming the form data is sent as 'socialInteraction8'
if (isset($_POST['socialInteraction8'])) {
    // Store the last quiz answer in session variable
    $_SESSION['socialInteraction8'] = $_POST['socialInteraction8'];
    
    // Define database connection parameters
    $servername = "localhost";
    $username = "root"; // Adjust as per your database username
    $password = ""; // Adjust as per your database password
    $dbname = "project"; // Database name where you want to store quiz results

    // Create database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check database connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare INSERT query to save quiz results
    $stmt = $conn->prepare("INSERT INTO quiz_info (question1, question2, question3, question4, question5, question6, question7, question8) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters from session variables
    $stmt->bind_param("iiiiiiii", 
        $_SESSION['socialInteraction1'], 
        $_SESSION['socialInteraction2'], 
        $_SESSION['socialInteraction3'], 
        $_SESSION['socialInteraction4'], 
        $_SESSION['socialInteraction5'], 
        $_SESSION['socialInteraction6'], 
        $_SESSION['socialInteraction7'], 
        $_SESSION['socialInteraction8']
    );

    // Execute the prepared statement
    if ($stmt->execute()) {
        // Redirect to results page or show a message
        
        header("Location: zodiacResult.php"); // Adjust as per your results page
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();

    // Optionally, clear session variables after storing data
    session_unset();
    session_destroy();
}
?>