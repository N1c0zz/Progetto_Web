<?php

require_once("bootstrap.php");

if(!isUserLoggedIn()) {
    header("location: login.php");
}

$templateParams["pageTitle"] = "Notifiche";
$templateParams["name"] = "notification-list.php";

require("template/base.php");

?>