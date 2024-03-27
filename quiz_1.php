<?php
session_start();

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
<body style="background-color:black;">
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

    <div class="quiz-container">
        <form action="quiz_1.php" method="POST">
            <div class="question">
                <h3 style="margin-bottom: 30px; margin-top: 10px;">You do not regularly make new friends.</h3>
                <div class="options">
                    <h4 style="margin-top: 20px; color: #32a574;">Agree</h4>
                    <input type="radio" id="option1" name="socialInteraction1" value="1" class="option-circle-1">
                    <label for="option1"></label>
                    <input type="radio" id="option2" name="socialInteraction1" value="2" class="option-circle-2">
                    <label for="option2"></label>
                    <input type="radio" id="option3" name="socialInteraction1" value="3" class="option-circle-3">
                    <label for="option3"></label>
                    <input type="radio" id="option4" name="socialInteraction1" value="4" class="option-circle-4">
                    <label for="option4"></label>
                    <input type="radio" id="option5" name="socialInteraction1" value="5" class="option-circle-5">
                    <label for="option5"></label>
                    <input type="radio" id="option6" name="socialInteraction1" value="6" class="option-circle-6">
                    <label for="option6"></label>
                    <h4 style="margin-top: 20px; color: #4b3f72;">Disagree</h4>
                </div>
            </div>
            <hr>
            <div class="progress-container">
                <div class="progress-bar" id="quizProgress" style="width: 0%;"></div>
            </div>
            <button type="submit" class="btn btn-next"  href="quiz_2.html" style="margin-left: 400px; margin-top: 20px;">Next</button>

        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['socialInteraction1'])) {
                $_SESSION['socialInteraction1'] = $_POST['socialInteraction1'];
                header('Location: quiz_2.php'); // Redirect to the next quiz page
                exit();
            } else {
                // Store the flash message and redirect back to the quiz_1.php
                $_SESSION['flash_message'] = 'Please choose an option!';
                header('Location: quiz_1.php');
                exit();
            }
        }
        ?>        

    </div>    
</body>
</html>
