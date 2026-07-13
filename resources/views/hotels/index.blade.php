@extends('layouts.app')

@section('title', 'Hotels & Accommodation — Gondar Tourism')

@section('content')

{{-- PAGE HEADER --}}
<div style="
    position:relative; overflow:hidden;
    padding: 5rem 0 4rem;
    background:
        linear-gradient(to bottom, rgba(13,13,13,0.35) 0%, rgba(13,13,13,0.88) 70%, rgba(13,13,13,1) 100%),
        url('https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=1400&q=80') center/cover no-repeat;
">
    <div class="container" style="position:relative; z-index:2;">
        <div class="section-label mb-2"><i class="bi bi-building me-1"></i>Accommodation</div>
        <h1 class="section-title" style="font-size:2.8rem;">Hotels & Stays</h1>
        <p class="section-desc">
            From hilltop luxury with castle views to cosy budget pensions —
            find the perfect accommodation for your Gondar adventure.
        </p>
    </div>
</div>

<div class="container" style="padding: 3rem 0 5rem;">

    {{-- TYPE FILTER --}}
    <div class="d-flex flex-wrap gap-2 mb-5 align-items-center">
        <span style="font-size:0.8rem; color:var(--text-muted); text-transform:uppercase; letter-spacing:1px; margin-right:0.5rem;">Filter:</span>
        <a href="{{ route('hotels.index') }}"
           class="btn-card"
           style="{{ !$type ? 'background:var(--gold);color:var(--dark);border-color:var(--gold);font-weight:600;' : '' }}">
            <i class="bi bi-grid me-1"></i>All
        </a>
        @foreach(['hotel' => 'Hotels', 'guesthouse' => 'Guesthouses', 'lodge' => 'Lodges', 'resort' => 'Resorts'] as $key => $label)
        <a href="{{ route('hotels.index', ['type' => $key]) }}"
           class="btn-card"
           style="{{ $type == $key ? 'background:var(--gold);color:var(--dark);border-color:var(--gold);font-weight:600;' : '' }}">
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
            <div class="card-premium" style="height:100%;">
                {{-- IMAGE --}}
                @if($hotel->image)
                <div style="position:relative;">
                    <img
                        src="{{ $hotel->image }}"
                        alt="{{ $hotel->name }}"
                        style="width:100%; height:320px; object-fit:cover;"
                        onerror="this.parentElement.innerHTML='<div style=\'height:320px;background:linear-gradient(135deg, #E8E3DA, #D4CEC1);display:flex;align-items:center;justify-content:center;font-size:3.5rem;color:var(--gold-dark);opacity:0.4;\'><i class=\'bi bi-building\'></i></div>'"
                        loading="lazy"
                    >
                    {{-- Stars badge over image --}}
                    <div style="position:absolute; top:12px; right:12px; background:rgba(0,0,0,0.75); padding:6px 14px; border-radius:50px;">
                        {!! $hotel->stars_html !!}
                    </div>
                    {{-- Type badge --}}
                    <div style="position:absolute; top:12px; left:12px;">
                        <span class="card-category-badge" style="text-transform:capitalize;">{{ $hotel->type }}</span>
                    </div>
                </div>
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{ $hotel->name }}</h5>
                    <p class="card-text">{{ Str::limit($hotel->description, 110) }}</p>

                    {{-- Amenities --}}
                    @if($hotel->amenities)
                    <div class="d-flex flex-wrap gap-1 mt-3">
                        @foreach(array_slice($hotel->amenities, 0, 4) as $amenity)
                        <span style="font-size:0.75rem; background:#F5F1E9; border:1px solid rgba(0,0,0,0.1); color:#6B6B6B; padding:3px 10px; border-radius:50px;">
                            {{ $amenity }}
                        </span>
                        @endforeach
                        @if(count($hotel->amenities) > 4)
                        <span style="font-size:0.75rem; color:#6B6B6B;">+{{ count($hotel->amenities) - 4 }} more</span>
                        @endif
                    </div>
                    @endif
                </div>

                <div class="card-footer-meta">
                    <div>
                        <div style="font-size:0.875rem; color:#6B6B6B;"><i class="bi bi-geo-alt me-1" style="color:var(--gold-dark);"></i>{{ Str::limit($hotel->address, 22) }}</div>
                        @if($hotel->price_range)
                        <div style="font-size:0.9375rem; color:var(--gold-dark); margin-top:4px; font-weight:600;"><i class="bi bi-cash me-1"></i>{{ $hotel->price_range }}</div>
                        @endif
                    </div>
                    <a href="{{ route('hotels.show', $hotel) }}" class="btn-card">
                        Details <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5" style="color:var(--text-muted);">
            <i class="bi bi-building-x d-block mb-3" style="font-size:3rem; color:rgba(201,168,76,0.3);"></i>
            <h4 style="color:var(--text-light);">No hotels found</h4>
            <p>Try selecting a different category.</p>
        </div>
        @endforelse
    </div>

    <div class="mt-5">{{ $hotels->links() }}</div>

    {{-- TRAVEL TIP --}}
    <div class="mt-5 p-4" style="background:var(--dark-3); border:1px solid rgba(201,168,76,0.15); border-radius:12px; border-left:4px solid var(--gold);">
        <div class="d-flex gap-3 align-items-start">
            <i class="bi bi-lightbulb-fill" style="color:var(--gold); font-size:1.5rem; flex-shrink:0; margin-top:2px;"></i>
            <div>
                <div style="font-family:'Playfair Display',serif; color:var(--text-light); font-size:1rem; margin-bottom:0.35rem;">Booking Advice</div>
                <p style="color:var(--text-muted); font-size:0.875rem; line-height:1.7; margin:0;">
                    During the Timkat festival (January 19–20), Gondar's hotels fill up weeks in advance.
                    Book early! For Simien Mountains trekking, the Simien Lodge requires advance reservation.
                    Contact the tourism bureau at <span style="color:var(--gold-light);">+251 58 111 0000</span> for group bookings.
                </p>
            </div>
        </div>
    </div>
</div>

@endsection
