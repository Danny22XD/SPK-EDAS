<?php 

session_start();

if(!isset($_SESSION["login"])){
  header("Location: ../login.php");
  exit;
}

include '../templates/layout.php';
include '../connect.php';

?>

<section class="section">

<!-- Tabel Responsive Auto Width -->
<div class="container">
  <div class="row">
    <div class="col-md-10 col-lg-8">
      <div class="card shadow-sm">
        <div class="card-body">
          <h4 class="fw-bold mb-4 text-center">Data Alternatif</h4>

          <!-- Tombol Tambah -->
          <div class="mb-3 text-end">
            <a href="tambah_alternatif.php" class="btn btn-primary">
              <i class="bi bi-plus-circle me-1"></i> Tambah Alternatif
            </a>
          </div>

          <!-- Tabel -->
          <div class="table-responsive text-center">
            <table class="table table-bordered table-striped align-middle">
              <thead class="table-primary">
                <tr>
                  <th style="white-space: nowrap;">No</th>
                  <th style="white-space: nowrap;">Nama Alternatif</th>
                  <th style="white-space: nowrap;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include '../connect.php';
                $query = "SELECT * FROM alternatif ORDER BY id_alternatif ASC";
                $result = mysqli_query($conn, $query);
                $no = 1;
                while($row = mysqli_fetch_assoc($result)) :
                ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $row['nama_alternatif']; ?></td>
                  <td>
                    <a href="edit_alternatif.php?id=<?= $row['id_alternatif']; ?>" class="btn btn-sm btn-warning me-1">
                      <i class="bi bi-pencil-square"></i> Edit
                    </a>
                    <button class="btn btn-danger btn-sm btn-hapus" data-id="<?= $row   ['id_alternatif']; ?>" data-nama="<?= $row['nama_alternatif']; ?>">
                    <i class="bi bi-trash"></i> Hapus
                    </button>
                  </td>
                </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<?php include '../templates/footer.php'; ?>