<?php

// connessione al db
require_once("bootstrap.php");

// PARAMETRI DEL TEMPLATE
$templateParams["accountTitle"] = "Account";

// nome del template da visualizzare
$templateParams["name"] = "account-page.php";

// template html base
require("php/seller/template/base.php");

?>