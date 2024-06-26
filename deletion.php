<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #1f1f1f;
            color: #ffffff;
            font-family: Arial, sans-serif;

            height: 100vh;
        }

        .container {
            background-color: #282828; /* Dark gray container background color */
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Shadow effect */
            /* width: 400px; */
            text-align: center;
        }

        h1 {
            color: #f0ad4e; /* Yellow heading color */
        }

        p {
            color: #dddddd; /* Light gray text color */
            margin-bottom: 10px;
        }

        /* Styling for individual data fields */
        .field {
            margin-bottom: 15px;
        }

        .field label {
            font-weight: bold;
        }

        /* Styling for the link */
        a {
            color: #f0ad4e; /* Yellow link color */
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
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
                            echo '<li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div id="cursorDot">
        <img src="cursorSvg.svg" id="cursorSvg" style="width: 100%; height: 100%; display: none; padding: 1.5px 1.5px;">
        <img src="glassSvg.svg" id="glassSvg" style="width: 100%; height: 100%; display: none; padding: 1.5px 1.5px;">
    </div>
    <div id="cursorCircle">
    </div>
    <div class="container">
        <h1>User Profile</h1>
        <?php
       
        $E_mail_id = $_SESSION['E_mail_id'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "project";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT * FROM datatable WHERE E_mail_id = ?");
        $stmt->bind_param("s", $E_mail_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            ?>
                <form id="loginForm" action="deletionPHP.php" method="POST" onsubmit="return formValidation()">
                    <div class="form-group">
                        <label for="username">Email:</label>
                        <input type="text" id="username" name="username" onblur="validateEmailField()">
                        <div id="emailError" class="error-message"></div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required onblur="validatePasswordField()">
                        <div id="passwordError" class="error-message"></div>
                    </div>
                    
                    <!-- <button type="submit" class="btn" value="submit">Log In</button> -->
                    <!-- <div onload="generate()">
                        <div id="user-input" class="inline">
                            <input type="text"
                                   id="submit"
                                   placeholder="Captcha code" />
                        </div>
                        

                    </div> -->
                    <!-- <div class="assist-links">
                        
                        <a href="register.php">Create Account</a>
                    </div> -->
                    <input class="btn" type="submit" id="btn" style="color: #ccc;" />
                </form>
            <!-- <a type = "submit" class="btn btn-primary" style="margin-top: 20px;">Confrim</a> -->

            <?php
        } else {
            echo "<p>0 results</p>";
        }
        ?>
    </div>
    <script src="js/script.js"></script>
    <script src="js/cursor.js"></script>
</body>
</html>