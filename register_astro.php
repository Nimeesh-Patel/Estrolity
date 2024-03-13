<?php
$E_mail_id = $_POST["email"];
$First_Name = $_POST["firstName"];
$Last_Name = $_POST["lastName"];
$qualification = $_POST["qualification"];
$experience = $_POST["experience"];
$contact = $_POST["contact"];
$address = $_POST["address"];
$password = $_POST["password"];
$servername="localhost";
$username= "root" ;
$password="";
$database="project";

$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("Connection failed :".mysqli_connect_error());
    }
$sql="insert into feedback values('$email','$choice','$feedback')";
if(mysqli_query($conn,$sql)){
    echo "<script>alert('Feedback Submitted'); window.location.href='feedback.html';</script>";
}
else{
    echo "error :",mysqli_error($conn);
}
mysqli_close($conn);
?>