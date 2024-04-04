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
                <h1>Ancient Wisdom With Science</h1>
                <p style="line-height: 40px;">
                    We stand at the crossroads of time, marrying ancient wisdom with cutting-edge science to offer insights that are both profound and practical. Our approach reevaluates age-old knowledge through the lens of scientific inquiry, shedding light on how traditional beliefs and practices can support modern-day well-being. Explore with us how the teachings of the past, from meditation techniques to herbal remedies, are gaining validation from today's scientific advancements.
                </p>
            </div>
        </section>
    </main>

</body>
</html>
