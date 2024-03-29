<?php
session_start();
$birthdate = isset($_SESSION['Date_of_birth']) ? $_SESSION['Date_of_birth'] : '';
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
    margin: 100px auto;
    width: 400px;
    padding: 20px;
    background-color: #313131; /* Pastel blue */
    border-radius: 10px;
    text-align: center;
    transition: background-color 0.5s ease; /* Smooth transition */
  }
  #submit {
    padding: 10px 20px;
    background-color: #444;
    border: none;
    color: white;
    cursor: pointer;
    border-radius: 5px;
  }
  #submit:active {
    background-color: #666;
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
                    <li class="nav-item"><a class="nav-link" href="results.html">Results</a></li>
                    <li class="nav-item"><a class="nav-link" href="about_us_page.html">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

  <div id="container">
    <h2 style="color: black;">Find Your Lucky Color and Number</h2>
    <p>Your birthday: <span id="birthdateDisplay"><?php echo $_SESSION['Date_of_birth'];?></span></p>
    
    <div id="result" style="display:none;color:black;">
      <h3>Your lucky color is:</h3>
      <p id="luckyColor" style="color: black;">></p>
      <h3>Your lucky number is:</h3>
      <p id="luckyNumber" style="color: black;">></p>
      <p>Reason: <span id="reason" style="color: black;">></span></p>
      <a href="calculation.php">
      <button id="submit">Next</button>
      </a>
    </div>
  </div>
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

        var colors = ["red", "blue", "green", "yellow", "orange", "purple", "pink", "white", "black"];
        var reasons = [
          "Passion, energy, action, and love.",
          "Calmness, stability, trust, and wisdom.",
          "Growth, harmony, renewal, and nature.",
          "Happiness, optimism, enlightenment, and creativity.",
          "Enthusiasm, warmth, and vitality.",
          "Royalty, luxury, spirituality, and mystery.",
          "Love, romance, and femininity.",
          "Purity, innocence, and cleanliness.",
          "Mystery, sophistication, and power."
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
        var container = document.getElementById('container');
        container.style.backgroundColor = getPastelColor(randomColor);
        container.style.color = randomColor === 'white' || randomColor === 'black' ? 'white' : 'black';
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
</body>
</html>
