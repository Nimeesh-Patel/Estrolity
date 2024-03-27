<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Demonstration - Astrology and Personality Traits</title>
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
                        <li class="nav-item"><a class="nav-link" href="about_us_page.html">Contact</a></li>
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

    <main class="video-demo-container">
        <section class="intro-text" style="padding: 0px;">
            <div class="container">
                <h1>Platform Demonstration</h1>
                <p>Get to know how our platform works and discover the features that make us unique.</p>
            </div>
        </section>
        
        <section class="video-section">
            <div class="video-frame">
                <video controls style="width: 100%; height: auto;">
                    <source src="videoDemo.mp4" type="video/mp4">
                    <track label="English" kind="subtitles" srclang="en" src="ademo.vtt" default>
                </video>
            </div>            
            <div>
                <audio controls style="margin-top: 10px;">
                    <source src="audioDemo.mp4">
                </audio>
            </div>
        </section>
        
        <section class="cta-section">
            <div class="container">
                <a href="register.html" class="btn btn-primary">Start Your Journery</a>
            </div>
        </section>
        
        <!-- Additional Resources -->
        <section class="additional-resources">
            <div class="container">
                <!-- Links to further reading or related articles -->
            </div>
        </section>
    </main>
    
    <footer>
        <div class="container">
            <p>&copy; 2024 Astrology and Personality Traits. All rights reserved.</p>
            <!-- Placeholder for additional footer content -->
        </div>
    </footer>
    
    <script src="js/script.js"></script>
    <script src="js/cursor.js"></script>
</body>
</html>
