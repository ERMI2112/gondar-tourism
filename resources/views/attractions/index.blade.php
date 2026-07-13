@extends('layouts.app')

@section('title', 'Tourist Attractions — Gondar Tourism')

@section('content')

{{-- PAGE HEADER --}}
<div style="
    position:relative; overflow:hidden;
    padding: 5rem 0 4rem;
    background:
        linear-gradient(to bottom, rgba(13,13,13,0.4) 0%, rgba(13,13,13,0.85) 70%, rgba(13,13,13,1) 100%),
        url('https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/Fasilides_Castle%2C_Gondar.jpg/1280px-Fasilides_Castle%2C_Gondar.jpg') center 40%/cover no-repeat;
">
    <div class="container" style="position:relative; z-index:2;">
        <div class="section-label mb-2"><i class="bi bi-building me-1"></i>Discover Gondar</div>
        <h1 class="section-title" style="font-size:2.8rem;">Tourist Attractions</h1>
        <p class="section-desc">
            Explore Gondar's most remarkable historical, religious, and natural wonders —
            from UNESCO-listed royal castles to sacred angel-painted churches.
        </p>
    </div>
</div>

<div class="container" style="padding: 3rem 0 5rem;">

    {{-- CATEGORY FILTER --}}
    <div class="d-flex flex-wrap gap-2 mb-5 align-items-center">
        <span style="font-size:0.8rem; color:var(--text-muted); text-transform:uppercase; letter-spacing:1px; margin-right:0.5rem;">Filter:</span>
        <a href="{{ route('attractions.index') }}"
           class="btn-card {{ !request('category') ? '' : '' }}"
           style="{{ !request('category') ? 'background:var(--gold);color:var(--dark);border-color:var(--gold);font-weight:600;' : '' }}">
            <i class="bi bi-grid me-1"></i>All
        </a>
        @foreach($categories as $cat)
        <a href="{{ route('attractions.index', ['category' => $cat->slug]) }}"
           class="btn-card"
           style="{{ request('category') == $cat->slug ? 'background:var(--gold);color:var(--dark);border-color:var(--gold);font-weight:600;' : '' }}">
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
            <div class="card-premium" style="height:100%;">
                @if($attraction->image)
                    <img
                        src="{{ Str::startsWith($attraction->image, ['http://', 'https://']) ? $attraction->image : asset('images/' . $attraction->image) }}"
                        class="card-img-top"
                        alt="{{ $attraction->name }}"
                        style="height:320px; object-fit:cover;"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                        loading="lazy"
                    >
                @endif
                <div class="card-img-placeholder" style="{{ $attraction->image ? 'display: none;' : '' }}; height:320px;">
                    @php
                    $icons = ['historical' => 'bi-bank2', 'religious' => 'bi-heart-pulse', 'natural' => 'bi-tree', 'cultural' => 'bi-music-note-beamed'];
                    $slug = optional($attraction->category)->slug ?? 'historical';
                    $icon = $icons[$slug] ?? 'bi-geo-alt';
                    @endphp
                    <i class="bi {{ $icon }}"></i>
                </div>
                <div class="card-body">
                    <span class="card-category-badge">{{ $attraction->category->name ?? '' }}</span>
                    <h5 class="card-title">{{ $attraction->name }}</h5>
                    <p class="card-text">{{ Str::limit($attraction->description, 110) }}</p>
                    <div class="d-flex gap-3 mt-3" style="font-size:0.875rem; color:#6B6B6B;">
                        @if($attraction->ticket_price)
                        <span><i class="bi bi-ticket me-1" style="color:var(--gold-dark);"></i>{{ $attraction->ticket_price }}</span>
                        @endif
                        @if($attraction->opening_hours)
                        <span><i class="bi bi-clock me-1" style="color:var(--gold-dark);"></i>{{ $attraction->opening_hours }}</span>
                        @endif
                    </div>
                </div>
                <div class="card-footer-meta">
                    <span><i class="bi bi-geo-alt me-1" style="color:var(--gold-dark);"></i>{{ Str::limit($attraction->location_name, 28) }}</span>
                    <a href="{{ route('attractions.show', $attraction) }}" class="btn-card">
                        Details <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5" style="color:var(--text-muted);">
            <i class="bi bi-search d-block mb-3" style="font-size:3rem; color:rgba(201,168,76,0.3);"></i>
            <h4 style="color:var(--text-light);">No attractions found</h4>
            <p style="font-size:0.9rem;">Try a different category filter.</p>
        </div>
        @endforelse
    </div>

    <div class="mt-5">{{ $attractions->links() }}</div>
</div>
@endsection
