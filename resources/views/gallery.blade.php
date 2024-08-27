@extends('template.template')
@section('title', 'Gallery - Enthusiart')
@section('content')
<section class="py-5 card-section" style="margin-top: 80px;">
    <div class="container">
        <h1 class="page-title text-center">Artworks</h1>
        <!-- Search Section -->
        <div class="search-bar mb-4">
            <input type="text" id="search-artworks" class="form-control" placeholder="Search Artworks">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#7d7d7d" d="M5 10a5 5 0 1 1 10 0a5 5 0 0 1-10 0m5-7a7 7 0 1 0 4.192 12.606l5.1 5.101a1 1 0 0 0 1.415-1.414l-5.1-5.1A7 7 0 0 0 10 3"/></svg>
        </div>
        <!-- Card Section -->
        <div class="row d-flex">
            @foreach ($galleries as $gallery)
                <div class="card-artwork" onclick="location.href='/artwork/{{ $gallery->id }}'" role="button">
                    <div class="d-flex justify-content-between mb-3">
                        <div class="d-flex align-items-center">
                            @if ($gallery->user && $gallery->user->image)
                                <img src="{{ asset('storage/uploads/avatar/' . $gallery->user->image) }}" class="rounded-avatar">
                            @else
                                <i class="fa-solid fa-circle-user fa-xl m-2" style="color: #364A99;"></i>
                            @endif
                            <h2 class="artist-name ms-2 mb-0">{{ $gallery->artist_name }}</h2>
                        </div>
                        <div class="fav-wrapper">
                            <a href="javascript:void(0)" class="favorite" data-id="{{ $gallery->id }}"> 
                                <i class="fa-{{ in_array($gallery->id, $favoriteIds) ? 'solid' : 'regular' }} fa-heart fa-xl" role="button" style="color: {{ in_array($gallery->id, $favoriteIds) ? '#E61010' : '#364A99' }};"></i>
                            </a>
                        </div>
                    </div>
                    <img src="{{ asset('storage') }}/uploads/arts/{{ $gallery->image }}" class="card-img-top">
                    <div class="card-body">
                        <h2 class="artwork-title d-flex align-items-center">
                            {{ $gallery->artwork_name }}
                            @if ($gallery->stock > 0)
                                <span class="badge text-bg-primary ms-2">On Sale</span>
                            @else
                                <span class="badge text-bg-secondary ms-2">Sold Out</span>
                            @endif
                        </h2>
                        <p class="card-desc">{{ $gallery->materials }}<br>{{ $gallery->dimension }}</p>
                        <p class="artwork-price">Rp{{ number_format($gallery->price, 0, ',', '.') }}</p>
                        {{--  <a href="/artwork/{{ $gallery->id }}" class="card-link">View Details</a>  --}}
                    </div>
                </div>
            @endforeach

            @if($galleries->count() > 0)
            <div class="d-flex justify-content-center mt-5">
                <ul class="pagination">
                    <!-- Previous Page Link -->
                    <li class="page-item {{ $galleries->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $galleries->previousPageUrl() }}" tabindex="-1">Previous</a>
                    </li>
            
                    <!-- Page Number Links -->
                    @foreach ($galleries->getUrlRange(1, $galleries->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $galleries->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
            
                    <!-- Next Page Link -->
                    <li class="page-item {{ $galleries->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $galleries->nextPageUrl() }}">Next</a>
                    </li>
                </ul>
            </div>
            @endif
        </div>
    </div>
</section>

@push('scripts')
<script>
    $(document).ready(function() 
    {
        $('.favorite').click(function(e) {
            e.preventDefault();
            e.stopPropagation();

            var galleryId = $(this).data('id');
            var element = $(this);

            if (element.find('i').hasClass('fa-regular')) 
            {
                $.ajax({
                    url: '/favorite/add',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        gallery_id: galleryId
                    },
                    success: function(response) {
                        if(response.success) 
                        {
                            element.find('i').removeClass('fa-regular').addClass('fa-solid').css('color', '#E61010');
                        } 
                        else 
                        {
                            console.log('Failed to add favorite:', response);
                        }
                    },
                    error: function(response) {
                        if (response.status === 401) 
                        {
                            window.location.href = '{{ route('login') }}';
                        } 
                        else 
                        {
                            console.log('Error:', response);
                        }
                    }
                });
            } 
            else 
            {
                $.ajax({
                    url: '/favorite/delete/' + galleryId,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        if(response.success) {
                            element.find('i').removeClass('fa-solid').addClass('fa-regular').css('color', '#364A99');
                        } 
                        else {
                            console.log('Failed to remove favorite:', response);
                        }
                    },
                    error: function(response) {
                        if (response.status === 401) {
                            window.location.href = '{{ route('login') }}';
                        } 
                        else {
                            console.log('Error:', response);
                        }
                    }
                });
            }
        });
        $('#search-artworks').on('input', function() {
            var keyword = $(this).val().toLowerCase();
            
            $('.card-artwork').each(function() {
                var title = $(this).find('.artwork-title').text().toLowerCase();
                var artist = $(this).find('.artist-name').text().toLowerCase();
                var materials = $(this).find('.card-desc').text().toLowerCase();
                
                if (title.includes(keyword) || artist.includes(keyword) || materials.includes(keyword)) 
                {
                    $(this).show();
                } 
                else 
                {
                    $(this).hide();
                }
            });
        });
    });
</script>
@endpush
@endsection
