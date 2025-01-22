<?php

// connessione al db
require_once("bootstrap.php");

// PARAMETRI DEL TEMPLATE
$templateParams["pageTitle"] = "Carrello";

// nome del template da visualizzare
$templateParams["name"] = "cart-page.php";

// template html base
require("template/base.php");

?>