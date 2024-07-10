@extends('template.template')
@section('title', 'Detail Artwork - Enthusiart')
@section('content')
<section class="py-5 detail-section" style="margin-top: 80px;">
    <div class="container">
        <div class="content-wrapper" style="padding: 30px 30px; background-color: #F0F3FF;;">
            <div class="row">
                <div class="col-lg-6">
                    <figure class="gallery-figure">
                        <img src="{{ asset('storage') }}/uploads/arts/{{ $art->image }}" class="img-fluid" alt="Artwork">
                    </figure>
                </div>
                <div class="col-lg-6">
                    <div class="desc-wrapper">
                        <h2 class="artwork-title">{{ $art->artwork_name }}</h2>
                        <h3 class="artist-name">{{ $art->artist_name }}</h3>
                        <a href="javascript:void(0)" class="favorite" data-id="{{ $art->id }}">
                            <i class="fa-{{ in_array($art->id, $favoriteIds) ? 'solid' : 'regular' }} fa-heart fa-xl mt-4" style="color: {{ in_array($art->id, $favoriteIds) ? '#E61010' : '#364A99' }};"></i>
                        </a>
                    </div>
                    <hr style="margin-top: 44px;">
                    <div class="details-wrapper">
                        <h2 style="font-size: 20px; font-weight: 600; margin-top: 36px;">Details</h2>
                        <div class="table-wrapper mt-4">
                            <div class="table-row">
                                <div class="table-col head">Materials</div>
                                <div class="table-col">{{ $art->materials}}</div>
                            </div>
                            <div class="table-row">
                                <div class="table-col head">Dimensions</div>
                                <div class="table-col">{{ $art->dimension}}</div>
                            </div>
                            <div class="table-row">
                                <div class="table-col head">Year</div>
                                <div class="table-col">{{ $art->year}}</div>
                            </div>
                        </div>
                    </div>
                    <hr style="margin-top: 44px;">
                    <div class="about-wrapper">
                        <h2 style="font-size: 20px; font-weight: 600; margin-top: 36px;">About the Artwork</h2>
                        <p class="mt-4">{{ $art->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    $(document).ready(function() 
    {
        $('.favorite').click(function(e) {
            e.preventDefault();

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
                        if(response.success) 
                        {
                            element.find('i').removeClass('fa-solid').addClass('fa-regular').css('color', '#364A99');
                        } 
                        else 
                        {
                            console.log('Failed to remove favorite:', response);
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
        });
    });
</script>
@endpush
@endsection
