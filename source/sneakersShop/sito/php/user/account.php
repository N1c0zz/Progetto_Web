<?php

// connessione al db
require_once("bootstrap.php");

// PARAMETRI DEL TEMPLATE
$templateParams["pageTitle"] = "Account";

// nome del template da visualizzare
$templateParams["name"] = "account-page.php";

// template html base
require("template/base.php");

?>