<?php

if(isUserLoggedIn()) {
    logOut();
    $templateParams["logoutMsg"] = "Logout effettuato con successo!";
    $templateParams["pageTitle"] = "Homepage";
    $templateParams["name"] = "php/user/template/homepage.php";
    $templateParams["styleSheet"] = array("css/user/homepage.css");
} else {
    header("Location: index.php");
}

?>