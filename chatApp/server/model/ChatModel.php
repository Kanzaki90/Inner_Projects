<?php
include_once("BaseModel.php");
class ChatModel extends BaseModel
{
    private static $instance;

    // Singleton initialise the instance only once

    public static function getInstance()
    {
        if (!isset($instance)) {
            self::$instance = new ChatModel();
        }
        return self::$instance;
    }


    private function __construct()
    {
    }


    public function sendMessage(array $sendMessageData)
    {
        $connection = $this->getConnector();
        $timestamp = date("Y-m-d H:i:s");
        $chatMessageId = "";
        $i = round(microtime(true) * 1000);

        $sql = "select chat_message_id from chat where
                (from_user_id='" . $sendMessageData["from_user_id"] . "' and to_user_id='" . $sendMessageData["to_user_id"] . "')
                or
                (from_user_id='" . $sendMessageData["to_user_id"] . "' and to_user_id='" . $sendMessageData["from_user_id"] . "')";

        $result = $connection->query($sql);
        $dbData = $result->fetch_all(MYSQLI_ASSOC);



        if (empty($dbData))
            $chatMessageId = md5($sendMessageData["from_user_id"] . "salt" . $sendMessageData["to_user_id"] . $timestamp);
        else
            $chatMessageId = $dbData[0]["chat_message_id"];

        $sql = "insert into chat (chat_message_id, i, timestamp, data)
                values ('" . $chatMessageId . "', '" . $i . "' ,'" . $timestamp . "', '" . json_encode($sendMessageData) . "')";

        if ($connection->query($sql))
            return $chatMessageId;
        else
            return $connection->error;
    }



    public function getMessage(array $getMessageData)
    {
        $connection = $this->getConnector();

        //if there are no messages
        // if ($getMessageData["chat_message_id"] === "null")
        //     return "null";



        $sql = "select chat_message_id from chat where
                (from_user_id='" . $getMessageData["from_user_id"] . "' and to_user_id='" . $getMessageData["to_user_id"] . "')
                or
                (from_user_id='" . $getMessageData["to_user_id"] . "' and to_user_id='" . $getMessageData["from_user_id"] . "')";

        $result = $connection->query($sql);
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $result->free();

        if (empty($data)) {
            return "No messages";
            die();
        }


        $chatMessageId = $data[0]["chat_message_id"];


        $sql = "select timestamp, from_user_id, to_user_id, message from chat 
        where chat_message_id='" . $chatMessageId . "'
        order by timestamp asc";

        $result = $connection->query($sql);
        $data = $result->fetch_all(MYSQLI_ASSOC);

        print_r($data);
        die();

        $result->free();
        $connection->close();

        return $data;
    }
}
