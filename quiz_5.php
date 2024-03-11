<?php
session_start();

if(isset($_POST['socialInteraction5'])) {
    $_SESSION['socialInteraction5'] = $_POST['socialInteraction5'];
}

// Redirect to next quiz page
header('Location: quiz_6.php');
exit();
?>
