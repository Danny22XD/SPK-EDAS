<?php
$host     = "localhost";     // Server database
$user     = "root";          // Username phpMyAdmin
$password = "";              // Password default XAMPP
$db       = "database_edas"; // Nama database

// Buat koneksi
$conn = mysqli_connect($host, $user, $password, $db);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
