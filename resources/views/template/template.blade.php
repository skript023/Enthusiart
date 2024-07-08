<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Enthusiart</title>
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets') }}/img/logo-72.png">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
		<link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">
		<link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
	<!-- Header Start  -->
	@include('template.navigation')
	<!-- Header End -->
	@yield('content')
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
					{{--  <h5 class="mb-4">Links</h5>  --}}
					<p><a href="#" class="links">Home</a></p>
					<p><a href="/about" class="links">About</a></p>
					<p><a href="/gallery" class="links">Gallery</a></p>
				</div>

				<!-- Artworks Link -->
				{{--  <div class="footer-links col-lg-2 col-xl-2 mx-auto mb-4">
					<h5 class="mb-4">Artworks</h5>
					<p><a href="#" class="links">Art</a></p>
					<p><a href="#" class="links">Photography</a></p>
				</div>  --}}

				<!-- Contact Us  -->
				<div class="footer-links col-lg-2 col-xl-2 mx-auto mb-4">
					<h5 class="mb-4">Contact Us</h5>
					<p>info@enthusiart.com</p>
					<p>(021) 12345678 </p>
				</div>
			</div>

			<hr class="my-2">

			<!-- Copyright -->
			<div class="cr-text p-4">
				<h6>Copyright &copy; 2023 Enthusiart</h6>
			</div>
		</div>
	</footer>
	<!-- Footer End -->
	
	<script src="{{ asset('assets') }}/js/script.js"></script>
	{{--  <script>
		$(document).ready(function()
		{
			
		});
	</script>  --}}
    @stack('scripts')
</body>
</html>
