<?php

// connessione al db
require_once("../../bootstrap.php");

// PARAMETRI DEL TEMPLATE
$templateParams["pageTitle"] = "Gestisci gli ordini";

$templateParams["sellerOrders"] = $dbh -> getAllOrdersBySeller($_SESSION["idutente"]);

// nome del template da visualizzare
$templateParams["name"] = "template/manage-orders.php";

// template html base
require("../user/template/base.php");
?>