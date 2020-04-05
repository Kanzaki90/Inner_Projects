<?php
header('Access-Control-Allow-Origin: *');
include_once("../model/ChatModel.php");

if (isset($_POST)) {

    $chatInstance = ChatModel::getInstance();

    if (isset($_POST["op"])) {

        if ($_POST["op"] === "sendMessage") {

            $messageToSendData = array(
                "from_user_id" => $_POST["fromUserId"],
                "to_user_id" => $_POST["toUserId"],
                "message" => $_POST["message"]
            );


            // receive chat_message_id
            $messageSender = $chatInstance->sendMessage($messageToSendData);
            echo json_encode($messageSender);
            die();
        }




        if ($_POST["op"] === "getMessage") {

            $chat_message_id = "";

            $getMessageData = array(
                "from_user_id" => $_POST["fromUserId"],
                "to_user_id" => $_POST["toUserId"]
            );

            if (isset($_POST["chatMessageId"])) {
                $getMessageData["chat_message_id"] = $chat_message_id;
            }
            
            $messageReceiver = $chatInstance->getMessage($getMessageData);
            echo json_encode($messageReceiver);
            die();
        }
    }
}
