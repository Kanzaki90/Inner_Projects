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

        $sql = "insert into chat (
                chat_message_id, 
                i, 
                timestamp, 
                data)

                values (
                '" . $chatMessageId . "', 
                '" . $i . "' ,
                '" . $timestamp . "', 
                '" . json_encode($sendMessageData) . "')";

        if ($connection->query($sql))
            return $chatMessageId;
        else
            return $connection->error;
    }


    public function getMessage(array $getMessageData)
    {
        $connection = $this->getConnector();

        $sql = "select chat_message_id from chat where
                (from_user_id='" . $getMessageData["from_user_id"] . "' and to_user_id='" . $getMessageData["to_user_id"] . "')
                or
                (from_user_id='" . $getMessageData["to_user_id"] . "' and to_user_id='" . $getMessageData["from_user_id"] . "')";

        $result = $connection->query($sql);
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $result->free();

        if (empty($data)) {
            return "No messages yet";
            die();
        }


        $chatMessageId = $data[0]["chat_message_id"];

        $sql = "select ch.timestamp as sent,
        reg.username as from_user, reg2.username as to_user, ch.message
        from chat ch
        left join register reg on reg.user_id = ch.from_user_id
        left join register reg2 on reg2.user_id = ch.to_user_id
        where chat_message_id='" . $chatMessageId . "'
        order by timestamp asc";

        $result = $connection->query($sql);
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $result->free();
        $connection->close();

        return $data;
    }

    public function getLatestMessage(array $latestMessageData){

        $connection = $this->getConnector();

        $sql = "select ch.timestamp as sent,
        reg.username as from_user, reg2.username as to_user, ch.message
        from chat ch
        left join register reg on reg.user_id = ch.from_user_id
        left join register reg2 on reg2.user_id = ch.to_user_id
        (from_user_id='" . $latestMessageData["to_user_id"] . "' 
        and 
        to_user_id='" . $latestMessageData["from_user_id"] . "')
        and ch.timestamp > '" . $latestMessageData["sent"] ."'
        order by timestamp asc";
    }
}
