<?php
include_once("BaseModel.php");
include_once("../model/BaseModel.php");
include_once("../functions/SqlCheckFunction.php");

class RegisterModel extends BaseModel
{
    public static $instance;

    // Singleton initialise the instance only once

    public static function getInstance()
    {
        if (!isset(RegisterModel::$instance)) {
            self::$instance = new RegisterModel();
        }
        return RegisterModel::$instance;
    }

    private function __construct()
    {
    }

    // User registartion method

    public function userRegister($data)
    {

        $email = $data["email"];
        $registered_at = date("Y-m-d H:i:s");
        $username = $data["username"];
        $password = $data["password"];
        $user_id = md5($email . $registered_at . $username . $password . time());

        $isExistsArray = array(
            "email" => $email,
            "username" => $username
        );

        $isExists = $this->isExistsOnRegister($isExistsArray);

        if (intval($isExists["value"]) === 1) {
            echo json_encode($isExists);
            die();
        }

        $connection = $this->getConnector();

        $sql = "insert into register (user_id, username, registered_at, data)
                values (
                '" . $user_id . "',
                '" . $username . "',
                '" . $registered_at . "',
                '" . json_encode($data) . "')";



        $return_array = array(
            "code" => "",
            "message" => ""
        );


        if ($connection->query($sql) === TRUE) {

            $return_array["code"] = "201";
            $return_array["message"] = "Register Success";
            $return_array["user_id"] = $user_id;

            // $file = fopen("test.txt", "w", "../server/controller");
            // $text = "hello " .$user_id;
            // fwrite($file, $text);
            // fclose($file);

            return $return_array;
        } else {

            $return_array["code"] = "400";
            $return_array["message"] = $connection->error;
            return $return_array;
        }

        $connection->close();

        die();
    }


    // Check user existance on registartion

    private function isExistsOnRegister($data): array
    {
        $connection = $this->getConnector();

        $username = $data["username"];
        $email = $data["email"];

        $sql = "select * from register 
            where email= '" . $email . "' or username= '" . $username . "'";

        $result = $connection->query($sql);

        $db_data = $result->fetch_all(MYSQLI_ASSOC);

        $result->free_result();
        $connection->close();

        $return_array = array(
            "value" => "",
            "message" => ""
        );


        if (isset($db_data) || count($db_data) != 0) {

            if (isset($db_data[0]["email"]) && $db_data[0]["email"] === $email) {

                $return_array["value"] = intval(1);
                $return_array["message"] = "This email is already in our system";
                return $return_array;
            } else if (isset($db_data[0]["username"]) && $db_data[0]["username"] === $username) {

                $return_array["value"] = intval(1);
                $return_array["message"] = "Username already in use";
                return $return_array;
            } else {

                $return_array["value"] = intval(0);
                return $return_array;
            }
        }

        die();
    }
}
