<?php
session_start();

if(!isset($_SESSION["login"])){
  header("Location: ../login.php");
  exit;
}

include '../templates/layout.php';
include '../connect.php';
include '../function.php';
?>

<div class="container-fluid px-4 mt-4">
  <div class="card shadow-sm">
  <div class="card-body">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h4 class="fw-bold mb-0">Data Kriteria</h4>
      <a href="tambah_kriteria.php" class="btn btn-primary">
        <i class="bi bi-plus-circle me-1"></i> Tambah Kriteria
      </a>
    </div>

      <div class="table-responsive text-center">
        <table class="table table-bordered table-striped align-middle">
          <thead class="table-primary">
            <tr>
              <th>No</th>
              <th>Nama Kriteria</th>
              <th>Bobot</th>
              <th>Jenis</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = "SELECT * FROM kriteria ORDER BY id_kriteria ASC";
            $result = mysqli_query($conn, $query);
            $no = 1;
            while($row = mysqli_fetch_assoc($result)) :
            ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $row['nama_kriteria']; ?></td>
              <td><?= $row['bobot']; ?></td>
              <td><?= ucfirst($row['jenis']); ?></td>
              <td>
                <a href="edit_kriteria.php?id=<?= $row['id_kriteria']; ?>" class="btn btn-sm btn-warning me-1">
                  <i class="bi bi-pencil-square"></i> Edit
                </a>
                <button class="btn btn-danger btn-sm btn-hapus" data-id="<?= $row   ['id_kriteria']; ?>" data-nama="<?= $row['nama_kriteria']; ?>">
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

<?php include '../templates/footer.php'; ?>