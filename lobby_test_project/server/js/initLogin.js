$(document).ready(function () {

    $("#initBtn").click(function () {
        let firstName = document.getElementById("firstName").value;
        let lastName = document.getElementById("lastName").value;
        let userInput = initLoginInputValidator(firstName, lastName);
        if (!userInput) {
            document.location.reload();
        } else {
            let obj = {};
            obj["firstName"] = firstName;
            obj["lastName"] = lastName;
            makeRequest(obj);
        }
    });

    function makeRequest(obj_to_send) {

        let url = "server/controllers/LoginController.php"
        obj_to_send["op"] = "initLogin";

        $.ajax({
            url: url,
            type: "post",
            data: obj_to_send,
            async: true,
            success: function (response) {
                let dbResponse = JSON.parse(response);
                console.log(dbResponse);
                if(dbResponse["code"] === "201"){
                    let url = dbResponse["redirectTo"];
                    window.location.href = "http://localhost/lobby_project/index.php?url=" + url +"";
                }
                
            }
        });
    }

});