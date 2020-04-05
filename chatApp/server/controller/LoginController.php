<?php
header('Access-Control-Allow-Origin: http://localhost');
include_once("../model/LoginModel.php");
include_once("../model/UserOnlineModel.php");


if (isset($_POST)) {
    $loginInstance = LoginModel::getInstance();
    $userOnline = UserOnlineModel::getInstance();

    if (isset($_POST["op"])) {

        if ($_POST["op"] === "login") {
            $data_array = array(
                "username" => $_POST["username"],
                "password" => $_POST["password"]
            );

            $logger = $loginInstance->userLogin($data_array);
            echo json_encode($logger);
            die();
        }


        if ($_POST["op"] === "getData") {
            $uid = $_POST["user_id"];

            $online = $userOnline->setOnline($uid);
            $online = $userOnline->viewOnlineUsers($uid);
            
            $logger = $loginInstance->getUserData($uid);

            $data = array();
            $data["userInfo"] = $logger;
            $data["onlineUsers"] = $online;

            echo json_encode($data);
            die();
        }
    }

    if ($_POST["op"] === "logout") {

        $uid = $_POST["user_id"];

        $offline = $userOnline->setOffline($uid);

        print_r($offline);
        die();
    }
}
