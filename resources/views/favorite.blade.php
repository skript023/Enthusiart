@extends('template.template')
@section('title', 'My Favorites - Enthusiart')
@section('content')
<section class="py-5 card-section mb-5" style="margin-top: 80px;">
    <div class="container">
        <h1 class="page-title text-center">My Favorites</h1>
        <!-- Card Section -->
        <div class="row d-flex">
        @foreach ($favorites as $favorite)
            <div class="card-artwork mb-4" onclick="location.href='/artwork/{{ $favorite->gallery->id }}'" role="button">
                <div class="d-flex justify-content-between">
                    <h2 class="artist-name">{{ $favorite->gallery->artist_name }}</h2>
                    <div class="fav-wrapper">
                        <a href="javascript:void(0)" class="unfavorite" data-id="{{ $favorite->gallery->id }}">
                            <i class="fa-solid fa-heart fa-xl" style="color: #E61010;"></i>
                        </a>
                    </div>
                </div>
                <img src="{{ asset('storage') }}/uploads/arts/{{ $favorite->gallery->image }}" class="card-img-top">
                <div class="card-body">
                    <h2 class="artwork-title">{{ $favorite->gallery->artwork_name }}</h2>
                    <p class="card-desc">{{ $favorite->gallery->materials }}<br>{{ $favorite->gallery->dimension }}</p>
                    {{--  <a href="/artwork/{{ $favorite->gallery->id }}" class="card-link">View Details</a>  --}}
                </div>
            </div>
        @endforeach

        @if($favorites->count() > 0)
        <div class="d-flex justify-content-center mt-5">
            <ul class="pagination">
                <!-- Previous Page Link -->
                <li class="page-item {{ $favorites->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $favorites->previousPageUrl() }}" tabindex="-1">Previous</a>
                </li>
        
                <!-- Page Number Links -->
                @foreach ($favorites->getUrlRange(1, $favorites->lastPage()) as $page => $url)
                    <li class="page-item {{ $page == $favorites->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach
        
                <!-- Next Page Link -->
                <li class="page-item {{ $favorites->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $favorites->nextPageUrl() }}">Next</a>
                </li>
            </ul>
        </div>
        @else
            <p class="text-center py-5">No artwork added to favorite yet.</p>
        @endif      
        </div>
    </div>
</section>

@push('scripts')
<script>
    $(document).ready(function()
    {
        $('.unfavorite').click(function(e){
            e.preventDefault();
            e.stopPropagation();

            var favoriteId = $(this).data('id');
            var element = $(this).closest('.card-artwork');

            $.ajax({
                url: '/favorite/delete/' + favoriteId,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if(response.success) 
                    {
                        element.remove();
                    }
                },
                error: function(response) {
                    console.log('Error:', response);
                }
            });
        });
    });
</script>
@endpush
@endsection