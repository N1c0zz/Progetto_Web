<?php

// connessione al db
require_once("bootstrap.php");

// PARAMETRI DEL TEMPLATE
$templateParams["pageTitle"] = "Dettagli prodotto";

// nome del template da visualizzare
$templateParams["name"] = "product-details.php";

// template html base
require("template/base.php");

?>