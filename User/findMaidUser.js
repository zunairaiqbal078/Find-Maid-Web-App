function clearErrors() {
    errors = document.getElementsByClassName('error');
    for (let item of errors) {
        item.innerHTML = "";
    }
}
function validateSignUpForm() {
    var returnval = true;
    clearErrors();
    let suName = document.forms['myForm']["name"].value; 
    if (suName.length > 25) {
        document.getElementsByClassName("nameError")[0].innerHTML = "*Name is too long";
        returnval = false;
    }
    let suEmail = document.forms['myForm']["email"].value; 
    if (suEmail.length > 30) {
        document.getElementsByClassName("emailError")[0].innerHTML = "*Email is too long";
        returnval = false;
    }
    let supassword = document.forms['myForm']["password"].value; 
    if (supassword.length < 8) {
        document.getElementsByClassName("passwordError")[0].innerHTML = "*Password should be atleast 8 characters!";
        returnval = false;
    }
    let suCpassword = document.forms['myForm']["cpassword"].value; 
    if (suCpassword != supassword) {
        document.getElementsByClassName("cpasswordError")[0].innerHTML = "*Confirm password should match!";
        returnval = false;
    }
    return returnval;
}