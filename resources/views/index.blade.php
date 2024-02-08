@extends('template.template')
@section('content')
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
@endsection