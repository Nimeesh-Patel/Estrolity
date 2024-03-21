<?php
session_start();

// Display and clear the flash message if it exists
if (isset($_SESSION['flash_message'])) {
    echo "<script>alert('" . $_SESSION['flash_message'] . "');</script>";
    unset($_SESSION['flash_message']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="quiz.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
                        <li class="nav-item"><a class="nav-link" href="results.html">Results</a></li>
                        <li class="nav-item"><a class="nav-link" href="about_us_page.html">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="feedback.html">Feedback</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

        <div class="quiz-container">
            <form action="quiz_5.php" method="post">
                <div class="question">
                    <h3 style="margin-bottom: 30px; margin-top: 10px;">You often compromise your own needs to accommodate others, valuing harmony over personal gain.</h3>
                    <div class="options">
                        <h4 style="margin-top: 20px; color: #32a574;">Agree</h4>
                        <input type="radio" id="option1" name="socialInteraction5" value="1" class="option-circle-1">
                        <label for="option1"></label>
                        <input type="radio" id="option2" name="socialInteraction5" value="2" class="option-circle-2">
                        <label for="option2"></label>
                        <input type="radio" id="option3" name="socialInteraction5" value="3" class="option-circle-3">
                        <label for="option3"></label>
                        <input type="radio" id="option4" name="socialInteraction5" value="4" class="option-circle-4">
                        <label for="option4"></label>
                        <input type="radio" id="option5" name="socialInteraction5" value="5" class="option-circle-5">
                        <label for="option5"></label>
                        <input type="radio" id="option6" name="socialInteraction5" value="6" class="option-circle-6">
                        <label for="option6"></label>
                        <h4 style="margin-top: 20px; color: #4b3f72;">Disagree</h4>
                    </div>
                </div>
                <hr>
                <div class="progress-container">
                    <div class="progress-bar" id="quizProgress" style="width: 50%;"></div>
                </div>
                <div class="d-flex justify-content-between" style="margin: 0 100px; margin-top: 20px;">
                    <button type="button" class="btn btn-previous" onclick="location.href='quiz_4.php'">Previous</button>
                    <button type="submit" class="btn btn-next" style="margin-left: 400px; margin-top: 20px;">Next</button>

            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['socialInteraction5'])) {
                    $_SESSION['socialInteraction5'] = $_POST['socialInteraction5'];
                    header('Location: quiz_6.php'); // Redirect to the next quiz page
                    exit();
                } else {
                    // Store the flash message and redirect back to quiz_5.php
                    $_SESSION['flash_message'] = 'Please choose an option for question 5!';
                    header('Location: quiz_5.php');
                    exit();
                }
            }
            ?>

        </div>
</body>
</html>