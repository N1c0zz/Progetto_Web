<?php

define("IMG_DIR", "../img/");
require_once("php/utils/functions.php");
require_once("php/db/database.php");

$dbh = new DatabaseHelper("localhost", "nomeutente", "password", "nomedb", 3306);

?>