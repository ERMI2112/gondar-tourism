@extends('layouts.app')

@section('title', 'Login — Gondar Tourism')

@section('content')
<div style="min-height: 100vh; display:flex; align-items:center; background: radial-gradient(ellipse at top left, rgba(201,168,76,0.06) 0%, transparent 60%);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                <div class="text-center mb-4">
                    <div style="width:56px;height:56px;background:linear-gradient(135deg,var(--gold),var(--gold-dark));border-radius:14px;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem;font-size:1.5rem;">
                        <i class="bi bi-compass-fill" style="color:var(--dark);"></i>
                    </div>
                    <h2 style="font-family:'Playfair Display',serif; color:var(--text-light); font-size:1.6rem; margin-bottom:0.25rem;">Welcome back</h2>
                    <p style="color:var(--text-muted); font-size:0.875rem;">Sign in to Gondar Tourism System</p>
                </div>

                <div class="panel">
                    <div class="panel-body form-premium">
                        @if($errors->any())
                        <div class="alert-premium mb-3" style="background:rgba(231,76,60,0.08);border-color:rgba(231,76,60,0.25);color:#E74C3C;">
                            <i class="bi bi-exclamation-circle me-2"></i>{{ $errors->first() }}
                        </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="you@example.com" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Your password" required>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <label style="font-size:0.82rem; color:var(--text-muted); cursor:pointer;">
                                    <input type="checkbox" name="remember" class="me-1"> Remember me
                                </label>
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" style="font-size:0.82rem; color:var(--gold); text-decoration:none;">Forgot password?</a>
                                @endif
                            </div>
                            <button type="submit" class="btn-gold w-100 justify-content-center" style="border:none; cursor:pointer;">
                                <i class="bi bi-arrow-right-circle"></i> Sign In
                            </button>
                        </form>
                    </div>
                </div>

                <p class="text-center mt-3" style="font-size:0.85rem; color:var(--text-muted);">
                    Don't have an account?
                    <a href="{{ route('register') }}" style="color:var(--gold); text-decoration:none;">Register here</a>
                </p>

                <div class="divider-gold mt-4"></div>
                <p class="text-center" style="font-size:0.78rem; color:var(--text-muted);">
                    <i class="bi bi-info-circle me-1"></i> Demo: admin@gondar.gov.et / password
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
