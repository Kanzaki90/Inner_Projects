var tableBuilderModule = (function () {

    function _tableBuilder(i_data) {

        var body = document.querySelector("#onlineUsersBody");

        for (let i = 0; i < i_data.length; i++) {

            let tr = document.createElement("tr");

            let td = _tdCreator();
            td.innerHTML = i_data[i]["username"];
            tr.appendChild(td);

            td = _tdCreator();
            td.innerHTML = "Active";
            tr.appendChild(td);

            td = _tdCreator();
            let btn = document.createElement("button");
            btn.setAttribute("id", i_data[i]["user_id"]);
            btn.setAttribute("class", "btn-primary");
            btn.setAttribute("data-target", "#chatModal");
            // btn.setAttribute("onclick", "beginChat(this.id);");
            btn.setAttribute("onclick", "messageManagerModule.beginChat(this.id)")
            btn.innerText = "Chat now!";
            td.appendChild(btn);
            tr.appendChild(td);

            body.appendChild(tr);
        }
    }

    function _tdCreator() {
        let td = document.createElement("td");
        return td;
    }

    function _userDataFiller(userData) {
        let userName = userData.username;
        let lastLogin = userData.last_login;

        document.getElementById("userName").innerHTML = "Hello " + userName + "!";
        document.getElementById("lastVisit").innerHTML = "Your last visit was on " + lastLogin + "";

    }

    return {
        tableBuilder: _tableBuilder,
        userDataFiller: _userDataFiller
    };
})();
