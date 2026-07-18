@extends('layouts.app')

@section('title', 'Gondar Smart Tourism — Discover Ethiopia\'s Royal City')

@section('content')

{{-- ========== HERO SECTION ========== --}}
<section class="hero-banner" style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/e/ed/Fasilides_Bath_05.jpg');">
    <div class="hero-overlay"></div>
    <div class="container hero-content">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <span class="verification-badge mb-3">
                    <i class="bi bi-patch-check-fill"></i> UNESCO World Heritage Site
                </span>
                <h1 class="hero-title">
                    Discover the Camelot of <span class="text-warning">Africa</span>
                </h1>
                <p class="hero-subtitle">
                    Step back in time to 17th-century palaces, explore sacred rock-hewn art, celebrate vibrant cultural festivals, and experience the majestic Simien Mountains.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('guides.index') }}" class="btn btn-gondar-gold btn-lg">
                        <i class="bi bi-person-badge me-2"></i>Find Local Guide
                    </a>
                    <a href="{{ route('attractions.index') }}" class="btn btn-gondar-outline btn-lg text-white border-white">
                        <i class="bi bi-compass me-2"></i>Explore Sites
                    </a>
                </div>
            </div>
            
            <div class="col-lg-5">
                <div class="glass-container text-dark py-4 px-4">
                    <h4 class="font-serif mb-3 text-dark"><i class="bi bi-info-circle-fill text-warning me-2"></i>Gondar Quick Stats</h4>
                    <hr class="my-2 opacity-10">
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="p-2">
                                <h3 class="text-danger mb-0">{{ $attractions->count() }}</h3>
                                <small class="text-muted text-uppercase fw-semibold" style="font-size: 0.75rem;">Attractions</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-2">
                                <h3 class="text-danger mb-0">{{ $guides->count() }}</h3>
                                <small class="text-muted text-uppercase fw-semibold" style="font-size: 0.75rem;">Licensed Guides</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-2">
                                <h3 class="text-danger mb-0">{{ $events->count() }}</h3>
                                <small class="text-muted text-uppercase fw-semibold" style="font-size: 0.75rem;">Annual Events</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-2">
                                <h3 class="text-danger mb-0">1636</h3>
                                <small class="text-muted text-uppercase fw-semibold" style="font-size: 0.75rem;">Foundation Year</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ========== HERITAGE STRIP ========== --}}
<div class="container" style="margin-top: -30px; position: relative; z-index: 10;">
    <div class="row g-4 justify-content-center">
        <div class="col-md-10">
            <div class="glass-container py-4 text-center text-dark">
                <div class="row g-3">
                    <div class="col-md-4">
                        <h4 class="mb-1 text-danger font-serif">900m</h4>
                        <small class="text-muted text-uppercase fw-bold" style="font-size: 0.7rem;">Royal Enclosure Wall</small>
                    </div>
                    <div class="col-md-4 border-start border-end border-opacity-10 border-dark">
                        <h4 class="mb-1 text-danger font-serif">12 Gateways</h4>
                        <small class="text-muted text-uppercase fw-bold" style="font-size: 0.7rem;">Connecting the City</small>
                    </div>
                    <div class="col-md-4">
                        <h4 class="mb-1 text-danger font-serif">44 Churches</h4>
                        <small class="text-muted text-uppercase fw-bold" style="font-size: 0.7rem;">Historical Monuments</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ========== WHY VISIT GONDAR (EDITORIAL) ========== --}}
<section class="py-5 my-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="section-tagline">Cultural Heritage</span>
                <h2 class="section-title">A City Shaped by Emperors & Art</h2>
                <p class="lead text-muted lh-lg mb-4">
                    Gondar served as the home of Ethiopia’s emperors for over two centuries. The city is famous for its unique architecture, combining European Baroque style with Arab and local styles.
                </p>
                <div class="row g-3 mb-4">
                    <div class="col-6">
                        <div class="d-flex align-items-start gap-2">
                            <i class="bi bi-check-circle-fill text-danger fs-5"></i>
                            <div>
                                <h6 class="mb-0 fw-bold">Royal Palaces</h6>
                                <small class="text-muted">Explore Fasilides Castle & Mentewab Complex</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-start gap-2">
                            <i class="bi bi-check-circle-fill text-danger fs-5"></i>
                            <div>
                                <h6 class="mb-0 fw-bold">Sacred Murals</h6>
                                <small class="text-muted">Debre Berhan Selassie ceiling paintings</small>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('attractions.index') }}" class="btn btn-gondar-red">Explore All Attractions</a>
            </div>
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-6">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/e/e9/Fasilides_Castle_Gondar.jpg" class="img-fluid rounded-3 shadow-sm" alt="Fasilides Castle" style="height: 250px; width: 100%; object-fit: cover;">
                    </div>
                    <div class="col-6">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/75/Debre_Birhan_Selassie_church_painting_-_18_09_2018_-_Gondar_-_Ethiopia_01.jpg" class="img-fluid rounded-3 shadow-sm" alt="Debre Berhan Selassie Church painting" style="height: 250px; width: 100%; object-fit: cover; margin-top: 30px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ========== FEATURED ATTRACTIONS ========== --}}
<section class="py-5" style="background-color: var(--gondar-cream-dark);">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <div>
                <span class="section-tagline">Must See</span>
                <h2 class="section-title mb-0">Featured Attractions</h2>
            </div>
            <a href="{{ route('attractions.index') }}" class="btn btn-gondar-outline">
                View All <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
        
        <div class="row g-4">
            @foreach($attractions->take(3) as $attraction)
            <div class="col-lg-4 col-md-6">
                <div class="card-gondar">
                    <div class="card-gondar-img-wrapper">
                        @if($attraction->image)
                            <img src="{{ $attraction->image }}" class="card-gondar-img" alt="{{ $attraction->name }}">
                        @else
                            <div class="card-img-placeholder">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                        @endif
                        <span class="card-gondar-badge">{{ $attraction->category->name }}</span>
                    </div>
                    <div class="card-gondar-body">
                        <h4 class="card-gondar-title">{{ $attraction->name }}</h4>
                        <p class="card-gondar-text">
                            {{ Str::limit($attraction->description, 120) }}
                        </p>
                        <div class="d-flex justify-content-between align-items-center mt-auto pt-3 border-top border-opacity-10 border-dark">
                            <span class="text-muted small"><i class="bi bi-geo-alt me-1"></i>{{ $attraction->location_name }}</span>
                            <a href="{{ route('attractions.show', $attraction) }}" class="btn btn-sm btn-gondar-red py-1 px-3">Details</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ========== INTERACTIVE TRAVEL MAP ========== --}}
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-tagline">Explore Visually</span>
            <h2 class="section-title section-title-center">Interactive Heritage Map</h2>
            <p class="text-muted max-width-600 mx-auto">
                Navigate the locations of castles, churches, and viewpoints directly on our interactive map interface.
            </p>
        </div>
        
        <div class="leaflet-container-gondar" id="map"></div>
    </div>
</section>

{{-- ========== MEET THE LOCAL GUIDES ========== --}}
<section class="py-5" style="background-color: var(--gondar-cream-dark);">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <div>
                <span class="section-tagline">Local Experts</span>
                <h2 class="section-title mb-0">Hospitable Tour Guides</h2>
            </div>
            <a href="{{ route('guides.index') }}" class="btn btn-gondar-outline">
                All Guides <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
        
        <div class="row g-4">
            @foreach($guides->take(4) as $guide)
            <div class="col-lg-3 col-md-6">
                <div class="card-guide-portrait">
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=400&q=80" class="card-guide-portrait-img" alt="{{ $guide->user->name }}">
                    <div class="card-guide-portrait-gradient"></div>
                    <div class="card-guide-portrait-content">
                        <div class="card-guide-portrait-name">
                            {{ $guide->user->name }}
                            <i class="bi bi-patch-check-fill text-warning" style="font-size: 0.9rem;"></i>
                        </div>
                        <div class="card-guide-portrait-languages">
                            <i class="bi bi-translate me-1"></i> {{ $guide->languages }}
                        </div>
                        <div class="card-guide-portrait-specialization">
                            {{ $guide->specialization }}
                        </div>
                        <div class="card-guide-portrait-footer">
                            <span class="card-guide-portrait-price">{{ $guide->price_range }}</span>
                            <a href="{{ route('guides.show', $guide) }}" class="btn btn-sm btn-gondar-gold py-1 px-3">Book</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ========== EVENTS & FESTIVALS ========== --}}
@if($events->count() > 0)
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-tagline">Vibrant Culture</span>
            <h2 class="section-title section-title-center">Upcoming Events</h2>
        </div>
        
        <div class="row g-4 justify-content-center">
            @foreach($events->take(2) as $event)
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm p-4 rounded-3 d-flex flex-row align-items-center gap-4" style="background-color: #ffffff;">
                    <div class="flex-shrink-0 text-center py-3 px-4 rounded-3 text-white" style="background-color: var(--gondar-red); min-width: 100px;">
                        <h2 class="font-serif mb-0 text-white">{{ \Carbon\Carbon::parse($event->start_date)->format('d') }}</h2>
                        <small class="text-uppercase fw-bold">{{ \Carbon\Carbon::parse($event->start_date)->format('M') }}</small>
                    </div>
                    <div>
                        <h4 class="font-serif mb-1">{{ $event->title }}</h4>
                        <p class="text-muted small mb-2"><i class="bi bi-geo-alt me-1"></i>{{ $event->location }}</p>
                        <p class="text-muted small mb-0">{{ Str::limit($event->description, 110) }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection

@section('scripts')
<script>
    // Leaflet map setup using a beautiful warm-themed Voyager map style
    var map = L.map('map', {
        center: [12.608, 37.4693],
        zoom: 14,
        zoomControl: true
    });

    L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; CartoDB &copy; OpenStreetMap',
        maxZoom: 18
    }).addTo(map);

    var goldIcon = L.divIcon({
        className: '',
        html: '<div style="width:28px;height:28px;background:var(--gondar-red);border-radius:50% 50% 50% 0;transform:rotate(-45deg);border:2px solid var(--gondar-gold);box-shadow:0 4px 10px rgba(0,0,0,0.25);"></div>',
        iconSize: [28, 28],
        iconAnchor: [14, 28],
        popupAnchor: [0, -32]
    });

    @foreach($attractions as $attr)
        @if($attr->latitude && $attr->longitude)
            L.marker([{{ $attr->latitude }}, {{ $attr->longitude }}], {icon: goldIcon})
                .addTo(map)
                .bindPopup('<div style="font-family: \'Outfit\', sans-serif; padding: 4px; min-width: 160px;"><strong style="font-family: \'Playfair Display\', serif; font-size: 0.95rem; color: var(--gondar-red);">{{ $attr->name }}</strong><br><small style="color: #666;"><i class="bi bi-geo-alt me-1"></i>{{ $attr->location_name }}</small><br><a href="{{ route(\'attractions.show\', $attr) }}" style="color: var(--gondar-gold); font-size: 0.8rem; font-weight: 700; margin-top: 6px; display: inline-block; text-decoration: none;">View Site →</a></div>');
        @endif
    @endforeach
</script>
@endsection
