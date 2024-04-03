<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Astrology and Personality Traits</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        iframe {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
            z-index: -1; 
        }
    </style>
</head>
<body>
    <iframe src="canvas.html"></iframe>
    <div id="cursorDot"></div>
    <div id="cursorCircle"></div>

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
                        <li class="nav-item"><a class="nav-link" href="feedback.php">Feedback</a></li>
                        <li class="nav-item"><a class="nav-link" href="about_us_page.php">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="login-container">
        <section class="login-section">
            <div class="container">
                <h1>Feedback</h1>
                <div class="error">
  </div>
                <form id="Form" action="feedbackPHP.php" method="POST" onsubmit="return validateForm()">
                    <div style="text-align: center;align-items: centre;" class="form-group">
                        <label for="username">Email:</label>
                        <input style="width: 700px;" type="text" id="email" name="email"  onblur="validateEmail()">
                        <div id="emailError" class="text-danger"></div>
                    </div>
                    <div style="text-align: center;align-items: centre;" class="form-group">
                        <label for="username">Rate us out of 5:</label>
                        <input style="width: 700px;" type="number" id="rating" name="rate"  onblur="validateRating()">
                        <div id="ratingError" class="text-danger"></div>
                    </div>
                    
                    <div style="text-align: center;align-items: centre;" class="form-group">
                        <label for="text">Feedback:</label>
                        <textarea style="width: 700px;height: 170px;" type="text" id="feedback" name="feedback" contenteditable="true" onblur="validateFeedback()">
                        </textarea>
                        <div id="feedbackError" class="text-danger"></div>
                    </div>
                    <div style="text-align: center;align-items: centre;" class="form-group">
                        <label for="text">Any Suggestion for improvement ?</label>
                        <textarea style="width: 700px;height: 170px;" type="text" id="improve" name="improve" contenteditable="true" onblur="validateImprove()">
                        </textarea>
                        <div id="improveError" class="text-danger"></div>
                        <div style="text-align: center;align-items: centre;" class="form-group">
                            <label for="username">Contact Number :</label>
                            <input style="width: 700px;" type="number" id="contact" name="contact" onblur="validateContact()">
                            <div id="contactError" class="text-danger"></div>
                        </div>
                    <div style="text-align: center;align-items: center;">
                    <button class="btn" type="submit" value="submit" >Submit</button>
                    <div class="assist-links">
                        <a href="index.php">Back to Home</a> |
                    </div> 
                </div> 
                </form> 
            </div>
        </section>
    </main>
    
    <footer>
        <div class="container">
            <p>&copy; 2024 Astrology and Personality Traits. All rights reserved.</p>
        </div>
    </footer>
    <script src="feedback.js"></script>
    <script src="js/script.js"></script>
    <script src="js/cursor.js"></script>
</body>
</html>