<?php

// connessione al db
require_once("../../bootstrap.php");

// PARAMETRI DEL TEMPLATE
$templateParams["pageTitle"] = "Homepage";

$templateParams["totalSales"] = $dbh -> getTotalSales($_SESSION["idutente"]);
$templateParams["totalEarnings"] = $dbh -> getTotalEarnings($_SESSION["idutente"]);


// nome del template da visualizzare
$templateParams["name"] = "template/seller-homepage.php";

// template html base
require("../user/template/base.php");

?>