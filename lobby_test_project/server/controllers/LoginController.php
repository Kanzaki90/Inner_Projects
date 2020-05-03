<?php
header('Access-Control-Allow-Origin: http://localhost');
include_once("../models/InitLoginModel.php");


if (isset($_POST)) {

    if ($_POST["op"] === "initLogin") {

        $loginInstance = InitLoginModel::getInstance();

        $data = array();
        $data["firstname"] = $_POST["firstName"];
        $data["lastname"] = $_POST["lastName"];

        $logger = $loginInstance->userLogin($data);
        if ($logger["code"] === "201") {
            $data["code"] = "201";
            $data["redirectTo"] = "mainLobby.php";
            echo json_encode($data);
            die();
        } else {
            echo json_encode($logger);
            die();
        }
    }

    if ($_POST["op"] === "pullData") {
        $loginInstance = InitLoginModel::getInstance();
        $logger = $loginInstance->pullData();
        echo json_encode($logger);
        die();
    }
}
