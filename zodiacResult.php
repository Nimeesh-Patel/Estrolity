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
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img src="logo1ed.png" alt="Astrology Logo" height="50">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="video-demo.html">Demo</a></li>
                        <li class="nav-item"><a class="nav-link" href="quiz-intro.html">Quiz</a></li>
                        <li class="nav-item"><a class="nav-link" href="feedback.html">Feedback</a></li>
                        <li class="nav-item"><a class="nav-link" href="about_us_page.html">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="register.html">Register</a></li>
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
            <h1>Your Zodiac Sign Is:</h1>
            
            <canvas id="canvas1"></canvas>
            
        </section>

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