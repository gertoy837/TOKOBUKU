<?php

require "config.php";

$buku = mysqli_query($connect, "SELECT buku.*, penerbit.nama FROM buku inner join penerbit on buku.penerbit_id = penerbit.id");
$penerbit = mysqli_query($connect, "SELECT * FROM penerbit");

if (isset($_GET['search'])) {
    $search = $_GET["search"];
    $cari = "SELECT penerbit.nama, buku.* FROM buku INNER JOIN penerbit on buku.penerbit_id = penerbit.id WHERE nama_buku LIKE '%$search%' ";
    $buku = mysqli_query($connect, $cari);

    if (mysqli_num_rows($buku) == 0) {
        $error = true;
    }
}
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

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body rounded bg-success text-center text-white">
                        <h3 class="fw-bold">Selamat Datang Aplikasi TOKOBUKU</h3>
                        <p>Copyright by Mahardika @2024</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <ul class="list-group">
                                    <li class="list-group-item active fw-bold" aria-current="true">Main Menu</li>
                                    <a href="index.php">
                                        <li class="list-group-item">
                                            HOME
                                        </li>
                                    </a>
                                    <a href="admin.php">
                                        <li class="list-group-item">ADMIN</li>
                                    </a>
                                    <a href="pengadaan.php">
                                        <li class="list-group-item">PENGADAAN</li>
                                    </a>
                                </ul>
                            </div>
                            <div class="col-md-9">
                                <form class="row float-end row-cols-lg-auto g-2 align-items-center" method="get">
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input type="text" name="search" placeholder="Mau cari buku apa ?" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-search"></i> Cari</button>
                                    </div>
                                </form>
                                <h4 class="fw-bold">Data Buku</h4>
                                <table class="table mt-4">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Kode</th>
                                            <th scope="col">Kategori</th>
                                            <th scope="col">Nama Buku</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Stok</th>
                                            <th scope="col">Penerbit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($buku as $data) {
                                        ?>
                                            <tr>
                                                <th scope="row"><?= $no++ ?></th>
                                                <td><?= $data["kode"] ?></td>
                                                <td><?= $data["kategori"] ?></td>
                                                <td><?= $data["nama_buku"] ?></td>
                                                <td><?= number_format($data["harga"]) ?></td>
                                                <td><?= $data["stok"] ?></td>
                                                <td><?= $data["nama"] ?></td>
                                            </tr>
                                        <?php
                                        }
                                        if (isset($error)) {
                                            echo "<tr><td colspan='9' class='text-center text-muted'>data tidak ditemukan...</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
</body>

</html>