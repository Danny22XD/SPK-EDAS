<?php
session_start();

if(!isset($_SESSION["login"])){
  header("Location: ../login.php");
  exit;
}

include '../templates/layout.php';
include '../connect.php';
include '../function.php';

if (!isset($_GET['id'])) {
  header("Location: matriks.php");
  exit;
}

$id_alternatif = $_GET['id'];

// Ambil nama alternatif
$altQuery = mysqli_query($conn, "SELECT * FROM alternatif WHERE id_alternatif = $id_alternatif");
$alternatif = mysqli_fetch_assoc($altQuery);
if (!$alternatif) {
  header("Location: matriks.php");
  exit;
}

// Ambil semua kriteria
$kriteria = mysqli_query($conn, "SELECT * FROM kriteria ORDER BY id_kriteria ASC");

// Ambil nilai yang sudah ada
$nilaiMatriks = [];
$qNilai = mysqli_query($conn, "SELECT * FROM matriks WHERE id_alternatif = $id_alternatif");
while ($n = mysqli_fetch_assoc($qNilai)) {
  $nilaiMatriks[$n['id_kriteria']] = $n['nilai'];
}

// Proses update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nilaiBaru = $_POST['nilai'];

  if (tambahMatriks($conn, $id_alternatif, $nilaiBaru)) {
    echo "<script>
      Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: 'Data matriks berhasil diperbarui!',
        timer: 1000,
        showConfirmButton: false
      }).then(() => {
        window.location.href = 'matriks.php';
      });
    </script>";
    exit;
  } else {
    $error = "Gagal menyimpan perubahan.";
  }
}
?>

<div class="container">
  <div class="card shadow">
    <div class="card-header bg-warning text-dark">
      <i class="bi bi-pencil-square me-2"></i> Edit Data Matriks
    </div>
    <div class="card-body">
      <form method="post">
        <div class="mb-3">
          <label class="form-label">Nama Alternatif</label>
          <input type="text" class="form-control" value="<?= $alternatif['nama_alternatif']; ?>" disabled>
        </div>

        <div class="row">
          <?php while ($k = mysqli_fetch_assoc($kriteria)) : ?>
            <div class="col-md-6 mb-3">
              <label class="form-label"><?= $k['nama_kriteria']; ?></label>
              <input type="number" step="any" name="nilai[<?= $k['id_kriteria']; ?>]"
                     value="<?= isset($nilaiMatriks[$k['id_kriteria']]) ? $nilaiMatriks[$k['id_kriteria']] : ''; ?>"
                     class="form-control" required>
            </div>
          <?php endwhile; ?>
        </div>

        <button type="submit" class="btn btn-primary">
          <i class="bi bi-save"></i> Simpan Perubahan
        </button>
        <a href="matriks.php" class="btn btn-secondary">Batal</a>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php include '../templates/footer.php'; ?>
