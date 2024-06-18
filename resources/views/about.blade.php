@extends('template.template')
@section('content')
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
            <div class="card text-center justify-content-center align-items-center mt-3">
                <div class="card-body flex-1 text-center justify-content-center align-items-center">
                    <img src="../assets/img/vector-06.png" alt="Artworks icon" style="width: 65px; height: 40px;">
                    <p class="card-text">Find artworks</p>
                </div>
            </div>
            <div class="card text-center justify-content-center align-items-center mt-3">
                <div class="card-body flex-1 text-center justify-content-center align-items-center">
                    <img src="../assets/img/vector-07.png" alt="Artworks icon" style="width: 50px; height: 45px;">
                    <p class="card-text">Share your artworks</p>
                </div>
            </div>
            <div class="card text-center justify-content-center align-items-center mt-3">
                <div class="card-body flex-1 text-center justify-content-center align-items-center">
                    <i class="fa-solid fa-heart fa-2xl" style="color: #364A99;"></i>
                    <p class="card-text">Add artworks to favorite</p>
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
@endsection