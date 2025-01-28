<?php

// connessione al db
require_once("../../bootstrap.php");

// PARAMETRI DEL TEMPLATE
$templateParams["pageTitle"] = "Gestisci i prodotti";

// nome del template da visualizzare
$templateParams["name"] = "template/manage-products.php";

// template html base
require("../user/template/base.php");

?>