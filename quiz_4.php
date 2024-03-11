<?php
session_start();

if(isset($_POST['socialInteraction1'])) {
    $_SESSION['socialInteraction1'] = $_POST['socialInteraction1'];
}

// Redirect to next quiz page
header('Location: quiz_2.php');
exit();
?>
