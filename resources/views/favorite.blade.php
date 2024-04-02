@extends('template.template')
@section('content')
<section class="py-5 card-section mb-5" style="margin-top: 80px;">
    <div class="container">
        <h1 class="page-title text-center">My Favorites</h1>
        <!-- Card Section -->
        <div class="row d-flex">
            <div class="card-artwork">
                <div class="d-flex justify-content-between">
                    <h2 class="artist-name">Raden Saleh</h2>
                    <div class="fav-wrapper">
                        <a href="#">
                            <i class="fa-solid fa-heart fa-xl" style="color: #E61010;"></i>
                        </a>
                    </div>
                </div>
                <img src="../assets/img/1.jpg" class="card-img-top">
                <div class="card-body">
                    <h2 class="artwork-title">Perburuan Banteng</h2>
                    <p class="card-desc">Acrylic on Canvas<br>110 x 80 cm</p>
                    <a href="#" class="card-link">View Details</a>
                </div>
            </div>

            <div class="card-artwork">
                <div class="d-flex justify-content-between">
                    <h2 class="artist-name">Raden Saleh</h2>
                    <div class="fav-container">
                        <a href="#">
                            <i class="fa-solid fa-heart fa-xl" style="color: #E61010;"></i>
                        </a>
                    </div>
                </div>
                <img src="../assets/img/1.jpg" class="card-img-top">
                <div class="card-body">
                    <h2 class="artwork-title">Perburuan Banteng</h2>
                    <p class="card-desc">Acrylic on Canvas<br>110 x 80 cm</p>
                    <a href="#" class="card-link">View Details</a>
                </div>
            </div>

            <div class="card-artwork">
                <div class="d-flex justify-content-between">
                    <h2 class="artist-name">Raden Saleh</h2>
                    <div class="fav-container">
                        <a href="#">
                            <i class="fa-solid fa-heart fa-xl" style="color: #E61010;"></i>
                        </a>
                    </div>
                </div>
                <img src="../assets/img/1.jpg" class="card-img-top">
                <div class="card-body">
                    <h2 class="artwork-title">Perburuan Banteng</h2>
                    <p class="card-desc">Acrylic on Canvas<br>110 x 80 cm</p>
                    <a href="#" class="card-link">View Details</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection