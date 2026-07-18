@extends('layouts.app')

@section('title', 'Hotels & Accommodation — Gondar Tourism')

@section('content')

{{-- PAGE HEADER BANNER --}}
<section class="detail-header-banner" style="background-image: url('https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=1400&q=80');">
    <div class="detail-header-overlay"></div>
    <div class="detail-header-content">
        <div class="container">
            <span class="verification-badge mb-3">
                <i class="bi bi-building"></i> Accommodation
            </span>
            <h1 class="display-4 fw-bold text-white font-serif">Hotels & Stays</h1>
            <p class="text-white-50 fs-5 mb-0" style="max-width: 550px;">
                From hilltop luxury with castle views to cosy budget pensions — find the perfect accommodation for your Gondar adventure.
            </p>
        </div>
    </div>
</section>

<div class="container py-5">

    {{-- TYPE FILTER PILLS --}}
    <div class="d-flex flex-wrap gap-2 mb-5 align-items-center">
        <span class="text-muted small text-uppercase fw-bold me-2" style="letter-spacing: 1px;">Filter:</span>
        <a href="{{ route('hotels.index') }}"
           class="btn {{ !$type ? 'btn-gondar-red' : 'btn-gondar-outline' }} btn-sm py-2 px-3">
            <i class="bi bi-grid me-1"></i>All Stays
        </a>
        @foreach(['hotel' => 'Hotels', 'guesthouse' => 'Guesthouses', 'lodge' => 'Lodges', 'resort' => 'Resorts'] as $key => $label)
        <a href="{{ route('hotels.index', ['type' => $key]) }}"
           class="btn {{ $type == $key ? 'btn-gondar-red' : 'btn-gondar-outline' }} btn-sm py-2 px-3">
            @if($key=='hotel')<i class="bi bi-building me-1"></i>
            @elseif($key=='guesthouse')<i class="bi bi-house me-1"></i>
            @elseif($key=='lodge')<i class="bi bi-tree me-1"></i>
            @elseif($key=='resort')<i class="bi bi-water me-1"></i>
            @endif
            {{ $label }}
        </a>
        @endforeach
    </div>

    {{-- HOTELS GRID --}}
    <div class="row g-4">
        @forelse($hotels as $hotel)
        <div class="col-md-6 col-lg-4">
            <div class="card-gondar">
                <div class="card-gondar-img-wrapper">
                    @if($hotel->image)
                        <img src="{{ $hotel->image }}" class="card-gondar-img" alt="{{ $hotel->name }}" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';" loading="lazy">
                    @endif
                    <div class="card-img-placeholder" style="{{ $hotel->image ? 'display: none;' : '' }}; height: 100%; display: flex; align-items: center; justify-content: center; background: var(--gondar-cream-dark); font-size: 3rem; color: var(--gondar-gold);">
                        <i class="bi bi-building"></i>
                    </div>
                    <span class="card-gondar-badge" style="text-transform: capitalize;">{{ $hotel->type }}</span>
                    @if($hotel->price_range)
                        <span class="card-gondar-price">{{ $hotel->price_range }}</span>
                    @endif
                </div>

                <div class="card-gondar-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="card-gondar-title mb-0">{{ $hotel->name }}</h5>
                        <div class="text-nowrap ms-2" style="font-size: 0.85rem;">
                            {!! $hotel->stars_html !!}
                        </div>
                    </div>
                    
                    <p class="card-gondar-text">{{ Str::limit($hotel->description, 120) }}</p>

                    {{-- Amenities --}}
                    @if($hotel->amenities)
                    <div class="d-flex flex-wrap gap-1 mb-3">
                        @foreach(array_slice($hotel->amenities, 0, 3) as $amenity)
                        <span class="badge rounded-pill text-dark border bg-white py-1 px-2" style="font-size: 0.7rem; font-weight: 500;">
                            {{ $amenity }}
                        </span>
                        @endforeach
                        @if(count($hotel->amenities) > 3)
                        <span class="text-muted small ps-1 align-self-center" style="font-size: 0.75rem;">+{{ count($hotel->amenities) - 3 }} more</span>
                        @endif
                    </div>
                    @endif

                    <div class="d-flex justify-content-between align-items-center mt-auto pt-3 border-top">
                        <span class="text-muted small"><i class="bi bi-geo-alt me-1"></i>{{ Str::limit($hotel->address, 24) }}</span>
                        <a href="{{ route('hotels.show', $hotel) }}" class="btn btn-sm btn-gondar-red py-1 px-3">
                            Details <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <i class="bi bi-building-x d-block mb-3" style="font-size: 3rem; color: var(--gondar-gold); opacity: 0.4;"></i>
            <h4 class="font-serif">No hotels found</h4>
            <p class="text-muted">Try selecting a different stay category.</p>
        </div>
        @endforelse
    </div>

    <div class="mt-5">{{ $hotels->links() }}</div>

    {{-- BOOKING ADVICE PANEL --}}
    <div class="mt-5 p-4 rounded-3 border-start border-4 border-warning shadow-sm bg-white">
        <div class="d-flex gap-3 align-items-start">
            <i class="bi bi-lightbulb-fill text-warning fs-3 mt-1"></i>
            <div>
                <h5 class="font-serif text-dark mb-1">Booking Advice</h5>
                <p class="text-muted small mb-0 lh-lg">
                    During the Timkat festival (January 19–20), Gondar's hotels fill up weeks in advance. We highly recommend booking early! For Simien Mountains trekking, the Simien Lodge requires advance reservations. Feel free to contact the tourism bureau at <span class="text-danger fw-bold">+251 58 111 0000</span> for local group booking assistance.
                </p>
            </div>
        </div>
    </div>

</div>

@endsection
