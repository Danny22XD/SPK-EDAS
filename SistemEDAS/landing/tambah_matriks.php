<?php
session_start();

if(!isset($_SESSION["login"])){
  header("Location: ../login.php");
  exit;
}

include '../templates/layout.php';
include '../connect.php';
include '../function.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id_alternatif = $_POST['id_alternatif'];
  $nilai = $_POST['nilai'];

  if (tambahMatriks($conn, $id_alternatif, $nilai)) {
    echo "<script>
         window.location.href = 'tambah_matriks.php?status=success';
         </script>";
exit;
  } else {
    $error = "Gagal menyimpan data matriks.";
  }
}

// Ambil semua alternatif
$alternatif = mysqli_query($conn, "SELECT * FROM alternatif 
                                    WHERE id_alternatif NOT IN 
                                    (SELECT DISTINCT id_alternatif FROM matriks)");

// Ambil semua kriteria
$kriteria = mysqli_query($conn, "SELECT * FROM kriteria ORDER BY id_kriteria ASC");
?>

<div class="container py-4">
  <div class="card shadow">
    <div class="card-header bg-success text-white">
      <i class="bi bi-plus-circle me-2"></i> Tambah Data Matriks
    </div>
    <div class="card-body">
      <form action="" method="post">
        <div class="mb-3">
          <label for="id_alternatif" class="form-label">Pilih Alternatif</label>
          <select name="id_alternatif" id="id_alternatif" class="form-select" required>
            <option value="">-- Pilih --</option>
            <?php while ($alt = mysqli_fetch_assoc($alternatif)) : ?>
              <option value="<?= $alt['id_alternatif']; ?>"><?= $alt['nama_alternatif']; ?></option>
            <?php endwhile; ?>
          </select>
        </div>

        <div class="row">
          <?php while ($k = mysqli_fetch_assoc($kriteria)) : ?>
            <div class="col-md-6 mb-3">
              <label class="form-label"><?= $k['nama_kriteria']; ?></label>
              <input type="number" step="any" name="nilai[<?= $k['id_kriteria']; ?>]" class="form-control" required>
            </div>
          <?php endwhile; ?>
        </div>

        <button type="submit" class="btn btn-primary">
          <i class="bi bi-save"></i> Simpan
        </button>
        <a href="matriks.php" class="btn btn-secondary">Kembali</a>
      </form>
    </div>
  </div>
</div>

<!-- Toast SweetAlert -->
 <?php if (isset($_GET['status']) && $_GET['status'] === 'success') : ?>
<script>
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',     // pojok kanan atas
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })

  Toast.fire({
    icon: 'success',
    title: 'Data matriks berhasil disimpan!'
  })
</script>
<?php endif; ?>


<?php include '../templates/footer.php'; ?>