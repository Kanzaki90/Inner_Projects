var onlineInfoModule = (function () {

    var _serverData = {};
    $(document).ready(function () {

        // receive current user info
        // receive all online user names and id

        let uid = window.document.location.search.split("&")[1].split("=")[1];
        _serverData["userId"] = uid;

        let url = "http://127.0.0.1/chatApp/server/controller/LoginController.php"
        let obj_to_send = {};
        obj_to_send["op"] = "getData";
        obj_to_send["user_id"] = uid;
        $.ajax({
            url: url,
            type: "post",
            data: obj_to_send,
            async: true,
            success: function (response) {
                let data = JSON.parse(response);
                let onlineUsers = data.onlineUsers;
                let userInfo = data.userInfo;

                for (var i = 0; i < onlineUsers.length; i++) {
                    _serverData[onlineUsers[i].user_id] = onlineUsers[i].username;
                }

                tableBuilderModule.userDataFiller(userInfo);
                tableBuilderModule.tableBuilder(onlineUsers);
            }
        });
    });


    function _getServerData() {
        return _serverData;
    }

    return {
        serverData: _getServerData
    };

})();

