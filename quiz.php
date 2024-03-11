<?php
// $Question1 = $_POST["quiz1"];
// $Question2 = $_POST["quiz2"];
// $Question3 = $_POST["quiz3"];
// $Question4 = $_POST["quiz4"];
// $Question5 = $_POST["quiz5"];
// $Question6 = $_POST["quiz6"];
// $Question7 = $_POST["quiz7"];
// $Question8 = $_POST["quiz8"];




// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "quiz_data";

// // Create database connection
// $conn = new mysqli($host, $user, $password, $database);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Store quiz answers in session
// if (!isset($_SESSION['answers'])) {
//     $_SESSION['answers'] = array();
// }


// $sql="insert into quiz_data values('$Question1','$Question2','$Question3','$Question4','$Question5','$Question6','$Question7','$Question8')";
// if(mysqli_query($conn,$sql)){
//     echo " record Inserted successfully ";
//     header("Location: quiz_2.html");
//     exit();
// }

// $conn->close();


// session_start();
// $host = "localhost"; // Database host name or IP
// $user = "root"; // Database username
// $password = ""; // Database password
// $database = "project"; // Database name

// // Create database connection
// $conn = new mysqli($host, $user, $password, $database);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Store quiz answers in session
// if (!isset($_SESSION['answers'])) {
//     $_SESSION['answers'] = array();
// }

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     foreach ($_POST as $question => $answer) {
//         $_SESSION['answers'][$question] = $answer;
//     }
    
//     // Determine what page to redirect to next
//     $currentPageNumber = (int)filter_var(array_keys($_POST)[0], FILTER_SANITIZE_NUMBER_INT);
//     $nextPageNumber = $currentPageNumber + 1;
    
//     if ($currentPageNumber < 8) { // Assuming there are 8 pages
//         header("Location: quiz_{$nextPageNumber}.html");
//     } else {
//         // Last quiz page, prepare to insert into database
//         $session_id = session_id(); // Example of identifying session, adjust as needed
//         $columns = implode(", ", array_keys($_SESSION['answers']));
//         $values = implode(", ", array_map(function($a) { return intval($a); }, $_SESSION['answers']));
        
//         $sql = "INSERT INTO quiz_results (session_id, $columns) VALUES ('$session_id', $values)";
        
//         if ($conn->query($sql) === TRUE) {
//             echo "New record created successfully";
//             // Redirect to results page or display results
//             // header("Location: results.php"); // Assuming you have a results.php
//         } else {
//             echo "Error: " . $sql . "<br>" . $conn->error;
//         }
        
//         // Clear session answers after storing them
//         unset($_SESSION['answers']);
//     }
//     exit();
// }

// $conn->close();

// Database connection details
$servername = "localhost";
$username = "root"; // Your DB username
$password = ""; // Your DB password
$dbname = "quiz_data";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming the form data is sent as individual questions
$question1 = isset($_POST['question1']) ? $_POST['question1'] : 0;
$question2 = isset($_POST['question2']) ? $_POST['question2'] : 0;
$question3 = isset($_POST['question3']) ? $_POST['question3'] : 0;
$question4 = isset($_POST['question4']) ? $_POST['question4'] : 0;
$question5 = isset($_POST['question5']) ? $_POST['question5'] : 0;
$question6 = isset($_POST['question6']) ? $_POST['question6'] : 0;
$question7 = isset($_POST['question7']) ? $_POST['question7'] : 0;
$question8 = isset($_POST['question8']) ? $_POST['question8'] : 0;

// Prepare the INSERT statement
$stmt = $conn->prepare("INSERT INTO quiz_results (question1, question2, question3, question4, question5, question6, question7, question8) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

// Bind parameters
$stmt->bind_param("iiiiiiii", $question1, $question2, $question3, $question4, $question5, $question6, $question7, $question8);

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();

?>
