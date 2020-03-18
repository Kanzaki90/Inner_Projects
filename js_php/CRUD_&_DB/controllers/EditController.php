<?php

class EditController
{
    public function edit($i_data)
    {
        $connection = new mysqli("localhost", "root", "", "user_schema");

        if ($connection->connect_errno) {
            echo "Failed to connect to MySQL: " . $connection->connect_error;
            exit();
        }

        $registered = $i_data["registered"] === "" ? NULL : $i_data["registered"];
        $firstname = $i_data["firstname"] === "" ? NULL : $i_data["firstname"];
        $lastname = $i_data["lastname"] === "" ? NULL : $i_data["lastname"];
        $email = $i_data["email"] === "" ? NULL : $i_data["email"];
        $password = $i_data["password"];
        $edited = date("Y-m-d H:i:s");

        $sql = "update users set
                firstname = '" . $firstname . "', 
                lastname = '" . $lastname . "', 
                email = '" . $email . "', 
                password = '" . $password . "', 
                edited = '" . $edited . "' 
                where registered = '" . $registered . "'";

        // echo $sql;
        // die();

        if ($connection->query($sql))
            echo json_encode("200 - Edit Success");
        else
            echo json_encode("400 - Edit Failed");

        $connection->close();
        die();
    }
}
