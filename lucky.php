<?php
session_start();


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
    <h2>Find Your Lucky Color and Number</h2>
    <p>Your birthday: <span id="birthdateDisplay"></span></p>
    <button id="submit">Submit</button>
    <div id="result" style="display:none;">
      <h3>Your lucky color is:</h3>
      <p id="luckyColor"></p>
      <h3>Your lucky number is:</h3>
      <p id="luckyNumber"></p>
      <p>Reason: <span id="reason"></span></p>
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
    var birthdate = "<?php echo $_SESSION['Date_of_birth']; ?>"; // Use the PHP session variable
    document.getElementById('birthdateDisplay').innerText = birthdate;

    // Assuming birthdate format is 'YYYY-MM-DD'
    var enteredDate = new Date(birthdate);
    var currentDate = new Date();
    var age = currentDate.getFullYear() - enteredDate.getFullYear();
    var m = currentDate.getMonth() - enteredDate.getMonth();
    if (m < 0 || (m === 0 && currentDate.getDate() < enteredDate.getDate())) {
        age--;
    }

    // Check if age calculation is needed before proceeding with the lucky color and number generation
    if (age >= 0) {
        document.getElementById('submit').click(); // Automatically trigger the calculation
    } else {
        alert("Please enter a valid date!");
    }
});

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
    
    // Generate hash from the input (birthdate)
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

    // Change container color and text color
    var container = document.getElementById('container');
    container.style.backgroundColor = getPastelColor(randomColor);
    container.style.color = randomColor === 'white' || randomColor === 'black' ? 'black' : 'white';
    
    // Disable input after submission
    document.getElementById('birthdate').disabled = true;
    document.getElementById('submit').disabled = true;
  });

  // Function to generate hash code
  function hashCode(s) {
    return s.split('').reduce(function(a,b){a=((a<<5)-a)+b.charCodeAt(0);return a&a},0);
  }

  // Function to get pastel color
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
      "black": "#9e9e9e"
    };
    return pastelColors[color];
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
