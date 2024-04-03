<?php
session_start();

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "project"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepared statement to prevent SQL Injection
if ($stmt = $conn->prepare("SELECT * FROM zodiac_attributes WHERE ZodiacSign = ?")) {
    // Bind the session variable to the parameter as a string
    $stmt->bind_param("s", $_SESSION['zodiac_sign']);

    // Execute the query
    $stmt->execute();

    // Bind result variables
    $stmt->bind_result($e, $z1, $z2, $z3, $z4);

    // Fetch values
    if ($stmt->fetch()) {
        $_SESSION['z1'] = $z1;
        $_SESSION['z2'] = $z2;
        $_SESSION['z3'] = $z3;
        $_SESSION['z4'] = $z4;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estrolity</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pixi.js/5.3.3/pixi.min.js"></script>
    <script src="https://pixijs.download/release/pixi.min.js"></script>

    <style>
        * {
            cursor: default !important;
        }
        .btn {
            background-color: #4b3f72;
            color: #fff;
            padding: 12px 17px;
            border: none;
            border-radius: 1em;
            cursor: pointer;
            font-size: 1.2em;
            transition: background-color 0.3s, transform 0.3s;
        }
        .btn:hover {
            background-color: #3a2d56;
            transform: translateY(-2px);
        }
        .welcome-section{
            padding-top: 200px;
            padding-bottom: 300px;
        }
    </style>
</head>
<body>
<header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="logo1ed.png" alt="Astrology Logo" height="50">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="video-demo.php">Demo</a></li>
                        <li class="nav-item"><a class="nav-link" href="about_us_page.php">Contact</a></li>
                        <?php
                        // Check if user is logged in
                        if (isset($_SESSION['First_Name'])) {
                            // Display user's first name
                            echo '<li class="nav-item"><a class="nav-link" href="quiz-intro.php">Quiz</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="feedback.php">Feedback</a></li>';
                            if (isset($_SESSION['r1'])) {
                                echo '<li class="nav-item"><a class="nav-link" href="zodiacResult.php">Result</a></li>';
                            }
                            echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="user_info.php">' . htmlspecialchars($_SESSION['First_Name']) . '</a></li>';
                        } else {
                            // Show the Register link
                            echo '<li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <canvas id="starfield"></canvas>
    
    

    <main class="container">
        <section id="home" class="welcome-section" style="padding-top: 20px;">
            <!-- into the cosmos -->
            <!-- <input type="text" id="textInput" placeholder="Type something..." value='Zodiac'> -->
            <h1 style="margin-bottom: 300px; margin-top: 50px;">Your Zodiac Sign Is:</h1>
            <div id="sessionVariable" style="display: none;"><?php echo $_SESSION['zodiac_sign']; ?></div>
            
            <canvas id="canvas1" style="margin-top: 50px;"></canvas>
            <a href="zodiacPersonality.php" class="btn btn-primary">View Personality</a>
        </section>
    </main>


        <!-- <footer class="text-center py-4">
            <p>&copy; 2024 Astrology and Personality Traits. All rights reserved.</p>
        </footer> -->
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="js/text.js"></script>
        <script src="js/script.js"></script>
    </body>
    </html>