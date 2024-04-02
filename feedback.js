function validateEmail(){
    var email = document.getElementById("email").value;
    var emailError = document.getElementById("emailError");
    emailError.innerHTML = "";
    if (!email) {
        emailError.innerHTML = "Email is required";
        return false;
    } else if (!validateEmailFormat(email)) {
        emailError.innerHTML = "Invalid email format";
        return false;
    }
    return true;
}

function validateEmailFormat(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}
function validateFeedback() {
    var feedback = document.getElementById("feedback").value.trim(); // Trim whitespace
    var feedbackError = document.getElementById("feedbackError");
    feedbackError.innerHTML = "";

    // Check if feedback is empty
    if (!feedback) {
        feedbackError.innerHTML = "Feedback is required";
        return false;
    }

    // Split feedback into words
    var words = feedback.split(/\s+/); // Split by whitespace
    var wordCount = words.length;

    // Check if word count exceeds 100
    if (wordCount > 10) {
        feedbackError.innerHTML = "Feedback cannot exceed 10 words";
        return false;
    }

    return true;
}

// function validateFeedback() {
//     var feedback = document.getElementById("feedback").value.trim(); // Trim whitespace
//     var feedbackError = document.getElementById("feedbackError");
//     feedbackError.innerHTML = "";
//     if (!feedback) {
//         feedbackError.innerHTML = "Feedback is required";
//         return false;
//     }
//     return true;
// }

// function validateImprove() {
//     var improve = document.getElementById("improve").value.trim(); // Trim whitespace
//     var improveError = document.getElementById("improveError");
//     improveError.innerHTML = "";
//     if (!improve) {
//         improveError.innerHTML = "Field is required";
//         return false;
//     }
//     return true;
// }
function validateImprove() {
    var improve = document.getElementById("improve").value.trim(); // Trim whitespace
    var improveError = document.getElementById("improveError");
    improveError.innerHTML = "";

    // Check if feedback is empty
    if (!improve) {
        improveError.innerHTML = "Field is required";
        return false;
    }

    // Split feedback into words
    var words = improve.split(/\s+/); // Split by whitespace
    var wordCount = words.length;

    // Check if word count exceeds 100
    if (wordCount > 10) {
        improveError.innerHTML = "Field cannot exceed 10 words";
        return false;
    }

    return true;
}


function validateContact() {
    var contact = document.getElementById('contact');
    var numbers = /^[0-9]+$/;
    var contact_len = contact.value.length;
    var contactError = document.getElementById("contactError");
    contactError.innerHTML ="";
    if (contact.value.match(numbers)) {
        if (contact_len != 10) {
            contactError.innerHTML = "Contact Number should be of 10 digits";
            return false;
        }
        return true;
    } else {
        contactError.innerHTML = 'Contact Number must have numeric characters only';
        return false;
    }
}

function validateRating() {
    var rating = document.getElementById('rating');
    var ratingValue = parseInt(rating.value.trim()); // Trim leading and trailing whitespace and parse as integer
    var ratingError = document.getElementById("ratingError");
    ratingError.innerHTML = "";

    // Check if rating is empty
    if (isNaN(ratingValue)) {
        ratingError.innerHTML = "Rating is required";
        return false;
    }

    // Check if rating is negative
    if (ratingValue < 0) {
        ratingError.innerHTML = "Rating cannot be negative";
        return false;
    }

    // Check if rating exceeds 5
    if (ratingValue > 5) {
        ratingError.innerHTML = "Rating cannot exceed 5";
        return false;
    }

    return true;
}


// function validateRadio(){
//     var choiceError = document.getElementById("choiceError");
//     choiceError.innerHTML = "";
//     var yesChecked = document.getElementById("yes").checked;
//     var noChecked = document.getElementById("no").checked;
//     if (!yesChecked && !noChecked) {
//         choiceError.innerHTML = "Please select an option";
//         return false;
//     }
//     return true;
// }

function validateForm() {
    return validateEmail() && validateFeedback() && validateRadio();
}