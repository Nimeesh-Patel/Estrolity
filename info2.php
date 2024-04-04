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

if ($stmt = $conn->prepare("SELECT * FROM user_personality WHERE E_mail_id = ?")) {
    $stmt->bind_param("s", $_SESSION['E_mail_id']);

    $stmt->execute();

    $stmt->bind_result($f, $r1, $r2, $r3, $r4);

    if ($stmt->fetch()) {
        $_SESSION['r1'] = $r1;
        $_SESSION['r2'] = $r2;
        $_SESSION['r3'] = $r3;
        $_SESSION['r4'] = $r4;
    }

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
    <title>Quiz Introduction - Astrology and Personality Traits</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
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
                            // is result calculated
                            if (isset($_SESSION['z1'])) {
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
    <div id="cursorDot"></div>
    <div id="cursorCircle"></div>
    <script src="js/script.js"></script>
    <script src="js/cursor.js"></script>

    <main class="container">
        <section class="intro-text" style="padding: 0px;">
            <div class="container">
                <h1>Astrology Secrets</h1>
                <p style="line-height: 40px;">
                    Unlock the mysteries of the cosmos with our comprehensive astrology resources. Our site bridges the celestial with the personal, offering you a unique glimpse into how planetary movements and alignments can influence your life journey. From detailed birth chart analyses to future forecasts, we provide the keys to understanding the astrological secrets that govern your fate, relationships, and potential.
                </p>
            </div>
        </section>
    </main>

</body>
</html>
