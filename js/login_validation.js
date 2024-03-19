let captcha;
var firstName = document.getElementById('user-input');
function formValidation() {
    var uid = document.getElementById('username');
    var passid = document.getElementById('password');

    if (ValidateEmail(uid)) 
    {
        if (userid_validation(uid, 1, Infinity)) 
        {
           if (passid_validation(passid, 1, Infinity)) 
           {
                if(confirm_pass(confirmPassword, passid))
                {
                    if (printmsg() == true){
                        window.location.reload();
                        return true;
                    }
                }
            }
        }
                        
    }            
    return false;
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
function userid_validation(uid, mx, my) {
    var uid_len = uid.value.length;
    if (uid_len == 0 || uid_len >= my || uid_len < mx) {
        alert("User Id should not be empty / length be between " + mx + " to " + my);
        uid.focus();
        return false;
    }
    return true;
}

function passid_validation(passid, mx, my) {
    var passid_len = passid.value.length;
    if (passid_len == 0 || passid_len >= my || passid_len < mx) {
        alert("Password should not be empty / length be between " + mx + " to " + my);
        passid.focus();
        return false;
    }
    return true;
}


function ValidateEmail(uemail) {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (uemail.value.match(mailformat)) {
        return true;
    } else {
        alert("You have entered an invalid email address!");
        uemail.focus();
        return false;
    }
}
