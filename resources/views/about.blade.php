<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                            <a class="nav-link" href="/">Home</a>
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
                            <a class="nav-link active" href="/about">About</a>
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

    <!-- About Section -->
    <section class="py-5 about-section" style="margin: 0 auto;">
        <div class="about-container" style="overflow-x: hidden;">
            <div class="row d-flex justify-content-center">
                <img src="../assets/img/art-gallery.jpg" alt="Art Exhibition">
            </div>
        </div>
        <div class="container">
            <div class="row d-flex align-items-center">
                <h1 class="page-title text-center" style="margin-top: 80px;">About Enthusiart</h1>
                <p class="page-text">Enthusiart is a virtual art gallery that showcases a diverse collection of artworks from talented artists. Experience the mesmerizing beauty and diverse creativity conveyed through various mediums and styles, infusing every moment with vibrancy and inspiration. Step into a world of boundless creativity, where cultures converge and art transforms into a realm of endless possibilities.</p>
            </div>
            <div class="row d-flex align-items-center mb-3">
                <h1 class="page-title text-center" style="margin-top: 80px;">Our Services</h1>
                <div class="card text-center mt-3">
                    <div class="card-body">
                        <img src="../assets/img/vector-06.png" alt="Artworks icon" style="width: 65px; height: 40px;">
                        <p class="card-text">Find artworks</p>
                    </div>
                </div>
                <div class="card text-center mt-3">
                    <div class="card-body">
                        <img src="../assets/img/vector-07.png" alt="Artworks icon" style="width: 50px; height: 45px;">
                        <p class="card-text">Share your artworks</p>
                    </div>
                </div>
                <div class="card text-center mt-3">
                    <div class="card-body">
                        <i class="fa-solid fa-heart fa-2xl" style="color: #364A99;"></i>
                        <p class="card-text">Add artworks to your favorite</p>
                    </div>
                </div>
            </div>
            <div class="row d-flex m-3 mb-3">
                <a class="btn btn-contact" href="/contact">
                    <img src="../assets/img/vector-08.png" alt="Artworks icon" style="width: 20px; height: 20px; margin-right: 10px;">
                    Get in touch with us
                </a>
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
</body>
</html>