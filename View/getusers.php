<?php 
/**Include the database controller if not already */
require_once "../Controller/dbconnection.php"; 
$dbconn = new dbConnection();
$getusers = $dbconn->getAllUsers();
if(!empty($getusers)){
    ?>
        <input type="button" id="btnDownload" value="Download File" />

    <?php
    foreach($getusers as $user){
        ?>
        <div>
            <p>
                User name: <?= $user->firstName . " " . $user->lastName; ?>
            </p>
            <p>
                Email: <?= $user->email; ?>
            </p>
        </div>
        <?php
    }
} else {
    ?>
        <p>No users in database.</p>
        <br>
        <input type="button" value="Insert test users" id="btnTestUsers" />
    <?php
}