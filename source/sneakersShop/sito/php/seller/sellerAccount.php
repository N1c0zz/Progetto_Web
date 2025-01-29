<?php

// connessione al db
require_once("bootstrap.php");

// PARAMETRI DEL TEMPLATE
$templateParams["pageTitle"] = "Account";

// nome del template da visualizzare
$templateParams["name"] = "template/account-page.php";

// template html base
require("../user/template/base.php");

?>