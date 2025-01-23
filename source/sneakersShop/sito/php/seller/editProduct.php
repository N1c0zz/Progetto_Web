<?php

// connessione al db
require_once("bootstrap.php");

// PARAMETRI DEL TEMPLATE
$templateParams["editProductTitle"] = "Modifica prodotto";

// nome del template da visualizzare
$templateParams["name"] = "edit-product.php";

// template html base
require("php/seller/template/base.php");

?>