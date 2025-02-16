<?php

if(!isUserLoggedIn()) {
    header("Location: index.php?action=login");
    exit();
}

$templateParams["styleSheet"] = array("css/user/accountPage.css", "css/user/togglePassword.css");
$templateParams["pageTitle"] = "Account";
$templateParams["name"] = "php/user/template/account-page.php";
$templateParams["js"] = array("js/toggle-password.js");
$templateParams["userInfo"] = $dbh->getUserInfo($_SESSION["idutente"])[0];

if($_SESSION["tipo"] == "cliente") {
    $templateParams["showOrderList"] = true;
}

// modifica password
if(isset($_POST["oldPassword"]) && isset($_POST["newPassword"]) && isset($_POST["newPasswordConf"])) {
    // controllo se la password vecchia inserita è corretta
    $login_result = $dbh->login($_SESSION["email"], $_POST["oldPassword"]);
    if($login_result == true) {
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

// recupera ordini di un utente
if(isset($_SESSION["idutente"]) && ($_SESSION["tipo"] == "cliente")){
    $templateParams["orders"] = $dbh -> getUserOrders($_SESSION["idutente"]);
} else {
    $templateParams["orders"] = [];
}

?>