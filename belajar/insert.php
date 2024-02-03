<?php

require 'vendor/autoload.php';

$client = new MongoDB\Client;
$companydb = $client->companydb;
$empcollection = $companydb->empcollection;

$insertManyResult = $empcollection->insertMany([
    ['_id' => '3', 'name' => 'Brad', 'age' => '26', 'skill' => 'mongodb'],
    ['_id' => '4', 'name' => 'Arief', 'age' => '30', 'skill' => 'nodejs'],
    ['_id' => '5', 'name' => 'Febry', 'age' => '22', 'skill' => 'angular']
]);

/* Insert One Document (With Id)
$insertManyResult = $empcollection->insertMany([
    ['_id' => '3', 'name' => 'Brad', 'age' => '26', 'skill' => 'mongodb'],
    ['_id' => '4', 'name' => 'Arief', 'age' => '30', 'skill' => 'nodejs'],
    ['_id' => '5', 'name' => 'Febry', 'age' => '22', 'skill' => 'angular']
]);
*/


/* Insert One Document (With Id)
$insertOneResult = $empcollection->insertOne(
    ['_id' => '1', 'name' => 'Andrew', 'age' => '26', 'skill' => 'mongodb']
);
*/


printf("Inserted %d documents", $insertManyResult->getInsertedCount());
var_dump($insertManyResult->getInsertedId());

?>