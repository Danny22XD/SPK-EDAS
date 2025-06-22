<?php
session_start();

if(!isset($_SESSION["login"])){
  header("Location: ../login.php");
  exit;
}

include '../templates/layout.php';
include '../connect.php';
include '../function.php';

if(!isset($_GET['id'])){
   header("Location: kriteria.php");
   exit;
}

$id = $_GET['id'];
$data = getKriteriaById($id);

if(!$data){
   header("Location: kriteria.php");
   exit;
}

// Proses update
if (isset($_POST['submit'])) {
  $nama = $_POST['nama_kriteria'];
  $bobotBaru = floatval($_POST['bobot']);
  $jenis = $_POST['jenis'];

  // Ambil total bobot semua kecuali yang sedang diedit
  $query = mysqli_query($conn, "SELECT SUM(bobot) AS total_bobot FROM kriteria WHERE id_kriteria != $id");
  $total = mysqli_fetch_assoc($query);
  $totalSaatIni = floatval($total['total_bobot']);

  if (($totalSaatIni + $bobotBaru) > 1) {
    $error = "Total bobot melebihi 1! Silakan sesuaikan bobot.";
  } else {
    if (updateKriteria($id, $nama, $bobotBaru, $jenis)) {
      header("Location: kriteria.php?status=updated");
      exit;
    } else {
      $error = "Gagal mengupdate data.";
    }
  }
}

?>

<!-- Tampilan -->
<div class="container-fluid px-4 mt-4">
  <div class="card shadow-sm col-md-6 col-lg-5">
    <div class="card-body">
      <h4 class="fw-bold mb-4 text-center">Edit Kriteria</h4>

      <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error; ?></div>
      <?php endif; ?>

      <form method="post">
        <div class="mb-3">
          <label class="form-label">Nama Kriteria</label>
          <input type="text" name="nama_kriteria" class="form-control" value="<?= $data['nama_kriteria']; ?>" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Bobot</label>
          <input type="number" name="bobot" class="form-control" value="<?= $data['bobot']; ?>" step="0.01" min="0" max="1" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Jenis</label>
          <select name="jenis" class="form-select" required>
            <option value="benefit" <?= $data['jenis'] == 'benefit' ? 'selected' : '' ?>>Benefit</option>
            <option value="cost" <?= $data['jenis'] == 'cost' ? 'selected' : '' ?>>Cost</option>
          </select>
        </div>

        <div class="d-flex justify-content-between">
          <a href="kriteria.php" class="btn btn-secondary">Kembali</a>
          <button type="submit" name="submit" class="btn btn-success">Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include '../templates/footer.php'; ?>