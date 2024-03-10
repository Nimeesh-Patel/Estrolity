<?php
$Question1 = $_POST["quiz1"];
$Question2 = $_POST["quiz2"];
$Question3 = $_POST["quiz3"];
$Question4 = $_POST["quiz4"];
$Question5 = $_POST["quiz5"];
$Question6 = $_POST["quiz6"];
$Question7 = $_POST["quiz7"];
$Question8 = $_POST["quiz8"];




$servername = "localhost";
$username = "root";
$password = "";
$database = "quiz_data";

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql="insert into quiz_data values('$Question1','$Question2','$Question3','$Question4','$Question5','$Question6','$Question7','$Question8')";
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