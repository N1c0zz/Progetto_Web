<?php

require_once("../bootstrap.php");

if(!isUserLoggedIn()) {
    header("Location: login.php");
    exit();
}

$templateParams["pageTitle"] = "Account";
$templateParams["name"] = "account-page.php";
$templateParams["userInfo"] = $dbh->getUserInfo($_SESSION["idutente"])[0];

if($_SESSION["tipo"] == "cliente") {
    $templateParams["showOrderList"] = true;
}

// modifica password
if(isset($_POST["oldPassword"]) && isset($_POST["newPassword"]) && isset($_POST["newPasswordConf"])) {
    // controllo se la password vecchia inserita è corretta
    $login_result = $dbh->checkLogin($_SESSION["email"], $_POST["oldPassword"]);
    if(count($login_result) == 1) {
        // controllo se le due nuove password inserite coincidono
        if ($_POST["newPassword"] == $_POST["newPasswordConf"]) {
            $dbh->updateUserPwd($_SESSION["idutente"], $_POST["newPassword"]);
            $templateParams["pwdUpdateMsg"] = "Password aggiornata con successo!";
        } else {
            $templateParams["pwdConfError"] = "Errore! Le nuove password inserite non coincidono";
        }
    } else {
        $templateParams["oldPwdError"] = "Errore! la vecchia password inserita non è corretta";
    }
}

require("user/template/base.php");

?>