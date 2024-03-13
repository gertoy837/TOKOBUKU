<?php

require "../config.php";

$id = $_GET['id'];

$query = "DELETE FROM buku WHERE id = $id";
$hapus = mysqli_query($connect, $query);

header("Location:../admin.php");

?>
