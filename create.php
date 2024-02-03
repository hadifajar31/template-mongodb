<?php
session_start();

if (isset($_POST['submit'])) {
    require 'config.php';

    $insertOneResult = $collection->insertOne([
        'Kode_Pesanan' => $_POST['Kode_Pesanan'],
        'Category' => $_POST['Category'],
        'Nama_Pesanan' => $_POST['Nama_Pesanan'],
        'Price' => $_POST['Price'],
        'Stock' => $_POST['Stock'],
        'Jumlah_Pesanan' => $_POST['Jumlah_Pesanan'],
    ]);

    echo "<script>
            alert('Data Pesanan berhasil ditambahkan!');
            document.location.href = 'index.php';
          </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project CRUD Sederhana</title>
    <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>

<body>
    <div class="container col-md-8">
        <div class="row justify-content-center">
            <div class="col">
                <h3 class="text-center mb-4">Create Data</h3>
                <form method="POST">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td for="Kode_Pesanan">Kode_Pesanan</td>
                                <td><input type="text" class="form-control" name="Kode_Pesanan" required="required"></td>
                            </tr>
                            <tr>
                                <td for="Category">Category</td>
                                <td><input type="text" class="form-control" name="Category" required="required"></td>
                            </tr>
                            <tr>
                                <td for="Nama_Pesanan">Nama_Pesanan</td>
                                <td><input type="text" class="form-control" name="Nama_Pesanan" required="required"></td>
                            </tr>
                            <tr>
                                <td for="Price">Price</td>
                                <td><input type="text" class="form-control" name="Price" required="required"></td>
                            </tr>
                            <tr>
                                <td for="Stock">Stock</td>
                                <td><input type="text" class="form-control" name="Stock" required="required"></td>
                            </tr>
                            <tr>
                                <td for="Jumlah_Pesanan">Jumlah_Pesanan</td>
                                <td><input type="text" class="form-control" name="Jumlah_Pesanan" required="required"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div align="right">
                        <button type="submit" name="submit" class="btn btn-primary bi bi-check-circle"
                            style="font-family: Tekton Pro"> Submit </button>
                        <a href="index.php" class="btn btn-danger bi bi-arrow-right-circle" style="font-family: Tekton Pro"> Cancel </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
