<?php

// connessione al db
require_once("../../bootstrap.php");

// PARAMETRI DEL TEMPLATE
$templateParams["pageTitle"] = "Modifica prodotto";

// nome del template da visualizzare
$templateParams["name"] = "template/edit-product.php";

// template html base
require("../user/template/base.php");

?>