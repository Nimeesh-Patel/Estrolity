function formValidation() {
    var uid = document.getElementById('email');
    var firstName = document.getElementById('feedback');

    if (ValidateEmail(uid)) {
        if (userid_validation(firstName, 1, Infinity)) {
            window.location.reload();
            return true;
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
