@extends('template.template')
@section('title', 'Edit Artwork - Enthusiart')
@section('content')
<section class="py-5 upload-section" style="margin-top: 80px;">
    <div class="container">
        <h1 class="page-title text-center">Upload Artwork</h1>
        <div class="row border rounded-3 d-flex flex-column align-items-center mb-5" style="background-color: #F0F3FF;">
            <div class="form-upload mt-4">
                <form action="/artwork/update/{{ $artwork->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <!-- Upload Image -->
                    <div class="upload-wrapper">
                        <input name="image" type="file" id="file" accept="image/*" hidden>
                        <div class="img-area" data-img="">
                            @if (isset($artwork->image))
                                <img src="{{ asset('storage/uploads/arts/' . $artwork->image) }}" alt="Artwork Image">
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 24 24"><path fill="black" d="M19 13a1 1 0 0 0-1 1v.38l-1.48-1.48a2.79 2.79 0 0 0-3.93 0l-.7.7l-2.48-2.48a2.85 2.85 0 0 0-3.93 0L4 12.6V7a1 1 0 0 1 1-1h7a1 1 0 0 0 0-2H5a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h12a3 3 0 0 0 3-3v-5a1 1 0 0 0-1-1M5 20a1 1 0 0 1-1-1v-3.57l2.9-2.9a.79.79 0 0 1 1.09 0l3.17 3.17l4.3 4.3Zm13-1a.89.89 0 0 1-.18.53L13.31 15l.7-.7a.77.77 0 0 1 1.1 0L18 17.21Zm4.71-14.71l-3-3a1 1 0 0 0-.33-.21a1 1 0 0 0-.76 0a1 1 0 0 0-.33.21l-3 3a1 1 0 0 0 1.42 1.42L18 4.41V10a1 1 0 0 0 2 0V4.41l1.29 1.3a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.42"/></svg>
                                <h3 class="mt-3">Upload Image</h3>
                                <p>Image size must be less than <span>8MB</span></p>
                            @endif
                        </div>
                        <button type="button" id="select-artwork" class="btn select-image mb-1">Select Image</button>
                    </div>
                    <div class="box d-flex justify-content-center">
                        <div class="container">
                            <!-- Artist Name -->
                            <div class="form-group mb-3">
                                <label for="artist_name" class="form-label">Artist Name</label>
                                <input type="text" class="form-control" name="artist_name" id="artist_name" value="{{ auth()->user()->fullname }}" readonly required>
                            </div>
                            <!-- Category -->
                            {{--  <div class="form-group mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select" id="category" name="category" required>
                                    <option value="" disabled selected>Select Category</option>
                                    <option value="Art">Art</option>
                                    <option value="Photography">Photography</option>
                                </select>
                            </div>  --}}
                            <!-- Dimensions -->
                            <div class="form-group">
                                <label for="dimension" class="form-label">Dimensions</label>
                                <input type="text" class="form-control" name="dimension" id="dimension" value="{{ $artwork->dimension }}" placeholder="Enter dimensions of your artwork" required>
                            </div>
                            <!-- Materials -->
                            <div class="form-group">
                                <label for="materials" class="form-label">Materials</label>
                                <input type="text" class="form-control" name="materials" id="materials" value="{{ $artwork->materials }}" placeholder="Enter materials" required>
                            </div>
                      </div>

                      <div class="container">
                        <!-- Artwork Name -->
                        <div class="form-group mb-3">
                            <label for="artwork_name" class="form-label">Artwork Name</label>
                            <input type="text" class="form-control" name="artwork_name" id="artwork_name" value="{{ $artwork->artwork_name }}" placeholder="Give your artwork a name" required>
                        </div>
                        <!-- Year of Artwork -->
                        <div class="form-group mb-3">
                            <label for="year" class="form-label">Year of Artwork</label>
                            <input type="text" class="form-control" name="year" id="year" value="{{ $artwork->year }}" placeholder="Enter year of artwork" required>
                        </div>
                        {{--  <!-- Dimensions -->
                        <div class="form-group">
                            <label for="dimension" class="form-label">Dimensions</label>
                            <input type="text" class="form-control" name="dimension" id="dimension" placeholder="Enter dimensions of your artwork" required>
                        </div>  --}}
                      </div>
                    </div>
                    <!-- Description -->
                    <div class="box d-flex justify-content-center mt-0">
                        <div class="form-group">
                            <label for="description" class="col-sm-4 col-form-label">Description</label>
                            <textarea class="form-control" name="description" id="description">{{ $artwork->description }}</textarea>
                        </div>
                    </div>
                    <div class="btn-wrapper d-flex justify-content-end">
                        <button type="submit" class="btn btn-upload">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@push('scripts')
    <script>
        const selectImage = document.getElementById('select-artwork');
        const inputFile = document.querySelector('#file');
        const imgArea = document.querySelector('.img-area');


        selectImage.addEventListener('click', function () {
            document.getElementById('file').click();
        })


        inputFile.addEventListener('change', function () {
            const image = this.files[0]
            if(image.size < 8000000) 
            {
                const reader = new FileReader();
                reader.onload = ()=> {
                    const allImg = imgArea.querySelectorAll('img');
                    allImg.forEach(item=> item.remove());
                    const imgUrl = reader.result;
                    const img = document.createElement('img');
                    img.src = imgUrl;
                    imgArea.appendChild(img);
                    imgArea.classList.add('active');
                    imgArea.dataset.img = image.name;
                }
                reader.readAsDataURL(image);
            } 
            else 
            {
                alert("Image size more than 8MB");
            }
        })
    </script>
@endpush
@endsection