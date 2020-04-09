function onRegisterInputValidation() {
    
    console.log("inside onRegisterInputValidation");
    let email = document.getElementById("email");
    let username = document.getElementById("username");
    let password = document.getElementById("password");

    let obj = {};

    if (email.value === "" || username.value === "" || password.value === "")
        return false;
    else {
        obj["email"] = email.value;
        obj["username"] = username.value;
        obj["password"] = password.value;

        return obj;
    };

}

function onLoginInputValidation() {
    console.log("Inside onLoginInputValidation"); 
    let username = document.getElementById("login_username");
    let password = document.getElementById("login_password");

    let obj = {};

    if (username.value === "" || password.value === "")
        return false;
    else {
        obj["username"] = username.value;
        obj["password"] = password.value;

        return obj;
    };
}