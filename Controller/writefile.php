<?php

include_once "dbconnection.php";

$dbconn = new dbConnection();

$users = $dbconn->getAllUsers();

$file_url = "../" . $_GET['filename'];

$fp = fopen($file_url, "w");
foreach($users as $user){
    fwrite($fp, "ID: $user->uid | User: $user->firstName $user->lastName | Email: $user->email\r\n");
}
if(fclose($fp)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.$file_url);
    header('Content-Length: '.filesize($file_url));
    ob_clean();
    flush();
    readfile($file_url);
} else {
    echo "error";
}