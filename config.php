<?php

require 'vendor/autoload.php';

use MongoDB\Client;

$mongoClient = new Client("mongodb://localhost:27017");
$databaseName = "db_project"; // Sesuaikan dengan nama database yang benar

$db_project = $mongoClient->$databaseName; // Menggunakan $databaseName sebagai nama database

$collection = $db_project->restaurant;

?>
