<?php

// connessione al db
require_once("bootstrap.php");

// PARAMETRI DEL TEMPLATE
$templateParams["pageTitle"] = "Prodotti";

// nome del template da visualizzare
$templateParams["name"] = "product-list.php";

// prodotti
$templateParams["productList"] = $dbh->getProducts();

// template html base
require("template/base.php");

?>