<?php
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

// Fetch feedback from the database
$sql = "SELECT choice FROM feedback"; // Assuming 'feedback' table has a column named 'choice'
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $choice = $row['choice'];
    echo "<p>Feedback choice: $choice</p>";
} else {
    echo "No feedback found.";
}

// Close connection
mysqli_close($conn);
?>
