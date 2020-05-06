var firstName = "";
var lastName = "";

$(document).ready(function () {

    $("#initBtn").click(function () {
        retreiveData();
    });


    $(document).on('keypress', function (e) {
        if (e.which == 13) {
            retreiveData();
        }
    });

    function retreiveData() {
        firstName = document.getElementById("firstName").value;
        lastName = document.getElementById("lastName").value;
        let userInput = initLoginInputValidator(firstName, lastName);
        if (!userInput) {
            document.location.reload();
        } else {
            let obj = {};
            obj["firstName"] = firstName;
            obj["lastName"] = lastName;
            makeRequest(obj);
        }
    }

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
                if (dbResponse["code"] === "201") {
                    let url = dbResponse["redirectTo"];
                    let fn = dbResponse["firstname"];
                    let ln = dbResponse["lastname"];
                    let x = encrypt(fn, ln);
                    window.location.href = "http://localhost/lobby_project/index.php?url=" + url + "&fn=" + x[0] + "&ln=" + x[1] + "";
                    // window.location.href = "http://localhost/lobby_project/index.php?url=" + url +"&fn=" + fn + "&ln=" + ln +"";
                }

            }
        });
    }

});