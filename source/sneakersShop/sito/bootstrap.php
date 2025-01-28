<?php

session_start();

require_once("php/config/config.php");
require_once("php/utils/functions.php");
require_once("php/db/database.php");

$dbh = new DatabaseHelper("localhost", "root", "", "ns_kicks", 3306);

?>