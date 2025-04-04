<?php
session_start();

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "project"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($stmt = $conn->prepare("SELECT * FROM user_personality WHERE E_mail_id = ?")) {
    $stmt->bind_param("s", $_SESSION['E_mail_id']);

    $stmt->execute();

    $stmt->bind_result($f, $r1, $r2, $r3, $r4);

    if ($stmt->fetch()) {
        $_SESSION['r1'] = $r1;
        $_SESSION['r2'] = $r2;
        $_SESSION['r3'] = $r3;
        $_SESSION['r4'] = $r4;
    }

    $stmt->close();
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astrology and Personality Traits</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" type="text/css" href="styless.css">
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <style>
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
        .container {
            max-width:2000px; /* Adjust as needed */
            margin: 0 auto;
            padding: 0 15px;
        }

        h1, h2 {
            color: #fff; /* White text color */
        }

        p {
            color: #ccc; /* Light gray text color */
        }

        .credit-box {
            background-color: #4b3f72;
            color: #fff;
            padding: 5px 7px;
            border-radius: 2px;
            margin-bottom: 20px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .credit-box:hover {
            background-color: #3a2d56;
            transform: translateY(-2px);
        }

        .credit-name {
            margin-bottom: 5px;
            font-size: 1.5em;
        }

        .credit-role {
            margin: 0;
            font-size: 1.1em;
        }
        #map { /* Specify the dimensions of the map */
        height:600px;
        width: 1350px;
        margin: 30px;
        }
         body{
            background-color: black;
            text-align: center;
        }
        div{
            text-align: center;
            padding: 20px;
        }
        text{
           height: 50px;
           font-size: 42px;
           font-family: sans-serif; 
           color: white;     
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
                            echo '<li class="nav-item"><a class="nav-link" href="feedback.html">Feedback</a></li>';
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
    <main class="container">
        <h1 style="font-size: 2.5rem;">Astrologers Near You</h1>
        <div id="map" style="width: 1000px; height: 500px; align-items: center; margin-left: 250px; z-index: -1;"></div>
        <section id="about-us" class="text-center py-5" style="background-color: #111;">
            <div class="container" style="color: #fff;">
                <h1 style="font-size: 2.5rem;">About Astrolity</h1>
                <p>Welcome to Astrolity, your personal guide to the stars and self-discovery. At Astrolity, we believe that astrology can offer valuable insights into our personalities, behaviors, and relationships. Our mission is to provide you with accurate and personalized astrological guidance that helps you navigate through life's challenges and discover your true potential.</p>
                <p>Whether you're curious about your zodiac sign's personality traits, seeking guidance on love and relationships, or exploring your career path, Astrolity is here to support you on your journey of self-discovery.</p>
                <p>Join us as we explore the mysteries of the universe and uncover the hidden truths written in the stars.</p>
                <p>Email: contact@estrolity.com</p>
                <p>Phone: +1234567890</p>
                <h2>Credits</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="credit-box">
                        <h3>Nimmesh Patel</h3>
                        <p>Lead Developer</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="credit-box">
                        <h3>Abhinav Nair</h3>
                        <p>Lead Designer</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="credit-box">
                        <h3>Asmi Panchal</h3>
                        <p>Content Writer</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="credit-box">
                        <h3>Shabarinath R</h3>
                        <p>Astrology Specialist</p>
                    </div>
                </div>
            </div>
            </div>
            <div>
                <a href="register_astro.php" id="registerBtn">Register as Astrologer</a>
            </div>
        </section>
    </main>
        </section>

        <section class="video-section" style="padding-top: 0px;">
            <div class="container">
                <video controls style="max-width: 100%; height: auto;">
                    <source src="about page.mp4" type="video/mp4">
                    <track label="English" kind="subtitles" scrlang="en" src="ademo.vtt" default>
                </video>
            </div>
            <div>
                <audio controls>
                    <source src="audioDemo.mp4">
                </audio>
            </div>
        </section>
        
    </main>
    
    <footer class="text-center py-4">
        <p>&copy; 2024 Astrology and Personality Traits. All rights reserved.</p>
    </footer>
    
    <script>
        var map = L.map('map').setView([19.0760, 72.8777], 10);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var markers = [
            { name: 'Mumbai', coords: [19.0760, 72.8777] },
            { name: 'Navi Mumbai', coords: [19.0330, 73.0297] },
            { name: 'Panvel', coords: [18.9886, 73.1100] },
            { name: 'CSMT', coords: [18.9401, 72.8350] },
            { name: 'Thane', coords: [19.2183, 72.9781] }
        ];

        markers.forEach(function(marker) {
            L.marker(marker.coords).addTo(map).bindPopup(marker.name);
        });
    </script>
</body>
</html>
