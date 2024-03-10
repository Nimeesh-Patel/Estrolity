<?php
$E_mail_id=$_POST["username"];
$First_Name=$_POST["firstName"];
$Last_Name=$_POST["lastName"];
$Date_of_birth=$_POST["birth_date"];
$Age=$_POST["age"];
$Place_of_birth=$_POST["placeOfBirth"];
$Gender=$_POST["gender"];
$PASSWORD=$_POST["password"];

$servername="localhost";
$username= "root" ;
$password="";
$database="project";

$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("Connection failed :".mysqli_connect_error());
    }
$sql="insert into datatable values('$E_mail_id','$First_Name','$Last_Name','$Date_of_birth','$Age','$Place_of_birth','$Gender','$PASSWORD')";
if(mysqli_query($conn,$sql)){
    echo " record Inserted successfully ";
}
else{
    echo "error :",mysqli_error($conn);
}
mysqli_close($conn);
?>