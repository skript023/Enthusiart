@extends('template.template')
@section('content')
<section class="py-5 my-artworks mb-5" style="margin-top: 80px;">
    <div class="container">
        <h1 class="page-title text-center">My Artworks</h1>
        <div class="btn-wrapper d-flex justify-content-end">
            <a href="/upload" class="btn btn-upload" style="margin: 8px 0px;">Upload Artwork</a>
        </div>
        <!-- Card Section -->
        <div class="row d-flex">
            @foreach ($artworks as $index => $artwork)
                <div class="card-artwork">
                    <div class="d-flex justify-content-between">
                        <h2 class="artist-name">{{ $artwork->artist_name }}</h2>
                        <div class="icon-wrapper">
                            <i class="fa-solid fa-ellipsis" id="ellipsis-icon" role="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                            <div class="dropdown-menu" aria-labelledby="ellipsis-icon">
                                <a href="#" class="dropdown-item delete-option">Delete</a>
                            </div>
                        </div>
                    </div>
                    <img src="{{ asset('storage') }}/uploads/arts/{{ $artwork->image }}" class="card-img-top" alt="Art Nouveau">
                    <div class="card-body">
                        <h2 class="art-title">{{ $artwork->artwork_name }}</h2>
                        <p class="card-desc">{{ $artwork->materials }}<br>{{ $artwork->dimension }}</p>
                        <a href="#" class="card-link">View Details</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection