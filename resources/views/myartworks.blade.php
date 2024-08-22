@extends('template.template')
@section('title', 'My Artworks - Enthusiart')
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
                <div class="card-artwork mb-4">
                    <div class="d-flex justify-content-between">
                        <h2 class="artist-name">{{ $artwork->artist_name }}</h2>
                        <div class="icon-wrapper">
                            <i class="fa-solid fa-ellipsis" id="ellipsis-icon" role="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                            <div class="dropdown-menu" aria-labelledby="ellipsis-icon">
                                <a href="/artwork/edit/{{ $artwork->id }}" class="dropdown-item">Edit</a>
                                <a href="/artwork/delete/{{ $artwork->id }}" class="dropdown-item delete-option">Delete</a>
                            </div>
                        </div>
                    </div>
                    <img src="{{ asset('storage') }}/uploads/arts/{{ $artwork->image }}" class="card-img-top">
                    <div class="card-body">
                        <h2 class="artwork-title">{{ $artwork->artwork_name }}</h2>
                        <p class="card-desc">{{ $artwork->materials }}<br>{{ $artwork->dimension }}</p>
                        <a href="/artwork/{{ $artwork->id }}" class="card-link">View Details</a>
                    </div>
                </div>
            @endforeach

            @if($artworks->count() > 0)
            <div class="d-flex justify-content-center mt-5">
                <ul class="pagination">
                    <!-- Previous Page Link -->
                    <li class="page-item {{ $artworks->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $artworks->previousPageUrl() }}" tabindex="-1">Previous</a>
                    </li>
            
                    <!-- Page Number Links -->
                    @foreach ($artworks->getUrlRange(1, $artworks->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $artworks->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
            
                    <!-- Next Page Link -->
                    <li class="page-item {{ $artworks->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $artworks->nextPageUrl() }}">Next</a>
                    </li>
                </ul>
            </div>
            @else
                <p class="text-center py-5">No artwork uploaded yet.</p>
            @endif      
        </div>
    </div>
</section>
@endsection
