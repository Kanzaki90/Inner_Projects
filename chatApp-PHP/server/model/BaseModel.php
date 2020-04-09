<?php

class BaseModel
{
    public function getConnector()
    {
        return $connection = new mysqli("localhost", "root", "", "chat_schema");
    }
}
