<?php
include 'connect.php';
include '../function.php';

$id = $_GET["id"];

//hapus matriks yang berkait dengan alternatif
mysqli_query($conn, "DELETE FROM matriks WHERE id_kriteria = $id");

//dilanjutkan hapus alternatif
mysqli_query($conn, "DELETE FROM kriteria WHERE id_kriteria = $id");

// Redirect ke halaman alternatif
header("Location: kriteria.php?status=deleted");
exit;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (hapusKriteria($id)) {
        header("Location: kriteria.php?status=deleted");
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    header("Location: kriteria.php");
}

?>