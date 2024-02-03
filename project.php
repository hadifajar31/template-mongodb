<?php

$mongoClient = new MongoDB\Client("mongodb://localhost:27017");
$db_project = $mongoClient->selectDatabase("db_projects");

$collection = $db_project->restaurant;

?>
