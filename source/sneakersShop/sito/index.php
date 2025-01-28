<?php

// connessione al db
require_once("bootstrap.php");

// PARAMETRI DEL TEMPLATE
$templateParams["pageTitle"] = "Homepage";

// SELLER
// $templateParams["sellerDetails"] = $dbh->getSellerDetails($sellerId);

// nome del template da visualizzare
$templateParams["name"] = "php/user/template/homepage.php";

// template html base
require("php/user/template/base.php");

?>