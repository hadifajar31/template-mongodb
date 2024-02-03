<?php

require 'vendor/autoload.php';

$client = new MongoDB\Client;
$companydb = $client->companydb;
$empcollection = $companydb->empcollection;


$deleteResult = $empcollection->deleteMany(
    ['name' => 'Shandy']
);
printf("Deleted %d documents", $deleteResult->getDeletedCount());


/* Delete Many
$deleteResult = $empcollection->deleteMany(
    ['name' => 'Shandy']
);
printf("Deleted %d documents", $deleteResult->getDeletedCount());
*/


/* Delete One
$deleteResult = $empcollection->deleteOne(
    ['_id' => '4']
);
printf("Deleted %d documents", $deleteResult->getDeletedCount());
*/

?>