<?php

if (isset($_GET["url"])) {

    $url = $_GET["url"];
    include_once("server/view/" . $url . ".html");
    
} else
    include_once("server/view/login.html");
