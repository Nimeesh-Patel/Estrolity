<?php
$name=$_POST["un"];
$pass=$_POST["pw"];

$servername="localhost";
$username= "root" ;
$password="";
$database="project";

$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("Connection failed :".mysqli_connect_error());
    }
$sql="insert into user values('$name','$pass')";
if(mysqli_query($conn,$sql)){
    echo " record Inserted successfully ";
}
else{
    echo "error :",mysqli_error($conn);
}
mysqli_close($conn);
?>