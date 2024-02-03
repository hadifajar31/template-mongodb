<?php

require 'vendor/autoload.php';

$client = new MongoDB\Client;
$companydb = $client->companydb;
$empcollection = $companydb->empcollection;



/* Replace One Document
$replaceResult = $empcollection->replaceOne(
    ['_id' => '4'],
    ['_id' => '4', 'favColor' => 'Blue']
);

printf("Matched %d documents \n", $replaceResult->getMatchedCount());
printf("Modified %d documents \n", $replaceResult->getModifiedCount());
*/


/* Update Many Document
$updateResult = $empcollection->updateMany(
    ['skill' => 'mongodb'],
    ['$set' => ['manager' => 'Tim']]
);
printf("Matched %d documents \n", $updateResult->getMatchedCount());
printf("Modified %d documents \n", $updateResult->getModifiedCount());
*/


/* Update One Document
$updateResult = $empcollection->updateOne(
    ['age' => '26'],
    ['$set' => ['age' => '28']]
);
printf("Matched %d documents \n", $updateResult->getMatchedCount());
printf("Modified %d documents \n", $updateResult->getModifiedCount());
*/


/* Update id (unchangable)
// Ambil dokumen dengan _id 5
$document = $empcollection->findOne(['_id' => '4']);

// Ubah nilai _id menjadi 3
$document['_id'] = '1';

// Hapus dokumen lama dengan _id 5
$deleteResult = $empcollection->deleteOne(['_id' => '4']);

// Simpan dokumen baru dengan _id 3
$insertResult = $empcollection->insertOne($document);

// Menampilkan jumlah dokumen yang cocok dan diubah
printf("Matched %d documents \n", $deleteResult->getDeletedCount());
printf("Modified %d documents \n", $insertResult->getInsertedCount());
*/


?>