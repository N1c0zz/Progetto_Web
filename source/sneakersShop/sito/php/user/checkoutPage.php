<?php

// connessione al db
require_once("bootstrap.php");

// PARAMETRI DEL TEMPLATE
$templateParams["pageTitle"] = "Checkout";

// nome del template da visualizzare
$templateParams["name"] = "checkout-page.php";

// template html base
require("template/base.php");

?>