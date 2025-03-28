<?php

if(!isUserLoggedIn()) {
    header("Location: index.php?action=login");
    exit();
}

$templateParams["pageTitle"] = "Modifica informazioni account";
$templateParams["name"] = "php/user/template/user-info-form.php";

$templateParams["userInfo"] = $dbh->getUserInfo($_SESSION["idutente"])[0];

if(isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["bday"]) && isset($_POST["sex"])
    && isset($_POST["phone"]) && isset($_POST["email"])) {
    // controllo se la email è già in uso
    $used_email_result = $dbh->getUser($_POST["email"]);
    $zaza = $used_email_result[0]["email"];
    if(count($used_email_result) == 0 || $used_email_result[0]["email"] == $_SESSION["email"]) {
        // aggiorno i dettagli dell'account
        $dbh->updateUserInfo($_SESSION["idutente"], $_POST["name"], $_POST["surname"], $_POST["bday"], $_POST["sex"], $_POST["phone"] ,$_POST["email"]);
        $templateParams["pageTitle"] = "Account";
        $templateParams["name"] = "php/user/template/account-page.php";
        $templateParams["userInfo"] = $dbh->getUserInfo($_SESSION["idutente"])[0];
        $_SESSION["email"] = $templateParams["userInfo"]["email"];
        $templateParams["userInfoUpdateMsg"] = "Informazioni dell'account aggiornate con successo!";
    } else {
        $templateParams["userInfoUpdateErrorMsg"] = "Errore! La email inserita è già in uso";
    }
}

?>