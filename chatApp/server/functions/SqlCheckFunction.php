<?php
include_once("../model/BaseModel.php");

class SqlCheckFunction
{
    // Check user existance on registartion

    public function isExistsOnRegister(array $data): array
    {
        $db = new BaseModel();
        $connection = $db->connection;

        $username = $data["username"];
        $email = $data["email"];

        $sql = "select * from register 
        where email= '" . $email . "' or username= '" . $username . "'";

        $result = $connection->query($sql);

        $db_data = $result->fetch_all(MYSQLI_ASSOC);

        $result->free_result();
        $connection->close();

        $return_array = array(
            "value" => intval(1),
            "message" => "NULL"
        );


        if (isset($db_data) || count($db_data) != 0) {

            if (isset($db_data["email"])) {

                $return_array["value"] = intval(1);
                $return_array["message"] = "This email is already Exists";
            } else if (isset($db_data["username"])) {

                $return_array["value"] = intval(1);
                $return_array["message"] = "This username is already Exists";
            }
        }

        return $return_array;


        die();
    }

    // public function isExistsOnLogin(array $data) : array{

    // }
}
