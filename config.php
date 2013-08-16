<?php

/* Config */
$dbHost = '';
$dbUser = '';
$dbPass = '';
$dbName = '';

/* Common PHP */
$db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);

?>