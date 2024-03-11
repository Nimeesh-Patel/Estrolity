<?php
session_start();

if(isset($_POST['socialInteraction4'])) {
    $_SESSION['socialInteraction4'] = $_POST['socialInteraction4'];
}

// Redirect to next quiz page
header('Location: quiz_5.html');
exit();
?>
