@extends('layouts.app')

@section('title', $attraction->name . ' — Gondar Tourism')

@section('content')

{{-- HERO BANNER --}}
@php
$imageUrl = $attraction->image
    ? (Str::startsWith($attraction->image, ['http://', 'https://']) ? $attraction->image : asset('images/' . $attraction->image))
    : 'https://upload.wikimedia.org/wikipedia/commons/e/e9/Fasilides_Castle_Gondar.jpg';
@endphp

<section class="detail-header-banner" style="background-image: url('{{ $imageUrl }}');">
    <div class="detail-header-overlay"></div>
    <div class="detail-header-content">
        <div class="container">
            <a href="{{ route('attractions.index') }}" class="text-warning text-decoration-none small d-inline-flex align-items-center gap-1 mb-3 opacity-75">
                <i class="bi bi-arrow-left"></i> All Attractions
            </a>
            <div class="mb-2">
                <span class="verification-badge"><i class="bi bi-patch-check-fill"></i> {{ $attraction->category->name ?? 'Attraction' }}</span>
            </div>
            <h1 class="display-5 fw-bold text-white font-serif">{{ $attraction->name }}</h1>
            <div class="d-flex flex-wrap gap-3 mt-3 text-white-50 small">
                <span><i class="bi bi-geo-alt me-1 text-warning"></i>{{ $attraction->location_name }}</span>
                @if($attraction->opening_hours)
                    <span><i class="bi bi-clock me-1 text-warning"></i>{{ $attraction->opening_hours }}</span>
                @endif
                @if($attraction->ticket_price)
                    <span><i class="bi bi-ticket me-1 text-warning"></i>{{ $attraction->ticket_price }}</span>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- MAIN CONTENT --}}
<div class="container py-5">
    <div class="row g-5">

        {{-- LEFT COLUMN: Description & History --}}
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-header bg-white border-bottom py-3 px-4">
                    <h5 class="font-serif mb-0"><i class="bi bi-info-circle text-warning me-2"></i>About this Attraction</h5>
                </div>
                <div class="card-body p-4">
                    <p class="text-muted lh-lg">{{ $attraction->description }}</p>
                </div>
            </div>

            @if($attraction->history)
            <div class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-header bg-white border-bottom py-3 px-4">
                    <h5 class="font-serif mb-0"><i class="bi bi-clock-history text-warning me-2"></i>Historical Background</h5>
                </div>
                <div class="card-body p-4">
                    <p class="text-muted lh-lg">{{ $attraction->history }}</p>
                </div>
            </div>
            @endif

            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-white border-bottom py-3 px-4">
                    <h5 class="font-serif mb-0"><i class="bi bi-info-square text-warning me-2"></i>Visitor Information</h5>
                </div>
                <div class="card-body p-0">
                    <table class="table table-borderless mb-0">
                        <tbody>
                            <tr class="border-bottom">
                                <td class="ps-4 py-3 text-muted fw-semibold" style="width: 40%;"><i class="bi bi-geo-alt me-2 text-warning"></i>Location</td>
                                <td class="py-3">{{ $attraction->location_name }}</td>
                            </tr>
                            @if($attraction->opening_hours)
                            <tr class="border-bottom">
                                <td class="ps-4 py-3 text-muted fw-semibold"><i class="bi bi-clock me-2 text-warning"></i>Opening Hours</td>
                                <td class="py-3">{{ $attraction->opening_hours }}</td>
                            </tr>
                            @endif
                            @if($attraction->ticket_price)
                            <tr class="border-bottom">
                                <td class="ps-4 py-3 text-muted fw-semibold"><i class="bi bi-ticket me-2 text-warning"></i>Admission Fee</td>
                                <td class="py-3">{{ $attraction->ticket_price }}</td>
                            </tr>
                            @endif
                            <tr class="border-bottom">
                                <td class="ps-4 py-3 text-muted fw-semibold"><i class="bi bi-camera me-2 text-warning"></i>Photography</td>
                                <td class="py-3">Permitted (no flash inside churches)</td>
                            </tr>
                            <tr>
                                <td class="ps-4 py-3 text-muted fw-semibold"><i class="bi bi-person-badge me-2 text-warning"></i>Guided Tours</td>
                                <td class="py-3">Available — book below</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- RIGHT COLUMN: Map & Booking --}}
        <div class="col-lg-5">
            <div class="sticky-sidebar">
                {{-- MAP --}}
                <div class="card border-0 shadow-sm rounded-3 mb-4">
                    <div class="card-header bg-white border-bottom py-3 px-4">
                        <h5 class="font-serif mb-0"><i class="bi bi-map text-warning me-2"></i>Location Map</h5>
                    </div>
                    <div id="map" class="leaflet-container-gondar" style="border-radius: 0 0 12px 12px;"></div>
                </div>

                {{-- GUIDE REQUEST FORM --}}
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-header py-3 px-4" style="background-color: var(--gondar-red); border-radius: 12px 12px 0 0;">
                        <h5 class="mb-0 text-white"><i class="bi bi-person-check me-2"></i>Request a Local Guide</h5>
                    </div>
                    <div class="card-body p-4">
                        @if(session('success'))
                            <div class="alert alert-success border-0 d-flex align-items-center gap-2" style="background: #E8F8F0; color: #229954;">
                                <i class="bi bi-check-circle-fill"></i>{{ session('success') }}
                            </div>
                        @endif
                        @if($errors->any())
                            <div class="alert alert-danger border-0">
                                @foreach($errors->all() as $error)<div>{{ $error }}</div>@endforeach
                            </div>
                        @endif

                        <form method="POST" action="{{ route('guide-requests.store') }}">
                            @csrf
                            <input type="hidden" name="attraction_id" value="{{ $attraction->id }}">
                            <div class="mb-3">
                                <label class="form-label fw-semibold small text-uppercase">Full Name</label>
                                <input type="text" name="tourist_name" class="form-control" required placeholder="e.g. John Smith">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold small text-uppercase">Email</label>
                                <input type="email" name="tourist_email" class="form-control" required placeholder="you@email.com">
                            </div>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label class="form-label fw-semibold small text-uppercase">Visit Date</label>
                                    <input type="date" name="visit_date" class="form-control" min="{{ date('Y-m-d') }}">
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label fw-semibold small text-uppercase">Group Size</label>
                                    <input type="number" name="group_size" value="1" min="1" max="50" class="form-control">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-semibold small text-uppercase">Notes (optional)</label>
                                <textarea name="message" class="form-control" rows="3" placeholder="Language preference, accessibility needs..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-gondar-gold w-100">
                                <i class="bi bi-send me-2"></i>Submit Request
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('scripts')
<script>
    var map = L.map('map').setView([{{ $attraction->latitude ?? 12.6084 }}, {{ $attraction->longitude ?? 37.4693 }}], 15);
    L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; CartoDB &copy; OpenStreetMap'
    }).addTo(map);

    @if($attraction->latitude && $attraction->longitude)
    var goldIcon = L.divIcon({
        className: '',
        html: '<div style="width:28px;height:28px;background:var(--gondar-red);border-radius:50% 50% 50% 0;transform:rotate(-45deg);border:2px solid var(--gondar-gold);box-shadow:0 4px 12px rgba(0,0,0,0.3);"></div>',
        iconSize: [28, 28], iconAnchor: [14, 28], popupAnchor: [0, -32]
    });
    L.marker([{{ $attraction->latitude }}, {{ $attraction->longitude }}], {icon: goldIcon})
        .addTo(map)
        .bindPopup('<div style="padding:4px;"><strong style="color:var(--gondar-red);font-family:Playfair Display,serif;">{{ $attraction->name }}</strong><br><small class="text-muted">{{ $attraction->location_name }}</small></div>')
        .openPopup();
    @endif
</script>
@endsection
