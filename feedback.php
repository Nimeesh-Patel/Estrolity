<?php
$email=$_POST["email"];
$choice=$_POST["choice"];
$feedback=$_POST["feedback"];

$servername="localhost";
$username= "root" ;
$password="";
$database="feedback";

$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("Connection failed :".mysqli_connect_error());
    }
$sql="insert into feedback values('$email','$choice','$feedback')";
if(mysqli_query($conn,$sql)){
    echo " record Inserted successfully ";
}
else{
    echo "error :",mysqli_error($conn);
}
mysqli_close($conn);
?>