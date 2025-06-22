<?php

session_start();
if(isset($_SESSION["login"])){
   header("Location: landing/dashboard.php");
   exit;
}

require 'function.php';
include 'connect.php';

if(isset($_POST["login"])){

   $username = $_POST["username"];
   $password = $_POST["password"];

   $query = "SELECT * FROM informasi_pengguna WHERE username = '$username'";
   $result = mysqli_query($conn, $query);

   if(mysqli_num_rows($result) === 1){
      $dataUser = mysqli_fetch_assoc($result);
      //cek password
      if(password_verify($password, $dataUser["password"])){
         //cek session
         $_SESSION["login"] = true;
         //jika ada teruskan ke
         header("Location: landing/dashboard.php");
         exit;
      }
   }
   $error = true;
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Halaman Login</title>

  <!-- Bootstrap CSS & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">

  <style>
    .login-image {
      height: 100vh;
      object-fit: cover;
      width: 100%;
    }
  </style>
</head>
<body>
<div class="login">
   <div class="container-fluid">
      <div class="row">

         <!-- Kolom Kiri: Form Login -->
         <div class="col-md-6 d-flex align-items-center justify-content-center min-vh-100">
            <div class="w-75 text-center">
               <div class="mb-3">
                  <i class="bi bi-person-circle text-primary" style="font-size: 4rem;"></i>
               </div>
               <h2 class="mb-4 fw-bold">Masuk ke Akun</h2>
               <form action="" method="POST">
                  <div class="mb-3">
                     <label for="username" class="form-label">Username</label>
                     <input type="username" name="username" id="username" class="form-control auto" autocomplete="off" required>
                  </div>
                  <div class="mb-4">
                     <label for="password" class="form-label">Kata Sandi</label>
                     <input type="password" name="password" id="password" class="form-control" autocomplete="off" required>
                  </div>
                  <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
               </form>
               <p class="mt-4">Belum memiliki akun? <a href="register.php" class="text-decoration-none">Register</a></p>
            </div>
         </div>

         <!-- Kolom Kanan: Gambar -->
         <div class="col-md-6 d-none d-md-block p-0 bg-light">
            <img src="img/img-login.png" alt="Ilustrasi Login" class="login-image">
         </div>
      </div>
   </div>
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
