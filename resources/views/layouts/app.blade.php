<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gondar Smart Tourism Portal')</title>
    <meta name="description" content="Discover Gondar City - Historic Palaces, Churches, Tour Guides, and Premium Hotels in the Camelot of Africa.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- Leaflet Map CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <!-- Custom Premium Styles -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    @yield('styles')
</head>
<body>

{{-- PREMIUM GLASS NAVIGATION --}}
<nav class="navbar navbar-expand-md navbar-custom py-3">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
            <i class="bi bi-compass-fill text-warning"></i>
            <span>Visit <span>Gondar</span></span>
        </a>
        
        <button class="navbar-toggler text-white border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <div class="navbar-nav mx-auto gap-1">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                    <i class="bi bi-house-door me-1"></i>Home
                </a>
                <a href="{{ route('attractions.index') }}" class="nav-link {{ request()->routeIs('attractions*') ? 'active' : '' }}">
                    <i class="bi bi-building me-1"></i>Attractions
                </a>
                <a href="{{ route('hotels.index') }}" class="nav-link {{ request()->routeIs('hotels*') ? 'active' : '' }}">
                    <i class="bi bi-building-fill me-1"></i>Hotels
                </a>
                <a href="{{ route('guides.index') }}" class="nav-link {{ request()->routeIs('guides*') ? 'active' : '' }}">
                    <i class="bi bi-person-badge me-1"></i>Guides
                </a>
                <a href="{{ route('events.index') }}" class="nav-link {{ request()->routeIs('events*') ? 'active' : '' }}">
                    <i class="bi bi-calendar-event me-1"></i>Events
                </a>
                <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                    <i class="bi bi-chat-dots me-1"></i>Contact
                </a>
            </div>

            <div class="d-flex align-items-center gap-2 mt-3 mt-md-0">
                @auth
                    @if(auth()->user()->isAdmin() || auth()->user()->isTourismOfficer())
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-gondar-gold py-2 px-3 btn-sm">
                            <i class="bi bi-shield-check me-1"></i>Admin Dashboard
                        </a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-gondar-outline py-2 px-3 btn-sm text-white border-white">
                            <i class="bi bi-box-arrow-right me-1"></i>Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-gondar-outline py-2 px-3 btn-sm text-white border-white">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-gondar-gold py-2 px-3 btn-sm">Register</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

{{-- FLASH NOTIFICATIONS --}}
@if(session('success'))
<div class="container mt-4">
    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2 border-0 shadow-sm" role="alert" style="background-color: #E8F8F0; color: #229954; border-left: 4px solid #2ECC71 !important; border-radius: 8px;">
        <i class="bi bi-check-circle-fill fs-5"></i>
        <div>{{ session('success') }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

@if(session('error'))
<div class="container mt-4">
    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-2 border-0 shadow-sm" role="alert" style="background-color: #FCE8EC; color: var(--imperial-red); border-left: 4px solid var(--gondar-red) !important; border-radius: 8px;">
        <i class="bi bi-exclamation-circle-fill fs-5"></i>
        <div>{{ session('error') }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

@yield('content')

{{-- CULTURAL DECORATIVE SEPARATOR --}}
@unless(request()->is('admin/*'))
<div class="cultural-divider"></div>

{{-- CULTURAL PREMIUM FOOTER --}}
<footer class="footer-custom">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <h5 class="text-white mb-3 font-serif">Visit Gondar</h5>
                <p class="text-white-50 lh-lg" style="max-width: 320px;">
                    Explore the royal fortress city of Gondar, rich with imperial history, breathtaking churches, and hospitable local guides.
                </p>
                <div class="d-flex gap-3 mt-4">
                    <a href="#" class="fs-5 text-white-50"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="fs-5 text-white-50"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="fs-5 text-white-50"><i class="bi bi-twitter-x"></i></a>
                </div>
            </div>
            
            <div class="col-lg-2 col-md-6 col-6">
                <h5 class="text-white mb-3">Explore</h5>
                <ul class="list-unstyled d-flex flex-column gap-2">
                    <li><a href="{{ route('attractions.index') }}">Attractions</a></li>
                    <li><a href="{{ route('hotels.index') }}">Hotels & Stays</a></li>
                    <li><a href="{{ route('guides.index') }}">Tour Guides</a></li>
                    <li><a href="{{ route('events.index') }}">Local Events</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 col-6">
                <h5 class="text-white mb-3">Join Us</h5>
                <ul class="list-unstyled d-flex flex-column gap-2">
                    <li><a href="{{ route('guides.create') }}">Register as Guide</a></li>
                    <li><a href="{{ route('contact') }}">Contact Bureau</a></li>
                    <li><a href="{{ route('login') }}">Official Login</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-3">Bureau Contact</h5>
                <ul class="list-unstyled d-flex flex-column gap-2 text-white-50">
                    <li><i class="bi bi-geo-alt me-2 text-warning"></i>Gondar City Center, Ethiopia</li>
                    <li><i class="bi bi-telephone me-2 text-warning"></i>+251 58 111 0000</li>
                    <li><i class="bi bi-envelope me-2 text-warning"></i>info@gondar.gov.et</li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 text-white-50">
            <span>&copy; {{ date('Y') }} Gondar City Tourism Bureau. All rights reserved.</span>
            <span class="small">Designed & Developed by Ermias &mdash; Thesis Project</span>
        </div>
    </div>
</footer>
@endunless

<!-- Core JS Dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
@yield('scripts')
</body>
</html>
