<?php
session_start();

if(isset($_POST['socialInteraction1'])) {
    $_SESSION['socialInteraction1'] = $_POST['socialInteraction1'];
    header('Location: quiz_2.html');
    exit();
} else {
    echo "<script>alert('Please choose an option!'); window.location.href='quiz_1.php';</script>";
    exit();
}

?>