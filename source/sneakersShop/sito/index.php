<?php

// connessione al db
require_once("bootstrap.php");

// PARAMETRI DEL TEMPLATE
$templateParams["pageTitle"] = "Homepage";

// nome del template da visualizzare
$templateParams["name"] = "homepage.php";

// template html base
require("template/base.php");

?>