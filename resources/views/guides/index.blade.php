@extends('layouts.app')

@section('title', 'Find a Local Guide — Gondar Tourism')

@section('content')
<style>
    .guides-hero { background: radial-gradient(circle at 84% 20%, rgba(212,175,55,.18), transparent 27%), linear-gradient(135deg, #25151c, #17171a 60%); border-bottom:1px solid rgba(212,175,55,.18); padding:5.5rem 0 4.5rem; }
    .guide-directory-card { height:100%; padding:1.5rem; background:#f9f6f1; border-radius:16px; color:#1a1a1d; box-shadow:0 12px 32px rgba(0,0,0,.16); transition:transform .2s ease, box-shadow .2s ease; }
    .guide-directory-card:hover { transform:translateY(-5px); box-shadow:0 18px 38px rgba(0,0,0,.24); }
    .guide-directory-avatar { width:76px; height:76px; flex:0 0 76px; display:grid; place-items:center; border-radius:50%; background:linear-gradient(135deg, #8b1538, #c73659); border:4px solid #f4d06f; color:#fff; font:600 1.65rem 'Playfair Display',serif; }
    .guide-directory-name { color:#1a1a1d; font:600 1.35rem 'Playfair Display',serif; line-height:1.2; }
    .guide-directory-specialty { color:#8b1538; font-size:.82rem; font-weight:700; letter-spacing:.04em; text-transform:uppercase; }
    .language-pill { display:inline-block; margin:0 .3rem .35rem 0; padding:.22rem .62rem; border-radius:999px; background:#f2ebe0; color:#5d5148; font-size:.76rem; }
    .guide-directory-bio { min-height:4.5rem; color:#625c56; font-size:.92rem; line-height:1.65; }
    .guide-directory-link { color:#8b1538; font-size:.9rem; font-weight:700; text-decoration:none; }
    .guide-directory-link:hover { color:#b8941f; }
</style>

<section class="guides-hero">
    <div class="container">
        <div class="row align-items-end g-4">
            <div class="col-lg-8">
                <div class="section-label mb-3"><i class="bi bi-compass me-1"></i> Meet Gondar through locals</div>
                <h1 class="section-title mb-3" style="font-size:clamp(2.5rem,5vw,4.2rem); max-width:700px;">Find the right guide for your journey.</h1>
                <p class="section-desc mb-0" style="max-width:650px; font-size:1.05rem;">Choose an approved local expert who can bring Gondar's castles, churches, markets, and stories to life in your language.</p>
            </div>
            <div class="col-lg-4">
                <div class="d-flex gap-3 justify-content-lg-end">
                    <div><strong class="d-block" style="font:600 2rem 'Playfair Display',serif; color:var(--gold-light);">{{ $guides->total() }}</strong><span style="color:var(--warm-gray); font-size:.82rem;">approved guides</span></div>
                    <div class="border-start ps-3" style="border-color:rgba(212,175,55,.35)!important;"><strong class="d-block" style="font:600 2rem 'Playfair Display',serif; color:var(--gold-light);">Local</strong><span style="color:var(--warm-gray); font-size:.82rem;">knowledge first</span></div>
                </div>
            </div>
        </div>
    </div>
</section>

<main class="container" style="padding:4rem 0 5rem;">
    <div class="d-flex flex-wrap align-items-end justify-content-between gap-3 mb-4">
        <div>
            <div class="section-label mb-2"><i class="bi bi-people me-1"></i> Local hosts</div>
            <h2 class="section-title mb-0" style="font-size:2.15rem;">Explore with confidence</h2>
        </div>
        <a href="{{ route('guides.create') }}" class="btn-outline-gold"><i class="bi bi-person-plus me-1"></i> Become a guide</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success mb-4">{{ session('success') }}</div>
    @endif

    <div class="row g-4">
        @forelse($guides as $guide)
            <div class="col-md-6 col-xl-4">
                <article class="guide-directory-card">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="guide-directory-avatar">{{ strtoupper(substr($guide->user->name ?? 'G', 0, 1)) }}</div>
                        <div class="min-w-0">
                            <h3 class="guide-directory-name mb-1">{{ $guide->user->name ?? 'Local Guide' }}</h3>
                            <div class="guide-directory-specialty">{{ $guide->specialization ?? 'Gondar experiences' }}</div>
                        </div>
                    </div>
                    <p class="guide-directory-bio">{{ Str::limit($guide->bio ?: 'A licensed local guide ready to help you experience Gondar at your own pace.', 135) }}</p>
                    <div class="mb-3">
                        @forelse(array_filter(array_map('trim', explode(',', $guide->languages ?? ''))) as $language)
                            <span class="language-pill"><i class="bi bi-translate me-1"></i>{{ $language }}</span>
                        @empty
                            <span class="language-pill">English</span>
                        @endforelse
                    </div>
                    <div class="d-flex align-items-center justify-content-between border-top pt-3">
                        <span class="{{ $guide->availability_status === 'available' ? 'badge-available' : 'badge-busy' }}"><i class="bi bi-circle-fill me-1" style="font-size:.48rem;"></i>{{ ucfirst($guide->availability_status ?? 'available') }}</span>
                        <a href="{{ route('guides.show', $guide) }}" class="guide-directory-link">View profile <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </article>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-person-x d-block mb-3" style="font-size:3rem; color:rgba(212,175,55,.45);"></i>
                <h3>No approved guides yet</h3>
                <p style="color:var(--text-muted);">Please check back soon or apply to join the guide network.</p>
            </div>
        @endforelse
    </div>

    @if($guides->hasPages())<div class="mt-5">{{ $guides->links() }}</div>@endif

    <section class="mt-5 p-4 p-md-5 text-center" style="background:linear-gradient(135deg, rgba(139,21,56,.55), rgba(26,26,29,.9)); border:1px solid rgba(212,175,55,.25); border-radius:18px;">
        <div class="section-label mb-2" style="display:flex; justify-content:center;">Share your city</div>
        <h2 class="section-title" style="font-size:2rem;">Are you a certified Gondar guide?</h2>
        <p class="mx-auto" style="color:var(--warm-gray); max-width:580px;">Join a trusted network that helps visitors find the people behind the places.</p>
        <a href="{{ route('guides.create') }}" class="btn-gold"><i class="bi bi-person-plus me-1"></i> Apply as a guide</a>
    </section>
</main>
@endsection
