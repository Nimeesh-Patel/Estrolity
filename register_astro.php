<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    
    // Database connection
    $servername = "localhost";
    $username = "MySQL80"; // Replace with your MySQL username
    $password = "bhavya26122011"; // Replace with your MySQL password
    $dbname = "astrologers"; // Replace with your database name
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO astrologers (name, dob, address, contact) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $dob, $address, $contact);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
