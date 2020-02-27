<?php

class SendSMS
{

    public function store_sms_data_to_db($i_data)
    {

        // make connection
        $connection = mysqli_connect("localhost", "user", "root", "my_db");

        $current_date_time = date("Y-m-d H:i:s");
        $phone_number = $i_data["phone_number"];
        $message = $i_data["message"];

        // create query
        $sql = "insert into my_db.sms_logs 
        (
            send_time, 
            phone_number,
            message
        )
        values('" . $current_date_time . "', '" . $phone_number . "', '" . $message . "')";

        $q = mysqli_query($connection, $sql);
        // close connection
        $connection->close();

        return "200";
        die();
    }
}
