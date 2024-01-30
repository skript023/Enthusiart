<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Enthusiart</title>
		<link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo-72.png">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
		<link rel="stylesheet" href="../assets/css/style.css">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<!-- Header Start  -->
	<header class="header">
		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg navbar-light">
			<!-- Container Wrapper -->
			<div class="container d-flex justify-content-between align-items-center">
				<!-- Logo -->
				<div class="logo-wrapper">
					<a class="navbar-brand me-2" href="#">
						<img src="../assets/img/logo-72.png" alt="Enthusiart Logo">
					</a>
				</div>

				<!-- Menu -->
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>      

				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav mx-auto">
						<li class="nav-item">
							<a class="nav-link active" href="/">Home</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Artworks
							</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="#">Art</a></li>
								<li><a class="dropdown-item" href="#">Photography</a></li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/about">About</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/contact">Contact</a>
						</li>
					</ul>
					<div class="ml-auto">
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="btn btn-link" href="#">Login</a>
							</li>
							<li class="nav-item">
								<a class="btn btn-fill" href="#">Register</a>
							</li>
						</ul>
					</div>
				<!-- Menu End -->
			</div>
			<!-- Container Wrapper End -->
		</nav>
		<!-- Navbar End -->
	</header>
	<!-- Header End -->

	<!-- Carousel -->
	<div id="carouselIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="../assets/img/carousel-01.jpg" class="d-block w-100" alt="Slide 1">
			</div>
			<div class="carousel-item">
				<img src="../assets/img/carousel-02.jpg" class="d-block w-100" alt="Slide 2">
			</div>
			<div class="carousel-item">
				<img src="../assets/img/carousel-03.jpg" class="d-block w-100" alt="Slide 3">
			</div>
			<div class="carousel-item">
				<img src="../assets/img/carousel-04.jpg" class="d-block w-100" alt="Slide 4">
			</div>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carouselIndicators" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carouselIndicators" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>

	<!-- About -->
	<section class="py-5 about-section" id="about">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6">
					<img src="../assets/img/vector-01.png" class="vector1" alt="About">
				</div>
				<div class="col-md-6">
					<h1 class="about-title">About</h1>
					<p class="section-text">
						Enthusiart is a virtual art gallery that showcases a diverse collection of artworks from talented artists. Experience the mesmerizing beauty and diverse creativity conveyed through various mediums and styles, infusing every moment with vibrancy and inspiration. Step into a world of boundless creativity, where cultures converge and art transforms into a realm of endless possibilities.
					</p>
				</div>
			</div>
		</div>
	</section>

	<!-- Explore Artworks -->
	<section class="py-5 explore-section">
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="col-md-6 order-sm-first order-last">
					<h2 class="section-title">Discover your perfect piece!</h2>
					<p class="section-text">
						Embark on a journey of artistic discovery and find the masterpiece that resonates with your soul.
					</p>
					<a class="btn btn-fill" href="#">Explore Artworks</a>
				</div>
				<div class="col-md-6">
					<img src="../assets/img/vector-02.png" class="vector2" alt="Explore Artworks">
				</div>
			</div>
		</div>
	</section>

	<!-- Join as an Artist -->
	<section class="py-5 joinArtist-section">
		<div class="container">
			<div class="row d-flex align-items-center">
				<div class="col-md-6">
					<img src="../assets/img/vector-03.png" class="vector3" alt="Join as an Artist">
				</div>
				<div class="col-md-6">
					<h2 class="section-title">Share your masterpiece!</h2>
					<p class="section-text">
						Express your creativity and let the world witness the enchantment of your unique masterpiece.
					</p>
					<a class="btn btn-fill" href="/register">Join as an Artist</a>
				</div>
			</div>
		</div>
	</section>

	<!-- Footer -->
	<footer class="footer">
		<div class="container mt-5">
			<div class="row mt-3">

				<!-- Footer Brand -->
				<div class="footer-brand col-lg-6 col-md-12 mb-4 mb-md-0">
					<img src="../assets/img/logo-72.png" alt="Enthusiart">
					<h4>Enthusiart</h4>
					<p>Masterworks of Creativity</p>
				</div>

				<!-- Links -->
				<div class="footer-links col-md-2 col-lg-12 col-xl-2 mx-auto mb-4">
					<h5 class="mb-4">Links</h5>
					<p><a href="#" class="links">Home</a></p>
					<p><a href="#" class="links">About</a></p>
				</div>

				<!-- Artworks Link -->
				<div class="footer-links col-lg-2 col-xl-2 mx-auto mb-4">
					<h5 class="mb-4">Artworks</h5>
					<p><a href="#" class="links">Art</a></p>
					<p><a href="#" class="links">Photography</a></p>
				</div>

				<!-- Contact Us  -->
				<div class="footer-links col-lg-2 col-xl-2 mx-auto mb-4">
					<h5 class="mb-4">Contact Us</h5>
					<p>info@enthusiart.com</p>
					<p>(021) 12345678 </p>
				</div>
			</div>

			<hr class="my-2" style="width: 1000px;">
		
			<!-- Copyright -->
			<div class="cr-text p-4">
				<h6>Copyright © 2023 Enthusiart</h6>
			</div>
		</div>
	</footer>
	<!-- Footer End -->

	<script src="../assets/js/script.js"></script>
</body>
</html>