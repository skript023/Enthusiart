@extends('template.template')
@section('title', 'My Account - Enthusiart')
@section('content')
<section class="py-5 profile-section" style="margin-top: 80px;">
    <div class="container">
        <h1 class="page-title text-left m-2">My Account</h1>
        <div class="py-5 pb-3 flex-grow-1 d-flex flex-column flex-sm-row">
            <div class="row flex-grow-sm-1 flex-grow-1">
                <aside class="col-sm-3 flex-grow-sm-1 flex-shrink-1 flex-grow-0 pb-sm-0 pb-3">
                    <div class=" border rounded-3 p-1 h-30" style="background-color: #F0F3FF;">
                        <ul class="nav nav-pills flex-sm-column flex-row mb-auto justify-content-between text-truncate">
                            <li class="nav-item">
                                <a href="#" class="nav-link px-2" onclick="showEditProfile()">
                                    <i class="fa-solid fa-circle-user fa-lg m-3 mt-4 mb-4"></i>
                                    <span class="d-none d-sm-inline">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-2" onclick="showChangePassword()">
                                    <i class="fa-solid fa-lock fa-lg m-3 mb-4"></i>
                                    <span class="d-none d-sm-inline">Change Password</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </aside>

            <!-- Form Edit Profile -->
            <main class="col h-100" id="editProfile">
                <div class="border rounded-3 p-3" style="background-color: #F0F3FF;">
                    <h4 class="section-title m-3 mb-5">Edit Profile</h4>
                    <div class="form-edit m-3 mt-4">
                        <form action="/user/update/{{ auth()->user()->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <p class="mb-3">Profile Picture</p>
                            <div id="AvatarFileUpload">
                                <div class="selected-image-holder">
                                    <img src="{{ asset('storage') }}/uploads/avatar/{{ auth()->user()->image }}">
                                </div>
                                <div class="avatar-selector">
                                    <a href="#" class="avatar-selector-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17 12c0 1.7-1.3 3-3 3s-3-1.3-3-3s1.3-3 3-3s3 1.3 3 3m5-5v11c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V7c0-1.1.9-2 2-2V4h4v1h2l1-2h6l1 2h2c1.1 0 2 .9 2 2M7.5 9c0-.8-.7-1.5-1.5-1.5S4.5 8.2 4.5 9s.7 1.5 1.5 1.5S7.5 9.8 7.5 9M19 12c0-2.8-2.2-5-5-5s-5 2.2-5 5s2.2 5 5 5s5-2.2 5-5"/></svg>
                                    </a>
                                    <input type="file" accept="images/*" name="image">
                                </div>
                            </div>
                            <!-- Full Name -->
                            <div class="form-group mb-3" style="margin-top: 90px;">
                                <label for="fullname" class="form-label">Full Name</label>
                                <input value="{{ auth()->user()->fullname }}" type="text" class="form-control" name="fullname" id="fullname" placeholder="" required>
                            </div>
                            <!-- Email -->
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input value="{{ auth()->user()->email }}" type="email" class="form-control" name="email" id="email" placeholder="" required>
                            </div>
                            <!-- Phone Number -->
                            <div class="form-group mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input value="{{ auth()->user()->phone }}" type="text" class="form-control" name="phone" id="phone" placeholder="+62xxxxxxxxxxx">
                            </div>
                            <!-- Address -->
                            <div class="form-group mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" name="address" id="address" placeholder="">{{ auth()->user()->address }}</textarea>
                            </div>
                            <!-- Social Media -->
                            {{-- <div class="form-group mb-3">
                                <p>Social Media <i>(optional)</i></p>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="fa-brands fa-square-instagram fa-lg"></i>
                                    </span>
                                    <input type="text" name="instagram" class="form-control" placeholder="Instagram">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="fa-brands fa-square-x-twitter fa-lg"></i>
                                    </span>
                                    <input type="text" name="twitter" class="form-control" placeholder="X (Twitter)">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="fa-brands fa-square-facebook fa-lg"></i>
                                    </span>
                                    <input type="text" name="facebook" class="form-control" placeholder="Facebook">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="fa-brands fa-square-dribbble fa-lg"></i>
                                    </span>
                                    <input type="text" name="dribble" class="form-control" placeholder="Dribble">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <i class="fa-brands fa-linkedin fa-lg"></i>
                                    </span>
                                    <input type="text" name="linkedin" class="form-control" placeholder="Linkedin">
                                </div>
                            </div> --}}
                            <button type="submit" class="btn btn-save mt-4">Save</button>
                        </form>
                    </div>
                </div>
            </main>

            <!-- Form Change Password -->
            <div class="col h-100" id="changePassword" style="display: none;">
                <div class="border rounded-3 p-3" style="background-color: #F0F3FF;">
                    <h4 class="section-title m-3 mb-5">Change Password</h4>
                    <div class="form-edit m-3 mt-4">
                        <form action="/user/password/{{ auth()->user()->id }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group mb-3">
                                <label for="password" class="form-label">Current Password</label>
                                <input type="password" name="current_password" id="current_password" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="new_password" class="form-label">New Password</label>
                                <input type="password" name="password" id="new_password" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password_confirmation" class="form-label">Confirm New Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-save mt-4">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            const avatarFileUpload = document.getElementById('AvatarFileUpload')
            const imageViewer = avatarFileUpload.querySelector('.selected-image-holder>img')
            const imageSelector = avatarFileUpload.querySelector('.avatar-selector-btn')
            const imageInput = avatarFileUpload.querySelector('input[name="image"]')

            imageSelector.addEventListener('click', e => {
                e.preventDefault()
                imageInput.click()
            })
            imageInput.addEventListener('change', e => {
                var reader = new FileReader();
                reader.onload = function(){
                    imageViewer.src = reader.result;
                };
                reader.readAsDataURL(e.target.files[0]);
            })
        </script>
    @endpush
</section>
@endsection
