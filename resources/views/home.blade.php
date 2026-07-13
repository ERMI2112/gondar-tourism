@extends('layouts.app')

@section('title', 'Gondar Smart Tourism — Discover Ethiopia\'s Royal City')

@section('content')

<style>
    .home-hero {
        position: relative;
        overflow: hidden;
        padding: 5.5rem 0 4rem;
        background:
            linear-gradient(135deg, rgba(13,13,13,0.92) 0%, rgba(13,13,13,0.72) 55%, rgba(13,13,13,0.92) 100%),
            url('https://commons.wikimedia.org/wiki/Special:FilePath/Fasilides%20Castle%2C%20Gondar.jpg?width=1800') center 42%/cover no-repeat;
    }

    .home-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background:
            radial-gradient(circle at 20% 20%, rgba(201,168,76,0.12), transparent 28%),
            radial-gradient(circle at 80% 20%, rgba(255,255,255,0.06), transparent 24%);
        pointer-events: none;
    }

    .home-hero-inner {
        position: relative;
        z-index: 2;
    }

    .hero-panel {
        background: rgba(28,28,28,0.72);
        border: 1px solid rgba(201,168,76,0.14);
        border-radius: 20px;
        padding: 1.5rem;
        backdrop-filter: blur(14px);
        box-shadow: 0 20px 50px rgba(0,0,0,0.25);
    }

    .hero-kicker {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 0.4rem 0.85rem;
        border-radius: 999px;
        border: 1px solid rgba(201,168,76,0.24);
        background: rgba(201,168,76,0.08);
        color: var(--gold-light);
        font-size: 0.75rem;
        letter-spacing: 1px;
        text-transform: uppercase;
        margin-bottom: 1rem;
    }

    .hero-actions .btn {
        min-width: 180px;
        justify-content: center;
    }

    .hero-stat {
        padding-top: 1rem;
        border-top: 1px solid rgba(201,168,76,0.12);
    }

    .hero-stat .value {
        font-family: 'Playfair Display', serif;
        font-size: 1.45rem;
        line-height: 1;
        color: var(--gold);
        font-weight: 700;
    }

    .hero-stat .label {
        font-size: 0.72rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--text-muted);
    }

    .section-surface {
        background: var(--dark-2);
    }

    .trip-card {
        background: rgba(13,13,13,0.55);
        border: 1px solid rgba(201,168,76,0.14);
        border-radius: 18px;
        padding: 1.15rem;
        height: 100%;
    }

    .trip-step {
        display: flex;
        gap: 12px;
        margin-bottom: 1rem;
    }

    .trip-step:last-child {
        margin-bottom: 0;
    }

    .trip-step-index {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: rgba(201,168,76,0.12);
        color: var(--gold);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 0.8rem;
        flex-shrink: 0;
    }

    .trip-step-title {
        color: var(--text-light);
        font-weight: 600;
        margin-bottom: 0.15rem;
    }

    .trip-step-copy {
        color: var(--text-muted);
        font-size: 0.85rem;
        line-height: 1.6;
    }

    .feature-tile {
        background: var(--dark-3);
        border: 1px solid rgba(201,168,76,0.1);
        border-radius: 16px;
        padding: 1.25rem;
        height: 100%;
    }

    .feature-tile i {
        color: var(--gold);
        font-size: 1.2rem;
    }

    .feature-tile h3 {
        color: var(--text-light);
        font-family: 'Playfair Display', serif;
        font-size: 1.05rem;
        margin: 0.75rem 0 0.4rem;
    }

    .feature-tile p {
        color: var(--text-muted);
        font-size: 0.88rem;
        line-height: 1.65;
        margin: 0;
    }

    .mini-profile-card {
        background: var(--dark-3);
        border: 1px solid rgba(201,168,76,0.1);
        border-radius: 16px;
        padding: 1.25rem;
        height: 100%;
        transition: all 0.25s ease;
    }

    .mini-profile-card:hover {
        transform: translateY(-3px);
        border-color: rgba(201,168,76,0.24);
        box-shadow: 0 16px 40px rgba(0,0,0,0.28);
    }

    .mini-profile-meta {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 0.9rem;
    }

    .mini-profile-avatar {
        width: 52px;
        height: 52px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--gold-dark), var(--gold));
        color: var(--dark);
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        font-size: 1.2rem;
        flex-shrink: 0;
    }

    .mini-profile-name {
        font-family: 'Playfair Display', serif;
        color: var(--text-light);
        font-size: 1rem;
        margin-bottom: 0.15rem;
    }

    .mini-profile-sub {
        color: var(--text-muted);
        font-size: 0.8rem;
    }

    .section-spacer {
        padding: 5rem 0;
    }

    .heritage-strip {
        margin-top: -2.25rem;
        position: relative;
        z-index: 3;
    }

    .heritage-strip-inner {
        padding: 1.25rem 1.5rem;
        border: 1px solid rgba(212,175,55,.22);
        border-radius: 14px;
        background: rgba(37,37,41,.94);
        box-shadow: 0 16px 36px rgba(0,0,0,.24);
    }

    .heritage-number {
        color: var(--gold-light);
        font: 600 1.8rem/1 'Playfair Display', serif;
    }

    .heritage-caption {
        color: var(--warm-gray);
        font-size: .75rem;
        letter-spacing: .08em;
        text-transform: uppercase;
    }

    .home-story-image {
        height: 100%;
        min-height: 265px;
        position: relative;
        overflow: hidden;
        border-radius: 16px;
        background: #5b4839;
    }

    .home-story-image img { width: 100%; height: 100%; object-fit: cover; position: absolute; inset: 0; }
    .home-story-image::after { content: ''; position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,.7), transparent 55%); }
    .home-story-image span { position: absolute; left: 1.25rem; bottom: 1rem; z-index: 1; color: #fff; font: 600 1.1rem 'Playfair Display', serif; }

    .culture-note {
        height: 100%;
        padding: 2rem;
        border-radius: 16px;
        border: 1px solid rgba(212,175,55,.16);
        background: linear-gradient(145deg, #29292d, #202024);
    }

    .culture-note p { color: var(--warm-gray); line-height: 1.8; }
    .culture-note a { color: var(--gold-light); font-size: .85rem; font-weight: 700; text-decoration: none; }

    .home-event-callout {
        border-radius: 14px;
        background: linear-gradient(110deg, rgba(139,21,56,.78), rgba(37,37,41,.92));
        border: 1px solid rgba(212,175,55,.24);
        padding: 1.3rem 1.5rem;
    }

    .eyebrow-red {
        display: inline-flex;
        align-items: center;
        gap: .45rem;
        color: #f04d70;
        font-size: .78rem;
        font-weight: 700;
        letter-spacing: .18em;
        text-transform: uppercase;
    }
</style>

{{-- ========== HERO ========== --}}
<section class="home-hero">
    <div class="container home-hero-inner">
        <div class="row align-items-center g-4">
            <div class="col-lg-7 fade-up">
                <div class="hero-kicker">
                    <i class="bi bi-gem"></i> UNESCO World Heritage · Gondar since 1636
                </div>
                <h1 class="hero-title mb-3">
                    Explore the <span class="highlight">Royal Castles</span><br>of Gondar
                </h1>
                <p class="hero-subtitle mb-4">
                    Step into Ethiopia’s royal city: fortress walls, painted churches, a living festival calendar, and the dramatic highlands beyond.
                </p>
                <div class="hero-actions d-flex flex-wrap gap-3">
                    <a href="{{ route('guides.index') }}" class="btn-gold">
                        <i class="bi bi-person-badge"></i> Find a Local Guide
                    </a>
                    <a href="{{ route('attractions.index') }}" class="btn-outline-gold">
                        <i class="bi bi-compass"></i> Browse Attractions
                    </a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="hero-panel fade-up">
                    <div class="trip-card mb-3">
                        <div class="section-label mb-2">The royal city, in context</div>
                        <div class="trip-step">
                            <div class="trip-step-index">1</div>
                            <div>
                                <div class="trip-step-title">A permanent capital</div>
                                <div class="trip-step-copy">Emperor Fasilides established Gondar as a permanent capital in 1636.</div>
                            </div>
                        </div>
                        <div class="trip-step">
                            <div class="trip-step-index">2</div>
                            <div>
                                <div class="trip-step-title">A walled royal world</div>
                                <div class="trip-step-copy">Fasil Ghebbi’s 900-metre enclosure holds palaces, churches and civic buildings.</div>
                            </div>
                        </div>
                        <div class="trip-step mb-0">
                            <div class="trip-step-index">3</div>
                            <div>
                                <div class="trip-step-title">More than monuments</div>
                                <div class="trip-step-copy">The city remains alive with worship, music, craft and a rich local calendar.</div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="hero-stat">
                                <div class="value">{{ $attractions->count() }}+</div>
                                <div class="label">Attractions</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="hero-stat">
                                <div class="value">{{ $guides->count() }}+</div>
                                <div class="label">Local Guides</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="hero-stat">
                                <div class="value">{{ $events->count() }}+</div>
                                <div class="label">Events</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="hero-stat">
                                <div class="value">1979</div>
                                <div class="label">UNESCO Listing</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container heritage-strip">
    <div class="heritage-strip-inner row g-3 text-center text-md-start align-items-center">
        <div class="col-md-4"><div class="heritage-number">900 m</div><div class="heritage-caption">Fasil Ghebbi’s enclosing wall</div></div>
        <div class="col-md-4 border-start border-end" style="border-color:rgba(212,175,55,.18)!important;"><div class="heritage-number">8 parts</div><div class="heritage-caption">In the wider UNESCO property</div></div>
        <div class="col-md-4"><div class="heritage-number">1 gateway</div><div class="heritage-caption">To castles, churches & highlands</div></div>
    </div>
</div>

{{-- ========== EDITORIAL CITY INTRODUCTION ========== --}}
<section class="section-spacer">
    <div class="container">
        <div class="row align-items-end mb-4">
            <div class="col-lg-8">
                <div class="section-label"><i class="bi bi-journal-richtext me-1"></i>Why Gondar</div>
                <h2 class="section-title">A royal city framed by living heritage</h2>
                <p class="section-desc mb-0">Gondar rewards visitors who look beyond the castle gates: sacred art, seasonal ceremonies, and a landscape that opens toward the Simien Mountains.</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-5"><div class="home-story-image"><img src="https://commons.wikimedia.org/wiki/Special:FilePath/Fasil%20Ghebbi%2C%20Gondar%20Region-107592.jpg?width=1300" alt="Fasil Ghebbi Royal Enclosure in Gondar" loading="lazy" onerror="this.style.display='none'"><span>Fasil Ghebbi Royal Enclosure</span></div></div>
            <div class="col-lg-3"><div class="home-story-image"><img src="https://commons.wikimedia.org/wiki/Special:FilePath/Debre%20Birhan%20Selassie%20church%2C%20Gondar%20%285495135726%29.jpg?width=1000" alt="Debre Berhan Selassie church in Gondar" loading="lazy" onerror="this.style.display='none'"><span>Sacred art & story</span></div></div>
            <div class="col-lg-4"><div class="culture-note"><div class="section-label mb-3"><i class="bi bi-globe-africa me-1"></i> A world heritage landscape</div><h3 class="mb-3">Architecture shaped by many worlds.</h3><p>UNESCO describes Fasil Ghebbi as a fortress-city whose palaces, churches and monasteries carry Ethiopian, Hindu, Arab and Baroque influences.</p><p class="mb-3">The wider heritage property also reaches Debre Berhan Selassie, Fasilides’ Bath and Qusquam.</p><a href="https://whc.unesco.org/en/list/19/" target="_blank" rel="noopener">Explore the UNESCO record <i class="bi bi-arrow-up-right ms-1"></i></a></div></div>
        </div>
    </div>
</section>

{{-- ========== FEATURED ATTRACTIONS ========== --}}
<section class="section-spacer">
    <div class="container">
        <div class="row align-items-end mb-4">
            <div class="col">
                <div class="section-label"><i class="bi bi-building me-1"></i>Destinations</div>
                <h2 class="section-title">Featured Attractions</h2>
                <p class="section-desc">From royal palaces to sacred churches and landscapes, the attraction cards now lead the page with cleaner hierarchy.</p>
            </div>
            <div class="col-auto">
                <a href="{{ route('attractions.index') }}" class="btn-outline-gold" style="font-size:0.85rem; padding: 0.5rem 1.25rem;">
                    View All <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
        <div class="row g-4">
            @foreach($attractions->take(6) as $attraction)
            <div class="col-md-6 col-lg-4">
                <div class="card-premium">
                    @if($attraction->image)
                        <img
                            src="{{ Str::startsWith($attraction->image, ['http://', 'https://']) ? $attraction->image : asset('images/' . $attraction->image) }}"
                            class="card-img-top"
                            alt="{{ $attraction->name }}"
                            style="height:200px; object-fit:cover;"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                            loading="lazy"
                        >
                    @endif
                    <div class="card-img-placeholder" style="{{ $attraction->image ? 'display: none;' : '' }}; height:200px;">
                        @php
                        $icons = ['historical' => 'bi-bank2', 'religious' => 'bi-heart-pulse', 'natural' => 'bi-tree', 'cultural' => 'bi-music-note-beamed'];
                        $slug = optional($attraction->category)->slug ?? 'historical';
                        $icon = $icons[$slug] ?? 'bi-geo-alt';
                        @endphp
                        <i class="bi {{ $icon }}"></i>
                    </div>
                    <div class="card-body">
                        <span class="card-category-badge">{{ $attraction->category->name ?? 'Attraction' }}</span>
                        <h5 class="card-title">{{ $attraction->name }}</h5>
                        <p class="card-text">{{ Str::limit($attraction->description, 100) }}</p>
                    </div>
                    <div class="card-footer-meta">
                        <span><i class="bi bi-geo-alt me-1"></i>{{ Str::limit($attraction->location_name, 25) }}</span>
                        <a href="{{ route('attractions.show', $attraction) }}" class="btn-card">
                            Explore <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ========== INTERACTIVE MAP ========== --}}
<section class="section-surface section-spacer">
    <div class="container">
        <div class="row align-items-end mb-4">
            <div class="col-lg-8">
                <div class="section-label"><i class="bi bi-map me-1"></i>Interactive Map</div>
                <h2 class="section-title">Explore Gondar</h2>
                <p class="section-desc mb-0">Use the live map to orient yourself, then move into attractions, guides, and stays with less friction.</p>
            </div>
        </div>
        <div class="panel">
            <div class="panel-body p-0">
                <div id="map"></div>
            </div>
        </div>
    </div>
</section>

{{-- ========== BEYOND THE CITY ========== --}}
<section class="section-spacer section-surface">
    <div class="container">
        <div class="row g-4 align-items-stretch">
            <div class="col-lg-5"><div class="home-story-image" style="min-height:330px;"><img src="https://commons.wikimedia.org/wiki/Special:FilePath/Gelada%20Baboon%20in%20Simien%20Mountains%20National%20Park.jpg?width=1300" alt="Gelada baboon in the Simien Mountains" loading="lazy" onerror="this.style.display='none'"><span>Simien Mountains National Park</span></div></div>
            <div class="col-lg-7"><div class="culture-note"><div class="section-label mb-3"><i class="bi bi-tree me-1"></i> Beyond the city walls</div><h2 class="section-title" style="font-size:2.25rem;">The highlands begin near Gondar.</h2><p>Simien Mountains National Park is a UNESCO World Heritage landscape of deep valleys, jagged peaks and cliffs that fall as far as 1,500 metres. It is habitat for the gelada, Ethiopian wolf and the endemic Walia ibex.</p><div class="row g-3 mt-2"><div class="col-sm-4"><div class="feature-tile"><i class="bi bi-signpost-split"></i><h3>Rugged trails</h3><p>Plan transport and a local guide before heading north.</p></div></div><div class="col-sm-4"><div class="feature-tile"><i class="bi bi-binoculars"></i><h3>Rare wildlife</h3><p>Look closely, keep distance, and never feed animals.</p></div></div><div class="col-sm-4"><div class="feature-tile"><i class="bi bi-cloud-sun"></i><h3>High altitude</h3><p>Build in time to acclimatize and prepare for weather.</p></div></div></div><a class="d-inline-block mt-4" href="{{ route('attractions.index') }}">Explore Gondar’s attractions <i class="bi bi-arrow-right ms-1"></i></a></div></div>
        </div>
    </div>
</section>

@if($events->first())
<section class="py-4 section-surface">
    <div class="container">
        <div class="home-event-callout d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-3">
            <div><div class="eyebrow-red mb-1"><i class="bi bi-calendar-event"></i> Next cultural date</div><h2 class="h3 mb-1">{{ $events->first()->title }}</h2><p class="mb-0" style="color:var(--warm-gray);">{{ \Carbon\Carbon::parse($events->first()->start_date)->format('F j, Y') }} · {{ $events->first()->location }}</p></div>
            <a href="{{ route('events.index') }}" class="btn-gold"><i class="bi bi-calendar3 me-1"></i> View the calendar</a>
        </div>
    </div>
</section>
@endif

{{-- ========== TOUR GUIDES ========== --}}
<section class="py-premium section-surface">
    <div class="container">
        <div class="row align-items-end mb-4">
            <div class="col">
                <div class="section-label"><i class="bi bi-people me-1"></i>Local Experts</div>
                <h2 class="section-title">Our Tour Guides</h2>
                <p class="section-desc">Certified local guides presented like real profiles, so visitors can choose by person, not just by listing.</p>
            </div>
            <div class="col-auto">
                <a href="{{ route('guides.index') }}" class="btn-outline-gold" style="font-size:0.85rem; padding: 0.5rem 1.25rem;">
                    All Guides <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
        <div class="row g-4">
            @foreach($guides->take(4) as $guide)
            <div class="col-md-6 col-lg-3">
                <div class="mini-profile-card">
                    <div class="mini-profile-meta">
                        <div class="mini-profile-avatar">{{ substr($guide->user->name ?? 'G', 0, 1) }}</div>
                        <div>
                            <div class="mini-profile-name">{{ $guide->user->name ?? 'Guide' }}</div>
                            <div class="mini-profile-sub">{{ $guide->specialization ?? 'General Tourism' }}</div>
                        </div>
                    </div>
                    @if($guide->languages)
                    <div class="mb-3">
                        @foreach(array_slice(explode(',', $guide->languages), 0, 3) as $lang)
                        <span style="font-size:0.72rem; background:rgba(201,168,76,0.08); border:1px solid rgba(201,168,76,0.2); color:var(--gold-light); padding:2px 8px; border-radius:50px; margin:2px 4px 2px 0; display:inline-block;">{{ trim($lang) }}</span>
                        @endforeach
                    </div>
                    @endif
                    <div class="d-flex align-items-center justify-content-between gap-2">
                        <span class="{{ $guide->availability_status == 'available' ? 'badge-available' : 'badge-busy' }} d-inline-block">
                            <i class="bi bi-circle-fill me-1" style="font-size:0.5rem;"></i>
                            {{ ucfirst($guide->availability_status) }}
                        </span>
                        <a href="{{ route('guides.show', $guide) }}" class="btn-card">
                            View Profile <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ========== HOTELS ========== --}}
<section class="section-spacer">
    <div class="container">
        <div class="row align-items-end mb-4">
            <div class="col">
                <div class="section-label"><i class="bi bi-building me-1"></i>Where to stay</div>
                <h2 class="section-title">Hotels & Stays</h2>
                <p class="section-desc">A calm, practical accommodation section with the same card rhythm as the rest of the site.</p>
            </div>
            <div class="col-auto">
                <a href="{{ route('hotels.index') }}" class="btn-outline-gold" style="font-size:0.85rem; padding: 0.5rem 1.25rem;">
                    Browse Stays <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
        <div class="row g-4">
            @foreach($hotels->take(4) as $hotel)
            <div class="col-md-6 col-lg-3">
                <div class="card-premium">
                    @if($hotel->image)
                    <img
                        src="{{ $hotel->image }}"
                        alt="{{ $hotel->name }}"
                        class="card-img-top"
                        style="height:190px;"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                        loading="lazy"
                    >
                    @endif
                    <div class="card-img-placeholder" style="{{ $hotel->image ? 'display: none;' : '' }}; height:190px;">
                        <i class="bi bi-building"></i>
                    </div>
                    <div class="card-body">
                        <span class="card-category-badge" style="text-transform:capitalize;">{{ $hotel->type }}</span>
                        <h5 class="card-title">{{ $hotel->name }}</h5>
                        <p class="card-text">{{ Str::limit($hotel->description, 85) }}</p>
                    </div>
                    <div class="card-footer-meta">
                        <span><i class="bi bi-geo-alt me-1"></i>{{ Str::limit($hotel->address, 24) }}</span>
                        <a href="{{ route('hotels.show', $hotel) }}" class="btn-card">
                            Details <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
    var map = L.map('map', {
        center: [12.608, 37.4667],
        zoom: 13,
        zoomControl: true
    });

    L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; CartoDB &copy; OpenStreetMap',
        maxZoom: 18
    }).addTo(map);

    var goldIcon = L.divIcon({
        className: '',
        html: '<div style="width:32px;height:32px;background:linear-gradient(135deg,#C9A84C,#9A7A2E);border-radius:50% 50% 50% 0;transform:rotate(-45deg);border:2px solid rgba(255,255,255,0.3);box-shadow:0 4px 12px rgba(0,0,0,0.5);"></div>',
        iconSize: [32, 32],
        iconAnchor: [16, 32],
        popupAnchor: [0, -36]
    });

    @foreach($attractions as $attr)
    @if($attr->latitude && $attr->longitude)
    L.marker([{{ $attr->latitude }}, {{ $attr->longitude }}], {icon: goldIcon})
        .addTo(map)
        .bindPopup('<div style="background:#1C1C1C;border:1px solid rgba(201,168,76,0.3);border-radius:8px;padding:12px;min-width:180px;"><strong style="color:#C9A84C;font-family:serif;font-size:0.95rem;">{{ $attr->name }}</strong><br><small style="color:#9A9080;">{{ $attr->location_name }}</small><br><a href="{{ route('attractions.show', $attr) }}" style="color:#E8C87A;font-size:0.8rem;margin-top:6px;display:inline-block;">View Details →</a></div>', {
            className: 'premium-popup'
        });
    @endif
    @endforeach
</script>
@endsection
