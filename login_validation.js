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
                    window.location.reload();
                    return true;
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
