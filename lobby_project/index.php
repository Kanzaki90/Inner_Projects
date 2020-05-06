<?php
if (isset($_GET["url"])) {
    $url = $_GET["url"];
    include_once("./server/views/" . $url);
} else
    include_once("./server/views/login.html");
