<?php
header('Access-Control-Allow-Origin: http://localhost');
include_once("../model/RegisterModel.php");

if (isset($_POST)) {
    if (isset($_POST["op"]) && $_POST["op"] === "register") {

        $data_array = array(
            "email" => $_POST["email"],
            "username" => $_POST["username"],
            "password" => $_POST["password"]
        );

        $registerInstance = RegisterModel::getInstance();
        $registrator = $registerInstance->userRegister($data_array);
        echo json_encode($registrator);
        die();
    }
}
