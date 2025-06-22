<?php
include 'connect.php';

?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bootstrap demo</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
	<nav class="navbar navbar-expand-lg bg-primary py-3 sticky-top border-bottom shadow-sm">
		<div class="container d-flex justify-content-between align-items-center">
			<div class="flex-grow-1">
				<a class="navbar-brand text-white fs-3" href="#">SPK EDAS</a>
			</div>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
				aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse flex-grow-1 d-flex justify-content-center gap-4" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link text-white mx-3 fs-5" href="#home">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-white fs-5" href="#features">Features</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-white mx-3 fs-5" href="#about">About</a>
					</li>
				</ul>
			</div>
			<div class="flex-grow-1 d-flex justify-content-end gap-2">
				<a class="nav-link mx-4 fs-5" href="login.php">Login</a>
				<a class="nav-link fs-5" href="register.php">Register</a>
			</div>
		</div>
	</nav>

	<!-- Section Home Start-->
	<section class="hero bg-primary" id="home">
		<div class="container">
			<div class="col-md-6">
				<main class="content">
					<h1>MEMBUAT KEPUTUSAN TERASA LEBIH MUDAH</h1>
					<P>Sebuah Sistem Pendukung Keputusan yang Mudah dan Menyenangkan</P>
				</main>
			</div>
		</div>
	</section>
	<!-- Section Home End -->

	<!-- Section Features Start -->
	<section class="bg-white py-5" id="features">
		<div class="container">
			<h2 class="text-dark text-center mt-5 mb-5">Features</h2>
			<div class="row text-center">
				<!-- Feature 1 -->
				<div class="col-md-4 mb-4">
					<div class="p-4 border rounded shadow-sm h-100 text-center">
						<i class="bi bi-speedometer2 fs-1 text-primary mb-3"></i>
						<h5 class="fw-bold text-dark">Cepat</h5>
						<p class="text-dark">Respon sistem cepat dan efisien untuk pengguna.</p>
					</div>
				</div>

				<!-- Feature 2 -->
				<div class="col-md-4 mb-4">
					<div class="p-4 border rounded shadow-sm h-100">
						<i class="bi bi-shield-check fs-1 text-success mb-3"></i>
						<h5 class="fw-bold text-dark">Aman</h5>
						<p class="text-dark">Keamanan data pengguna terjamin dengan enkripsi.</p>
					</div>
				</div>

				<!-- Feature 3 -->
				<div class="col-md-4 mb-4">
					<div class="p-4 border rounded shadow-sm h-100">
						<i class="bi bi-gear fs-1 text-warning mb-3"></i>
						<h5 class="fw-bold text-dark">Fleksibel</h5>
						<p class="text-dark">Mudah disesuaikan dengan berbagai kebutuhan pengguna.</p>
					</div>
				</div>

				<!-- Feature 4 -->
				<div class="col-md-4 mb-4">
					<div class="p-4 border rounded shadow-sm h-100 text-center">
						<i class="bi bi-database-fill-gear fs-1 text-info mb-3"></i>
						<h5 class="fw-bold text-dark">Data yang Dinamis</h5>
						<p class="text-dark">Data dapat berubah secara real-time sesuai kebutuhan pengguna dan sistem.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Section Features End -->

	<!-- Section About Start -->
	<section class="pb-5 bg-white" id="about">
		<div class="container">
			<div class="row align-items-center">

				<!-- Kolom Gambar -->
				<div class="col-md-6 mb-4 mb-md-0 text-center">
					<img src="img/about-img1.jpg" class="img-fluid rounded shadow" alt="About Image">
				</div>

				<!-- Kolom Tulisan dengan Navigasi Tab -->
				<div class="col-md-6">
					<h2 class="text-dark text-center mb-3">About</h2>
					<div class="p-4 bg-white rounded shadow">

						<!-- Navigasi Tab -->
						<ul class="nav nav-tabs mb-3" id="aboutTab" role="tablist">
							<li class="nav-item" role="presentation">
								<button class="nav-link active" id="spk-tab" data-bs-toggle="tab" data-bs-target="#spk"
									type="button" role="tab">
									SPK
								</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="edas-tab" data-bs-toggle="tab" data-bs-target="#edas" type="button"
									role="tab">
									Metode EDAS
								</button>
							</li>
						</ul>

						<!-- Isi Tab -->
						<div class="tab-content" id="aboutTabContent">
							<div class="tab-pane fade show active" id="spk" role="tabpanel">
								<h5 class="fw-bold text-dark">Sistem Pendukung Keputusan (SPK)</h5>
								<p class="text-dark">SPK adalah sistem yang membantu pengambilan keputusan dengan menganalisis
									data dan alternatif yang tersedia secara sistematis, objektif, dan terstruktur.</p>
							</div>
							<div class="tab-pane fade" id="edas" role="tabpanel">
								<h5 class="fw-bold text-dark">Metode EDAS</h5>
								<p class="text-dark">EDAS (Evaluation based on Distance from Average Solution) adalah
									metode dalam SPK yang
									menilai alternatif berdasarkan kedekatannya dengan nilai rata-rata, melalui Positive Distance
									(PDA) dan Negative Distance (NDA).</p>
							</div>
						</div>

					</div>
				</div>

			</div>
		</div>
	</section>
	<!-- Section About End -->

	<!-- Footer -->
	<footer class="bg-dark text-white pt-4">
		<div class="container">
			<div class="row text-center">

				<!-- Logo atau Nama Website -->
				<div class="col-md-4 mb-3">
					<h5 class="fw-bold">SPK EDAS</h5>
					<p class="text-white">Sistem Pendukung Keputusan berbasis metode EDAS.</p>
				</div>

				<!-- Navigasi Footer -->
				<div class="col-md-4 mb-3">
					<h6 class="fw-bold">Navigasi</h6>
					<ul class="list-unstyled">
						<li><a href="#home" class="text-white text-decoration-none">Home</a></li>
						<li><a href="#features" class="text-white text-decoration-none">Features</a></li>
						<li><a href="#about" class="text-white text-decoration-none">About</a></li>
					</ul>
				</div>

				<!-- Kontak atau Sosial Media -->
				<div class="col-md-4 mb-3">
					<h6 class="fw-bold">Hubungi Kami</h6>
					<p class="mb-1"><i class="bi bi-envelope"></i> susenodani868@gmail.com</p>
					<p><i class="bi bi-telephone"></i> +62 8591-5268-6045</p>
				</div>

			</div>

			<hr class="border-secondary">

			<div class="text-center small pb-3 align-items-center">
				&copy; 2025 SPK EDAS. Dibuat dengan <i class="bi bi-heart-fill fs-6 text-danger"></i>
			</div>
		</div>
	</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
		crossorigin="anonymous"></script>
</body>

</html>