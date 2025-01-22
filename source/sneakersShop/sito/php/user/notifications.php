<?php

// connessione al db
require_once("bootstrap.php");

// PARAMETRI DEL TEMPLATE
$templateParams["pageTitle"] = "Notifiche";

// nome del template da visualizzare
$templateParams["name"] = "notification-list.php";

// template html base
require("template/base.php");

?>