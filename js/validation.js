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

function allLetter() {
    var firstName = document.getElementById('firstName');
    var letters = /^[A-Za-z]+$/;
    var firstNameError = document.getElementById("emailError");
    firstNameError.innerHTML = "";
    if (firstName.value.match(letters)) {
        return true;
    } else {
        alert('First Name must have alphabet characters only');
        // firstName.focus();
        firstNameError.innerHTML = "First Name should be all alphabets only!";
        return false;
    }
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



function allLetter1(uname) {
    var letters = /^[A-Za-z]+$/;
    if (uname.value.match(letters)) {
        return true;
    } else {
        alert('Last Name must have alphabet characters only');
        uname.focus();
        return false;
    }
}

function allLetter2(uname) {
    var letters = /^[A-Za-z]+$/;
    if (uname.value.match(letters)) {
        return true;
    } else {
        alert('Place of birth must have alphabet characters only');
        uname.focus();
        return false;
    }
}

function contactCheck(ucontact) {
    var numbers = /^[0-9]+$/;
    var contact_len = ucontact.value.length;
    if (ucontact.value.match(numbers)) {
        if (contact_len != 10) {
            alert("Contact should have 10 numbers!");
            ucontact.focus();
            return false;
        }
        return true;
    } else {
        alert('Contact Number must have numeric characters only');
        ucontact.focus();
        return false;
    }
}

function ageCheck(ageField) {
    var ageValue = parseInt(ageField.value); // Convert the value to integer for comparison
    if (ageValue <= 0 || isNaN(ageValue)) { // Check if age is a positive number and is a number
        alert('Age should be a positive number!');
        ageField.focus();
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