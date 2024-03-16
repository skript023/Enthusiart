<header class="header">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <!-- Container Wrapper -->
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Logo -->
            <div class="logo-wrapper">
                <a class="navbar-brand me-2" href="/">
                    <img src="{{ asset('assets') }}/img/logo-72.png" alt="Enthusiart Logo">
                </a>
            </div>

            <!-- Menu -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Artworks
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Art</a></li>
                            <li><a class="dropdown-item" href="#">Photography</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="/contact">Contact</a>
                    </li>
                </ul>
                @guest
                <div class="ml-auto">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="btn btn-link" href="/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-fill" href="/register">Register</a>
                        </li>
                    </ul>
                </div>
                @else
                <div class="ml-auto">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/favorite">
                                <i class="fa-regular fa-heart fa-xl m-3 mt-4" role="button" style="color: #364A99;"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-circle-user fa-xl m-3" style="color: #364A99;"></i>
                                <span class="d-none d-sm-inline">{{ Auth::user()->fullname }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('profile') }}">My Account</a></li>
                                <li><a class="dropdown-item" href="/myartwork">My Artworks</a></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="get">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                @endguest
            <!-- Menu End -->
        </div>
        <!-- Container Wrapper End -->
    </nav>
    <!-- Navbar End -->
</header>
