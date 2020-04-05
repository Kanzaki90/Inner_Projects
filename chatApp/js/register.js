$(document).ready(function () {

    $("#register_submit").click(function () {

        let result = onRegisterInputValidation();

        if (result === false) {
            alert("Some of the data is missing");
            return "";
        } else makeRegsiterRequest(result);

    });

    function makeRegsiterRequest(obj_to_send) {

        console.log("Inside register");


        let url = "http://127.0.0.1/chatApp/server/controller/RegisterController.php"
        obj_to_send["op"] = "register";

        $.ajax({
            url: url,
            type: "post",
            data: obj_to_send,
            async: true,
            success: function (response) {
                console.log("Register - response from server");
                console.log(response);
                makeLoginRequest(obj_to_send);

            }
        });
    }

});

