function formValidation() {
    var uid = document.register.username;
    var firstName = document.register.firstName;
    var lastName = document.register.lastName;
    var placeOfBirth = document.register.placeOfBirth;
    var birthDate = document.register.birthDate;
    var age = document.register.age;
    var gender = document.register.gender;
    var contact = document.register.contact;
    var passid = document.register.password;
    var confirmPassword = document.register.confirmPassword;

    if (userid_validation(uid, 1, Infinity)) {
        if (passid_validation(passid, 1, Infinity)) {
            if (allLetter(firstName)) {
                if (allLetter(lastName)) {
                    if (allLetter(placeOfBirth)){
                        if (allnumeric(contact)) {
                            if (ValidateEmail(uid)) {
                                if(confirm_pass(confirmPassword, passid)){
                                    window.location.reload();
                                    return true;
                                }
                            }
                        }
                    }    
                }
            }
        }
    }
    return false;
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

function confirm_pass(confirmPassword, passid) {
    var confirmPasswordValue = confirmPassword.value;
    var passidValue = passid.value;
    if (confirmPasswordValue !== passidValue) {
        alert('Passwords do not match');
        return false;
    }
    return true;
}

function allLetter(uname) {
    var letters = /^[A-Za-z]+$/;
    if (uname.value.match(letters)) {
        return true;
    } else {
        alert('Username must have alphabet characters only');
        uname.focus();
        return false;
    }
}


function allnumeric(uzip) {
    var numbers = /^[0-9]+$/;
    if (uzip.value.match(numbers)) {
        return true;
    } else {
        alert('ZIP code must have numeric characters only');
        uzip.focus();
        return false;
    }
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
