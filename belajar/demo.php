<?php

require 'vendor/autoload.php';

$client = new MongoDB\Client;

$companydb = $client->companydb;

$result1 = $companydb->createCollection('empcollection');

var_dump($result1);


/*
$result3 = $client->dropDatabase('newdb');
var_dump($result3);

*/


/* Menampilkan List Database
foreach($client->listDatabases() as $db)  
{  
    var_dump($db);  
}
*/


/* Membuat Database Baru
$companydb = $client->newdb;

$result2 = $companydb->createCollection('newcollection');

var_dump($result2);
*/


/* Hapus Collection "MyCollection"
$companydb = $client->companydb;

$result2 = $companydb->dropCollection('mycollection');

var_dump($result2);
*/


/* Menampilkan List Collection 
$companydb = $client->companydb;

foreach($companydb->listCollections() as $collection)  
{  
    var_dump($collection);  
}
*/


/* Menambah collection baru "empcollection"
$companydb = $client->companydb;

$result1 = $companydb->createCollection('empcollection');

var_dump($result1);

*/

?>
