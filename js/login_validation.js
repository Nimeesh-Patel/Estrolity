let captcha;

// Function to validate email format
function validateEmail(email) {
    const re = /\S+@\S+\.\S+/;
    return re.test(email);
}

// Function to perform onBlur validation for email field
function validateEmailField() {
    const emailInput = document.getElementById("username");
    const emailValue = emailInput.value.trim();
    const emailError = document.getElementById("emailError");

    if (emailValue === "") {
        emailError.textContent = "Email is required";
        return false;
    } else {
        emailError.textContent = "";
    }

    if (!validateEmail(emailValue)) {
        emailError.textContent = "Please enter a valid email address";
        return false;
    } else {
        emailError.textContent = "";
    }

    return true;
}

// Function to validate password field
function validatePasswordField() {
    const passwordInput = document.getElementById("password");
    const passwordValue = passwordInput.value.trim();
    const passwordError = document.getElementById("passwordError");

    if (passwordValue === "") {
        passwordError.textContent = "Password is required";
        return false;
    } else {
        passwordError.textContent = "";
    }

    return true;
}

// Function to validate captcha field
function validateCaptchaField() {
    const captchaInput = document.getElementById("submit");
    const captchaValue = captchaInput.value.trim();
    const captchaError = document.getElementById("captchaError");
    const generatedCaptcha = captcha.innerHTML;

    if (captchaValue === "") {
        captchaError.textContent = "Captcha is required";
        return false;
    } else {
        captchaError.textContent = "";
    }

    if (captchaValue !== generatedCaptcha) {
        captchaError.textContent = "Captcha does not match";
        return false;
    } else {
        captchaError.textContent = "";
    }

    return true;
}

// Function to perform overall form validation before submission
function formValidation() {
    return validateEmailField() && validatePasswordField() && validateCaptchaField();
}

// Function to generate captcha
// function generate() {
//     // Clear old input
//     document.getElementById("submit").value = "";

//     // Access the element to store the generated captcha
//     captcha = document.getElementById("image");
//     let uniquechar = "";

//     const randomchar = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

//     // Generate captcha for length of 5 with random character
//     for (let i = 1; i < 5; i++) {
//         uniquechar += randomchar.charAt(Math.random() * randomchar.length);
//     }

//     // Store generated input
//     captcha.innerHTML = uniquechar;
// }

// let captcha;
// var firstName = document.getElementById('user-input');
// function formValidation() {
//     var uid = document.getElementById('username');
//     var passid = document.getElementById('password');

//     if (ValidateEmail(uid)) 
//     {
//         if (userid_validation(uid, 1, Infinity)) 
//         {
//            if (passid_validation(passid, 1, Infinity)) 
//            {
//                 if(confirm_pass(confirmPassword, passid))
//                 {
//                     if (printmsg() == true){
//                         window.location.reload();
//                         return true;
//                     }
//                 }
//             }
//         }
                        
//     }            
//     return false;
// }

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
	}
	else {
		let s = document.getElementById("key")
			.innerHTML = "not Matched";
            alert("Captcha does not match",window.location.href='register.html');
		generate();
        return false;
	}
}
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



    
// function userid_validation(uid, mx, my) {
//     var uid_len = uid.value.length;
//     if (uid_len == 0 || uid_len >= my || uid_len < mx) {
//         alert("User Id should not be empty / length be between " + mx + " to " + my);
//         uid.focus();
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
function validateEmail(email) {
    const re = /\S+@\S+\.\S+/;
    return re.test(email);
}

function validateEmailField() {
    const emailInput = document.getElementById("username");
    const emailValue = emailInput.value.trim();
    const emailError = document.getElementById("emailError");

    if (emailValue === "") {
        emailError.textContent = "Email is required";
        return false;
    } else {
        emailError.textContent = "";
    }

    if (!validateEmail(emailValue)) {
        emailError.textContent = "Please enter a valid email address";
        return false;
    } else {
        emailError.textContent = "";
    }

    return true;
}
function validatePasswordField() {
    const passwordInput = document.getElementById("password");
    const passwordValue = passwordInput.value.trim();
    const passwordError = document.getElementById("passwordError");

    if (passwordValue === "") {
        passwordError.textContent = "Password is required";
        return false;
    } else {
        passwordError.textContent = "";
    }

    return true;
}

// Function to perform overall form validation before submission
function formValidation() {
    return validateEmailField() && validatePasswordField();
}
