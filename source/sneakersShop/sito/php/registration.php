<?php

if(isUserLoggedIn()) {
    header("Location: index.php");
    exit();
}

$templateParams["name"] = "php/user/template/registration-form.php";
$templateParams["pageTitle"] = "Registrazione";

// controllo se l'utente si sta registrando
if(isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["bday"]) && isset($_POST["sex"])
    && isset($_POST["phone"]) && isset($_POST["email"]) && isset($_POST["password"])) {
    // controllo se la email è già in uso
    $used_email_result = $dbh->getUser($_POST["email"]);
    if(count($used_email_result) == 0) {
        // registrazione utente
        $dbh->registerUser($_POST["name"], $_POST["surname"], $_POST["bday"], $_POST["sex"], $_POST["phone"] ,$_POST["email"], $_POST["password"]);
        // login automatico
        $login_result = $dbh->checkLogin($_POST["email"], $_POST["password"]);
        registerLoggedUser($login_result[0]);
        $templateParams["pageTitle"] = "Homepage";
        $templateParams["name"] = "php/user/template/homepage.php";
        $templateParams["registrationMsg"] = "Registrazione effettuata con successo!";
    } else {
        $templateParams["registrationError"] = "Errore! La email inserita è già in uso";
    }
}

?>