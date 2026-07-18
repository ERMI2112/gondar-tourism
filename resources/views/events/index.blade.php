@extends('layouts.app')

@section('title', 'Gondar Cultural Calendar — Gondar Tourism')

@section('content')
@php
    $eventImages = [
        'Timket — Ethiopian Epiphany' => 'https://upload.wikimedia.org/wikipedia/commons/e/ed/Fasilides_Bath_05.jpg',
        'Meskel — Finding of the True Cross' => 'https://upload.wikimedia.org/wikipedia/commons/4/4e/Meskel_Festival_Gondar_Ethiopia.jpg',
        'Fasika — Ethiopian Easter' => 'https://upload.wikimedia.org/wikipedia/commons/e/e9/Fasilides_Castle_Gondar.jpg',
        'Ethiopian Christmas — Genna' => 'https://upload.wikimedia.org/wikipedia/commons/e/ed/Fasilides_Bath_05.jpg',
        'Enkutatash — Ethiopian New Year' => 'https://upload.wikimedia.org/wikipedia/commons/e/ed/Fasilides_Bath_05.jpg',
    ];
    $defaultImage = 'https://upload.wikimedia.org/wikipedia/commons/e/ed/Fasilides_Bath_05.jpg';
@endphp

{{-- PAGE HEADER BANNER --}}
<section class="detail-header-banner" style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/e/ed/Fasilides_Bath_05.jpg');">
    <div class="detail-header-overlay"></div>
    <div class="detail-header-content">
        <div class="container">
            <span class="verification-badge mb-3">
                <i class="bi bi-calendar-heart"></i> Living Heritage
            </span>
            <h1 class="display-4 fw-bold text-white font-serif">Gondar's Cultural Calendar</h1>
            <p class="text-white-50 fs-5 mb-0" style="max-width: 550px;">
                From candlelit church vigils to massive street processions, explore the moments when Gondar's rich history is felt, sung, and shared.
            </p>
        </div>
    </div>
</section>

<main class="container py-5">
    
    {{-- FEATURED EVENT SECTION --}}
    <section class="card border-0 shadow-sm rounded-3 overflow-hidden mb-5 bg-white">
        <div class="row g-0">
            <div class="col-lg-5">
                <div style="height: 100%; min-height: 320px; background-image: url('https://upload.wikimedia.org/wikipedia/commons/e/ed/Fasilides_Bath_05.jpg'); background-size: cover; background-position: center;"></div>
            </div>
            <div class="col-lg-7">
                <div class="card-body p-5">
                    <span class="section-tagline">UNESCO Intangible Heritage</span>
                    <h2 class="font-serif mb-3">Timkat at Fasilides' Bath</h2>
                    <p class="text-muted lh-lg mb-4">
                        Timkat commemorates the baptism of Jesus Christ. In Gondar, the celebrations center around Fasilides' Bath, a historic pool that is filled with water specifically for this festival. Thousands of pilgrims gather to renew their baptismal vows in a powerful display of faith.
                    </p>
                    <div class="d-flex flex-wrap gap-3 mb-0">
                        <div class="border rounded py-2 px-3 text-center bg-light" style="min-width: 100px;">
                            <span class="text-danger fw-bold d-block fs-5 font-serif">Jan 18-19</span>
                            <small class="text-muted small text-uppercase">Dates</small>
                        </div>
                        <div class="border rounded py-2 px-3 text-center bg-light" style="min-width: 100px;">
                            <span class="text-danger fw-bold d-block fs-5 font-serif">2 Days</span>
                            <small class="text-muted small text-uppercase">Duration</small>
                        </div>
                        <div class="border rounded py-2 px-3 text-center bg-light" style="min-width: 100px;">
                            <span class="text-danger fw-bold d-block fs-5 font-serif">2019</span>
                            <small class="text-muted small text-uppercase">Inscribed</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- EVENTS LIST --}}
    <section class="mb-5">
        <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4">
            <div>
                <span class="section-tagline">Timeline</span>
                <h2 class="section-title mb-0">Upcoming Events</h2>
            </div>
            <span class="text-muted small">Dates follow the Ethiopian liturgical calendar.</span>
        </div>
        
        <div class="row g-4">
            @forelse($events as $event)
                @php 
                    $image = $event->image ?: ($eventImages[$event->title] ?? $defaultImage); 
                @endphp
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm rounded-3 overflow-hidden h-100 bg-white">
                        <div class="d-flex flex-column flex-sm-row">
                            <div class="bg-warning text-dark py-4 px-3 text-center d-flex flex-column justify-content-center align-items-center" style="min-width: 90px;">
                                <span class="d-block font-serif fw-bold fs-3">{{ \Carbon\Carbon::parse($event->start_date)->format('d') }}</span>
                                <span class="text-uppercase small fw-bold" style="font-size: 0.75rem;">{{ \Carbon\Carbon::parse($event->start_date)->format('M') }}</span>
                                <small class="text-muted small" style="font-size: 0.7rem;">{{ \Carbon\Carbon::parse($event->start_date)->format('Y') }}</small>
                            </div>
                            <div class="flex-shrink-0" style="width: 140px; background-image: url('{{ $image }}'); background-size: cover; background-position: center; min-height: 140px;"></div>
                            <div class="p-4 min-w-0 flex-grow-1">
                                <h4 class="font-serif mb-2 text-dark">{{ $event->title }}</h4>
                                <p class="text-muted small lh-lg mb-3">{{ Str::limit($event->description, 130) }}</p>
                                <div class="d-flex align-items-center justify-content-between text-muted small border-top pt-2">
                                    <span><i class="bi bi-geo-alt me-1 text-danger"></i>{{ $event->location ?: 'Gondar, Ethiopia' }}</span>
                                    @if($event->end_date && $event->end_date !== $event->start_date)
                                        <span class="small text-warning fw-bold">Through {{ \Carbon\Carbon::parse($event->end_date)->format('M j') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-calendar-x d-block mb-3" style="font-size: 3rem; color: var(--gondar-gold); opacity: 0.4;"></i>
                    <h4 class="font-serif">No calendar entries yet</h4>
                    <p class="text-muted">Please check back soon for confirmed community event dates.</p>
                </div>
            @endforelse
        </div>
        
        @if($events->hasPages())
            <div class="mt-5">{{ $events->links() }}</div>
        @endif
    </section>

    {{-- TRAVEL RESPECT GUIDELINES --}}
    <section class="row g-4 mt-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4 h-100 bg-white">
                <i class="bi bi-heart-fill text-danger fs-3 mb-3"></i>
                <h5 class="font-serif mb-2">Join Respectfully</h5>
                <p class="text-muted small lh-lg mb-0">
                    These are active sacred traditions, not a tourist show. Follow local cultural instructions, dress modestly, and give worshippers space.
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4 h-100 bg-white">
                <i class="bi bi-camera-fill text-danger fs-3 mb-3"></i>
                <h5 class="font-serif mb-2">Ask Before Filming</h5>
                <p class="text-muted small lh-lg mb-0">
                    Always ask permission before taking close-up photographs or videos of local priests, worshippers, or sacred ritual objects.
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4 h-100 bg-white">
                <i class="bi bi-bookmark-fill text-danger fs-3 mb-3"></i>
                <h5 class="font-serif mb-2">Book Well in Advance</h5>
                <p class="text-muted small lh-lg mb-0">
                    Accommodation and flight bookings peak heavily during Timkat. Make sure to book your rooms and hire a guide weeks before arrival.
                </p>
            </div>
        </div>
    </section>

</main>
@endsection
