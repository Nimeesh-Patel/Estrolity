<?php
session_start();

if(isset($_POST['socialInteraction3'])) {
    $_SESSION['socialInteraction3'] = $_POST['socialInteraction3'];
}

// Redirect to next quiz page
header('Location: quiz_4.php');
exit();
?>
