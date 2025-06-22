<?php
session_start();

if(!isset($_SESSION["login"])){
  header("Location: ../login.php");
  exit;
}

include '../templates/layout.php';
include '../connect.php';
require '../function.php';

if (!isset($_GET['id'])) {
  header("Location: alternatif.php");
  exit;
}

$id = $_GET['id'];
$data = getAlternatifById($id);

if (!$data) {
  header("Location: alternatif.php");
  exit;
}

// Proses update
if (isset($_POST['submit'])) {
  $nama = $_POST['nama_alternatif'];

  if (updateAlternatif($id, $nama)) {
    header("Location: alternatif.php?status=updated");
    exit;
  } else {
    $error = "Gagal mengupdate data.";
  }
}
?>

<!-- Tampilan -->
<div class="container-fluid px-4 mt-4">
  <div class="card shadow-sm col-md-6 col-lg-5">
    <div class="card-body">
      <h4 class="fw-bold mb-4 text-center">Edit Nama Alternatif</h4>

      <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error; ?></div>
      <?php endif; ?>

      <form method="post">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Alternatif</label>
          <input type="text" name="nama_alternatif" id="nama" class="form-control" value="<?= $data['nama_alternatif']; ?>" autocomplete="off" required>
        </div>

        <div class="d-flex justify-content-between">
          <a href="alternatif.php" class="btn btn-secondary">Kembali</a>
          <button type="submit" name="submit" class="btn btn-success">Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include '../templates/footer.php'; ?>