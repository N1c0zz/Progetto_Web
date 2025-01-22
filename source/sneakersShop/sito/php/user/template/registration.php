<?php

// connessione al db
require_once("bootstrap.php");

// PARAMETRI DEL TEMPLATE
$templateParams["pageTitle"] = "Registrazione";  // titolo pagina
$templateParams["name"] = "registration-form.php";   // nome template da visualizzare

// template html base
require("template/base.php");

?>