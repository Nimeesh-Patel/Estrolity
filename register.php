
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="js/validation.js"></script>
    <link rel="stylesheet" href=
    "https://use.fontawesome.com/releases/v5.15.3/css/all.css"
            integrity=
    "sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk"
            crossorigin="anonymous">
        <!-- <script src="captcha.js"></script> -->
    <style>
        #image.inline {
            color: #ccc;
        }
        div.inline {
            color: #ccc; 
        }
    </style>
</head>
<body onload="generate()">
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
                        <li class="nav-item"><a class="nav-link" href="results.html">Results</a></li>
                        <li class="nav-item"><a class="nav-link" href="about_us_page.html">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="feedback.html">Feedback</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <canvas id="starfield"></canvas>
    <div id="cursorDot"></div>
    <div id="cursorCircle"></div>
    <div class="registration-container">
        <h2 style="color: #ccc;">Register</h2>
        <form name= "registrationForm" action="registerPHP.php" method="POST" onsubmit="return formValidation()">
            <div class="form-group">
                <label for="username">Email Address:</label>
                <input type="text" id="username" name="username" required onblur="validateEmail()">
                <div id="emailError" class="text-danger"></div>
            </div>
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" required onblur="allLettersFirstName()">
                <div id="firstNameError" class="text-danger"></div>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" required onblur="allLettersLastName()">
                <div id="lastNameError" class="text-danger"></div>
            </div>
            <div class="form-group">
                <label for="placeOfBirth">Place of Birth:</label>
                <input type="text" id="placeOfBirth" name="placeOfBirth" required onblur="allLettersPOB()">
                <div id="pobError" class="text-danger"></div>
            </div>

            <div class="form-group">
                <label for="dob">Date Of Birth:</label>
                <input type="date" id="birthDate" name="birth_date" required>
            </div>

            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" required onblur="ageCheck()">
                <div id="ageError" class="text-danger"></div>
            </div>

            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="contact">Contact:</label>
                <input type="text" id="contact" name="contact" required onblur="contactCheck()">
                <div id="contactError" class="text-danger"></div>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required onblur="confirmpass()">
                 <div id="confirmError" class="text-danger" onreload = "destroy()";>
                <?php  echo $_SESSION['confirmPasswordError']; ?>
            </div>
            </div>
            <div onload="generate()">
                <div id="user-input" class="inline">
                    <input type="text"
                           id="submit"
                           placeholder="Captcha code" />
                </div>
             
                <div class="inline" onclick="generate()" onblur="printmsg()">
                    <i class="fas fa-sync"></i>
                </div>
             
                <div id="image"
                     class="inline"
                     selectable="False">
                </div>
                <input class="btn" type="submit"
                       id="btn"
                       onclick="printmsg()" style="color: #ccc;" />
             
                <p id="key"></p>
            </div>
            <!-- <button type="submit" class="btn">Register</button> -->
                <a href="login.html" style="margin-left: 230px;">Already have an account?</a>
        </form>
        
    </div>

    <?php
    function destory()
    {
        session_destroy();
    } 
    ?>
    
    <script src="js/script.js"></script>
    <script src="js/cursor.js"></script>
</body>
</html>

