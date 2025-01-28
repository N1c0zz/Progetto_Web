<?php

// connessione al db
require_once("../../bootstrap.php");

// PARAMETRI DEL TEMPLATE
$templateParams["pageTitle"] = "Notifiche";

// nome del template da visualizzare
$templateParams["name"] = "template/seller-notifications.php";

// template html base
require("../user/template/base.php");

?>