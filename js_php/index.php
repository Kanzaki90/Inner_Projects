<?php

if (isset($_POST)) {

    print_r($_POST);
    // if (isset($_POST['op'])) {
    //     if ($_POST["op"] === "simple_post") {

    //         simple_post($_POST);
    //     } elseif ($_POST["op"] === "ajax_post") {

    //         $data = $_POST;
    //         header('Access-Control-Allow-Origin: *');
    //         header('Content-Type: application/json');
    //         echo json_encode($data);
    //         die();

    //     }
    // }

    include_once("form.html");
}

function simple_post($i_data)
{

    $current_date = date("Y-m-d H:i:s");
    $current_date_2 = date("Y-m-d H:i");

    $_data = array(
        "firstName" => sanitize($i_data["firstName"]),
        "lastName" => sanitize($i_data["lastName"]),
        "email" => sanitize($i_data["email"]),
        "phone" => sanitize($i_data["phoneNumber"]),
        "msg" => $i_data["msg"],
        "date" => $current_date_2
    );

    $data = json_encode($_data);

    // header("Location: http://127.0.0.1/js_php/second_form.html");
    //header('Content-Type: application/json');

    include_once $_SERVER['DOCUMENT_ROOT'] . "/js_php/second_form.html";

    die();
}


function sanitize($s)
{
    $search_array = ["\"", "'", "<", ">", "\0", "\b", "\r", "\t", "\Z", "\\", "\x00", "\n", "\x1a"];
    return str_replace($search_array, "", $s);
}
