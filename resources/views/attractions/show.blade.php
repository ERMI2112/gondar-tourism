@extends('layouts.app')

@section('title', $attraction->name . ' — Gondar Tourism')

@section('content')

{{-- HERO BANNER --}}
@php
$imageUrl = $attraction->image
    ? (Str::startsWith($attraction->image, ['http://', 'https://']) ? $attraction->image : asset('images/' . $attraction->image))
    : 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/Fasilides_Castle%2C_Gondar.jpg/1280px-Fasilides_Castle%2C_Gondar.jpg';
@endphp

<div style="
    position:relative; overflow:hidden;
    padding: 5rem 0 4rem;
    background:
        linear-gradient(to bottom, rgba(13,13,13,0.3) 0%, rgba(13,13,13,0.75) 60%, rgba(13,13,13,1) 100%),
        url('{{ $imageUrl }}') center/cover no-repeat;
">
    <div class="container" style="position:relative; z-index:2;">
        <a href="{{ route('attractions.index') }}" style="color:var(--gold); text-decoration:none; font-size:0.85rem; display:inline-flex; align-items:center; gap:6px; margin-bottom:1.5rem; opacity:0.85; transition:opacity 0.2s;" onmouseover="this.style.opacity=1" onmouseout="this.style.opacity=0.85">
            <i class="bi bi-arrow-left"></i> All Attractions
        </a>
        <span class="card-category-badge d-block mb-2" style="width:fit-content;">{{ $attraction->category->name ?? 'Attraction' }}</span>
        <h1 class="section-title" style="font-size:2.8rem; max-width:700px;">{{ $attraction->name }}</h1>
        <div class="d-flex flex-wrap gap-3 mt-3" style="font-size:0.85rem; color:rgba(245,240,232,0.7);">
            <span><i class="bi bi-geo-alt me-1" style="color:var(--gold);"></i>{{ $attraction->location_name }}</span>
            @if($attraction->opening_hours)
            <span><i class="bi bi-clock me-1" style="color:var(--gold);"></i>{{ $attraction->opening_hours }}</span>
            @endif
            @if($attraction->ticket_price)
            <span><i class="bi bi-ticket me-1" style="color:var(--gold);"></i>{{ $attraction->ticket_price }}</span>
            @endif
        </div>
    </div>
</div>

{{-- MAIN CONTENT --}}
<div class="container" style="padding: 3rem 0 5rem;">
    <div class="row g-5">

        {{-- LEFT: Info --}}
        <div class="col-lg-7">

            <div class="panel mb-4">
                <div class="panel-header">
                    <span class="panel-title"><i class="bi bi-info-circle me-2" style="color:var(--gold-dark);"></i>About this Attraction</span>
                </div>
                <div class="panel-body">
                    <p style="color:#5A5A5A; line-height:1.85; font-size:1.0625rem;">{{ $attraction->description }}</p>
                </div>
            </div>

            {{-- HISTORY --}}
            @if($attraction->history)
            <div class="panel mb-4">
                <div class="panel-header">
                    <span class="panel-title"><i class="bi bi-clock-history me-2" style="color:var(--gold-dark);"></i>Historical Background</span>
                </div>
                <div class="panel-body">
                    <p style="color:#5A5A5A; line-height:1.85; font-size:1.0625rem;">{{ $attraction->history }}</p>
                </div>
            </div>
            @endif

            {{-- VISIT INFO --}}
            <div class="panel">
                <div class="panel-header">
                    <span class="panel-title"><i class="bi bi-info-square me-2" style="color:var(--gold-dark);"></i>Visitor Information</span>
                </div>
                <div class="panel-body p-0">
                    <table class="table table-premium mb-0">
                        <tbody>
                            <tr>
                                <td style="width:38%; color:#6B6B6B; padding-left:2rem; font-weight:600;">
                                    <i class="bi bi-geo-alt me-2" style="color:var(--gold-dark);"></i>Location
                                </td>
                                <td style="color:var(--charcoal);">{{ $attraction->location_name }}</td>
                            </tr>
                            @if($attraction->opening_hours)
                            <tr>
                                <td style="color:#6B6B6B; padding-left:2rem; font-weight:600;">
                                    <i class="bi bi-clock me-2" style="color:var(--gold-dark);"></i>Opening Hours
                                </td>
                                <td style="color:var(--charcoal);">{{ $attraction->opening_hours }}</td>
                            </tr>
                            @endif
                            @if($attraction->ticket_price)
                            <tr>
                                <td style="color:#6B6B6B; padding-left:2rem; font-weight:600;">
                                    <i class="bi bi-ticket me-2" style="color:var(--gold-dark);"></i>Admission Fee
                                </td>
                                <td style="color:var(--charcoal);">{{ $attraction->ticket_price }}</td>
                            </tr>
                            @endif
                            <tr>
                                <td style="color:#6B6B6B; padding-left:2rem; font-weight:600;">
                                    <i class="bi bi-camera me-2" style="color:var(--gold-dark);"></i>Photography
                                </td>
                                <td style="color:var(--charcoal);">Permitted (no flash inside churches)</td>
                            </tr>
                            <tr>
                                <td style="color:#6B6B6B; padding-left:2rem; font-weight:600;">
                                    <i class="bi bi-person-badge me-2" style="color:var(--gold-dark);"></i>Guided Tours
                                </td>
                                <td style="color:var(--charcoal);">Available — book below</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- RIGHT: Map + Booking --}}
        <div class="col-lg-5">

            {{-- MAP --}}
            <div class="panel mb-4">
                <div class="panel-header">
                    <span class="panel-title"><i class="bi bi-map me-2" style="color:var(--gold-dark);"></i>Location Map</span>
                </div>
                <div id="map" style="height:280px; border-radius:0 0 16px 16px; border:none;"></div>
            </div>

            {{-- GUIDE REQUEST FORM --}}
            <div class="panel">
                <div class="panel-header">
                    <span class="panel-title"><i class="bi bi-person-check me-2" style="color:var(--gold-dark);"></i>Request a Guide</span>
                </div>
                <div class="panel-body form-premium">
                    @if(session('success'))
                    <div class="alert-premium mb-3">
                        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                    </div>
                    @endif
                    @if($errors->any())
                    <div class="alert-premium mb-3" style="background:#FCE8EC;border-color:var(--crimson);color:var(--imperial-red);">
                        @foreach($errors->all() as $error)<div>{{ $error }}</div>@endforeach
                    </div>
                    @endif

                    <form method="POST" action="{{ route('guide-requests.store') }}">
                        @csrf
                        <input type="hidden" name="attraction_id" value="{{ $attraction->id }}">
                        <div class="mb-3">
                            <label class="form-label">Your Full Name</label>
                            <input type="text" name="tourist_name" class="form-control" required placeholder="e.g. John Smith">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="tourist_email" class="form-control" required placeholder="you@email.com">
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label">Visit Date</label>
                                <input type="date" name="visit_date" class="form-control" min="{{ date('Y-m-d') }}">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label">Group Size</label>
                                <input type="number" name="group_size" value="1" min="1" max="50" class="form-control">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Special Notes (optional)</label>
                            <textarea name="message" class="form-control" rows="3" placeholder="Language preference, accessibility needs, etc."></textarea>
                        </div>
                        <button type="submit" class="btn-gold w-100 justify-content-center" style="border:none; cursor:pointer;">
                            <i class="bi bi-send"></i> Submit Request
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('scripts')
<script>
    var map = L.map('map').setView([{{ $attraction->latitude ?? 12.6084 }}, {{ $attraction->longitude ?? 37.4693 }}], 15);
    L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; CartoDB &copy; OpenStreetMap'
    }).addTo(map);

    @if($attraction->latitude && $attraction->longitude)
    var goldIcon = L.divIcon({
        className: '',
        html: '<div style="width:30px;height:30px;background:linear-gradient(135deg,#C9A84C,#9A7A2E);border-radius:50% 50% 50% 0;transform:rotate(-45deg);border:2px solid rgba(255,255,255,0.3);box-shadow:0 4px 15px rgba(0,0,0,0.5);"></div>',
        iconSize: [30, 30], iconAnchor: [15, 30], popupAnchor: [0, -34]
    });
    L.marker([{{ $attraction->latitude }}, {{ $attraction->longitude }}], {icon: goldIcon})
        .addTo(map)
        .bindPopup('<div style="background:#1C1C1C;border:1px solid rgba(201,168,76,0.3);border-radius:8px;padding:10px;"><strong style="color:#C9A84C;font-family:serif;">{{ $attraction->name }}</strong><br><small style="color:#9A9080;">{{ $attraction->location_name }}</small></div>')
        .openPopup();
    @endif
</script>
@endsection
