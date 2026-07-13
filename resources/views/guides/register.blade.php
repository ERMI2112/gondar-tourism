@extends('layouts.app')

@section('title', 'Apply as a Tour Guide — Gondar Tourism')

@section('content')
<div style="background: linear-gradient(to bottom, rgba(13,13,13,0.6), var(--dark)); padding: 4rem 0 3rem; border-bottom: 1px solid rgba(201,168,76,0.1);">
    <div class="container">
        <div class="section-label mb-2"><i class="bi bi-people me-1"></i>Career Opportunities</div>
        <h1 class="section-title">Apply as a Tour Guide</h1>
        <p class="section-desc">Join Gondar's premium network of certified local experts. Submit your application details below.</p>
    </div>
</div>

<div class="container" style="padding: 3rem 0 5rem;">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="panel">
                <div class="panel-header">
                    <span class="panel-title"><i class="bi bi-file-earmark-person me-2"></i>Guide Application Form</span>
                </div>
                <div class="panel-body form-premium">
                    @if($errors->any())
                    <div class="alert-premium mb-3" style="background:rgba(231,76,60,0.08);border-color:rgba(231,76,60,0.25);color:#E74C3C;">
                        <ul class="mb-0 ps-3">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('guides.store') }}">
                        @csrf
                        <h5 class="mb-3 text-white border-bottom pb-2" style="border-color:rgba(201,168,76,0.1) !important;"><i class="bi bi-person me-2"></i>Account Details</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Full Name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="email@example.com" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Min 8 characters" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password" required>
                            </div>
                        </div>

                        <h5 class="mb-3 mt-4 text-white border-bottom pb-2" style="border-color:rgba(201,168,76,0.1) !important;"><i class="bi bi-briefcase me-2"></i>Professional Details</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="e.g. +251 911 00 0000" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Spoken Languages</label>
                                <input type="text" name="languages" class="form-control" value="{{ old('languages') }}" placeholder="e.g. Amharic, English, French" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Specialization Area</label>
                                <input type="text" name="specialization" class="form-control" value="{{ old('specialization') }}" placeholder="e.g. Castles & Royal History, Hiking">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Guide License Number</label>
                                <input type="text" name="license_number" class="form-control" value="{{ old('license_number') }}" placeholder="e.g. LIC-GND-789">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price Range / Rates</label>
                            <input type="text" name="price_range" class="form-control" value="{{ old('price_range') }}" placeholder="e.g. 500 - 1000 ETB per day">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Short Biography / Introduction</label>
                            <textarea name="bio" class="form-control" rows="4" placeholder="Introduce yourself, your tourism background, and why tourists should book with you...">{{ old('bio') }}</textarea>
                        </div>

                        <div class="mt-4 pt-3 border-top" style="border-color: rgba(201,168,76,0.1) !important;">
                            <button type="submit" class="btn-gold">
                                <i class="bi bi-check-circle"></i> Submit Application
                            </button>
                            <a href="{{ route('guides.index') }}" class="btn-outline-gold ms-2">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
