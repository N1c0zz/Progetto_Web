<?php

require_once("../bootstrap.php");

if(isUserLoggedIn()) {
    logOut();
    $templateParams["logoutMsg"] = "Logout effettuato con successo!";
    $templateParams["pageTitle"] = "Homepage";
    $templateParams["name"] = "homepage.php";
    require("user/template/base.php");
} else {
    header("Location: " . BASE_PATH . "index.php");
}

exit();

?>