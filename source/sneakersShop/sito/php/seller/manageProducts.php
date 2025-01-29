<?php

// connessione al db
require_once("../../bootstrap.php");

// PARAMETRI DEL TEMPLATE
$templateParams["pageTitle"] = "Gestisci i prodotti";

$templateParams["sellerProducts"] = $dbh -> getProductsBySeller($_SESSION["idutente"]);

// nome del template da visualizzare
$templateParams["name"] = "template/manage-products.php";

// template html base
require("../user/template/base.php");

?>