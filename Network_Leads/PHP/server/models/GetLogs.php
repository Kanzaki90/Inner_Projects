<?php

class GetLogs
{

    public function get_logs_from_db()
    {
        // make connection
        $m_connection = mysqli_connect("localhost", "user", "root", "my_db");

        // create query
        $sql = "select * from sms_logs order by send_time asc";
        $q = mysqli_query($m_connection, $sql);

        // get results
        $result = mysqli_fetch_all($q, MYSQLI_ASSOC);

        // close connection
        $m_connection -> close();
        return $result;
    }
}
