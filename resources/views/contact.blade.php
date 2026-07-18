@extends('layouts.app')

@section('title', 'Contact & Feedback — Gondar Tourism')

@section('content')

{{-- PAGE HEADER BANNER --}}
<section class="detail-header-banner" style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/e/ed/Fasilides_Bath_05.jpg');">
    <div class="detail-header-overlay"></div>
    <div class="detail-header-content">
        <div class="container">
            <span class="verification-badge mb-3">
                <i class="bi bi-chat-left-dots"></i> Get in Touch
            </span>
            <h1 class="display-4 fw-bold text-white font-serif">Contact & Feedback</h1>
            <p class="text-white-50 fs-5 mb-0" style="max-width: 550px;">
                Have questions about planning your trip, or want to share your experience? Drop us a line. We read every submission.
            </p>
        </div>
    </div>
</section>

<div class="container py-5">
    <div class="row g-5">
        
        {{-- LEFT COLUMN: Contact Form --}}
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header py-3 px-4" style="background-color: var(--gondar-red); border-radius: 12px 12px 0 0;">
                    <h5 class="mb-0 text-white"><i class="bi bi-envelope me-2"></i>Send a Message</h5>
                </div>
                <div class="card-body p-4">
                    @if(session('success'))
                        <div class="alert alert-success border-0 d-flex align-items-center gap-2 mb-3" style="background: #E8F8F0; color: #229954;">
                            <i class="bi bi-check-circle-fill"></i>{{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('feedback.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold small text-uppercase">Your Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Full Name" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold small text-uppercase">Email Address</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="you@email.com" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold small text-uppercase">Your Rating</label>
                            <div class="d-flex gap-2" id="rating-group">
                                @for($i = 1; $i <= 5; $i++)
                                <label style="cursor: pointer; font-size: 1.5rem;" class="rating-star" data-value="{{ $i }}">
                                    <input type="radio" name="rating" value="{{ $i }}" style="display: none;" {{ old('rating', 5) == $i ? 'checked' : '' }}>
                                    <i class="bi bi-star-fill {{ old('rating', 5) >= $i ? 'text-warning' : 'text-muted' }}"></i>
                                </label>
                                @endfor
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label fw-semibold small text-uppercase">Message</label>
                            <textarea name="message" class="form-control" rows="5" placeholder="Tell us about your experience in Gondar..." required></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-gondar-gold w-100">
                            <i class="bi bi-send me-2"></i>Send Feedback
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- RIGHT COLUMN: Office Info & Map --}}
        <div class="col-lg-7">
            <div class="row g-3 mb-4">
                <div class="col-sm-6">
                    <div class="card border-0 shadow-sm p-3 h-100 bg-white">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-3 bg-light p-3 text-warning"><i class="bi bi-geo-alt fs-4"></i></div>
                            <div>
                                <small class="text-muted text-uppercase fw-bold" style="font-size: 0.7rem;">Office Address</small>
                                <span class="d-block text-dark fw-semibold small">Gondar City Center, Ethiopia</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card border-0 shadow-sm p-3 h-100 bg-white">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-3 bg-light p-3 text-warning"><i class="bi bi-telephone fs-4"></i></div>
                            <div>
                                <small class="text-muted text-uppercase fw-bold" style="font-size: 0.7rem;">Phone Number</small>
                                <span class="d-block text-dark fw-semibold small">+251 58 111 0000</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card border-0 shadow-sm p-3 h-100 bg-white">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-3 bg-light p-3 text-warning"><i class="bi bi-envelope fs-4"></i></div>
                            <div>
                                <small class="text-muted text-uppercase fw-bold" style="font-size: 0.7rem;">Email Address</small>
                                <span class="d-block text-dark fw-semibold small">info@gondar.gov.et</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card border-0 shadow-sm p-3 h-100 bg-white">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-3 bg-light p-3 text-warning"><i class="bi bi-clock fs-4"></i></div>
                            <div>
                                <small class="text-muted text-uppercase fw-bold" style="font-size: 0.7rem;">Office Hours</small>
                                <span class="d-block text-dark fw-semibold small">Mon–Fri: 8:00 AM – 5:00 PM</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- MAP PANEL --}}
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-white border-bottom py-3 px-4">
                    <h5 class="font-serif mb-0"><i class="bi bi-map text-warning me-2"></i>Find Our Bureau</h5>
                </div>
                <div id="map" class="leaflet-container-gondar" style="border-radius: 0 0 12px 12px;"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Leaflet map setup using Voyager style
    var map = L.map('map').setView([12.608, 37.4693], 14);
    L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; CartoDB &copy; OpenStreetMap'
    }).addTo(map);

    var redIcon = L.divIcon({
        className: '',
        html: '<div style="width:28px;height:28px;background:var(--gondar-red);border-radius:50% 50% 50% 0;transform:rotate(-45deg);border:2px solid var(--gondar-gold);box-shadow:0 4px 10px rgba(0,0,0,0.3);"></div>',
        iconSize: [28, 28], iconAnchor: [14, 28], popupAnchor: [0, -32]
    });
    L.marker([12.608, 37.4693], {icon: redIcon}).addTo(map)
        .bindPopup('<strong style="color:var(--gondar-red);font-family:Playfair Display,serif;">Gondar City Tourism Bureau</strong>')
        .openPopup();

    // Star rating dynamic highlighting
    document.querySelectorAll('.rating-star').forEach(function(star) {
        star.addEventListener('click', function() {
            var selectedValue = parseInt(this.getAttribute('data-value'));
            document.querySelectorAll('.rating-star').forEach(function(s) {
                var val = parseInt(s.getAttribute('data-value'));
                var icon = s.querySelector('i');
                if (val <= selectedValue) {
                    icon.classList.remove('text-muted');
                    icon.classList.add('text-warning');
                } else {
                    icon.classList.remove('text-warning');
                    icon.classList.add('text-muted');
                }
            });
        });
    });
</script>
@endsection
