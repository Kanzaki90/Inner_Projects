<?php
class BaseModel
{
    public function getConnector()
    {
        // return $connection = new mysqli("127.0.0.1", "root", "", "lobby_schema", 3306);
        return $connection = new mysqli("localhost", "root", "", "lobby_schema");
    }
}
