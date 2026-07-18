@extends('layouts.app')

@section('title', 'Find a Local Guide — Gondar Tourism')

@section('content')

{{-- PAGE HEADER BANNER --}}
<section class="detail-header-banner" style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/e/ed/Fasilides_Bath_05.jpg');">
    <div class="detail-header-overlay"></div>
    <div class="detail-header-content">
        <div class="container">
            <div class="row align-items-end g-4">
                <div class="col-lg-8">
                    <span class="verification-badge mb-3">
                        <i class="bi bi-compass"></i> Meet Gondar through locals
                    </span>
                    <h1 class="display-4 fw-bold text-white font-serif">Licensed Tour Guides</h1>
                    <p class="text-white-50 fs-5 mb-0" style="max-width: 600px;">
                        Choose an approved local expert who can bring Gondar's castles, churches, and hidden stories to life in your language.
                    </p>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex gap-3 justify-content-lg-end text-white text-md-start">
                        <div>
                            <h3 class="mb-0 text-warning font-serif">{{ $guides->total() }}</h3>
                            <small class="text-white-50 text-uppercase fw-semibold" style="font-size: 0.75rem;">Approved Guides</small>
                        </div>
                        <div class="border-start border-white-50 ps-3">
                            <h3 class="mb-0 text-warning font-serif">100%</h3>
                            <small class="text-white-50 text-uppercase fw-semibold" style="font-size: 0.75rem;">Local Knowledge</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<main class="container py-5">
    <div class="d-flex flex-wrap align-items-end justify-content-between gap-3 mb-5">
        <div>
            <span class="section-tagline">Local Hosts</span>
            <h2 class="section-title mb-0">Explore with Confidence</h2>
        </div>
        <a href="{{ route('guides.create') }}" class="btn btn-gondar-outline">
            <i class="bi bi-person-plus me-2"></i>Become a Guide
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm d-flex align-items-center gap-2 mb-4" style="background-color: #E8F8F0; color: #229954;">
            <i class="bi bi-check-circle-fill"></i>{{ session('success') }}
        </div>
    @endif

    <div class="row g-4">
        @forelse($guides as $guide)
            <div class="col-md-6 col-lg-3">
                <div class="card-guide-portrait">
                    {{-- Default placeholder or nice background --}}
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=400&q=80" class="card-guide-portrait-img" alt="{{ $guide->user->name ?? 'Local Guide' }}">
                    <div class="card-guide-portrait-gradient"></div>
                    <div class="card-guide-portrait-content">
                        <div class="card-guide-portrait-name">
                            {{ $guide->user->name ?? 'Local Guide' }}
                            <i class="bi bi-patch-check-fill text-warning" style="font-size: 0.9rem;"></i>
                        </div>
                        <div class="card-guide-portrait-languages">
                            <i class="bi bi-translate me-1"></i> {{ $guide->languages ?? 'English' }}
                        </div>
                        <div class="card-guide-portrait-specialization">
                            {{ $guide->specialization ?? 'General Tourism' }}
                        </div>
                        <div class="card-guide-portrait-footer">
                            <span class="{{ $guide->availability_status === 'available' ? 'badge-available' : 'badge-busy' }}">
                                <i class="bi bi-circle-fill me-1" style="font-size: 0.45rem;"></i>
                                {{ ucfirst($guide->availability_status ?? 'available') }}
                            </span>
                            <a href="{{ route('guides.show', $guide) }}" class="btn btn-sm btn-gondar-gold py-1 px-3">Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-person-x d-block mb-3" style="font-size: 3rem; color: var(--gondar-gold); opacity: 0.4;"></i>
                <h4 class="font-serif">No approved guides yet</h4>
                <p class="text-muted">Please check back soon or apply to join our guide network.</p>
            </div>
        @endforelse
    </div>

    @if($guides->hasPages())
        <div class="mt-5">{{ $guides->links() }}</div>
    @endif

    {{-- GUIDE NETWORK RECRUITMENT PANEL --}}
    <section class="mt-5 p-5 text-center rounded-3 bg-white shadow-sm border border-opacity-10 border-dark">
        <span class="section-tagline">Share Your City</span>
        <h2 class="section-title section-title-center mb-3">Are you a certified Gondar tour guide?</h2>
        <p class="text-muted mx-auto mb-4" style="max-width: 580px;">
            Join our official smart tourism network to help global visitors discover the rich history, monuments, and communities of Gondar.
        </p>
        <a href="{{ route('guides.create') }}" class="btn btn-gondar-red px-4 py-2">
            <i class="bi bi-person-plus me-2"></i>Apply as a Guide
        </a>
    </section>
</main>
@endsection
