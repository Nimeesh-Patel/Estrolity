<?php
$Question1 = $_POST["socialInteraction1"];
$Question2 = $_POST["socialInteraction2"];
$Question3 = $_POST["socialInteraction3"];
$Question4 = $_POST["socialInteraction4"];
$Question5 = $_POST["socialInteraction5"];
$Question6 = $_POST["socialInteraction6"];
$Question7 = $_POST["socialInteraction7"];
$Question8 = $_POST["socialInteraction8"];




$servername = "localhost";
$username = "root";
$password = "";
$database = "project";

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql="insert into quiz_info values('$Question1','$Question2','$Question3','$Question4','$Question5','$Question6','$Question7','$Question8')";
if(mysqli_query($conn,$sql)){
    echo " record Inserted successfully ";
    header("Location: quiz_2.html");
    exit();
}
else{
    echo "error :",mysqli_error($conn);
}
mysqli_close($conn);
?>