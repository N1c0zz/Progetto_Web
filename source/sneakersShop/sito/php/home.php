<?php

$templateParams["pageTitle"] = "Homepage";
$templateParams["styleSheet"] = array("css/user/homepage.css");

if(!isUserLoggedIn() || $_SESSION["tipo"] == "cliente") {
    $templateParams["name"] = "php/user/template/homepage.php";
} else if(isUserLoggedIn() || $_SESSION["tipo"] == "venditore") {
    require("seller/sellerHomePage.php");
}

?>