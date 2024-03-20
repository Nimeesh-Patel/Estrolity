let captcha;
var firstName = document.getElementById('user-input');

function validateEmail() {
    var uid = document.getElementById('username').value;
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
}

function validateEmailFormat(email) {
    var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return re.test(email);
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

function ageCheck() {
    var ageField = document.getElementById("age"); // Define ageField to select the input element
    var ageValue = parseInt(ageField.value); // Convert the value to integer for comparison
    var ageError = document.getElementById("ageError");
    ageError.innerHTML = "";
    if (ageValue <= 0 || isNaN(ageValue)) { // Check if age is a positive number and is a number
        ageError.innerHTML = "Age should be a positive number";
        return false;
    }
    return true;
}

function contactCheck() {
    var contact = document.getElementById('contact');
    var numbers = /^[0-9]+$/;
    var contact_len = contact.value.length; // Corrected variable name from 'ucontact' to 'contact'
    var contactError = document.getElementById("contactError"); // Corrected ID from 'ageError' to 'contactError'
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

function confirm_pass(confirmPassword, passid) {
    var confirmPasswordValue = confirmPassword.value;
    var confirmPassword = document.getElementById('confirmPassword');
    var passid = document.getElementById('password');
    var passidValue = passid.value;
    var ageError = document.getElementById("ageError");
    if (confirmPasswordValue !== passidValue) {
        alert('Passwords do not match');
        return false;
    }
    return true;
}

// function formValidation() {
//     var firstName = document.getElementById('user-input');
//     var uid = document.getElementById('username');
//     var firstName = document.getElementById('firstName');
//     var lastName = document.getElementById('lastName');
//     var placeOfBirth = document.getElementById('placeOfBirth');
//     var birthDate = document.getElementById('birthDate');
//     var age = document.getElementById('age');
//     var gender = document.getElementById('gender');
//     var contact = document.getElementById('contact');
//     var passid = document.getElementById('password');
//     var confirmPassword = document.getElementById('confirmPassword');
//     var captcha = document.getElementById('user-input');
    
//     if (ValidateEmail(uid)) {
//         if (userid_validation(uid, 1, Infinity)) {
//             if (allLetter(firstName)) {
//                 if (allLetter1(lastName)) {
//                     if (allLetter2(placeOfBirth)){
//                         if (ageCheck(age)) {
//                             if (contactCheck(contact)) {
//                                 if (passid_validation(passid, 1, Infinity)) {
//                                     if(confirm_pass(confirmPassword, passid)){
//                                         if (printmsg() != true){
//                                             window.location.reload();
//                                             return true;
//                                         }
//                                     }
//                                 }
//                             }
//                         }
//                     }    
//                 }
//             }
//         }
//     }
//     return false;
// }

// function userid_validation(uid, mx, my) {
//     var uid_len = uid.value.length;
//     if (uid_len == 0 || uid_len >= my || uid_len < mx) {
//         alert("User Id should not be empty / length be between " + mx + " to " + my);
//         uid.focus();
//         setcustomin
//         return false;
//     }
//     return true;
// }

// function passid_validation(passid, mx, my) {
//     var passid_len = passid.value.length;
//     if (passid_len == 0 || passid_len >= my || passid_len < mx) {
//         alert("Password should not be empty / length be between " + mx + " to " + my);
//         passid.focus();
//         return false;
//     }
//     return true;
// }

function confirm_pass(confirmPassword, passid) {
    var confirmPasswordValue = confirmPassword.value;
    var passidValue = passid.value;
    if (confirmPasswordValue !== passidValue) {
        alert('Passwords do not match');
        return false;
    }
    return true;
}





// function ValidateEmail(uemail) {
//     var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
//     if (uemail.value.match(mailformat)) {
//         return true;
//     } else {
//         alert("You have entered an invalid email address!");
//         uemail.focus();
//         return false;
//     }
// }





function generate() {

	// Clear old input
	document.getElementById("submit").value = "";

	// Access the element to store
	// the generated captcha
	captcha = document.getElementById("image");
	let uniquechar = "";

	const randomchar =
"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

	// Generate captcha for length of
	// 5 with random character
	for (let i = 1; i < 5; i++) {
		uniquechar += randomchar.charAt(
			Math.random() * randomchar.length)
	}

	// Store generated input
	captcha.innerHTML = uniquechar;
}

function printmsg() {
	const usr_input = document
		.getElementById("submit").value;

	// Check whether the input is equal
	// to generated captcha or not
	if (usr_input == captcha.innerHTML) {
		let s = document.getElementById("key")
			.innerHTML = "Matched";
            window.location.href = 'login.html';
		generate();
        return false;
	}
	else {
		let s = document.getElementById("key")
			.innerHTML = "not Matched";
            alert("Captcha does not match",window.location.href='register.html');
		generate();
        return true;
	}
}