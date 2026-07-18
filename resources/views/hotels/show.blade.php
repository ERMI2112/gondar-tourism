@extends('layouts.app')

@section('title', $hotel->name . ' — Gondar Tourism')

@section('content')

{{-- HERO BANNER --}}
<section class="detail-header-banner" style="background-image: url('{{ $hotel->image ?? "https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=1200&q=80" }}');">
    <div class="detail-header-overlay"></div>
    <div class="detail-header-content">
        <div class="container">
            <a href="{{ route('hotels.index') }}" class="text-warning text-decoration-none small d-inline-flex align-items-center gap-1 mb-3 opacity-75">
                <i class="bi bi-arrow-left"></i> All Hotels
            </a>
            <div class="d-flex align-items-center gap-3 mb-2">
                <span class="verification-badge" style="text-transform: capitalize;"><i class="bi bi-building"></i> {{ $hotel->type }}</span>
                <div class="text-nowrap">{!! $hotel->stars_html !!}</div>
            </div>
            <h1 class="display-5 fw-bold text-white font-serif">{{ $hotel->name }}</h1>
            <p class="text-white-50 small mb-0 mt-2">
                <i class="bi bi-geo-alt me-1 text-warning"></i>{{ $hotel->address }}
            </p>
        </div>
    </div>
</section>

{{-- MAIN CONTENT --}}
<div class="container py-5">
    <div class="row g-5">

        {{-- LEFT COLUMN: Description & Amenities --}}
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-header bg-white border-bottom py-3 px-4">
                    <h5 class="font-serif mb-0"><i class="bi bi-info-circle text-warning me-2"></i>About the Stay</h5>
                </div>
                <div class="card-body p-4">
                    <p class="text-muted lh-lg mb-0">{{ $hotel->description }}</p>
                </div>
            </div>

            @if($hotel->amenities)
            <div class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-header bg-white border-bottom py-3 px-4">
                    <h5 class="font-serif mb-0"><i class="bi bi-check2-circle text-warning me-2"></i>Amenities & Services</h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        @foreach($hotel->amenities as $amenity)
                        <div class="col-6 col-md-4">
                            <div class="d-flex align-items-center gap-2 text-muted small">
                                <i class="bi bi-check-circle-fill text-success fs-6"></i>
                                <span>{{ $amenity }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

            @if($hotel->latitude && $hotel->longitude)
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-white border-bottom py-3 px-4">
                    <h5 class="font-serif mb-0"><i class="bi bi-map text-warning me-2"></i>Location</h5>
                </div>
                <div id="map" class="leaflet-container-gondar" style="border-radius: 0 0 12px 12px;"></div>
            </div>
            @endif
        </div>

        {{-- RIGHT COLUMN: Quick Info & Recommendations --}}
        <div class="col-lg-5">
            <div class="sticky-sidebar">
                
                {{-- Quick Details Table --}}
                <div class="card border-0 shadow-sm rounded-3 mb-4">
                    <div class="card-header bg-white border-bottom py-3 px-4">
                        <h5 class="font-serif mb-0"><i class="bi bi-bookmark-star text-warning me-2"></i>Hotel Details</h5>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr class="border-bottom">
                                    <td class="ps-4 py-3 text-muted fw-semibold" style="width: 40%;"><i class="bi bi-star-fill me-2 text-warning"></i>Rating</td>
                                    <td class="py-3">
                                        {!! $hotel->stars_html !!} 
                                        <span class="text-muted small ms-1">({{ $hotel->stars }}-Star)</span>
                                    </td>
                                </tr>
                                <tr class="border-bottom">
                                    <td class="ps-4 py-3 text-muted fw-semibold"><i class="bi bi-tag me-2 text-warning"></i>Type</td>
                                    <td class="py-3 text-capitalize">{{ $hotel->type }}</td>
                                </tr>
                                @if($hotel->price_range)
                                <tr class="border-bottom">
                                    <td class="ps-4 py-3 text-muted fw-semibold"><i class="bi bi-cash me-2 text-warning"></i>Price Range</td>
                                    <td class="py-3 text-danger fw-bold">{{ $hotel->price_range }}</td>
                                </tr>
                                @endif
                                @if($hotel->phone)
                                <tr class="border-bottom">
                                    <td class="ps-4 py-3 text-muted fw-semibold"><i class="bi bi-telephone me-2 text-warning"></i>Phone</td>
                                    <td class="py-3"><a href="tel:{{ $hotel->phone }}" class="text-danger text-decoration-none">{{ $hotel->phone }}</a></td>
                                </tr>
                                @endif
                                @if($hotel->email)
                                <tr class="border-bottom">
                                    <td class="ps-4 py-3 text-muted fw-semibold"><i class="bi bi-envelope me-2 text-warning"></i>Email</td>
                                    <td class="py-3"><a href="mailto:{{ $hotel->email }}" class="text-danger text-decoration-none small">{{ $hotel->email }}</a></td>
                                </tr>
                                @endif
                                @if($hotel->website)
                                <tr>
                                    <td class="ps-4 py-3 text-muted fw-semibold"><i class="bi bi-globe me-2 text-warning"></i>Website</td>
                                    <td class="py-3">
                                        <a href="{{ $hotel->website }}" target="_blank" class="btn btn-sm btn-gondar-outline py-1 px-2 font-serif text-danger">
                                            Visit Website <i class="bi bi-box-arrow-up-right ms-1"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Action Panel --}}
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-header py-3 px-4" style="background-color: var(--gondar-red); border-radius: 12px 12px 0 0;">
                        <h5 class="mb-0 text-white"><i class="bi bi-person-check me-2"></i>Complete Your Journey</h5>
                    </div>
                    <div class="card-body p-4 text-center">
                        <i class="bi bi-compass text-warning display-5 mb-2"></i>
                        <p class="text-muted small lh-lg">
                            Pair your stay with a certified local tour guide to explore Gondar's castles, churches, and viewpoints at your own pace.
                        </p>
                        <div class="d-grid gap-2 mt-3">
                            <a href="{{ route('guides.index') }}" class="btn btn-gondar-gold">
                                <i class="bi bi-person-badge me-2"></i>Find local Guide
                            </a>
                            <a href="{{ route('attractions.index') }}" class="btn btn-gondar-outline">
                                <i class="bi bi-building me-2"></i>Browse Attractions
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('scripts')
@if($hotel->latitude && $hotel->longitude)
<script>
    var map = L.map('map').setView([{{ $hotel->latitude }}, {{ $hotel->longitude }}], 15);
    L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; CartoDB &copy; OpenStreetMap'
    }).addTo(map);

    var goldIcon = L.divIcon({
        className: '',
        html: '<div style="width:28px;height:28px;background:var(--gondar-red);border-radius:50% 50% 50% 0;transform:rotate(-45deg);border:2px solid var(--gondar-gold);box-shadow:0 4px 12px rgba(0,0,0,0.3);"></div>',
        iconSize: [28, 28], iconAnchor: [14, 28], popupAnchor: [0, -32]
    });
    L.marker([{{ $hotel->latitude }}, {{ $hotel->longitude }}], {icon: goldIcon})
        .addTo(map)
        .bindPopup('<div style="padding:4px;"><strong style="color:var(--gondar-red);font-family:Playfair Display,serif;">{{ $hotel->name }}</strong><br><small class="text-muted">{{ $hotel->address }}</small></div>')
        .openPopup();
</script>
@endif
@endsection
