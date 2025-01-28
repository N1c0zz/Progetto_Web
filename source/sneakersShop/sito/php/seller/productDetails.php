<?php

// connessione al db
require_once("../../bootstrap.php");

// PARAMETRI DEL TEMPLATE
$templateParams["pageTitle"] = "Dettagli prodotto";

// nome del template da visualizzare
$templateParams["name"] = "template/product-details.php";

// template html base
require("../user/template/base.php");

?>