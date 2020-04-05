var messageManagerModule = (function () {

    var globalOnlineUsers;
    var globalToUser;
    var globalFromUser;
    var globalMessage;
    function _beginChat(toUserId) {

        globalOnlineUsers = onlineInfoModule.serverData();

        globalFromUser = globalOnlineUsers["userId"];
        globalToUser = toUserId;

        console.log("----");
        _getLatestMessage(globalFromUser, globalToUser);
        console.log("----");

        $("#chatModal").modal("show");
        let modalTitle = document.getElementById("modalTitleSendToName");
        modalTitle.innerHTML = "Chatting with: " + globalOnlineUsers[toUserId];
    }

    function _sendMessage() {

        globalMessage = document.getElementById("modalMessageBody").value;
        _makeRequest("sendMessage");

    }

    function _getLatestMessage() {

        console.log("here");
        _makeRequest("getMessage");

    }

    function _getMessageHistory(data) {

        let fromUserId;
        let toUserId;
        let chatMessageId;
    }

    function _makeRequest(requestType, id = "") {

        let url = "http://127.0.0.1/chatApp/server/controller/ChatController.php"
        let obj_to_send = {};

        obj_to_send["fromUserId"] = globalFromUser;
        obj_to_send["toUserId"] = globalToUser;

        if (requestType === "sendMessage") {

            obj_to_send["op"] = "sendMessage";
            obj_to_send["message"] = globalMessage;
        } else
            if (requestType === "getMessage") {

                obj_to_send["op"] = "getMessage";
            }



        console.log(obj_to_send);

        $.ajax({
            url: url,
            type: "post",
            data: obj_to_send,
            async: true,
            success: function (response) {
                console.log(response);
            }
        });
    }

    return {
        beginChat: _beginChat,
        sendMessage: _sendMessage,
        getMessage: _getLatestMessage
    }

})();