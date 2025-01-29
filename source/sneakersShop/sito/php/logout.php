<?php

if(isUserLoggedIn()) {
    logOut();
    $templateParams["logoutMsg"] = "Logout effettuato con successo!";
    $templateParams["pageTitle"] = "Homepage";
    $templateParams["name"] = "php/user/template/homepage.php";
} else {
    header("Location: index.php");
}

?>