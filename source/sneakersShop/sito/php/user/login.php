<?php

// connessione al db
require_once("bootstrap.php");

// controllo se l'utente sta facendo login
if(isset($_POST["email"]) && isset($_POST["password"])) {
    $login_result = $dbh->checkLogin($_POST["email"], $_POST["password"]);
    if(count($login_result) == 0) {
        // login fallito
        $templateParams["loginError"] = "Errore! Email o password sbagliate";
    } else {
        registerLoggedUser($login_result[0]);
    }
}

// controllo se l'utente è loggato
if(isUserLoggedIn()) {
    $templateParams["pageTitle"] = "Homepage";
    $templateParams["name"] = "homepage.php";
} else {
    $templateParams["pageTitle"] = "Login";
    $templateParams["name"] = "login-form.php";
}

// template html base
require("template/base.php");

?>