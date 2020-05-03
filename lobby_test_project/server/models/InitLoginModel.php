<?php
include_once("BaseModel.php");
class InitLoginModel extends BaseModel
{

    private static $instance;
    // Singleton initialise the instance only once
    public static function getInstance()
    {
        if (!isset($instance)) {
            self::$instance = new InitLoginModel();
        }
        return self::$instance;
    }


    private function __construct()
    {
    }




    public function userLogin(array $userData)
    {

        $connection = $this->getConnector();
        $currenrDateTime = date("Y-m-d H:i:s");
        $user = $this->isLoggedIn($userData);
        $connection = $this->getConnector();
        $data = array();
        $return_array = array();

        $data["login_time"] = $currenrDateTime;
        $sql = "";

        if ($user === false) {
            $sql = "insert into lobbylogin (firstname, lastname, data)
                    values ('" . $userData["firstname"] . "', '" . $userData["lastname"] . "', '" . json_encode($data) . "')";
        } else {
            $sql = "update lobbylogin 
            set data= '" . json_encode($data) . "'
            where firstname= '" . $userData["firstname"] . "'
            and lastname= '" . $userData["lastname"] . "'";
        }

        if (!$connection->query($sql))
            die($connection->error);
        else {
            $return_array["code"] = "201";
            $return_array["firstName"] = $userData["firstname"];
            $return_array["lastName"] = $userData["lastname"];
            $connection->close();
            return $return_array;

            $sql = "update lobbylogin 
            set (data= '" . json_encode($data) . "')
            where firstname= '" . $userData["firstname"] . "'
            and lastname= '" . $userData["lastname"] . "";
        }
    }

    public function pullData()
    {
        $connection = $this->getConnector();
        $sql = "select * from lobbylogin order by login_time desc";
        $result = $connection->query($sql);
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $result->free();
        $connection->close();
        return $data;
    }


    public function userLogout(array $userData)
    {
        $connection = $this->getConnector();
        $currenrDateTime = date("Y-m-d H:i:s");
        $connection = $this->getConnector();
        $data = array();

        $data["logout_time"] = $currenrDateTime;
        $sql = "update lobbylogin 
        set (data= '" . json_encode($data) . "')
        where firstname= '" . $userData["firstname"] . "'
        and lastname= '" . $userData["lastname"] . "";

        if (!$connection->query($sql))
            die($connection->error);
        else
            die("200");
    }

    public function updateRoomEntrance(array $data)
    {
    }

    private function isLoggedIn(array $data): bool
    {
        $connection = $this->getConnector();
        $sql = "select * from lobbylogin where firstname= '" . $data["firstname"] . "'
                and lastname= '" . $data["lastname"] . "'";

        $result = $connection->query($sql);
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $result->free();
        $connection->close();

        if (count($data) === 0)
            return false;
        else
            return true;
    }
}
