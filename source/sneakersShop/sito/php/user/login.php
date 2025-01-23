<?php

// connessione al db
require_once("bootstrap.php");

// PARAMETRI DEL TEMPLATE
$templateParams["pageTitle"] = "Login";  // titolo pagina
$templateParams["name"] = "login-form.php";   // nome template da visualizzare

// template html base
require("template/base.php");

?>