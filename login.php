<?php
$username=$_POST["username"];
$password=$_POST["password"];

$servername="localhost";
$username= "root" ;
$password="";
$database="login";

$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("Connection failed :".mysqli_connect_error());
    }
$sql="insert into login values('$username','$password')";
if(mysqli_query($conn,$sql)){
    echo " record Inserted successfully ";
}
else{
    echo "error :",mysqli_error($conn);
}
mysqli_close($conn);
?>
