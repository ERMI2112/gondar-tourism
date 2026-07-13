@extends('layouts.app')

@section('title', 'Contact & Feedback — Gondar Tourism')

@section('content')

<div style="padding: 4rem 0 3rem; border-bottom: 1px solid rgba(201,168,76,0.1);">
    <div class="container">
        <div class="section-label mb-2"><i class="bi bi-chat-dots me-1"></i>Get in Touch</div>
        <h1 class="section-title">Contact & Feedback</h1>
        <p class="section-desc">Have questions? Leave feedback about your Gondar experience. We read every message.</p>
    </div>
</div>

<div class="container" style="padding: 3rem 0 5rem;">
    <div class="row g-5">
        <div class="col-lg-5">
            <div class="panel">
                <div class="panel-header">
                    <span class="panel-title"><i class="bi bi-envelope me-2"></i>Send a Message</span>
                </div>
                <div class="panel-body form-premium">
                    @if(session('success'))
                    <div class="alert-premium mb-3">
                        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('feedback.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Your Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Full name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="your@email.com" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Your Rating</label>
                            <div class="d-flex gap-2" id="rating-group">
                                @for($i = 1; $i <= 5; $i++)
                                <label style="cursor:pointer; color: {{ old('rating', 5) >= $i ? 'var(--gold)' : 'var(--text-muted)' }}; font-size:1.5rem;">
                                    <input type="radio" name="rating" value="{{ $i }}" style="display:none;" {{ old('rating', 5) == $i ? 'checked' : '' }}>
                                    <i class="bi bi-star-fill"></i>
                                </label>
                                @endfor
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Message</label>
                            <textarea name="message" class="form-control" rows="5" placeholder="Tell us about your experience..." required></textarea>
                        </div>
                        <button type="submit" class="btn-gold w-100 justify-content-center" style="border:none; cursor:pointer;">
                            <i class="bi bi-send"></i> Send Feedback
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-7">
            <div class="row g-3 mb-4">
                <div class="col-sm-6">
                    <div class="stat-card">
                        <div class="stat-icon stat-icon-gold"><i class="bi bi-geo-alt"></i></div>
                        <div>
                            <div style="font-size:0.8rem; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.5px;">Address</div>
                            <div style="font-size:0.9rem; color:var(--text-light); margin-top:2px;">Gondar City, Amhara<br>Ethiopia</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="stat-card">
                        <div class="stat-icon stat-icon-green"><i class="bi bi-telephone"></i></div>
                        <div>
                            <div style="font-size:0.8rem; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.5px;">Phone</div>
                            <div style="font-size:0.9rem; color:var(--text-light); margin-top:2px;">+251 58 111 0000</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="stat-card">
                        <div class="stat-icon stat-icon-blue"><i class="bi bi-envelope"></i></div>
                        <div>
                            <div style="font-size:0.8rem; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.5px;">Email</div>
                            <div style="font-size:0.9rem; color:var(--text-light); margin-top:2px;">info@gondar.gov.et</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="stat-card">
                        <div class="stat-icon stat-icon-purple"><i class="bi bi-clock"></i></div>
                        <div>
                            <div style="font-size:0.8rem; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.5px;">Office Hours</div>
                            <div style="font-size:0.9rem; color:var(--text-light); margin-top:2px;">Mon–Fri: 8am–5pm</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- MAP --}}
            <div class="panel">
                <div class="panel-header"><span class="panel-title"><i class="bi bi-map me-2"></i>Find Us</span></div>
                <div id="map" style="height:280px; border-radius:0 0 12px 12px; border:none;"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var map = L.map('map').setView([12.608, 37.4667], 13);
    L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
        attribution: '© CartoDB © OpenStreetMap'
    }).addTo(map);
    var goldIcon = L.divIcon({
        className: '',
        html: '<div style="width:28px;height:28px;background:linear-gradient(135deg,#C9A84C,#9A7A2E);border-radius:50% 50% 50% 0;transform:rotate(-45deg);border:2px solid rgba(255,255,255,0.3);box-shadow:0 4px 12px rgba(0,0,0,0.4);"></div>',
        iconSize: [28, 28], iconAnchor: [14, 28], popupAnchor: [0, -32]
    });
    L.marker([12.608, 37.4667], {icon: goldIcon}).addTo(map)
        .bindPopup('<strong style="color:#C9A84C;">Gondar Tourism Office</strong>').openPopup();
</script>
@endsection
