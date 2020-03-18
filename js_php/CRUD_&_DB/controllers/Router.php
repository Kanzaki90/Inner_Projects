<?php
header('Access-Control-Allow-Origin: *');
include_once("./InsertController.php");
include_once("./EditController.php");
include_once("./DeleteController.php");
include_once("./EntryController.php");

if (isset($_POST)) {

    switch ($_POST["op"]) {

        case "insert":
            $x = new InsertController();
            $x->insert($_POST);
            break;

        case "edit":
            $x = new EditController($_POST);
            $x->edit($_POST);
            break;

        case "select":
            $x = new EntryController();
            $x->viewEntry();
            break;

        case "delete":
            $x = new DeleteController($_POST);
            $x->delete($_POST);
            break;

        default:
            echo "No action received";
            break;
    }
}
