<?php
$db_host = 'localhost';
$db_user = 'd0429cfc';
$db_pass = 'Meissen1993.';
$db_name = 'd0429cfc';
    // Erstelle Verbindung zur Datenbank
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>
    