<?php

require "../config.php";

$id = $_GET["id"];
$query = "SELECT * FROM penerbit WHERE id = '$id'";
$penerbit = mysqli_query($connect, $query);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TOKOBUKU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9bbd881989.js" crossorigin="anonymous"></script>
</head>

<body style="background-color: AFC8AD;">
    <div class="container">

        <div class="row mt-5">
            <div class="col-md-6">
                <a href="../admin.php">
                    <button class="btn btn-warning btn-sm float-end"><span class="fa fa-arrow-circle-left"></span> Back</button>
                </a>
                <h3 class="mb-4 fw-bold">Edit Data Buku</h3>
                <div class="card">
                    <div class="card-body">
                        <?php
                        foreach ($penerbit as $data) {
                        ?>
                            <form method="post">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Kode</label>
                                    <input type="text" name="kode" required value="<?= $data["kode"] ?>"  class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                                    <input type="text" name="nama" required value="<?= $data["nama"] ?>"  class="form-control" id="exampleInputEmail1">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Kota</label>
                                    <input type="text" name="kota" required value="<?= $data["kota"] ?>"  class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Telepon</label>
                                    <input type="number" name="telepon" required  value="<?= $data["telepon"] ?>" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1"><?= $data["alamat"] ?></textarea>
                                </div>
                                <button type="submit" name="simpan" class="btn btn-success"><span class="fa fa-paper-plane"></span> Simpan</button>
                            </form>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>

<?php
if (isset($_POST["simpan"])) {
    $kode = $_POST["kode"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $kota = $_POST["kota"];
    $telepon = $_POST["telepon"];
    $query = "UPDATE penerbit SET kode = '$kode', nama = '$nama', alamat = '$alamat', kota = '$kota', telepon = '$telepon' WHERE id = '$id'";
    mysqli_query($connect, $query);
    header("Location:../admin.php");
}
?>