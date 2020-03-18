<?php
class InsertController
{

    public function insert($i_data)
    {
        $current_date_time = date("Y-m-d H:i:s");

        $connection = new mysqli("localhost", "root", "", "user_schema");

        $firstname = $i_data["first_name"] === "" ? NULL : $i_data["first_name"];
        $lastname = $i_data["last_name"] === "" ? NULL : $i_data["last_name"];
        $email = $i_data["email"] === "" ? NULL : $i_data["email"];
        $password = $i_data["password"];


        $sql = "insert into users (registered, firstname, lastname, email, password)
                values(
                '" . $current_date_time . "',
                '" . $firstname . "', 
                '" . $lastname . "',
                '" . $email . "',
                '" . $password . "'
                )";

        if ($connection->query($sql) === TRUE)
            echo json_encode("200 - Insertion Success");
        else
            echo json_encode("400 - Insertion Failed");

        $connection->close();

        die();
    }
}
