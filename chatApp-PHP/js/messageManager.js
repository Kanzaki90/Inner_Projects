var messageManagerModule = (function () {

    var _globalCurrentUserId;
    var _globalOnlineUsers;
    var _globalFromUser;
    var _globalToUser;
    var _globalMessage;
    var _globalLastSent;
    var _globalModalIsOpen = false;
    var myVar;
    function _isModalOpen() {
        return _globalModalIsOpen;
    }


    function _beginChat(i_toUserId) {
        // response from login table
        _globalOnlineUsers = onlineInfoModule.serverData();
        _globalCurrentUserId = _globalOnlineUsers["userId"];
        _globalFromUser = _globalOnlineUsers["userId"];
        _globalToUser = i_toUserId;

        // Modal Handler
        _globalModalIsOpen = true;
        $("#chatModal").modal("show");
        let modalTitle = document.getElementById("modalTitleSendToName");
        modalTitle.innerHTML = "Chatting with: " + _globalOnlineUsers[_globalToUser];
        _getMessageHistory();
        myVar = setInterval(_getMessageHistory, 5000);

    }

    function _endChat() {
        _globalModalIsOpen = false;
        clearInterval(myVar);
        $("#chatModal").modal("hide");
    }

    function _getMessageHistory() {
        if (_isModalOpen)
            _makeRequest("getMessageHistory");
        else
            clearInterval(myVar);
    }

    function _sendMessage() {
        let localMessage = document.getElementById("modalUserInputBody");
        _globalMessage = localMessage.value.replace(/\n/g, " ");
        localMessage.value = " ";
        _makeRequest("sendMessage");
    }

    function _makeRequest(i_requestName) {

        let url = "http://127.0.0.1/chatApp/server/controller/ChatController.php"
        let obj_to_send = {};

        obj_to_send["fromUserId"] = _globalFromUser;
        obj_to_send["toUserId"] = _globalToUser;

        if (i_requestName === "getMessageHistory")
            obj_to_send["op"] = i_requestName;
        else if (i_requestName === "sendMessage") {
            obj_to_send["op"] = i_requestName;
            obj_to_send["message"] = _globalMessage;
        }

        $.ajax({
            url: url,
            type: "post",
            data: obj_to_send,
            async: true,
            success: function (response) {
                let dbResponse = JSON.parse(response);
                if (obj_to_send["op"] === "getMessageHistory")
                    _messageBoxFiller(dbResponse);
                else if (obj_to_send["op"] === "sendMessage") {
                    _getMessageHistory();
                }
            }
        });
    }

    function _messageBoxFiller(i_data) {

        let modalMessageBody = document.getElementById("modalMessageBody");
        modalMessageBody.innerHTML = "";
        let messageString = "";

        if (i_data !== "No messages yet") {

            _globalLastSent = i_data[i_data.length - 1]["sent"];

            for (let i = 0; i < i_data.length; i++) {
                messageString += i_data[i]["sent"] + "\n" +
                    i_data[i]["from_user"] + ": " + "\n" +
                    i_data[i]["message"] + "\n\n";
                modalMessageBody.append(messageString);
                messageString = "";
            }
        } else {
            messageString = i_data;
            modalMessageBody.append(messageString);
            messageString = "";
        }
    }

    return {
        beginChat: _beginChat,
        sendMessage: _sendMessage,
        endChat: _endChat,
        getMessageHistory: _getMessageHistory
    }


})();