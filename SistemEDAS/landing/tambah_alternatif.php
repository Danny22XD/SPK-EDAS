<?php
session_start();

if(!isset($_SESSION["login"])){
  header("Location: ../login.php");
  exit;
}

include '../templates/layout.php';
include '../connect.php';
include '../function.php';

// Proses tambah data
if (isset($_POST['submit'])) {
  $nama = $_POST['nama_alternatif'];

  if (tambahAlternatif($nama)) {
    header("Location: alternatif.php?status=added");
    exit;
  } else {
    $error = "Gagal menambahkan data.";
  }
}

?>

<!-- Tampilan -->
<div class="container-fluid px-4 mt-4">
  <div class="card shadow-sm col-md-6 col-lg-5">
    <div class="card-body">
      <h4 class="fw-bold mb-4 text-center">Tambah Alternatif</h4>

      <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error; ?></div>
      <?php endif; ?>

      <form method="post">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Alternatif</label>
          <input type="text" name="nama_alternatif" id="nama" class="form-control" autocomplete="off" required>
        </div>

        <div class="d-flex justify-content-between">
          <a href="alternatif.php" class="btn btn-secondary">Kembali</a>
          <button type="submit" name="submit" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include '../templates/footer.php'; ?>