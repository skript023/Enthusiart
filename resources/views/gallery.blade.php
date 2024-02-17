@extends('template.template')
@section('content')
<section class="py-5 gallery-section" style="margin-top: 80px;">
    <div class="container">
        <h1 class="page-title text-center">Artworks</h1>
        <!-- Card Section -->
        <div class="row d-flex">
            <div class="card-artwork">
                <div class="d-flex justify-content-between">
                    <h2 class="artist-name">Raden Saleh</h2>
                    <div class="fav-wrapper">
                        <i class="fa-regular fa-heart fa-xl" role="button" style="color: #364A99;"></i>
                    </div>
                </div>
                <img src="../assets/img/1.jpg" class="card-img-top">
                <div class="card-body">
                    <h2 class="art-title">Perburuan Banteng</h2>
                    <p class="card-desc">Acrylic on Canvas<br>110 x 80 cm</p>
                    <a href="#" class="card-link">View Details</a>
                </div>
            </div>

            <div class="card-artwork">
                <div class="d-flex justify-content-between">
                    <h2 class="artist-name">Raden Saleh</h2>
                    <div class="fav-container">
                        <i class="fa-regular fa-heart fa-xl" role="button" style="color: #364A99;"></i>
                    </div>
                </div>
                <img src="../assets/img/1.jpg" class="card-img-top">
                <div class="card-body">
                    <h2 class="art-title">Perburuan Banteng</h2>
                    <p class="card-desc">Acrylic on Canvas<br>110 x 80 cm</p>
                    <a href="#" class="card-link">View Details</a>
                </div>
            </div>

            <div class="card-artwork">
                <div class="d-flex justify-content-between">
                    <h2 class="artist-name">Raden Saleh</h2>
                    <div class="fav-container">
                        <i class="fa-regular fa-heart fa-xl" role="button" style="color: #364A99;"></i>
                    </div>
                </div>
                <img src="../assets/img/1.jpg" class="card-img-top">
                <div class="card-body">
                    <h2 class="art-title">Perburuan Banteng</h2>
                    <p class="card-desc">Acrylic on Canvas<br>110 x 80 cm</p>
                    <a href="#" class="card-link">View Details</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection