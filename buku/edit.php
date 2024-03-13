<?php

require "../config.php";

$id = $_GET["id"];
$query = "SELECT * FROM penerbit";
$penerbit = mysqli_query($connect, $query);

$query2 = "SELECT * FROM buku WHERE id = $id";
$buku = mysqli_query($connect, $query2);

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
                        foreach ($buku as $data) {
                        ?>
                            <form method="post">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Kode</label>
                                    <input type="text" name="kode" required class="form-control" value="<?= $data["kode"] ?>" id="exampleInputEmail1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Kategori</label>
                                    <input type="text" name="kategori" required value="<?= $data["kategori"] ?>" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Buku</label>
                                    <input type="text" name="nama_buku" required value="<?= $data["nama_buku"] ?>" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Harga</label>
                                    <input type="number" name="harga" required value="<?= $data["harga"] ?>" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Stok</label>
                                    <input type="number" name="stok" required value="<?= $data["stok"] ?>" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="mb-3">
                                    <label for="ketid" class="form-label">Penerbit</label>
                                    <select class="form-select" name="penerbit_id" id="ketid" aria-label="Default select example">
                                        <option hidden></option>
                                        <?php
                                        foreach ($penerbit as $kat) {
                                        ?>
                                            <option <?php echo $kat["id"] == $data["penerbit_id"] ? "selected" : "" ?> value="<?= $kat['id'] ?>"><?= $kat["nama"] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
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
    $kategori = $_POST["kategori"];
    $nama_buku = $_POST["nama_buku"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];
    $penerbit_id = $_POST["penerbit_id"];
    $query = "UPDATE buku SET kode = '$kode', kategori = '$kategori', nama_buku = '$nama_buku', harga = '$harga', stok = '$stok', penerbit_id = '$penerbit_id' WHERE id = '$id'";
    mysqli_query($connect, $query);
    header("Location:../admin.php");
}
?>