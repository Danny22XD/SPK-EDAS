<?php
include '../templates/layout.php';
include '../connect.php';
include '../function.php';

// Ambil semua kriteria
$kriteria = mysqli_query($conn, "SELECT * FROM kriteria ORDER BY id_kriteria ASC");
$daftarKriteria = [];
while ($k = mysqli_fetch_assoc($kriteria)) {
  $daftarKriteria[] = $k;
}

// Ambil semua alternatif
$alternatif = mysqli_query($conn, "SELECT * FROM alternatif");
?>

<div class="container">
  <div class="card shadow">
    <div class="card-header bg-primary text-white">
      <i class="bi bi-table me-2"></i> Matriks Keputusan Nilai Alternatif
    </div>
    <div class="card-body">
      <div class="mb-3">
        <a href="tambah_matriks.php" class="btn btn-success">
          <i class="bi bi-plus-circle"></i> Tambah Data Matriks
        </a>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
          <thead class="table-light">
            <tr>
              <th>Nama Alternatif</th>
              <?php foreach ($daftarKriteria as $k): ?>
                <th><?= $k['nama_kriteria']; ?></th>
              <?php endforeach; ?>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($alt = mysqli_fetch_assoc($alternatif)) : ?>
              <tr>
                <td><?= $alt['nama_alternatif']; ?></td>
                <?php foreach ($daftarKriteria as $k): ?>
                  <td>
                    <?php
                    $idAlt = $alt['id_alternatif'];
                    $idKri = $k['id_kriteria'];
                    $nilai = mysqli_query($conn, "SELECT nilai FROM matriks WHERE id_alternatif = $idAlt AND id_kriteria = $idKri");
                    $n = mysqli_fetch_assoc($nilai);
                    echo $n ? $n['nilai'] : '-';
                    ?>
                  </td>
                <?php endforeach; ?>
                <td>
                  <a href="edit_matriks.php?id=<?= $alt['id_alternatif']; ?>" class="btn btn-sm btn-warning">
                    <i class="bi bi-pencil-square"></i> Edit
                  </a>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php include '../templates/footer.php'; ?>