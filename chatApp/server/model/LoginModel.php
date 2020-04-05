<?php
include_once("BaseModel.php");
class LoginModel extends BaseModel
{
    private static $instance;

    // Singleton initialise the instance only once

    public static function getInstance()
    {
        if (!isset($instance)) {
            self::$instance = new LoginModel();
        }
        return self::$instance;
    }

    private function __construct()
    {
    }


    public function userLogin(array $data)
    {
        $username = $data["username"];
        $password = $data["password"];

        $return_array = array();

        $user = $this->userIsExists($username);

        //Check if the username is in the system

        if ($user["value"] === "false") {

            $return_array = array();
            $return_array["code"] = "401";
            $return_array["message"] = "The user does not exist. Please register";
            return $return_array;
            die();
        }

        //Password match 

        if ($user["data"]["password"] != $password) {
            $return_array["code"] = "401";
            $return_array["message"] = "Wrong password";
            return $return_array;
            die();
        }

        //Update last_login 

        $userUpdate = $this->updateLoginTime($user);

        return $userUpdate;
    }


    public function getUserData(string $user_id)
    {
        $connection = $this->getConnector();
        $sql = "select * from login where user_id='" . $user_id . "' order by last_login desc limit 2";
        $result = $connection->query($sql);
        $data = $result->fetch_all(MYSQLI_ASSOC);
        if (empty($data))
            return "NO DATA";

        $return_array = array();
        $last_login = "";
        if (count($data) > 1)
            $last_login = $data[1]["last_login"];
        else
            $last_login = $data[0]["last_login"];

        if ($connection->query($sql)) {

            $return_array["code"] = "201";
            $return_array["user_id"] = $data[0]["user_id"];
            $return_array["last_login"] = $last_login;
            $return_array["email"] = $data[0]["email"];
            $return_array["username"] = $data[0]["username"];

            $result->free();
            $connection->close();

            return $return_array;
        } else {
            $return_array["code"] = "400";
            $return_array["message"] = $connection->error;

            $result->free();
            $connection->close();

            return $return_array;
        }
    }


    private function userIsExists($username): array
    {
        $connection = $this->getConnector();
        $sql = "select * from register where username='" . $username . "' limit 1";
        $result = $connection->query($sql);
        $data = $result->fetch_all(MYSQLI_ASSOC);

        $result->free();
        $connection->close();

        if (count($data) < 1)
            $return_array["value"] = "false";
        else {
            $return_array["value"] = "true";
            $return_array["data"] = $data[0];
        }

        return $return_array;
    }


    private function updateLoginTime($userData): array
    {
        $connection = $this->getConnector();

        $last_login = date("Y-m-d H:i:s");

        $sql = "insert into login 
        (user_id, last_login, data)
        values (
        '" . $userData["data"]["user_id"] . "',
        '" . $last_login . "',
        " . json_encode($userData["data"]["data"]) . "
        )";


        if (!$connection->query($sql))
            die($connection->error);
        else {

            $return_array["code"] = "201";
            $return_array["user_id"] = $userData["data"]["user_id"];
            $connection->close();

            return $return_array;
        }
    }
}
