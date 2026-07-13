@extends('layouts.app')

@section('title', 'Register — Gondar Tourism')

@section('content')
<div style="min-height: 100vh; display:flex; align-items:center; background: radial-gradient(ellipse at top left, rgba(201,168,76,0.06) 0%, transparent 60%); padding: 3rem 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="text-center mb-4">
                    <div style="width:56px;height:56px;background:linear-gradient(135deg,var(--gold),var(--gold-dark));border-radius:14px;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem;font-size:1.5rem;">
                        <i class="bi bi-person-plus-fill" style="color:var(--dark);"></i>
                    </div>
                    <h2 style="font-family:'Playfair Display',serif; color:var(--text-light); font-size:1.6rem; margin-bottom:0.25rem;">Create an Account</h2>
                    <p style="color:var(--text-muted); font-size:0.875rem;">Join Gondar Smart Tourism System</p>
                </div>

                <div class="panel">
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

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Your first and last name" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="you@example.com" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="e.g. +251 911 00 0000">
                            </div>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Min 8 chars" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Repeat password" required>
                                </div>
                            </div>
                            <button type="submit" class="btn-gold w-100 justify-content-center" style="border:none; cursor:pointer; margin-top:1rem;">
                                <i class="bi bi-check-circle"></i> Complete Registration
                            </button>
                        </form>
                    </div>
                </div>

                <p class="text-center mt-3" style="font-size:0.85rem; color:var(--text-muted);">
                    Already have an account?
                    <a href="{{ route('login') }}" style="color:var(--gold); text-decoration:none;">Sign in instead</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
