<?php
session_start();
require 'config.php';

// Inisialisasi $collection
$collection = $db_project->restaurant;

if (isset($_GET['id'])) {
    $objectId = $_GET['id'];

    // Periksa apakah $objectId adalah string yang valid sebagai ObjectId
    if (!preg_match('/^[a-f\d]{24}$/i', $objectId)) {
        echo "Invalid ObjectID format";
        exit;
    }

    $rest = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($objectId)]);
}

if (isset($_POST['submit'])) {
    $collection->updateOne(
        ['_id' => new MongoDB\BSON\ObjectID($objectId)],
        ['$set' => [
            'Kode_Pesanan' => $_POST['Kode_Pesanan'],
            'Category' => $_POST['Category'],
            'Nama_Pesanan' => $_POST['Nama_Pesanan'],
            'Price' => $_POST['Price'],
            'Stock' => $_POST['Stock'],
            'Jumlah_Pesanan' => $_POST['Jumlah_Pesanan'],
        ]]
    );

    echo "<script>
            alert('Data Pesanan berhasil diupdate!');
            document.location.href = 'index.php';
          </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Project CRUD Sederhana</title>
<link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<style>
.bl {
    padding: 10px;
}
.container {
    width: 100%;
    margin-top: 2%;
    box-shadow: 0 3px 10px rgba(0,0,0,0.7);
    padding: 5%;
    $gradient: linear-gradient(150deg, rgba($white, .12), rgba($white, 0));
}
h3 {
    font-family: Cheeky Rabbit;
    font-weight: bold;
    color: #534D9D;
    font-size: 40px;
}
table {
    background-color: #97B4D6;
    font-family: Tekton Pro;
}
</style>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <h3 class="text-center">Edit Data</h3>
            <form method="POST">
                <table class="table table-hover">
                    <div class="container2">
                        <tr>
                            <td for="Kode_Pesanan">Kode_Pesanan</td>
                            <td><input type="text" class="form-control" name="Kode_Pesanan" value="<?php echo isset($rest) ? $rest->Kode_Pesanan : ''; ?>"></td>
                        </tr>
                        <tr>
                            <td>Category</td>
                            <td><input type="text" class="form-control" name="Category" value="<?php echo isset($rest) ? $rest->Category : ''; ?>"></td>
                        </tr>
                        <tr>
                            <td>Nama_Pesanan</td>
                            <td><input type="text" class="form-control" name="Nama_Pesanan" value="<?php echo isset($rest) ? $rest->Nama_Pesanan : ''; ?>"></td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td><input type="text" class="form-control" name="Price" value="<?php echo isset($rest) ? $rest->Price : ''; ?>"></td>
                        </tr>
                        <tr>
                            <td>Stock</td>
                            <td><input type="text" class="form-control" name="Stock" value="<?php echo isset($rest) ? $rest->Stock : ''; ?>"></td>
                        </tr>
                        <tr>
                            <td>Jumlah_Pesanan</td>
                            <td><input type="text" class="form-control" name="Jumlah_Pesanan" value="<?php echo isset($rest) ? $rest->Jumlah_Pesanan : ''; ?>"></td>
                        </tr>
                    </div>
                </table>
                <div align="right">
                    <button type="submit" name="submit" class="btn btn-primary bi bi-check-circle"> Submit </button>
                    <a href="index.php" class="btn btn-danger bi bi-arrow-right-circle"> Cancel </a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
