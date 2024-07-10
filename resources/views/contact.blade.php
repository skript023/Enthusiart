@extends('template.template')
@section('title', 'Contact - Enthusiart')
@section('content')
<!-- Section Contact -->
<section class="py-5 contact-section" style="margin-top: 80px;">
    <div class="container">
        <h1 class="page-title text-center" style="font-size: 36px; font-weight: bold; margin-bottom: 40px;">Get in touch</h1>
        <div class="row d-flex align-items-center mb-3">
            <div class="card text-center justify-content-center align-items-center mb-3">
                <div class="card-body flex-1 text-center justify-content-center align-items-center">
                    <i class="fa-solid fa-envelope fa-2xl" style="color: #364A99;"></i>
                    <p class="card-text">info@enthusiart.com</p>
                </div>
            </div>
            <div class="card text-center justify-content-center align-items-center mb-3">
                <div class="card-body flex-1 text-center justify-content-center align-items-center">
                    <i class="fa-solid fa-phone fa-2xl" style="color: #364A99;"></i>
                    <p class="card-text">(021) 12345678</p>
                </div>
            </div>
        </div>
        <div class="row d-flex align-items-center mb-3">
            <div class="card text-center justify-content-center align-items-center mt-3">
                <div class="card-body flex-1 text-center justify-content-center align-items-center">
                    <i class="fa-brands fa-square-x-twitter fa-2xl" style="color: #364A99;"></i>
                    <p class="card-text">@enthusiart_id</p>
                </div>
            </div>
            <div class="card text-center justify-content-center align-items-center mt-3">
                <div class="card-body flex-1 text-center justify-content-center align-items-center">
                    <i class="fa-brands fa-square-instagram fa-2xl" style="color: #364A99;"></i>
                    <p class="card-text">@enthusiart_id</p>
                </div>
            </div>
            <div class="card text-center justify-content-center align-items-center mt-3">
                <div class="card-body flex-1 text-center justify-content-center align-items-center">
                    <i class="fa-brands fa-square-facebook fa-2xl" style="color: #364A99;"></i>
                    <p class="card-text">Enthusiart Gallery</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection