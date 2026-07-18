@extends('layouts.app')

@section('title', ($guide->user->name ?? 'Guide Profile') . ' — Gondar Tourism')

@section('content')

{{-- PROFILE HERO BANNER --}}
<section class="detail-header-banner" style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/e/ed/Fasilides_Bath_05.jpg');">
    <div class="detail-header-overlay"></div>
    <div class="detail-header-content">
        <div class="container">
            <a href="{{ route('guides.index') }}" class="text-warning text-decoration-none small d-inline-flex align-items-center gap-1 mb-3 opacity-75">
                <i class="bi bi-arrow-left"></i> All Guides
            </a>
            <div class="d-flex align-items-center gap-3 mb-2">
                <span class="verification-badge"><i class="bi bi-patch-check-fill"></i> Local Guide</span>
                <span class="{{ $guide->availability_status === 'available' ? 'badge-available' : 'badge-busy' }}">
                    <i class="bi bi-circle-fill me-1" style="font-size: 0.45rem;"></i>{{ ucfirst($guide->availability_status ?? 'available') }}
                </span>
            </div>
            <h1 class="display-5 fw-bold text-white font-serif">{{ $guide->user->name ?? 'Guide Profile' }}</h1>
            <p class="text-white-50 small mb-0 mt-2">
                <i class="bi bi-compass me-1 text-warning"></i>{{ $guide->specialization ?? 'Gondar Heritage & Hiking' }}
            </p>
        </div>
    </div>
</section>

{{-- MAIN CONTENT --}}
<div class="container py-5">
    <div class="row g-5">
        
        {{-- LEFT COLUMN: Bio & Details --}}
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-header bg-white border-bottom py-3 px-4">
                    <h5 class="font-serif mb-0"><i class="bi bi-info-circle text-warning me-2"></i>Get to Know Your Guide</h5>
                </div>
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">A Personal Way to See Gondar</h5>
                    <p class="text-muted lh-lg mb-0">
                        {{ $guide->bio ?: 'This licensed local guide is ready to help you discover Gondar with useful history context, flexible pacing, and genuine local insight.' }}
                    </p>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-white border-bottom py-3 px-4">
                    <h5 class="font-serif mb-0"><i class="bi bi-award text-warning me-2"></i>Guide Credentials</h5>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        <div class="col-sm-6">
                            <span class="text-muted small text-uppercase fw-bold d-block mb-1" style="letter-spacing: 0.5px;"><i class="bi bi-shield-check text-warning me-1"></i> Specialization</span>
                            <span class="text-dark fw-semibold">{{ $guide->specialization ?? 'General Tourism' }}</span>
                        </div>
                        <div class="col-sm-6">
                            <span class="text-muted small text-uppercase fw-bold d-block mb-1" style="letter-spacing: 0.5px;"><i class="bi bi-translate text-warning me-1"></i> Languages</span>
                            <span class="text-dark fw-semibold">{{ $guide->languages ?? 'English' }}</span>
                        </div>
                        @if($guide->price_range)
                        <div class="col-sm-6">
                            <span class="text-muted small text-uppercase fw-bold d-block mb-1" style="letter-spacing: 0.5px;"><i class="bi bi-cash-coin text-warning me-1"></i> Standard Rate</span>
                            <span class="text-dark fw-semibold">{{ $guide->price_range }}</span>
                        </div>
                        @endif
                        <div class="col-sm-6">
                            <span class="text-muted small text-uppercase fw-bold d-block mb-1" style="letter-spacing: 0.5px;"><i class="bi bi-patch-check text-warning me-1"></i> License Number</span>
                            <span class="text-dark fw-semibold">{{ $guide->license_number ?? 'Verified Gondar Guide' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- RIGHT COLUMN: Booking Request Form --}}
        <div class="col-lg-5">
            <div class="sticky-sidebar">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-header py-3 px-4" style="background-color: var(--gondar-red); border-radius: 12px 12px 0 0;">
                        <h5 class="mb-0 text-white"><i class="bi bi-envelope me-2"></i>Send Booking Request</h5>
                    </div>
                    <div class="card-body p-4">
                        <p class="text-muted small lh-lg mb-4">
                            Submit your planned dates and size of group. The guide will receive your details and respond as soon as possible.
                        </p>
                        
                        @if(session('success'))
                            <div class="alert alert-success border-0 d-flex align-items-center gap-2 mb-3" style="background: #E8F8F0; color: #229954;">
                                <i class="bi bi-check-circle-fill"></i>{{ session('success') }}
                            </div>
                        @endif
                        
                        <form method="POST" action="{{ route('guide-requests.store') }}">
                            @csrf
                            <input type="hidden" name="guide_id" value="{{ $guide->id }}">
                            
                            <div class="mb-3">
                                <label class="form-label fw-semibold small text-uppercase">Your Name</label>
                                <input type="text" name="tourist_name" class="form-control" value="{{ old('tourist_name') }}" required placeholder="Full Name">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-semibold small text-uppercase">Email Address</label>
                                <input type="email" name="tourist_email" class="form-control" value="{{ old('tourist_email') }}" required placeholder="you@example.com">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-semibold small text-uppercase">Phone (optional)</label>
                                <input type="text" name="tourist_phone" class="form-control" value="{{ old('tourist_phone') }}" placeholder="e.g. +251 911 000 000">
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label fw-semibold small text-uppercase">Visit Date</label>
                                    <input type="date" name="visit_date" class="form-control" value="{{ old('visit_date') }}" required min="{{ date('Y-m-d') }}">
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label fw-semibold small text-uppercase">Group Size</label>
                                    <input type="number" name="group_size" class="form-control" value="{{ old('group_size', 1) }}" min="1" required>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label fw-semibold small text-uppercase">Planned Itinerary</label>
                                <textarea name="message" class="form-control" rows="4" placeholder="Tell the guide about your timeline or places you want to visit...">{{ old('message') }}</textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-gondar-gold w-100">
                                <i class="bi bi-send me-2"></i>Send Request
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
