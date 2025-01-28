<?php

require_once("../bootstrap.php");

if(!isUserLoggedIn()) {
    header("location: login.php");
    exit();
}

$templateParams["notifications"] = $dbh->getUserNotifications($_SESSION["idutente"]);

$templateParams["pageTitle"] = "Notifiche";
$templateParams["name"] = "user/template/notification-list.php";

require("user/template/base.php");

?>