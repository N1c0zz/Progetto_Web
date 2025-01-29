<?php

require_once("../bootstrap.php");

if(!isUserLoggedIn()) {
    header("location: login.php");
    exit();
}

$templateParams["pageTitle"] = "Modifica informazioni account";
$templateParams["name"] = "user/template/user-info-form.php";

$templateParams["userInfo"] = $dbh->getUserInfo($_SESSION["idutente"])[0];

if(isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["bday"]) && isset($_POST["sex"])
    && isset($_POST["phone"]) && isset($_POST["email"])) {
    // controllo se la email è già in uso
    $used_email_result = $dbh->getUser($_POST["email"]);
    if(count($used_email_result) == 0) {
        // aggiorno i dettagli dell'account
        $dbh->updateUserInfo($_SESSION["idutente"], $_POST["name"], $_POST["surname"], $_POST["bday"], $_POST["sex"], $_POST["phone"] ,$_POST["email"]);
        $templateParams["pageTitle"] = "Account";
        $templateParams["name"] = "account-page.php";
        $templateParams["userInfo"] = $dbh->getUserInfo($_SESSION["idutente"])[0];
        $templateParams["userInfoUpdateMsg"] = "Informazioni dell'account aggiornate con successo!";
    } else {
        $templateParams["userInfoUpdateErrorMsg"] = "Errore! La email inserita è già in uso";
    }
}

require("user/template/base.php");

?>