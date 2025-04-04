<?php
session_start();
// $email = $_SESSION['email'];
// // Database connection parameters
// $servername = "localhost"; // Change this if your database is hosted elsewhere
// $username = "root";
// $password = "";
// $database = "project";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $database);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Query to fetch data from the database
// $stmt = $conn->prepare("SELECT * FROM registrationform WHERE email = ?");
// $stmt->bind_param("s", $email);
// $stmt->execute();
// $result = $stmt->get_result();
//  // Check if there are rows returned from the query
//  if ($result->num_rows == 1) {
//     // Output data of each row
//         $row = $result->fetch_assoc();
//         echo "<p>Email: " . $row["email"]. "<br>";
//         echo "First Name: " . $row["firstName"]. "<br>";
//         echo "Last Name: " . $row["lastName"]. "<br>";
//         echo "Qualification: " . $row["qualification"]. "<br>";
//         echo "Experience: " . $row["experience"]. "<br>";
//         echo "Contact: " . $row["contact"]. "<br>";
//         echo "Address: " . $row["addr"]. "<br>";
//         echo "Expertise: " . $row["expertise"]. "</p>";
    
// } else {
//     echo "0 results"; // Output if no rows are returned
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #4b3f72;
            color: #fff;
            padding: 0;
            margin: 0;
        }

        header {
            background-color: #333;
            padding: 20px 0;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 0 20px;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            position: bottom;
            bottom: 0;
            width: 100%;
        }

        .explore-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4b3f72;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .explore-btn:hover {
            background-color: #3a2d56;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Welcome, <?php echo $_SESSION['a_firstName'];?>!</h1>
        <?php
// session_start();
$email = $_SESSION['email'];
// Database connection parameters
$servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "root";
$password = "";
$database = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch data from the database
$stmt = $conn->prepare("SELECT * FROM registrationform WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
 // Check if there are rows returned from the query
 if ($result->num_rows == 1) {
    // Output data of each row
        $row = $result->fetch_assoc();
        echo "<p>Email: " . $row["email"]. "<br>";
        echo "First Name: " . $row["firstName"]. "<br>";
        echo "Last Name: " . $row["lastName"]. "<br>";
        echo "Qualification: " . $row["qualification"]. "<br>";
        echo "Experience: " . $row["experience"]. "<br>";
        echo "Contact: " . $row["contact"]. "<br>";
        echo "Address: " . $row["addr"]. "<br>";
        echo "Expertise: " . $row["expertise"]. "</p>";
    
} else {
    echo "0 results"; // Output if no rows are returned
}

?>
        <p>Thank you for registering as an astrologer. We're thrilled to welcome you to our team of skilled professionals. At our astrology center, we strive to provide our clients with personalized and accurate readings to guide them on their life's journey.</p>
        <p>As a valued member of our team, you'll have access to cutting-edge tools and resources to enhance your practice and offer the best possible service to our clients.</p>
        <p>If you ever have any questions, need support, or want to share your insights with fellow astrologers, our dedicated team is here to assist you every step of the way.</p>
        <p>Feel free to explore our website to learn more about our services, upcoming events, and the latest updates in the field of astrology.</p>
        <p>We're excited to embark on this journey together and look forward to making a positive impact in the lives of our clients.</p>
        <p>If you have any questions or inquiries, please don't hesitate to contact us:</p>
        <p>Contact: astrologer@example.com<br>Phone: +1234567890</p>
        <!-- Additional content here -->
    </div>

    <footer>
        <div style="text-align: center;">
            <a href="index.php" class="explore-btn">Explore</a>
        </div>
    </footer>
</body>
</html>