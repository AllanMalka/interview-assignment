<?php 

include_once "dbconnection.php";

$dbconn = new dbConnection();

echo $dbconn->deleteAllUsers();