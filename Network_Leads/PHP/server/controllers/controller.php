<?php
header('Access-Control-Allow-Origin: *');
include_once("../models/SendSMS.php");
include_once("../models/GetLogs.php");

if (isset($_POST["op"])) {

    $op = $_POST["op"];

    switch ($op) {
        case "send_sms":
            send_sms($_POST);
            break;

        case "get_logs":
            get_logs();
            break;

        default:
            die("OOOPS");
    }
}

function send_sms($i_data)
{
    $phone_number = $i_data["phone_number"];
    $message = $i_data["message"];

    if ($message === "" || $phone_number === "")
        echo "400";
    else {
        $data = array(
            "phone_number" => $phone_number,
            "message" => $message
        );

        $logger = new SendSMS();
        $response = $logger->store_sms_data_to_db($data);
        echo $response;
    }

    die();
}



function get_logs()
{
    $logger = new GetLogs();
    $db_data = $logger->get_logs_from_db();
    echo json_encode($db_data);
    die();
}
