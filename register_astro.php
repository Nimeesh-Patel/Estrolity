<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register as Astrologer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="Astro.css">
    <script src="validation.js"></script>
</head>
<style>
     body {
    font-family: 'Open Sans', sans-serif;
    line-height: 1.6;
    background-color: #4b3f72; /* Dark purple color for astrologer vibe */
    box-shadow: 0 0 20px rgba(75, 63, 114, 0.5); /* Glow effect with a subtle blur */
}

.registration-container {
    max-width: 600px;
    padding: 20px;
    margin: 40px auto; /* Center the container with more vertical space */
    background-color: rgba(43, 43, 43, 0.8); /* Semi-transparent dark background */
    border-radius: 20px; /* Consistent with card style */
    border: 1px solid #333; /* Subtle border */
}

     #registerBtn {
            position: relative;
            z-index:0; 
            margin-bottom: 85px; 
            background-color: #4b3f72; 
            color: #fff; 
            padding: 10px 20px; 
            border: none; 
            cursor: pointer; 
            font-size: 1.2em; 
            border-radius: 5px; 
            transition: background-color 0.3s, transform 0.3s; 
        }
        #registerBtn:hover {
            background-color: #3a2d56; 
            transform: translateY(-2px); 
        }
</style>
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
                        if (isset($_SESSION['First_Name'])) {
                            echo '<li class="nav-item"><a class="nav-link" href="quiz-intro.php">Quiz</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="feedback.php">Feedback</a></li>';
                            if (isset($_SESSION['r1'])) {
                                echo '<li class="nav-item"><a class="nav-link" href="zodiacResult.php">Result</a></li>';
                            }
                            echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="user_info.php">' . htmlspecialchars($_SESSION['First_Name']) . '</a></li>';
                        } else {
                            // Show the Register link
                            echo '<li class="nav-item"><a class="nav-link" href="register_astro.php">Register</a></li>';
                            // echo '<li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="registration-container">
        <h2 style="color: #ccc;">Register as Astrologer</h2>
        <form name="registrationForm" action="register_astroPHP.php" method="POST" onsubmit="return validateForm()" > <!-- Update action with your backend endpoint -->
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" required onblur="allLettersFirstName()" >
                <div id="firstNameError" class="text-danger"></div>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" required onblur="allLettersLastName()">
                <div id="lastNameError" class="text-danger"></div>
            </div>
            <div class="form-group">
                <label for="qualification">Qualification:</label>
                <input type="text" id="qualification" name="qualification"required onblur="validateQualification()" >
                <div id="qualificationError" class="text-danger"></div>
            </div>
            <div class="form-group">
                <label for="experience">Year of Experience:</label>
                <input type="number" id="experience" name="experience" required onblur="validateExperience()">
                <div id="experienceError" class="text-danger"></div>
            </div>
            <div class="form-group">
                <label for="contact">Contact:</label>
                <input type="text" id="contact" name="contact" required onblur="contactCheck()">
                <div id="contactError" class="text-danger"></div>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required onblur="validateAddress()">
                <div id="addressError" class="text-danger"></div>
            </div>
            <div class="form-group">
                <label for="expertise">Expertise:</label>
                <input type="text" id="expertise" name="expertise" required onblur="validateExpertise()">
                <div id="expertiseError" class="text-danger"></div>
            </div>
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" required onblur="validateEmail()">
                <div id="emailError" class="text-danger"></div>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required onblur="validatePassword()">
                <div id="passwordError" class="text-danger"></div>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword"  required onblur="validateConfirmPassword()" >
                <div id="confirmPasswordError" class="text-danger"></div>
            </div>
            <button id="registerBtn" class="btn btn-primary">Register</button>
            <!-- <a href="login_astro.html" style="margin-left: 230px;">Already have an account?</a> -->
        </form>
    </div>
    <script src="astrovalid.js"></script>
    <script src="js/script.js"></script>
    <script src="js/cursor.js"></script>
</body>
</html>
