<?php

require "../config.php";

$penerbit = mysqli_query($connect, "SELECT * FROM penerbit");

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
                <h3 class="mb-4 fw-bold">Tambah Data Buku</h3>
                <div class="card">
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Kode</label>
                                <input type="text" name="kode" required class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Kategori</label>
                                <input type="text" name="kategori" required class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Buku</label>
                                <input type="text" name="nama_buku" required class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Harga</label>
                                <input type="number" name="harga" required class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Stok</label>
                                <input type="number" name="stok" required class="form-control" id="exampleInputEmail1">
                            </div>
                            <div class="mb-3">
                                <label for="ketid" class="form-label">Penerbit</label>
                                <select class="form-select" name="penerbit_id" id="ketid" aria-label="Default select example">
                                    <option hidden></option>
                                    <?php
                                    foreach ($penerbit as $data) {
                                    ?>
                                        <option value="<?= $data["id"] ?>"><?= $data["nama"] ?></option>

                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" name="simpan" class="btn btn-primary"><span class="fa fa-save"></span> Simpan</button>
                        </form>
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
    $kategori = $_POST["kategori"];
    $nama_buku = $_POST["nama_buku"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];
    $penerbit_id = $_POST["penerbit_id"];
    $query = "INSERT INTO buku (kode,kategori,nama_buku,harga,stok,penerbit_id) VALUES ('$kode', '$kategori', '$nama_buku', '$harga', '$stok', '$penerbit_id')";

    mysqli_query($connect, $query);
    header("Location:../admin.php");
}
?>