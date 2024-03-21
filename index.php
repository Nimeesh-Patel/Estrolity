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
                        <li class="nav-item"><a class="nav-link" href="video-demo.php">Demo</a></li>
                        <li class="nav-item"><a class="nav-link" href="about_us_page.html">Contact</a></li>
                        <?php
                        // Check if user is logged in
                        if (isset($_SESSION['First_Name'])) {
                            // Display user's first name
                            echo '<li class="nav-item"><a class="nav-link" href="quiz-intro.php">Quiz</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="feedback.html">Feedback</a></li>';
                            if (isset($_SESSION['z1'])) {
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

    <div id="cursorDot">
        <img src="cursorSvg.svg" id="cursorSvg" style="width: 100%; height: 100%; display: none; padding: 1.5px 1.5px;">
        <img src="glassSvg.svg" id="glassSvg" style="width: 100%; height: 100%; display: none; padding: 1.5px 1.5px;">
    </div>
    <div id="cursorCircle">
    </div>

    <main class="container">
        <section id="home" class="welcome-section">
            <!-- into the cosmos -->
            <!-- end -->
            <h1 style="font-family: 'Krooner', sans-serif; font-size: 6rem; color: #fff; margin-bottom: 20px;">Welcome to Estrolity</h1>
            <p style="font-size: 1.25rem; color: #ccc; max-width: 800px; margin: 0 auto; margin-bottom: 15px; ">Your personal guide to the stars and self-discovery.</p>
            <a
                <?php
                if (isset($_SESSION['First_Name'])) {
                    echo 'href="quiz-intro.php"';
                } else {
                    echo 'href="register.php"';
                }
                ?>
                class="btn btn-primary" style="margin-top: 20px;">Explore Now</a>
        </section>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/1.png" class="d-block w-50" alt="..." style="margin-left: 280px;">
                </div>
                <div class="carousel-item">
                    <img src="img/2.png" class="d-block w-50" alt="..." style="margin-left: 280px;">
                </div>
                <div class="carousel-item">
                    <img src="img/3.png" class="d-block w-50" alt="..." style="margin-left: 280px;">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    

        <div class = "cards-wrapper">
            <div class="cards-container" id="c1">
                <h1 style="width: 100px;">Personality Insights</h1>
                <br>
                <p class="cards-content" style="margin-left: 250px; width: 450px; font-weight: bold;">
                    Uncover the depths of your character and harness your unique strengths for a fulfilling life. <br> <br> Click For More Info
                </p>
            </div>

            <div class="cards-container" id="c2">
                <h1 style="width: 100px;">Astrology Secrets</h1>
                <br>
                <p class="cards-content" style="margin-left: 250px; width: 450px; font-weight: bold;">
                    Navigate life's journey with insights drawn from the stars, unlocking the cosmic influence on your destiny. <br> <br> Click For More Info
                </p>
            </div>

            <div class="cards-container" id="c3">
                <h1 style="width: 100px;">Psychology With Spirituality</h1>
                <br>
                <p class="cards-content" style="margin-left: 250px; width: 450px; font-weight: bold;">
                    Integrating the mind's insights with the soul's depth for holistic healing and growth. <br> <br> Click For More Info
                </p>
            </div>
            
            <div class="cards-container" id="c4">
                <h1 style="width: 100px;">Ancient Wisdom With Science</h1>
                <br>
                <p class="cards-content" style="margin-left: 250px; width: 450px; font-weight: bold;">
                    Bridging millennia-old wisdom with contemporary science for well-being and enlightenment. <br> <br> Click For More Info
                </p>
            </div>

            <div class="next">
                <a href="register.html" class="btn">Compare Your Personality With Your Zodiac Sign </a>
            </div>
        </div>
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

