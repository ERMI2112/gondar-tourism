@extends('layouts.app')

@section('title', 'Tourist Attractions — Gondar Tourism')

@section('content')

{{-- PAGE HEADER BANNER --}}
<section class="detail-header-banner" style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/e/e9/Fasilides_Castle_Gondar.jpg');">
    <div class="detail-header-overlay"></div>
    <div class="detail-header-content">
        <div class="container">
            <span class="verification-badge mb-3">
                <i class="bi bi-building"></i> Discover Gondar
            </span>
            <h1 class="display-4 fw-bold text-white font-serif">Tourist Attractions</h1>
            <p class="text-white-50 fs-5 mb-0" style="max-width: 550px;">
                Explore Gondar's most remarkable historical, religious, and natural wonders — from UNESCO-listed royal castles to sacred angel-painted churches.
            </p>
        </div>
    </div>
</section>

<div class="container py-5">

    {{-- CATEGORY FILTER PILLS --}}
    <div class="d-flex flex-wrap gap-2 mb-5 align-items-center">
        <span class="text-muted small text-uppercase fw-bold me-2" style="letter-spacing: 1px;">Filter:</span>
        <a href="{{ route('attractions.index') }}"
           class="btn {{ !request('category') ? 'btn-gondar-red' : 'btn-gondar-outline' }} btn-sm py-2 px-3">
            <i class="bi bi-grid me-1"></i>All
        </a>
        @foreach($categories as $cat)
        <a href="{{ route('attractions.index', ['category' => $cat->slug]) }}"
           class="btn {{ request('category') == $cat->slug ? 'btn-gondar-red' : 'btn-gondar-outline' }} btn-sm py-2 px-3">
            @if($cat->slug == 'historical')<i class="bi bi-bank2 me-1"></i>
            @elseif($cat->slug == 'religious')<i class="bi bi-heart-pulse me-1"></i>
            @elseif($cat->slug == 'natural')<i class="bi bi-tree me-1"></i>
            @elseif($cat->slug == 'cultural')<i class="bi bi-music-note-beamed me-1"></i>
            @endif
            {{ $cat->name }}
        </a>
        @endforeach
    </div>

    {{-- ATTRACTIONS GRID --}}
    <div class="row g-4">
        @forelse($attractions as $attraction)
        <div class="col-md-6 col-lg-4">
            <div class="card-gondar">
                <div class="card-gondar-img-wrapper">
                    @if($attraction->image)
                        <img
                            src="{{ Str::startsWith($attraction->image, ['http://', 'https://']) ? $attraction->image : asset('images/' . $attraction->image) }}"
                            class="card-gondar-img"
                            alt="{{ $attraction->name }}"
                            onerror="this.style.display='none'; this.parentElement.innerHTML='<div style=\'height:100%;display:flex;align-items:center;justify-content:center;background:var(--gondar-cream-dark);font-size:3rem;color:var(--gondar-gold);\' ><i class=\'bi bi-geo-alt\'></i></div>';"
                            loading="lazy"
                        >
                    @else
                        <div style="height:100%;display:flex;align-items:center;justify-content:center;background:var(--gondar-cream-dark);font-size:3rem;color:var(--gondar-gold);">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                    @endif
                    <span class="card-gondar-badge">{{ $attraction->category->name ?? 'Attraction' }}</span>
                    @if($attraction->ticket_price)
                        <span class="card-gondar-price">{{ $attraction->ticket_price }}</span>
                    @endif
                </div>
                <div class="card-gondar-body">
                    <h5 class="card-gondar-title">{{ $attraction->name }}</h5>
                    <p class="card-gondar-text">{{ Str::limit($attraction->description, 120) }}</p>
                    <div class="d-flex flex-wrap gap-3 mb-3" style="font-size: 0.8rem;">
                        @if($attraction->opening_hours)
                            <span class="text-muted"><i class="bi bi-clock me-1 text-warning"></i>{{ $attraction->opening_hours }}</span>
                        @endif
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-auto pt-3 border-top">
                        <span class="text-muted small"><i class="bi bi-geo-alt me-1"></i>{{ Str::limit($attraction->location_name, 25) }}</span>
                        <a href="{{ route('attractions.show', $attraction) }}" class="btn btn-sm btn-gondar-red py-1 px-3">
                            Explore <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <i class="bi bi-search d-block mb-3" style="font-size: 3rem; color: var(--gondar-gold); opacity: 0.4;"></i>
            <h4 class="font-serif">No attractions found</h4>
            <p class="text-muted">Try a different category filter.</p>
        </div>
        @endforelse
    </div>

    <div class="mt-5">{{ $attractions->links() }}</div>
</div>
@endsection
