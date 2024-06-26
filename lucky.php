<?php
session_start();
$birthdate = isset($_SESSION['Date_of_birth']) ? $_SESSION['Date_of_birth'] : '';
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
  <title>Astrology Website</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">

<style>
  body {
    background-color: black;
    color: white;
    font-family: Arial, sans-serif;
  }
  #container {
    border-radius: 10px;
    text-align: center;
    transition: color 0.5s ease; /* Smooth transition */
  }
  #submit {
    text-align:center;
    padding: 10px 20px;
    background-color: #4b3f72;
    border: none;
    color: white;
    cursor: pointer;
    border-radius: 5px;
    margin:40px;
  }
  #submit:active {
    background-color: #666;
  }
  /* iframe {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
            z-index: -1; 
        } */
  #birthdate{
    color:white;
    font-family:serif;
    text-align:center;
    font-size:18px;
  }
  #title{
    text-align:center;
    font-size:52px;
    margin-top:70px;
    font-family:serif;
  }
  #luckyNumber{
    color:white;
    font-size:48px;
    text-align:center;
    font-family:serif;
  }
  #luckyColor{
    font-size:48px;
    text-align:center;
    font-family:serif;
  }
  .block{
    display: inline-block;
    width:600px;
    margin-left:70px;
    margin-right:70px;

  }
  #canvasasmi {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh; /* Changed from 700px to 100vh */
    z-index: -1; /* Adjusted z-index */
}

</style>
</head>
<body>
  <canvas id="canvasasmi"></canvas>
  <div id="cursorDot"></div>
  <div id="cursorCircle"></div>
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
<div class="block">
 <h2 id="title"> Your Lucky Color</h2>
 <p id="birthdate">Your birthday: <span id="birthdateDisplay"><?php echo $_SESSION['Date_of_birth'];?></span></p>
  <div id="container">
    <div id="result">
      <p id="luckyColor" >></p>
      
      </a>
</div>
</div>
  </div>
  <div class="block">
  <h3 id="title">Your lucky number</h3>
      <p id="luckyNumber">></p>
      <p id="birthdate">Reason: <span id="reason">></span></p>
      <a href="calculation.php">
</div>
        <div style="text-align:center">
      <button id="submit">Next</button>
      <div>
  
<main class="video-demo-container">
  <section class="intro-text" style="padding: 0px;">
      <div class="container">
          <h1>What is Numerology !</h1>
          <p>Get to know about numbers and astrology </p>
      </div>
  </section>
  
  <section class="video-section">
      <div class="video-frame">
          <video controls style="width: 100%; height: auto;">
              <source src="num.mp4" type="video/mp4">
              <track label="English" kind="subtitles" srclang="en" src="ademo.vtt" default>
              <track label="Marathi" kind="subtitles" srclang="mr" src="ademo2.vtt" default>
          </video>
      </div>            
      <div>
          <audio controls style="margin-top: 10px;">
              <source src="audioDemo.mp4">
          </audio>
      </div>
  </section>

  <script>
 document.addEventListener('DOMContentLoaded', function() {
    // Directly use the PHP session variable
    var birthdate = "<?php echo $birthdate; ?>";
    if (birthdate) {
        // Assuming birthdate format is 'YYYY-MM-DD'
        var enteredDate = new Date(birthdate);
        var currentDate = new Date();
        var age = currentDate.getFullYear() - enteredDate.getFullYear();
        var m = currentDate.getMonth() - enteredDate.getMonth();
        if (m < 0 || (m === 0 && currentDate.getDate() < enteredDate.getDate())) {
            age--;
        }

        var colors = ["Red", "Blue", "Green", "Yellow", "Orange", "Purple", "Pink", "White"];
        var reasons = [
          "Passion, energy, action, and love.",
          "Calmness, stability, trust, and wisdom.",
          "Growth, harmony, renewal, and nature.",
          "Happiness, optimism, enlightenment, and creativity.",
          "Enthusiasm, warmth, and vitality.",
          "Royalty, luxury, spirituality, and mystery.",
          "Love, romance, and femininity.",
          "Purity, innocence, and cleanliness.",
        ];
        var luckyNumbers = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        
        // Generate hash from the birthdate to get a deterministic but seemingly random result
        var hash = hashCode(birthdate);

        // Use modulo operation to get a deterministic index
        var colorIndex = Math.abs(hash) % colors.length;
        var numberIndex = Math.abs(hash) % luckyNumbers.length;
        
        var randomColor = colors[colorIndex];
        var randomNumber = luckyNumbers[numberIndex];
        var reason = reasons[colorIndex];
        
        document.getElementById('result').style.display = 'block';
        document.getElementById('luckyColor').innerText = randomColor;
        document.getElementById('luckyNumber').innerText = randomNumber;
        document.getElementById('reason').innerText = reason;

        // Optional: Adjust container background and text color based on the lucky color
        var luckyColorText = document.getElementById('luckyColor');
        luckyColorText.style.color = getPastelColor(randomColor);
        // luckyColor.style.color = randomColor === 'white' || randomColor === 'black' ? 'white' : 'black';
    } else {
        alert("Birthdate is not set in the session. Please log in or set the birthdate.");
    }
});

// Function to generate a hash code from a string
function hashCode(str) {
    var hash = 0, i, chr;
    if (str.length === 0) return hash;
    for (i = 0; i < str.length; i++) {
        chr   = str.charCodeAt(i);
        hash  = ((hash << 5) - hash) + chr;
        hash |= 0; // Convert to 32bit integer
    }
    return hash;
}

// Function to get a pastel color based on the primary color
function getPastelColor(color) {
    var pastelColors = {
        "red": "#ffb3ba",
        "blue": "#bae1ff",
        "green": "#baffc9",
        "yellow": "#ffffba",
        "orange": "#ffd8b1",
        "purple": "#e2baff",
        "pink": "#ffc0cb",
        "white": "#ffffff",
        "black": "#eeeeee" // Adjusted for visibility
    };
    return pastelColors[color] || "#ffffff"; // Default to white if the color is not found
}

</script>
<footer>
  <div class="container">
      <p>&copy; 2024 Astrology and Personality Traits. All rights reserved.</p>
  </div>
</footer>
<script src="js/script.js"></script>
<script src="js/cursor.js"></script>
<script src ="js/asmijs.js"></script>
</body>
</html>
