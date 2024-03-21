<?php
session_start();

$q1 = ($_SESSION['socialInteraction1'] + $_SESSION['socialInteraction2'])/2;
$q2 = ($_SESSION['socialInteraction3'] + $_SESSION['socialInteraction4'])/2;
$q3 = ($_SESSION['socialInteraction5'] + $_SESSION['socialInteraction6'])/2;
$q4 = ($_SESSION['socialInteraction7'] + $_SESSION['socialInteraction8'])/2;

$r1 = $q1 < 4 ? 'Introvert' : 'Extrovert';
$r2 = $q2 < 4 ? 'Thinker' : 'Feeler';
$r3 = $q3 < 4 ? 'Agreeable' : 'Determined';
$r4 = $q4 < 4 ? 'Organized' : 'Carefree';

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "project"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO user_personality (E_mail_id, IntrovertExtrovert, ThinkerFeeler, AgreeableDetermined, OrganizedCarefree) VALUES (?, ?, ?, ?, ?)");

// Bind parameters from session variables
$stmt->bind_param("sssss", 
    $_SESSION['E_mail_id'], 
    $r1,
    $r2,
    $r3,
    $r4
);

$_SESSION['r1'] = $r1;
$_SESSION['r2'] = $r1;
$_SESSION['r3'] = $r1;
$_SESSION['r4'] = $r1;

if ($stmt->execute()) {
    
    header("Location: zodiacResult.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

?>