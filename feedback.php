<?php
$errors = array();

// Function to sanitize and validate email format
function validateEmailFormat($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Function to trim whitespace and validate feedback
function validateFeedback($feedback) {
    $feedback = trim($feedback);
    $wordCount = str_word_count($feedback);

    if (empty($feedback)) {
        return "Feedback is required";
    } elseif ($wordCount > 10) {
        return "Feedback cannot exceed 10 words";
    }

    return "";
}

// Function to trim whitespace and validate improve
function validateImprove($improve) {
    $improve = trim($improve);
    $wordCount = str_word_count($improve);

    if (empty($improve)) {
        return "Field is required";
    } elseif ($wordCount > 10) {
        return "Field cannot exceed 10 words";
    }

    return "";
}

// Function to validate contact number
function validateContact($contact) {
    if (!is_numeric($contact)) {
        return "Contact Number must have numeric characters only";
    } elseif (strlen($contact) != 10) {
        return "Contact Number should be of 10 digits";
    }
    return "";
}

// Function to validate rating
function validateRating($rating) {
    $rating = trim($rating);
    if (!is_numeric($rating)) {
        return "Rating is required";
    } elseif ($rating < 0 || $rating > 5) {
        return "Rating must be between 0 and 5";
    }
    return "";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $feedback = $_POST["feedback"];
    $improve = $_POST["improve"];
    $contact = $_POST["contact"];
    $rating = $_POST["rating"];

    // Validate email
    if (!validateEmailFormat($email)) {
        $errors["email"] = "Invalid email format";
    }

    // Validate feedback
    $feedbackError = validateFeedback($feedback);
    if (!empty($feedbackError)) {
        $errors["feedback"] = $feedbackError;
    }

    // Validate improve
    $improveError = validateImprove($improve);
    if (!empty($improveError)) {
        $errors["improve"] = $improveError;
    }

    // Validate contact
    $contactError = validateContact($contact);
    if (!empty($contactError)) {
        $errors["contact"] = $contactError;
    }

    // Validate rating
    $ratingError = validateRating($rating);
    if (!empty($ratingError)) {
        $errors["rating"] = $ratingError;
    }

    // If there are no errors and all fields are filled, process the form
    if (empty($errors) && !empty($email) && !empty($feedback) && !empty($improve) && !empty($contact) && !empty($rating)) {
        // Process the form submission
        // Insert data into database
        // Redirect or do further processing
    }
}




       $hashed_feedback = password_hash($feedback, PASSWORD_DEFAULT);

       $email=$_POST["email"];
       $rate=$_POST["rating"];
       $feedback=$_POST["feedback"];
       $improve=$_POST["improve"];
       $contact=$_POST["contact"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "valid";

        try{
        $conn = mysqli_connect($servername, $username, $password,$database);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO feedback values('$email','$rating','$hashed_feedback','$improve','$contact')";
        if(mysqli_query($conn,$sql)){
            echo "<script>alert('Feedback submitted'); window.location.href='index.php';</script>";
        }
        }
        catch(Exception $e){
            echo "Error: Database not found " . $e->getMessage() . " ";
        }
        finally {
            // Close connection
            if (isset($conn)) {
                $conn->close();
            }
        }
?> 

