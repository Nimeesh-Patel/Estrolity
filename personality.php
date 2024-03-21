<?php
session_start();
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
                        <li class="nav-item"><a class="nav-link" href="video-demo.html">Demo</a></li>
                        <li class="nav-item"><a class="nav-link" href="about_us_page.html">Contact</a></li>
                        <?php
                        // Check if user is logged in
                        if (isset($_SESSION['First_Name'])) {
                            // Display user's first name
                            echo '<li class="nav-item"><a class="nav-link" href="quiz-intro.php">Quiz</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="feedback.html">Feedback</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="user_profile.php">' . htmlspecialchars($_SESSION['First_Name']) . '</a></li>';
                        } else {
                            // Show the Register link
                            echo '<li class="nav-item"><a class="nav-link" href="register.html">Register</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <canvas id="starfield"></canvas>

    <div id="cursorDot">
        <img src="cursorSvg.svg" id="cursorSvg" style="width: 100%; height: 100%; display: none; padding: 1.5px 1.5px;">
        <img src="glassSvg.svg" id="glassSvg" style="width: 100%; height: 100%; display: none; padding: 1.5px 1.5px;">
    </div>
    <div id="cursorCircle">
    </div>

    <main class="container">
        
    </main>
    
    <footer class="text-center py-4">
        <p>&copy; 2024 Astrology and Personality Traits. All rights reserved.</p>
    </footer>
    
    <script src="js/script.js"></script>
    <script src="js/cursor.js"></script>
    <script src="js/container.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/text.js"></script>
</body>
</html>