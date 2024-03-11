<?php
session_start();

if(isset($_POST['socialInteraction6'])) {
    $_SESSION['socialInteraction6'] = $_POST['socialInteraction6'];
}

// Redirect to next quiz page
header('Location: quiz_7.php');
exit();
?>
