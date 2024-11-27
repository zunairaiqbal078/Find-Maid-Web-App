function seterror(id, error) {
    element = document.getElementById(id);
    element.getElementsByClassName('formerror')[0].innerHTML = error;
}

function clearErrors() {
    errors = document.getElementsByClassName('formerror');
    for (let item of errors) {
        item.innerHTML = "";
    }
}

function validateForm() {
    var returnval = true;
    clearErrors();
    let name = document.forms['myform']["name"].value;
    if (name.length > 15) {
        seterror("fname", "*Name is too long");
        returnval = false;
    }
    let email = document.forms['myform']["email"].value;
    if (email.length > 30) {
        seterror("femail", "*Email is too long");
        returnval = false;
    }
    let password = document.forms['myform']["password"].value;
    if (password.length < 6) {
        seterror("fpassword", "*Password should be atleast 6 characters!");
        returnval = false;
    }
    let cpassword = document.forms['myform']["cpassword"].value;
    if (cpassword != password) {
        seterror("fcpassword", "*Password and Confirm password should match!");
        returnval = false;
    }

    return returnval;
}