<?php

// controllo se l'utente sta facendo login
if(isset($_POST["email"]) && isset($_POST["password"])) {
    $login_result = $dbh->checkLogin($_POST["email"], $_POST["password"]);
    if(count($login_result) == 0) {
        // login fallito
        $templateParams["loginError"] = "Errore! Credenziali scorrette o account inesistente";
    } else {
        registerLoggedUser($login_result[0]);
    }
}

// controllo se l'utente è loggato
if(isUserLoggedIn()) {
    header("Location: index.php?action=account");
    exit();
} else {
    $templateParams["pageTitle"] = "Login";
    $templateParams["name"] = "php/user/template/login-form.php";
    $templateParams["styleSheet"] = array("css/user/togglePassword.css");
    $templateParams["js"] = array("js/toggle-password.js");
}

?>