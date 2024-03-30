@extends('template.template')
@section('content')
<section class="py-5 detail-section" style="margin-top: 80px;">
    <div class="container">
        <div class="content-wrapper" style="padding: 30px 30px; background-color: #F0F3FF;;">
            <div class="row">
                <div class="col-lg-6">
                    <figure>
                        <img src="../assets/img/1.jpg" class="img-fluid" alt="Artwork">
                    </figure>
                </div>
                <div class="col-lg-6">
                    <div class="desc-wrapper">
                        <h2 class="artwork-title">Perburuan Banteng</h4>
                        <h3 class="artist-name">Raden Saleh</h5>
                        <i class="fa-regular fa-heart fa-xl mt-4" role="button" style="color: #364A99;"></i>
                    </div>
                    <hr style="margin-top: 44px;">
                    <div class="details-wrapper">
                        <h2 style="font-size: 20px; font-weight: 600; margin-top: 36px;">Details</h2>
                        <div class="table-wrapper mt-4">
                            <div class="table-row">
                                <div class="table-col head">Materials</div>
                                <div class="table-col">Acrylic on Canvas</div>
                            </div>
                            <div class="table-row">
                                <div class="table-col head">Dimensions</div>
                                <div class="table-col">110 x 80 cm</div>
                            </div>
                            <div class="table-row">
                                <div class="table-col head">Year</div>
                                <div class="table-col">1855</div>
                            </div>
                        </div>
                    </div>
                    <hr style="margin-top: 44px;">
                    <div class="about-wrapper">
                        <h2 style="font-size: 20px; font-weight: 600; margin-top: 36px;">About the Artwork</h2>
                        <p class="mt-4">Raden Saleh Sjarif Boestaman is regarded as Indonesia's first modern artist and was the first to study in Europe. Hunting was a major theme of his work, showing chaotic conflict between humans and animals. Perburuan Banteng includes a self-portrait: Raden Saleh is on the brown horse in the centre.</p>
                    </div>
            </div>
        </div>
    </div>
</section>
@endsection