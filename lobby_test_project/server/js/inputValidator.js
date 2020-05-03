function initLoginInputValidator(firstName, lastName) {
    if (firstName === "" || lastName === "") {
        if (firstName === "") {
            alert("First Name is Missing!");
            return false;
        }

        if (lastName === "") {
            alert("Last Name is Missing!");
            return false;
        }
    }
    return true;
}