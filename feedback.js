function validateEmail() {
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
    if (!feedback) {
        feedbackError.innerHTML = "Feedback is required";
        return false;
    }
    return true;
}


function validateRadio() {
    var choiceError = document.getElementById("choiceError");
    choiceError.innerHTML = "";
    var yesChecked = document.getElementById("yes").checked;
    var noChecked = document.getElementById("no").checked;
    if (!yesChecked && !noChecked) {
        choiceError.innerHTML = "Please select an option";
        return false;
    }
    return true;
}

function validateForm() {
    return validateEmail() && validateFeedback() && validateRadio();
}