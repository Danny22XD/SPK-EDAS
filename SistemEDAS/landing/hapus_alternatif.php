<?php
include '../connect.php';
require '../function.php';

$id = $_GET["id"];

//hapus matriks yang berkait dengan alternatif
mysqli_query($conn, "DELETE FROM matriks WHERE id_alternatif = $id");

//dilanjutkan hapus alternatif
mysqli_query($conn, "DELETE FROM alternatif WHERE id_alternatif = $id");

// Redirect ke halaman alternatif
header("Location: alternatif.php?status=deleted");
exit;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (hapusAlternatif($id)) {
        header("Location: alternatif.php?status=deleted");
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    header("Location: alternatif.php");
}

?>