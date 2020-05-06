<?php
header('Access-Control-Allow-Origin: http://localhost');
include_once("../models/InitLoginModel.php");


if (isset($_POST)) {

    $loginInstance = InitLoginModel::getInstance();
    $data = array();

    if ($_POST["op"] === "initLogin") {


        $data["firstname"] = $_POST["firstName"];
        $data["lastname"] = $_POST["lastName"];

        $logger = $loginInstance->userLogin($data);
        if ($logger["code"] === "201") {
            $data["code"] = "201";
            $data["redirectTo"] = "mainLobby.html";
            $data["firstname"] = $logger["firstName"];
            $data["lastname"] = $logger["lastName"];
            echo json_encode($data);
            die();
        } else {
            echo json_encode($logger);
            die();
        }
    }


    if ($_POST["op"] === "pullData") {
        $logger = $loginInstance->pullData();
        echo json_encode($logger);
        die();
    }


    if ($_POST["op"] === "logout") {
        $data["firstname"] = $_POST["firstname"];
        $data["lastname"] = $_POST["lastname"];
        $logger = $loginInstance->userLogout($data);
        echo $logger;
        exit();
    }
}
