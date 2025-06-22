<?php
session_start();

if(!isset($_SESSION["login"])){
  header("Location: ../login.php");
  exit;
}

include '../templates/layout.php';
include '../connect.php';
include '../function.php';

if (isset($_POST['submit'])) {
  $nama = $_POST['nama_kriteria'];
  $bobot = floatval($_POST['bobot']);
  $jenis = $_POST['jenis'];

  // Ambil total bobot saat ini
  $query = mysqli_query($conn, "SELECT SUM(bobot) AS total_bobot FROM kriteria");
  $total = mysqli_fetch_assoc($query);
  $totalSaatIni = floatval($total['total_bobot']);

  // Cek apakah total bobot melebihi 1
  if (($totalSaatIni + $bobot) > 1) {
    $error = "Total bobot melebihi 1! Silakan sesuaikan bobot.";
  } else {
    if (tambahKriteria($nama, $bobot, $jenis)) {
      header("Location: kriteria.php?status=added");
      exit;
    } else {
      $error = "Gagal menambahkan data.";
    }
  }
}

?>

<!-- Tampilan -->
<div class="container-fluid px-4 mt-4">
  <div class="card shadow-sm col-md-6 col-lg-5">
    <div class="card-body">
      <h4 class="fw-bold mb-4 text-center">Tambah Kriteria</h4>

      <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error; ?></div>
      <?php endif; ?>

      <form method="post">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Kriteria</label>
          <input type="text" name="nama_kriteria" id="nama" class="form-control" autocomplete="off" required>
        </div>

        <div class="mb-3">
          <label for="bobot" class="form-label">Bobot</label>
          <input type="number" name="bobot" id="bobot" class="form-control" step="0.01" min="0" max="1" autocomplete="off" required>
        </div>

        <div class="mb-3">
          <label for="jenis" class="form-label">Jenis</label>
          <select name="jenis" id="jenis" class="form-select" required>
            <option value="">-- Pilih Jenis --</option>
            <option value="benefit">Benefit</option>
            <option value="cost">Cost</option>
          </select>
        </div>

        <div class="d-flex justify-content-between">
          <a href="kriteria.php" class="btn btn-secondary">Kembali</a>
          <button type="submit" name="submit" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include '../templates/footer.php'; ?>