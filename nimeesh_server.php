<?php
$errorMsg = '';
$code = '';

if(isset($_POST['Submit'])){
    $emp_name = trim($_POST["emp_name"]);
    $emp_number = trim($_POST["emp_number"]);
    $emp_email = trim($_POST["emp_email"]);
    $emp_address = isset($_POST["emp_address"]) ? trim($_POST["emp_address"]) : '';
    $emp_position = isset($_POST["emp_position"]) ? trim($_POST["emp_position"]) : '';

    if($emp_name =="") {
        $errorMsg =  "error : You did not enter a name.";
        $code = "1" ;
    }

    elseif(!preg_match("/^[a-zA-Z]+$/", $emp_name)) {
        $errorMsg =  "error : You did not enter a valid name.";
        $code = "1" ;
    }
    elseif($emp_number == "") {
        $errorMsg =  "error : Please enter a number.";
        $code = "2";
    }
   
    elseif(!is_numeric($emp_number)){
        $errorMsg =  "error : Please enter a numeric value.";
        $code = "2";
    }
    elseif(strlen($emp_number) < 10){
        $errorMsg =  "error : Number should be ten digits.";
        $code = "2";
    }
   
    elseif($emp_email == ""){
        $errorMsg =  "error : You did not enter an email.";
        $code = "3";
    }
  
    elseif(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $emp_email)){
        $errorMsg = 'error : You did not enter a valid email.';
        $code = "3";
    }
    elseif($emp_address == ""){
        $errorMsg =  "error : Please enter an address.";
        $code = "4";
    }
    elseif(!preg_match("/^[a-zA-Z0-9]+$/", $emp_address)) {
        $errorMsg =  "error : You did not enter a valid address.";
        $code = "4";
    }

 
    
    elseif($emp_position == ""){
        $errorMsg =  "error : Please enter a position.";
        $code = "5";
    }
    elseif(strlen($emp_position) == 0 || strlen($emp_position) <= 8 || strlen($emp_position) > 12)
     {
            $errorMsg = "Password should not be empty / length should be between 8 to 12 characters.";
            $code = "5"; // You can use any appropriate code here
            // Additional error handling or actions can be added here if needed
        }
    
    
    else{
        $errorMsg = "your record has been uploaded Successfully";
        //final code will execute here.
    }
}
?>


<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <title>Student Information Sample HTML Form</title>
 <style type="text/css" >
/* Styles for error message */
/* Styles for the form container */
/* Styles for the form container */
.error {
  color: #ff4d4d; /* Red color for error messages */
  font-weight: bold;
  margin-top: 10px;
  font-size: 14px;
}

/* Styles for the form container */
.main {
  max-width: 400px;
  margin: 50px auto;
  padding: 20px;
  border-radius: 10px;
  background-color: #222; /* Dark background */
  color: #fff; /* White text */
  box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
}

/* Styles for form elements */
input[type="text"],
input[type="password"] {
  width: 100%;
  padding: 12px;
  margin-bottom: 20px;
  border: 1px solid #555; /* Darker border */
  border-radius: 5px;
  box-sizing: border-box;
  font-size: 16px;
  background-color: #444; /* Darker input field background */
  color: #fff; /* White text */
}

/* Style for submit button */
input[type="submit"] {
  width: 100%;
  padding: 12px;
  border: none;
  border-radius: 5px;
  background: linear-gradient(to right, #FFD700, #FFA500); /* Gradient background for submit button */
  color: white;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

/* Hover effect for submit button */
input[type="submit"]:hover {
  background: linear-gradient(to right, #FFA500, #FFD700);
}

/* Styles for form labels */
td {
  font-weight: bold;
  color: #fff; /* White text */
}

/* Background color for the whole page */
body {
  background-color: #333; /* Darker background for the whole page */
}


 </style>
</head>

<body>

 <div class="main">
 <div class="error">
  <?php if (isset($errorMsg)) { echo "<p class='message'>" .$errorMsg. "</p>" ;} ?>
  </div>
<form name="registration" id="registration" method="post" action="">
<table width="400" border="0" align="center" cellpadding="4" cellspacing="1">
<tr>
<td>Student Name:</td>
<td><input name="emp_name" type="text" id="emp_name" value="<?php if(isset($emp_name)){echo $emp_name;} ?>"
<?php if(isset($code) && $code == 1) { echo "class='errorMsg'"; } ?>></td>
</tr>
<tr>
<td>Contact No.: </td>
<td><input name="emp_number" type="text" id="emp_number" value="<?php if(isset($emp_number)){echo $emp_number;} ?>"
<?php if(isset($code) && $code == 2) { echo "class='errorMsg'"; } ?>></td>
</tr>
<tr>
<td>Personal Email: </td>
<td><input name="emp_email" type="text" id="emp_email" value="<?php if(isset($emp_email)){echo $emp_email; }?>"
<?php if(isset($code) && $code == 3) { echo "class='errorMsg'"; } ?>></td>
</tr>
<tr>
<td>Address: </td>
<td><input name="emp_address" type="text" id="emp_address"  value="<?php if(isset($emp_address)){echo $emp_address; }?>"
<?php if(isset($code) && $code == 4) { echo "class='errorMsg'"; } ?>></td>
</tr>
<tr>
<td>Password: </td>
<td><input name="emp_position" type="password" id="emp_position" value="<?php if(isset($emp_position)){echo $emp_position; }?>"
<?php if(isset($code) && $code == 5) { echo "class='errorMsg'"; } ?>></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="Submit" value="Submit"></td>
</tr>
</table>
</form>
</div>
</body>
</html>
