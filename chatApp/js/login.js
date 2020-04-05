$(document).ready(function () {

    $("#login_submit").click(function () {


        let result = onLoginInputValidation();

        if (result === false) {
            alert("Some of the data is missing");
            return "";
        } else makeLoginRequest(result);

    });

});



function makeLoginRequest(obj_to_send) {

    let url = "http://127.0.0.1/chatApp/server/controller/LoginController.php"
    obj_to_send["op"] = "login";

    console.log("Inside login");
    console.log(obj_to_send);

    $.ajax({
        url: url,
        type: "post",
        data: obj_to_send,
        async: true,
        success: function (response) {

            let serverResponse = JSON.parse(response);
            console.log(response);

            if (serverResponse.code == "401")
                loginFail(serverResponse);
            else
                loginSuccsess(serverResponse);
        }
    });
}



function loginFail(serverResponse) {
    alert("Code: " + serverResponse.code + "  " + serverResponse.message);
    return "";
}



function loginSuccsess(serverResponse) {
    console.log("loginSucces");
    console.log(serverResponse);
    window.location.href = "http://localhost/chatApp/index.php?url=userMainPage&uid=" + serverResponse.user_id + "";

}

// Logout
$(document).ready(function () {

    $("#logout_submit").click(function () {

        let uid = window.document.location.search.split("&")[1].split("=")[1];

        let url = "http://127.0.0.1/chatApp/server/controller/LoginController.php"
        let obj_to_send = {};
        obj_to_send["op"] = "logout";
        obj_to_send["user_id"] = uid;

        console.log("Inside logout");
        console.log(obj_to_send);

        $.ajax({
            url: url,
            type: "post",
            data: obj_to_send,
            async: true,
            success: function (response) {
                window.location.replace("http://localhost/chatApp/");
            }
        });

    });

});


