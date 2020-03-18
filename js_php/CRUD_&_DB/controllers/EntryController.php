<?php

class EntryController
{

    public function viewEntry()
    {
        $connection = new mysqli("localhost", "root", "", "user_schema");

        $sql = "select * from users";

        $result = $connection->query($sql);
        $data = $result->fetch_all(MYSQLI_ASSOC);

        $result->free_result();

        echo json_encode($data);

        $connection->close();

        die();
    }
}
