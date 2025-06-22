<?php
include 'connect.php';

//function untuk register
function register($data){
   global $conn;

   $username = strtolower($data["username"]);
   $email = $data["email"];
   $password = mysqli_real_escape_string($conn, $data["password"]);
   $confirm_password = mysqli_real_escape_string($conn, $data["confirm_password"]);

   //cek username
   $query = "SELECT username FROM informasi_pengguna WHERE username = '$username'";
   $result = mysqli_query($conn, $query);

   if(mysqli_fetch_assoc($result)){
      echo "<script>
            alert('username yang dipilih sudah terdaftar');
            </script>";
      return false;
   }

   //cek konfirmasi password
   if($password !== $confirm_password){
      echo "<script>
            alert('konfirmasi password tidak sesuai');
            </script>";
      return false;
   }

   //enkripsi password
   $password = password_hash($password, PASSWORD_DEFAULT);

   //tambahkan user baru
   $query = "INSERT INTO informasi_pengguna VALUES ('', '$username', '$email', '$password')";
   mysqli_query($conn, $query);

   return mysqli_affected_rows($conn);
}

//fungsi hapus alternatif
function hapusAlternatif($id){
   global $conn;

   $query = "DELETE FROM alternatif WHERE id_alternatif = $id";
   return mysqli_query($conn, $query);
}

//fungsi edit alternatif
function getAlternatifById($id) {
    global $conn;
    $id = intval($id);
    $query = mysqli_query($conn, "SELECT * FROM alternatif WHERE id_alternatif = $id");
    return mysqli_fetch_assoc($query);
}

function updateAlternatif($id, $nama) {
    global $conn;
    $id = intval($id);
    $nama = htmlspecialchars($nama);
    $query = "UPDATE alternatif SET nama_alternatif = '$nama' WHERE id_alternatif = $id";
    return mysqli_query($conn, $query);
}

//funngsi tambah data
function tambahAlternatif($nama) {
    global $conn;
    $nama = htmlspecialchars($nama);

    $query = "INSERT INTO alternatif (nama_alternatif) VALUES ('$nama')";
    return mysqli_query($conn, $query);
}

//fungsi untuk tambah kriteria
function tambahKriteria($nama, $bobot, $jenis) {
    global $conn;

    $nama = htmlspecialchars($nama);
    $jenis = htmlspecialchars($jenis);
    $bobot = floatval($bobot);

    $query = "INSERT INTO kriteria (nama_kriteria, bobot, jenis)
              VALUES ('$nama', $bobot, '$jenis')";
    return mysqli_query($conn, $query);
}

//fungsi edit  kriteria
function getKriteriaById($id) {
    global $conn;
    $id = intval($id);
    $query = mysqli_query($conn, "SELECT * FROM kriteria WHERE id_kriteria = $id");
    return mysqli_fetch_assoc($query);
}

function updateKriteria($id, $nama, $bobot, $jenis) {
    global $conn;
    $nama = htmlspecialchars($nama);
    $jenis = htmlspecialchars($jenis);
    $bobot = floatval($bobot);

    $query = "UPDATE kriteria SET nama_kriteria = '$nama', bobot = $bobot, jenis = '$jenis' WHERE id_kriteria = $id";
    return mysqli_query($conn, $query);
}

//fungsi hapus kriteria
function hapusKriteria($id){
   global $conn;

   $query = "DELETE FROM kriteria WHERE id_kriteria = $id";
   return mysqli_query($conn, $query);
}

//fungsi untuk menyimpan data matriks
function tambahMatriks($conn, $id_alternatif, $dataNilai) {
  // Hapus dulu data lama jika sudah ada (biar tidak dobel)
  mysqli_query($conn, "DELETE FROM matriks WHERE id_alternatif = $id_alternatif");

  // Tambahkan data baru
  foreach ($dataNilai as $id_kriteria => $nilai) {
    $id_kriteria = intval($id_kriteria);
    $nilai = floatval($nilai);
    mysqli_query($conn, "INSERT INTO matriks (id_alternatif, id_kriteria, nilai) 
                         VALUES ($id_alternatif, $id_kriteria, $nilai)");
  }

  return true;
}

//funsi untuk ambil alternatif ---> SP dan Sn
function getAllAlternatif($conn) {
  $result = mysqli_query($conn, "SELECT * FROM alternatif ORDER BY id_alternatif ASC");
  $data = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
  }
  return $data;
}

//funsi untuk ambil kriteria ---> SP dan Sn
function getAllKriteria($conn) {
  $result = mysqli_query($conn, "SELECT * FROM kriteria ORDER BY id_kriteria ASC");
  $data = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
  }
  return $data;
}

?>
