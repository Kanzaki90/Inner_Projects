function rdr(url_to) {

    var qArray = window.location.search.split("&");
    let fn = qArray[1].split("=")[1];
    let ln = qArray[2].split("=")[1];

    if (url_to === "exit") {
        let url = "server/controllers/LoginController.php"
        let obj_to_send = {};
        obj_to_send["op"] = "logout";

        let x = decrypt(fn, ln);

        obj_to_send["firstname"] = x[0];
        obj_to_send["lastname"] = x[1];

        $.ajax({
            url: url,
            type: "post",
            data: obj_to_send,
            async: true,
            success: function (response) {
                window.location.href = "index.php";
            }
        });

    } else {
        url_to += ".html";
        window.location.href = "index.php?url=" + url_to + "&fn=" + fn + "&ln=" + ln + "";
    }

}
