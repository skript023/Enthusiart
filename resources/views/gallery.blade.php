@extends('template.template')
@section('content')
<section class="py-5 card-section" style="margin-top: 80px;">
    <div class="container">
        <h1 class="page-title text-center">Artworks</h1>
        <!-- Card Section -->
        <div class="row d-flex">
            @foreach ($galleries as $gallery)
                <div class="card-artwork">
                    <div class="d-flex justify-content-between">
                        <h2 class="artist-name">{{ $gallery->artist_name }}</h2>
                        <div class="fav-wrapper">
                            <a href="/favorite/add/{{ $gallery->id }}">
                                <i class="fa-regular fa-heart fa-xl" role="button" style="color: #364A99;"></i>
                            </a>
                        </div>
                    </div>
                    <img src="{{ asset('storage') }}/uploads/arts/{{ $gallery->image }}" class="card-img-top">
                    <div class="card-body">
                        <h2 class="artwork-title">{{ $gallery->artwork_name }}</h2>
                        <p class="card-desc">{{ $gallery->materials }}<br>{{ $gallery->dimension }}</p>
                        <a href="/artwork/{{ $gallery->id }}" class="card-link">View Details</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
