<?php


require_once("php/config/config.php");
require_once("php/utils/functions.php");
require_once("php/db/database.php");

sec_session_start();
$dbh = new DatabaseHelper(HOST, USER, PASSWORD, DATABASE, PORT);

?>