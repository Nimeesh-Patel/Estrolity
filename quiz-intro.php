<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Introduction - Astrology and Personality Traits</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
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
                            echo '<li class="nav-item"><a class="nav-link" href="feedback.html">Feedback</a></li>';
                            if (isset($_SESSION['r1'])) {
                                echo '<li class="nav-item"><a class="nav-link" href="zodiacResult.php">Result</a></li>';
                            }
                            echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="user_profile.php">' . htmlspecialchars($_SESSION['First_Name']) . '</a></li>';
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
    <main class="quiz-intro-container">
        <section class="quiz-header" style="padding-bottom: 0px;">
            <div class="container">
                <h1>Discover Your Cosmic Connection</h1>
                <p>Take our quiz to unlock the secrets of your personality hidden within the stars.</p>
            </div>
        </section>
        <section class="video-section" style="padding-top: 0px;">
            <div class="container">
                <video controls style="max-width: 100%; height: auto;">
                    <source src="quiz-intro-video.mp4" type="video/mp4">
                    <track label="English" kind="subtitles" scrlang="en" src="ademo.vtt" default>
                    <track label="Marathi" kind="subtitles" srclang="mr" src="ademo2.vtt" default>
                </video>
            </div>
            <div>
                <audio controls>
                    <source src="audioDemo.mp4">
                </audio>
            </div>
        </section>
        
        <section class="start-quiz">
            <div class="container">
                <a href="quiz_1.php">
                    <button class="btn">Start Quiz</button>
                </a>
            </div>
            <a href="canvas_abhinav.html">
                <button class="btn">Astrology Motivation</button>
            </a>
        </section>

        
    </main>
    
    <footer>
        <div class="container">
            <p>&copy; 2024 Astrology and Personality Traits. All rights reserved.</p>
        </div>
    </footer>
    
    <script src="js/script.js"></script>
    <script src="js/cursor.js"></script>
</body>
</html>
