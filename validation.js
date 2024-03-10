function formValidation() {
    var uid = document.getElementById('username');
    var firstName = document.getElementById('firstName');
    var lastName = document.getElementById('lastName');
    var placeOfBirth = document.getElementById('placeOfBirth');
    var birthDate = document.getElementById('birthDate');
    var age = document.getElementById('age');
    var gender = document.getElementById('gender');
    var contact = document.getElementById('contact');
    var passid = document.getElementById('password');
    var confirmPassword = document.getElementById('confirmPassword');

    if (userid_validation(uid, 1, Infinity)) {
        if (passid_validation(passid, 1, Infinity)) {
            if (allLetter(firstName)) {
                if (allLetter1(lastName)) {
                    if (allLetter2(placeOfBirth)){
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
        alert('First Name must have alphabet characters only');
        uname.focus();
        return false;
    }
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


function allnumeric(uzip) {
    var numbers = /^[0-9]+$/;
    if (uzip.value.match(numbers)) {
        return true;
    } else {
        alert('Contact Number must have numeric characters only');
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
