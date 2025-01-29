<?php

if(!isUserLoggedIn()) {
    header("location: index.php?action=login");
    exit();
}

$templateParams["notifications"] = $dbh->getUserNotifications($_SESSION["idutente"]);

$templateParams["pageTitle"] = "Notifiche";
$templateParams["name"] = "php/user/template/notification-list.php";

?>