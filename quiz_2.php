<?php
session_start();

if(isset($_POST['socialInteraction2'])) {
    $_SESSION['socialInteraction2'] = $_POST['socialInteraction2'];
}

// Redirect to next quiz page
header('Location: quiz_3.html');
exit();
?>
