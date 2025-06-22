<?php 
session_start();

if(!isset($_SESSION["login"])){
  header("Location: ../login.php");
  exit;
}

include '../templates/layout.php';
include '../connect.php';

// Ambil data ringkasan
$totalAlternatif = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM alternatif"));
$totalKriteria   = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kriteria"));
$result = mysqli_query($conn, "SELECT COUNT(*) as total FROM matriks");
$data = mysqli_fetch_assoc($result);
$totalMatriks = $data['total'];

?>

<div class="container">
  <h4 class="mb-4">Selamat Datang di Sistem Pendukung Keputusan Seleksi Asisten Dosen (EDAS)</h4>

  <!-- Statistik -->
  <div class="row mb-4">
    <div class="col-md-4 mb-3">
      <div class="card text-white bg-primary shadow">
        <div class="card-body d-flex justify-content-between align-items-center">
          <div>
            <h5 class="card-title">Alternatif</h5>
            <h3><?= $totalAlternatif ?></h3>
          </div>
          <i class="bi bi-people-fill fs-1"></i>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <div class="card text-white bg-info shadow">
        <div class="card-body d-flex justify-content-between align-items-center">
          <div>
            <h5 class="card-title">Kriteria</h5>
            <h3><?= $totalKriteria ?></h3>
          </div>
          <i class="bi bi-kanban fs-1"></i>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <div class="card text-white bg-success shadow">
        <div class="card-body d-flex justify-content-between align-items-center">
          <div>
            <h5 class="card-title">Data Matriks</h5>
            <h3><?= $totalMatriks ?></h3>
          </div>
          <i class="bi bi-table fs-1"></i>
        </div>
      </div>
    </div>
  </div>

  <!-- Peringkat Tertinggi -->
  <div class="card shadow mb-4">
    <div class="card-header bg-dark text-white">
      <i class="bi bi-trophy-fill me-2"></i> Top 3 Alternatif
    </div>
    <div class="card-body">
      <table class="table table-bordered text-center">
        <thead class="table-light">
          <tr>
            <th>Peringkat</th>
            <th>Nama Alternatif</th>
            <th>Nilai AS</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = mysqli_query($conn, "SELECT * FROM view_as ORDER BY nilai_as DESC LIMIT 3");
          $no = 1;
          while ($row = mysqli_fetch_assoc($query)) :
          ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['nama_alternatif']; ?></td>
            <td><?= number_format($row['nilai_as'], 3); ?></td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>  

<?php include '../templates/footer.php'; ?>
