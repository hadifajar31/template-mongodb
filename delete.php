<?php
session_start();
require 'config.php';

if (isset($_GET['id'])) {
    $rest = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
    
    // Check if data exists
    if (!$rest) {
        echo "<script>
                alert('Data Pesanan tidak ditemukan!');
                document.location.href = 'index.php';
              </script>";
        exit;
    }
}

if (isset($_POST['submit'])) {
    $kodePesanan = $rest->Kode_Pesanan;
    $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);

    echo "<script>
            alert('Data Pesanan berhasil dihapus!');
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

<!-- Style -->
<style>
    .bl {
        padding: 10px;
    }

    .container {
        width: 100%;
        margin-top: 2%;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.7);
        padding: 5%;
        $gradient: linear-gradient(150deg, rgba($white, .12), rgba($white, 0));
    }

    h3 {
        font-family: Cheeky Rabbit;
        font-weight: bold;
        color: #534D9D;
        font-size: 40px;
    }

    h5 {
        font-family: Tekton Pro;
        color: #534D9D;
        text-align: center;
        font-size: 20px;
    }
</style>

<body>
    <div class="container col-md-8">
        <div class="row justify-content-center">
            <div class="col">
                <h3 class="text-center mb-4">Delete Data</h3>
                <h5 class="mb-4"> Apakah anda yakin akan menghapus pesanan dengan
                    Kode_Pesanan <?php echo "$rest->Kode_Pesanan"; ?> ? </h5>
            </div>
            <form method="POST">
                <div class="form-group mb-3" align="center">
                    <button type="submit" name="submit" class="btn btn-danger bi bi-eraser"> Remove </button>
                    <input type="hidden" value="<?php echo $kodePesanan; ?>" class="form-control" name="Kode_Pesanan">
                    <a href="index.php" class="btn btn-primary bi bi-arrow-right-circle"> Cancel </a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
