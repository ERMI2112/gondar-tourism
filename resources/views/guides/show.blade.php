@extends('layouts.app')

@section('title', ($guide->user->name ?? 'Guide Profile') . ' — Gondar Tourism')

@section('content')
<style>
    .guide-profile-hero { background:radial-gradient(circle at 85% 20%, rgba(212,175,55,.17), transparent 25%), linear-gradient(135deg, #2b1720, #17171a 66%); padding:2.25rem 0 4.5rem; }
    .guide-profile-avatar { width:120px; height:120px; display:grid; place-items:center; flex:0 0 120px; border:5px solid var(--gold-light); border-radius:50%; background:linear-gradient(145deg, var(--crimson), var(--imperial-red)); color:#fff; font:600 3rem 'Playfair Display',serif; box-shadow:0 12px 25px rgba(0,0,0,.25); }
    .guide-profile-card { background:var(--warm-white); border-radius:16px; color:var(--charcoal); box-shadow:0 14px 34px rgba(0,0,0,.16); }
    .guide-profile-card h2 { color:var(--charcoal); }
    .detail-label { color:#88756a; font-size:.73rem; font-weight:700; letter-spacing:.08em; text-transform:uppercase; }
    .detail-value { color:#302c2b; font-size:.98rem; }
</style>

<section class="guide-profile-hero">
    <div class="container">
        <a href="{{ route('guides.index') }}" style="color:var(--gold-light); text-decoration:none; font-size:.9rem;"><i class="bi bi-arrow-left me-1"></i> Back to all guides</a>
        <div class="d-flex flex-column flex-md-row align-items-md-center gap-4 mt-4">
            <div class="guide-profile-avatar">{{ strtoupper(substr($guide->user->name ?? 'G', 0, 1)) }}</div>
            <div>
                <div class="section-label mb-2"><i class="bi bi-person-heart me-1"></i> Local guide</div>
                <h1 class="section-title mb-2" style="font-size:clamp(2.4rem,5vw,3.8rem);">{{ $guide->user->name ?? 'Guide Profile' }}</h1>
                <p class="mb-2" style="color:var(--warm-gray);">{{ $guide->specialization ?? 'Gondar experiences and local culture' }}</p>
                <span class="{{ $guide->availability_status === 'available' ? 'badge-available' : 'badge-busy' }}"><i class="bi bi-circle-fill me-1" style="font-size:.48rem;"></i>{{ ucfirst($guide->availability_status ?? 'available') }}</span>
            </div>
        </div>
    </div>
</section>

<main class="container" style="padding:3.5rem 0 5rem;">
    <div class="row g-4 g-lg-5">
        <div class="col-lg-7">
            <article class="guide-profile-card p-4 p-md-5 mb-4">
                <div class="section-label mb-2" style="color:var(--imperial-red);">Get to know your guide</div>
                <h2 class="mb-3">A more personal way to see Gondar</h2>
                <p class="mb-0" style="color:#625c56; line-height:1.85;">{{ $guide->bio ?: 'This licensed local guide is ready to help you discover Gondar with useful context, flexible pacing, and genuine local insight.' }}</p>
            </article>
            <article class="guide-profile-card p-4 p-md-5">
                <h2 class="h3 mb-4">Guide details</h2>
                <div class="row g-4">
                    <div class="col-sm-6"><div class="detail-label mb-1"><i class="bi bi-award me-1"></i> Specialization</div><div class="detail-value">{{ $guide->specialization ?? 'General tourism' }}</div></div>
                    <div class="col-sm-6"><div class="detail-label mb-1"><i class="bi bi-translate me-1"></i> Languages</div><div class="detail-value">{{ $guide->languages ?? 'English' }}</div></div>
                    @if($guide->price_range)<div class="col-sm-6"><div class="detail-label mb-1"><i class="bi bi-cash-coin me-1"></i> Typical rate</div><div class="detail-value">{{ $guide->price_range }}</div></div>@endif
                    <div class="col-sm-6"><div class="detail-label mb-1"><i class="bi bi-patch-check me-1"></i> License</div><div class="detail-value">{{ $guide->license_number ?? 'Verified Gondar guide' }}</div></div>
                </div>
            </article>
        </div>

        <aside class="col-lg-5">
            <div class="guide-profile-card p-4 p-md-5">
                <div class="section-label mb-2" style="color:var(--imperial-red);">Plan together</div>
                <h2 class="h3 mb-2">Send a booking request</h2>
                <p style="color:#6d625c; font-size:.92rem;">Share your dates and plans. The guide will receive your request.</p>
                @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
                <form method="POST" action="{{ route('guide-requests.store') }}">
                    @csrf
                    <input type="hidden" name="guide_id" value="{{ $guide->id }}">
                    <div class="mb-3"><label class="form-label">Your name</label><input type="text" name="tourist_name" class="form-control" value="{{ old('tourist_name') }}" required placeholder="Full name"></div>
                    <div class="mb-3"><label class="form-label">Email address</label><input type="email" name="tourist_email" class="form-control" value="{{ old('tourist_email') }}" required placeholder="you@example.com"></div>
                    <div class="mb-3"><label class="form-label">Phone number <span class="text-muted">(optional)</span></label><input type="text" name="tourist_phone" class="form-control" value="{{ old('tourist_phone') }}" placeholder="e.g. +251 911 000 000"></div>
                    <div class="row"><div class="col-sm-6 mb-3"><label class="form-label">Visit date</label><input type="date" name="visit_date" class="form-control" value="{{ old('visit_date') }}" required></div><div class="col-sm-6 mb-3"><label class="form-label">Group size</label><input type="number" name="group_size" class="form-control" value="{{ old('group_size', 1) }}" min="1" required></div></div>
                    <div class="mb-4"><label class="form-label">What would you like to explore?</label><textarea name="message" class="form-control" rows="4" placeholder="Tell the guide about your trip...">{{ old('message') }}</textarea></div>
                    <button type="submit" class="btn-gold w-100 justify-content-center" style="border:0; cursor:pointer;"><i class="bi bi-send me-1"></i> Send booking request</button>
                </form>
            </div>
        </aside>
    </div>
</main>
@endsection
