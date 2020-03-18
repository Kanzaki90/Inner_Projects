<?php

class DeleteController
{
    public function delete($i_data)
    {
        $connection = new mysqli("localhost", "root", "", "user_schema");

        if ($connection->connect_errno) {
            echo "Failed to connect to MySQL: " . $connection->connect_error;
            exit();
        }

        $sql = "delete from users where registered = '" . $i_data["registered"] . "' ";

        if ($connection->query($sql) === TRUE)
            echo "200 - Deletion Success";
        else
            echo "400 - Deleteion Failed";

        $connection->close();
    }
}
