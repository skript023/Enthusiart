@extends('template.template')
@section('content')
<section class="py-5 card-section mb-5" style="margin-top: 80px;">
    <div class="container">
        <h1 class="page-title text-center">My Favorites</h1>
        <!-- Card Section -->
        <div class="row d-flex">
        @foreach ($favorites as $favorite)
            <div class="card-artwork">
                <div class="d-flex justify-content-between">
                    <h2 class="artist-name">{{ $favorite->artist_name }}</h2>
                    <div class="fav-wrapper">
                        <a href="/favorite/delete/{{ $favorite->id }}">
                            <i class="fa-solid fa-heart fa-xl" style="color: #E61010;"></i>
                        </a>
                    </div>
                </div>
                <img src="{{ asset('storage') }}/uploads/arts/{{ $favorite->image }}" class="card-img-top">
                <div class="card-body">
                    <h2 class="artwork-title">{{ $favorite->artwork_name }}</h2>
                    <p class="card-desc">{{ $favorite->materials }}<br>{{ $favorite->dimension }}</p>
                    <a href="/artwork/{{ $favorite->id }}" class="card-link">View Details</a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>
@endsection