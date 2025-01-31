<?php

$templateParams["pageTitle"] = "Homepage";

if(!isUserLoggedIn() || $_SESSION["tipo"] == "cliente") {
    $templateParams["name"] = "php/user/template/homepage.php";
} else if(isUserLoggedIn() || $_SESSION["tipo"] == "venditore") {
    require("seller/sellerHomePage.php");
}

?>