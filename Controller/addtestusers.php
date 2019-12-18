<?php

require_once "../Controller/dbconnection.php"; 
$dbconn = new dbConnection();
echo $dbconn->insertTestUsers();