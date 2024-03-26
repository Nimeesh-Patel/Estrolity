var firstName = document.getElementById('user-input');

function validateEmail() {
    var uid = document.getElementById('email').value;
    var emailError = document.getElementById("emailError");
    emailError.innerHTML = "";
    if (!uid) {
        emailError.innerHTML = "Email is required";
        return false;
    } else if (!validateEmailFormat(uid)) {
        emailError.innerHTML = "Invalid email format";
        return false;
    }
    return true;

    function validateEmailFormat(email) {
        var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        return re.test(email);
    }

}
function allLettersFirstName() {
    var firstName = document.getElementById('firstName');
    var letters = /^[A-Za-z]+$/;
    var firstNameError = document.getElementById("firstNameError");
    firstNameError.innerHTML = "";
    if (firstName.value.match(letters)) {
        return true;
    } else {
        // alert('First Name must have alphabet characters only');
        // firstName.focus();
        firstNameError.innerHTML = "First Name should be all alphabets only!";
        return false;
    }
}
function allLettersLastName() {
    var lastName = document.getElementById('lastName');
    var letters = /^[A-Za-z]+$/;
    var lastNameError = document.getElementById("lastNameError");
    lastNameError.innerHTML = "";
    if (lastName.value.match(letters)) {
        return true;
    } else {
        lastNameError.innerHTML = "Last Name should be all alphabets only!";
        return false;
    }
}

function allLettersPOB() {
    var pob = document.getElementById('placeOfBirth');
    var letters = /^[A-Za-z]+$/;
    var pobError = document.getElementById("pobError");
    pobError.innerHTML = "";
    if (pob.value.match(letters)) {
        return true;
    } else {
        pobError.innerHTML = "Place of Birth should be all alphabets only!";
        return false;
    }
}

function contactCheck() {
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
function confirm_pass() {
    var confirmPasswordValue = document.getElementById('confirmPassword').value;
    var passidValue = document.getElementById('password').value;
    var confirmError = document.getElementById("confirmError");
    confirmError.innerHTML = ""; // Ensure to clear previous error messages
    if (confirmPasswordValue !== passidValue) {
        confirmError.innerHTML = 'Passwords do not match';
        return false;
    }
    return true;
}
function confirm_pass(confirmPassword, passid) {
    var confirmPasswordValue = confirmPassword.value;
    var passidValue = passid.value;
    if (confirmPasswordValue !== passidValue) {
        alert('Passwords do not match');
        return false;
    }
    return true;
}
function validateExperience() {
    var experience = document.getElementById('experience');
    var experienceValue = experience.value.trim(); // Trim leading and trailing whitespace
    var experienceError = document.getElementById("experienceError");
    experienceError.innerHTML = "";

    // Check if experience is empty
    if (experienceValue === "") {
        experienceError.innerHTML = "Experience is required";
        return false;
    }

    // Check if experience is not a positive number
    if (isNaN(experienceValue) || experienceValue <= 0) {
        experienceError.innerHTML = "Experience must be a positive number";
        return false;
    }

    return true;
}

function validateQualification() {
    var qualification = document.getElementById('qualification');
    var qualificationValue = qualification.value.trim(); // Trim leading and trailing whitespace
    var qualificationError = document.getElementById("qualificationError");
    qualificationError.innerHTML = "";

    // Check if qualification is empty
    if (qualificationValue === "") {
        qualificationError.innerHTML = "Qualification is required";
        return false;
    }

    return true;
}

function validateAddress() {
    var address = document.getElementById('address');
    var addressValue = address.value.trim(); // Trim leading and trailing whitespace
    var addressError = document.getElementById("addressError");
    addressError.innerHTML = "";

    // Check if address is empty
    if (addressValue === "") {
        addressError.innerHTML = "Address is required";
        return false;
    }

    return true;
}

function validateExpertise() {
    var expertise = document.getElementById('expertise');
    var expertiseValue = expertise.value.trim(); // Trim leading and trailing whitespace
    var expertiseError = document.getElementById("expertiseError");
    expertiseError.innerHTML = "";

    // Check if expertise is empty
    if (expertiseValue === "") {
        expertiseError.innerHTML = "Expertise is required";
        return false;
    }

    return true;
}

function validatePassword() {
    var password = document.getElementById('password');
    var passwordValue = password.value.trim(); // Trim leading and trailing whitespace
    var passwordError = document.getElementById("passwordError");
    passwordError.innerHTML = "";

    // Check if password is empty
    if (passwordValue === "") {
        passwordError.innerHTML = "Password is required";
        return false;
    }

    // Check if password meets criteria
    var capitalLetterPattern = /[A-Z]/;
    var numericPattern = /\d/;
    if (passwordValue.length < 8 || !capitalLetterPattern.test(passwordValue) || !numericPattern.test(passwordValue)) {
        passwordError.innerHTML = "Password must be at least 8 characters long and contain at least one capital letter and one numeric digit";
        return false;
    }

    return true;
}

function validateConfirmPassword() {
    var confirmPassword = document.getElementById('confirmPassword');
    var confirmPasswordValue = confirmPassword.value.trim(); // Trim leading and trailing whitespace
    var confirmPasswordError = document.getElementById("confirmPasswordError");
    confirmPasswordError.innerHTML = "";

    // Get the password value
    var password = document.getElementById('password');
    var passwordValue = password.value.trim();

    // Check if confirm password is empty
    if (confirmPasswordValue === "") {
        confirmPasswordError.innerHTML = "Confirm password is required";
        return false;
    }

    // Check if confirm password matches password
    if (confirmPasswordValue !== passwordValue) {
        confirmPasswordError.innerHTML = "Passwords do not match";
        return false;
    }

    return true;
}