<?php
include_once("BaseModel.php");
class UserOnlineModel extends BaseModel
{

    private static $instance;

    private function __construct()
    {
    }

    public static function getInstance()
    {

        if (!isset($instance)) {
            self::$instance = new UserOnlineModel();
        }
        return self::$instance;
    }

    public function setOnline($user_id)
    {
        $connection = $this->getConnector();
        $sql = "select * from online_users where user_id= '" . $user_id . "'";
        $result = $connection->query($sql);
        $data = $result->fetch_all(MYSQLI_ASSOC);

        if (count($data) == 0) {
            $sql = "insert into online_users (user_id, status)
                    values ('" . $user_id . "', " . 1 . ")";
            $connection->query($sql);
            $connection->close();
        } else {
            $sql = "update online_users set status=" . 1 . " where user_id='" . $user_id . "'";
            $connection->query($sql);
            $connection->close();
        }
    }


    public function setOffline($user_id)
    {
        $connection = $this->getConnector();
        $sql = "update online_users set status=" . 0 . " where user_id='" . $user_id . "'";
        $connection->query($sql);
        $connection->close();
        echo json_encode("logout");
        die();
    }

    public function viewOnlineUsers($user_id)
    {
        $connection = $this->getConnector();

        // $sql = "select * from online_users where user_id != '" . $user_id . "' and status= " . 1 . "";

        $sql = "select os.user_id, reg.username
                from online_users os
                left join register reg on os.user_id = reg.user_id
                where reg.user_id != '" . $user_id . "'
                and os.status=" . 1 . "";

        $result = $connection->query($sql);
        $data = $result->fetch_all(MYSQLI_ASSOC);

        $result->free();
        $connection->close();

        return $data;
    }
}
