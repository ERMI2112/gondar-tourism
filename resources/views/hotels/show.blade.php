@extends('layouts.app')

@section('title', $hotel->name . ' — Gondar Tourism')

@section('content')

{{-- HERO --}}
<div style="
    position:relative; overflow:hidden;
    padding: 5rem 0 4rem;
    background:
        linear-gradient(to bottom, rgba(13,13,13,0.3) 0%, rgba(13,13,13,0.8) 65%, rgba(13,13,13,1) 100%),
        url('{{ $hotel->image ?? "https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=1200&q=80" }}') center/cover no-repeat;
">
    <div class="container" style="position:relative; z-index:2;">
        <a href="{{ route('hotels.index') }}" style="color:var(--gold); text-decoration:none; font-size:0.85rem; display:inline-flex; align-items:center; gap:6px; margin-bottom:1.5rem; opacity:0.85;" onmouseover="this.style.opacity=1" onmouseout="this.style.opacity=0.85">
            <i class="bi bi-arrow-left"></i> All Hotels
        </a>
        <div class="d-flex align-items-center gap-3 mb-2">
            <span class="card-category-badge" style="text-transform:capitalize;">{{ $hotel->type }}</span>
            <div>{!! $hotel->stars_html !!}</div>
        </div>
        <h1 class="section-title" style="font-size:2.8rem;">{{ $hotel->name }}</h1>
        <p style="color:rgba(245,240,232,0.7); font-size:0.95rem; margin-top:0.5rem;">
            <i class="bi bi-geo-alt me-1" style="color:var(--gold);"></i>{{ $hotel->address }}
        </p>
    </div>
</div>

{{-- MAIN CONTENT --}}
<div class="container" style="padding: 3rem 0 5rem;">
    <div class="row g-5">

        {{-- LEFT --}}
        <div class="col-lg-7">
            <div class="panel mb-4">
                <div class="panel-header">
                    <span class="panel-title"><i class="bi bi-info-circle me-2" style="color:var(--gold);"></i>About</span>
                </div>
                <div class="panel-body">
                    <p style="color:rgba(245,240,232,0.8); line-height:1.9; font-size:0.95rem;">{{ $hotel->description }}</p>
                </div>
            </div>

            {{-- Amenities --}}
            @if($hotel->amenities)
            <div class="panel mb-4">
                <div class="panel-header">
                    <span class="panel-title"><i class="bi bi-check2-circle me-2" style="color:var(--gold);"></i>Amenities & Services</span>
                </div>
                <div class="panel-body">
                    <div class="row g-2">
                        @foreach($hotel->amenities as $amenity)
                        <div class="col-6 col-md-4">
                            <div style="display:flex; align-items:center; gap:8px; font-size:0.875rem; color:var(--text-muted);">
                                <i class="bi bi-check-circle-fill" style="color:var(--accent-green); font-size:0.85rem; flex-shrink:0;"></i>
                                {{ $amenity }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

            {{-- MAP --}}
            @if($hotel->latitude && $hotel->longitude)
            <div class="panel">
                <div class="panel-header">
                    <span class="panel-title"><i class="bi bi-map me-2" style="color:var(--gold);"></i>Location</span>
                </div>
                <div id="map" style="height:280px; border-radius:0 0 12px 12px; border:none;"></div>
            </div>
            @endif
        </div>

        {{-- RIGHT --}}
        <div class="col-lg-5">

            {{-- Quick Info --}}
            <div class="panel mb-4">
                <div class="panel-header">
                    <span class="panel-title"><i class="bi bi-bookmark-star me-2" style="color:var(--gold);"></i>Hotel Details</span>
                </div>
                <div class="panel-body p-0">
                    <table class="table table-premium mb-0">
                        <tbody>
                            <tr>
                                <td style="color:var(--text-muted); padding-left:1.4rem; width:40%;"><i class="bi bi-star-fill me-2" style="color:var(--gold);"></i>Rating</td>
                                <td>{!! $hotel->stars_html !!} <span style="color:var(--text-muted); font-size:0.8rem; margin-left:4px;">{{ $hotel->stars }}-Star</span></td>
                            </tr>
                            <tr>
                                <td style="color:var(--text-muted); padding-left:1.4rem;"><i class="bi bi-tag me-2" style="color:var(--gold);"></i>Type</td>
                                <td style="text-transform:capitalize;">{{ $hotel->type }}</td>
                            </tr>
                            @if($hotel->price_range)
                            <tr>
                                <td style="color:var(--text-muted); padding-left:1.4rem;"><i class="bi bi-cash me-2" style="color:var(--gold);"></i>Price</td>
                                <td style="color:var(--gold-light);">{{ $hotel->price_range }}</td>
                            </tr>
                            @endif
                            @if($hotel->phone)
                            <tr>
                                <td style="color:var(--text-muted); padding-left:1.4rem;"><i class="bi bi-telephone me-2" style="color:var(--gold);"></i>Phone</td>
                                <td><a href="tel:{{ $hotel->phone }}" style="color:var(--text-light); text-decoration:none;">{{ $hotel->phone }}</a></td>
                            </tr>
                            @endif
                            @if($hotel->email)
                            <tr>
                                <td style="color:var(--text-muted); padding-left:1.4rem;"><i class="bi bi-envelope me-2" style="color:var(--gold);"></i>Email</td>
                                <td><a href="mailto:{{ $hotel->email }}" style="color:var(--gold-light); text-decoration:none; font-size:0.85rem;">{{ $hotel->email }}</a></td>
                            </tr>
                            @endif
                            @if($hotel->website)
                            <tr>
                                <td style="color:var(--text-muted); padding-left:1.4rem;"><i class="bi bi-globe me-2" style="color:var(--gold);"></i>Website</td>
                                <td><a href="{{ $hotel->website }}" target="_blank" style="color:var(--gold); text-decoration:none; font-size:0.85rem;">Visit Website <i class="bi bi-box-arrow-up-right ms-1"></i></a></td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Guide Suggestion --}}
            <div class="panel" style="border-color:rgba(201,168,76,0.25);">
                <div class="panel-header" style="background:rgba(201,168,76,0.05);">
                    <span class="panel-title"><i class="bi bi-person-check me-2" style="color:var(--gold);"></i>Make Your Stay Complete</span>
                </div>
                <div class="panel-body text-center">
                    <i class="bi bi-compass-fill" style="font-size:2.5rem; color:var(--gold); opacity:0.7; margin-bottom:0.75rem; display:block;"></i>
                    <p style="color:var(--text-muted); font-size:0.875rem; line-height:1.7; margin-bottom:1.25rem;">
                        Pair your stay with a certified local guide to explore Gondar's castles, churches, and hidden gems at your own pace.
                    </p>
                    <a href="{{ route('guides.index') }}" class="btn-gold" style="width:100%; justify-content:center;">
                        <i class="bi bi-person-badge"></i> Find a Guide
                    </a>
                    <a href="{{ route('attractions.index') }}" class="btn-outline-gold mt-2" style="width:100%; justify-content:center;">
                        <i class="bi bi-building"></i> Explore Attractions
                    </a>
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
    L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; CartoDB &copy; OpenStreetMap'
    }).addTo(map);

    var goldIcon = L.divIcon({
        className: '',
        html: '<div style="width:30px;height:30px;background:linear-gradient(135deg,#C9A84C,#9A7A2E);border-radius:50% 50% 50% 0;transform:rotate(-45deg);border:2px solid rgba(255,255,255,0.3);box-shadow:0 4px 15px rgba(0,0,0,0.5);"></div>',
        iconSize: [30, 30], iconAnchor: [15, 30], popupAnchor: [0, -34]
    });
    L.marker([{{ $hotel->latitude }}, {{ $hotel->longitude }}], {icon: goldIcon})
        .addTo(map)
        .bindPopup('<div style="background:#1C1C1C;border:1px solid rgba(201,168,76,0.3);border-radius:8px;padding:10px;"><strong style="color:#C9A84C;font-family:serif;">{{ $hotel->name }}</strong><br><small style="color:#9A9080;">{{ $hotel->address }}</small></div>')
        .openPopup();
</script>
@endif
@endsection
