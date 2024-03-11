<?php
session_start();

if(isset($_POST['socialInteraction7'])) {
    $_SESSION['socialInteraction7'] = $_POST['socialInteraction7'];
}

// Redirect to next quiz page
header('Location: quiz_8.php');
exit();
?>
