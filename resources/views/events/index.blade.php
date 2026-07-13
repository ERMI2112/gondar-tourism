@extends('layouts.app')

@section('title', 'Gondar Cultural Calendar — Gondar Tourism')

@section('content')
@php
    $eventImages = [
        'Timket — Ethiopian Epiphany' => 'https://commons.wikimedia.org/wiki/Special:FilePath/Fasilides%20Bath%20Timkat%20people.JPG?width=1400',
        'Timkat — Ethiopian Epiphany' => 'https://commons.wikimedia.org/wiki/Special:FilePath/Fasilides%20Bath%20Timkat%20people.JPG?width=1400',
        'Meskel — Finding of the True Cross' => 'https://commons.wikimedia.org/wiki/Special:FilePath/Demera%20engulfed%20in%20flame%20Meskel%202013.JPG?width=1200',
        'Fasika — Ethiopian Easter' => 'https://commons.wikimedia.org/wiki/Special:FilePath/Fasilides%20Castle%2C%20Gondar.jpg?width=1200',
        'Ethiopian Christmas — Genna' => 'https://commons.wikimedia.org/wiki/Special:FilePath/Fasilides%20Bath%2001.jpg?width=1200',
        'Enkutatash — Ethiopian New Year' => 'https://commons.wikimedia.org/wiki/Special:FilePath/Fasilidass%20Pool%2C%20Gondar%20%285494501839%29.jpg?width=1200',
    ];
    $defaultImage = 'https://commons.wikimedia.org/wiki/Special:FilePath/Fasilidass%20Pool%2C%20Gondar%20%285494501839%29.jpg?width=1200';
@endphp

<style>
    .events-hero { position:relative; overflow:hidden; min-height:440px; display:flex; align-items:end; padding:5.5rem 0 4.5rem; background:linear-gradient(90deg, rgba(15,15,17,.97) 0%, rgba(15,15,17,.73) 48%, rgba(15,15,17,.27) 100%), url('https://commons.wikimedia.org/wiki/Special:FilePath/Fasilides%20Bath%20Timkat%20people.JPG?width=1800') center 47%/cover; }
    .events-hero:after { content:''; position:absolute; inset:0; background:linear-gradient(to top, var(--charcoal) 0%, transparent 40%); pointer-events:none; }
    .events-hero .container { position:relative; z-index:1; }
    .featured-event { overflow:hidden; border:1px solid rgba(212,175,55,.3); border-radius:20px; background:#252529; box-shadow:0 18px 50px rgba(0,0,0,.22); }
    .featured-event-image { min-height:360px; position:relative; background:#5c3a26; }
    .featured-event-image img, .calendar-event-image img { width:100%; height:100%; object-fit:cover; position:absolute; inset:0; }
    .featured-event-image:after { content:''; position:absolute; inset:0; background:linear-gradient(180deg, transparent 45%, rgba(0,0,0,.5)); }
    .featured-event-copy { padding:3rem; }
    .eyebrow-red { display:inline-flex; align-items:center; gap:.45rem; color:#f04d70; font-size:.78rem; font-weight:700; letter-spacing:.18em; text-transform:uppercase; }
    .fact-tile { min-width:108px; padding:.85rem 1rem; border:1px solid rgba(212,175,55,.28); border-radius:10px; background:rgba(255,255,255,.035); }
    .fact-tile strong { display:block; color:var(--gold-light); font:600 1.35rem 'Playfair Display', serif; }
    .fact-tile span { display:block; color:var(--warm-gray); font-size:.66rem; letter-spacing:.1em; text-transform:uppercase; }
    .calendar-event { display:flex; height:100%; overflow:hidden; border-radius:16px; background:var(--warm-white); color:var(--charcoal); box-shadow:0 12px 30px rgba(0,0,0,.16); transition:transform .2s ease, box-shadow .2s ease; }
    .calendar-event:hover { transform:translateY(-4px); box-shadow:0 20px 40px rgba(0,0,0,.25); }
    .calendar-event-date { width:92px; flex:0 0 92px; display:flex; flex-direction:column; justify-content:center; align-items:center; padding:1rem .5rem; color:#221a14; background:linear-gradient(145deg, var(--gold-light), var(--gold-dark)); }
    .calendar-event-date strong { font:700 2.2rem/1 'Playfair Display', serif; }
    .calendar-event-date span { font-size:.7rem; font-weight:800; letter-spacing:.11em; text-transform:uppercase; }
    .calendar-event-image { width:142px; flex:0 0 142px; position:relative; overflow:hidden; background:#73543b; }
    .calendar-event-copy { padding:1.35rem 1.4rem; min-width:0; }
    .calendar-event-copy h3 { color:var(--charcoal); font-size:1.17rem; margin:0 0 .45rem; }
    .calendar-event-copy p { color:#655b54; font-size:.87rem; line-height:1.65; margin:0 0 .8rem; }
    .calendar-event-meta { color:#8a6b26; font-size:.75rem; font-weight:600; }
    .respect-card { height:100%; padding:1.7rem; border-radius:14px; border:1px solid rgba(212,175,55,.19); background:linear-gradient(145deg, #28282c, #202024); }
    @media (max-width: 575.98px) { .events-hero { min-height:390px; padding:4rem 0 3rem; background-position:60% center; } .featured-event-copy { padding:2rem; } .calendar-event { flex-wrap:wrap; } .calendar-event-date { width:76px; flex-basis:76px; } .calendar-event-image { width:calc(100% - 76px); flex-basis:calc(100% - 76px); height:130px; } .calendar-event-copy { width:100%; } }
</style>

<section class="events-hero">
    <div class="container">
        <div class="section-label mb-3"><i class="bi bi-calendar-heart me-1"></i> Living heritage, not a performance</div>
        <h1 class="section-title mb-3" style="font-size:clamp(2.8rem,6vw,4.8rem); max-width:720px;">Time your visit to Gondar’s living calendar.</h1>
        <p class="section-desc mb-0" style="max-width:640px; font-size:1.05rem;">From candlelit vigils to joyful New Year gatherings, these are the moments when Gondar’s history is felt, sung, and shared.</p>
    </div>
</section>

<main class="container" style="padding:4rem 0 5rem;">
    <section class="featured-event mb-5">
        <div class="row g-0 align-items-stretch">
            <div class="col-lg-5">
                <div class="featured-event-image">
                    <img src="https://commons.wikimedia.org/wiki/Special:FilePath/Fasilides%20Bath%20Timkat%20people.JPG?width=1400" alt="People gathered at Fasilides' Bath for Timkat" loading="eager" onerror="this.style.display='none'">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="featured-event-copy">
                    <div class="eyebrow-red mb-3"><i class="bi bi-star-fill"></i> UNESCO-recognized living heritage</div>
                    <h2 class="section-title mb-3" style="font-size:clamp(2rem,4vw,3.1rem);">Timkat at Fasilides’ Bath</h2>
                    <p style="color:var(--warm-gray); line-height:1.85; max-width:650px;">Timkat commemorates the baptism of Jesus Christ. On the evening of 18 January, local communities accompany their Tabot to the water; the following morning brings prayers, blessing of the water, and the return procession. In Gondar, Fasilides’ Bath gives this moment an unforgettable setting.</p>
                    <div class="d-flex flex-wrap gap-2 mt-4">
                        <div class="fact-tile"><strong>18–19</strong><span>January</span></div>
                        <div class="fact-tile"><strong>2 days</strong><span>Ketera & Timkat</span></div>
                        <div class="fact-tile"><strong>2019</strong><span>UNESCO listing</span></div>
                    </div>
                    <a class="d-inline-block mt-4" style="color:var(--gold-light); font-size:.84rem; font-weight:700; text-decoration:none;" href="https://ich.unesco.org/en/RL/ethiopian-epiphany-01491" target="_blank" rel="noopener">Read the UNESCO heritage record <i class="bi bi-arrow-up-right ms-1"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-5">
        <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4">
            <div><div class="eyebrow-red mb-2"><i class="bi bi-calendar3"></i> Plan ahead</div><h2 class="section-title mb-0" style="font-size:2.2rem;">Gondar cultural calendar</h2></div>
            <span style="color:var(--text-muted); font-size:.85rem;">Dates may shift with the Ethiopian calendar and local observance.</span>
        </div>
        <div class="row g-4">
            @forelse($events as $event)
                @php $image = $event->image ?: ($eventImages[$event->title] ?? $defaultImage); @endphp
                <div class="col-lg-6">
                    <article class="calendar-event">
                        <div class="calendar-event-date"><strong>{{ \Carbon\Carbon::parse($event->start_date)->format('d') }}</strong><span>{{ \Carbon\Carbon::parse($event->start_date)->format('M') }}</span><small>{{ \Carbon\Carbon::parse($event->start_date)->format('Y') }}</small></div>
                        <div class="calendar-event-image"><img src="{{ $image }}" alt="{{ $event->title }}" loading="lazy" onerror="this.style.display='none'"></div>
                        <div class="calendar-event-copy">
                            <h3>{{ $event->title }}</h3>
                            <p>{{ Str::limit($event->description, 155) }}</p>
                            <div class="calendar-event-meta"><i class="bi bi-geo-alt-fill me-1"></i>{{ $event->location ?: 'Gondar, Ethiopia' }}@if($event->end_date && $event->end_date !== $event->start_date)<span class="ms-2"><i class="bi bi-arrow-right-short"></i> Through {{ \Carbon\Carbon::parse($event->end_date)->format('M j') }}</span>@endif</div>
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12 text-center py-5"><i class="bi bi-calendar-x d-block mb-3" style="font-size:3rem; color:rgba(212,175,55,.45);"></i><h3>No calendar entries yet</h3><p style="color:var(--text-muted);">Please check back for confirmed community dates.</p></div>
            @endforelse
        </div>
        @if($events->hasPages())<div class="mt-5">{{ $events->links() }}</div>@endif
    </section>

    <section class="row g-4">
        <div class="col-md-4"><div class="respect-card"><i class="bi bi-heart-fill d-block mb-3" style="color:var(--gold); font-size:1.35rem;"></i><h3 class="h5 mb-2">Join respectfully</h3><p class="mb-0" style="color:var(--warm-gray); font-size:.9rem;">These are active religious and community traditions. Follow local guidance and give worshippers room.</p></div></div>
        <div class="col-md-4"><div class="respect-card"><i class="bi bi-camera-fill d-block mb-3" style="color:var(--gold); font-size:1.35rem;"></i><h3 class="h5 mb-2">Ask before filming</h3><p class="mb-0" style="color:var(--warm-gray); font-size:.9rem;">Permission matters—especially at churches, during prayer, and around sacred objects.</p></div></div>
        <div class="col-md-4"><div class="respect-card"><i class="bi bi-house-heart-fill d-block mb-3" style="color:var(--gold); font-size:1.35rem;"></i><h3 class="h5 mb-2">Book early</h3><p class="mb-0" style="color:var(--warm-gray); font-size:.9rem;">Festival periods are high-demand. Secure your stay and a local guide well before travel.</p></div></div>
    </section>

    <p class="mt-4 mb-0" style="color:var(--text-muted); font-size:.72rem;">Photography: Wikimedia Commons. Event context: UNESCO Intangible Cultural Heritage and local calendar observance.</p>
</main>
@endsection
