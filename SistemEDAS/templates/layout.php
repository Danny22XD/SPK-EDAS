<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>SPK - Sistem</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Style CSS -->
  <link rel="stylesheet" href="../asset/style.css">
  <!-- SweetAlert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="d-flex">
  <!-- Sidebar -->
  <div class="sidebar p-3">
    <h5 class="text-dark text-center fw-bold mb-4">Menu</h5>
    <a href="dashboard.php" class="<?= basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : '' ?>">
      <i class="bi bi-speedometer2 me-2"></i> Dashboard
    </a>
    <a href="alternatif.php" class="<?= basename($_SERVER['PHP_SELF']) == 'alternatif.php' ? 'active' : '' ?>">
      <i class="bi bi-people-fill me-2"></i> Alternatif
    </a>
    <a href="kriteria.php" class="<?= basename($_SERVER['PHP_SELF']) == 'kriteria.php' ? 'active' : '' ?>">
      <i class="bi bi-list-task me-2"></i> Kriteria
    </a>
    <a href="matriks.php" class="<?= basename($_SERVER['PHP_SELF']) == 'matriks.php' ? 'active' : '' ?>">
      <i class="bi bi-table me-2"></i> Matriks
    </a>
    <a href="perhitungan.php" class="<?= basename($_SERVER['PHP_SELF']) == 'perhitungan.php' ? 'active' : '' ?>">
      <i class="bi bi-cpu me-2"></i> Perhitungan
    </a>
    <a href="ranking.php" class="<?= basename($_SERVER['PHP_SELF']) == 'ranking.php' ? 'active' : '' ?>">
      <i class="bi bi-trophy me-2"></i> Rangking
    </a>
  </div>

  <!-- Main Content -->
  <div class="flex-grow-1">
    <!-- Header -->
    <div class="header">
      <h4 class="m-0">Sistem Pendukung Keputusan</h4>
      <div class="profile">
        <i class="bi bi-person-circle fs-4"></i>
        <span class="fw-semibold">Admin</span>
        <a href="../logout.php" class="btn btn-outline-light btn-sm ms-3">Logout</a>
      </div>
    </div>

    <!-- Dynamic Content -->
    <div class="content">
