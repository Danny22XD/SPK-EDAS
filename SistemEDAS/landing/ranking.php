<?php
session_start();

if(!isset($_SESSION["login"])){
  header("Location: ../login.php");
  exit;
}

include '../templates/layout.php';
include '../connect.php'; // koneksi database

// Ambil data dari view_as, urutkan berdasarkan nilai_as tertinggi
$query = mysqli_query($conn, "SELECT * FROM view_as ORDER BY nilai_as DESC");
?>

<div class="container">
  <h4 class="mb-3">Peringkat Alternatif (Ranking)</h4>

  <div class="card shadow">
    <div class="card-header bg-dark text-white">
      <i class="bi bi-trophy-fill me-2"></i> Ranking Hasil Seleksi
    </div>
    <div class="card-body">
      <table class="table table-bordered table-striped text-center">
        <thead class="table-light">
          <tr>
            <th>Peringkat</th>
            <th>Nama Alternatif</th>
            <th>Nilai AS</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $peringkat = 1;
          while ($row = mysqli_fetch_assoc($query)) :
          ?>
            <tr>
              <td><?= $peringkat++; ?></td>
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
