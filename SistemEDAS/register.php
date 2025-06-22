<?php
include 'connect.php';
require 'function.php';

if (isset($_POST["register"])) {

   if (register($_POST) > 0) {
      header("Location: login.php");
      exit;
   } else {
      echo mysqli_error($conn);
   }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Halaman Register</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body class="bg-light">

<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center">
  <div class="row w-100 justify-content-center">
    <div class="col-md-8">

      <!-- Card Pembungkus Form -->
      <div class="card shadow-lg rounded-4 border-0">
        <div class="card-body p-5">
            <div class="text-center mb-3">
               <i class="bi bi-person-plus text-success" style="font-size: 4rem;"></i>
            </div>
            <h2 class="text-center mb-4 text-success fw-bold">Buat Akun Baru</h2>

          <!-- Form Register -->
          <form action="" method="post" autocomplete="off">
            <div class="row g-3">
              <!-- Username -->
              <div class="col-md-6">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" autocomplete="off" required>
              </div>

              <!-- Email -->
              <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" autocomplete="off" required>
              </div>

              <!-- Password -->
              <div class="col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" autocomplete="off" required>
              </div>

              <!-- Konfirmasi Password -->
              <div class="col-md-6">
                <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control" required autocomplete="off">
              </div>
            </div>

            <!-- Tombol Submit -->
            <div class="mt-4">
              <button type="submit" name="register" class="btn btn-success w-100">Register</button>
            </div>
          </form>

        </div>
      </div>

    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
