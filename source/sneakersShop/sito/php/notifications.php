<?php

if(!isUserLoggedIn()) {
    header("location: index.php?action=login");
    exit();
}

$templateParams["notifications"] = $dbh->getUserNotifications($_SESSION["idutente"]);

$templateParams["pageTitle"] = "Notifiche";
$templateParams["name"] = "php/user/template/notification-list.php";
$templateParams["js"] = array("js/fetch-notifications.js", "js/change-notification-status.js");

?>