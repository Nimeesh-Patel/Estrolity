<?php
session_start();

if(isset($_POST['socialInteraction8'])) {
    $_SESSION['socialInteraction8'] = $_POST['socialInteraction8'];
    
    // Now you have all answers stored in session, proceed to insert into the database
    $servername = "localhost";
    $username = "root"; // Your DB username
    $password = ""; // Your DB password
    $dbname = "project";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the INSERT statement
    $stmt = $conn->prepare("INSERT INTO quiz_info (question1, question2, question3, question4, question5, question6, question7, question8) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters from session
    $stmt->bind_param("iiiiiiii", $_SESSION['socialInteraction1'], $_SESSION['socialInteraction2'], $_SESSION['socialInteraction3'], $_SESSION['socialInteraction4'], $_SESSION['socialInteraction5'], $_SESSION['socialInteraction6'], $_SESSION['socialInteraction7'], $_SESSION['socialInteraction8']);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
        // Consider clearing the session data related to the quiz after successful submission
        session_unset(); 
        session_destroy();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
