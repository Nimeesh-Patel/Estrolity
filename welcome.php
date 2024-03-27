<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #4b3f72;
            color: #fff;
            padding: 0;
            margin: 0;
        }

        header {
            background-color: #333;
            padding: 20px 0;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 0 20px;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            position: bottom;
            bottom: 0;
            width: 100%;
        }

        .explore-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4b3f72;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .explore-btn:hover {
            background-color: #3a2d56;
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

    <div class="container">
        <h1>Welcome, <?php echo $_SESSION['a_firstName'];?>!</h1>
        <p>Thank you for registering as an astrologer. We're thrilled to welcome you to our team of skilled professionals. At our astrology center, we strive to provide our clients with personalized and accurate readings to guide them on their life's journey.</p>
        <p>As a valued member of our team, you'll have access to cutting-edge tools and resources to enhance your practice and offer the best possible service to our clients.</p>
        <p>If you ever have any questions, need support, or want to share your insights with fellow astrologers, our dedicated team is here to assist you every step of the way.</p>
        <p>Feel free to explore our website to learn more about our services, upcoming events, and the latest updates in the field of astrology.</p>
        <p>We're excited to embark on this journey together and look forward to making a positive impact in the lives of our clients.</p>
        <p>If you have any questions or inquiries, please don't hesitate to contact us:</p>
        <p>Contact: astrologer@example.com<br>Phone: +1234567890</p>
        <!-- Additional content here -->
    </div>

    <footer>
        <div style="text-align: center;">
            <a href="index.php" class="explore-btn">Explore</a>
        </div>
    </footer>
</body>
</html>