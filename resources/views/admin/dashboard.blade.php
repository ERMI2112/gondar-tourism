@extends('layouts.app')

@section('title', 'Admin Dashboard — Gondar Tourism')

@section('content')
<div class="admin-wrapper">

    {{-- SIDEBAR --}}
    @include('admin.partials.sidebar')

    {{-- MAIN CONTENT --}}
    <main class="admin-main">
        <div class="admin-page-title">Dashboard</div>
        <div class="admin-page-subtitle">Welcome back, {{ auth()->user()->name }}. Here's what's happening today.</div>

        @if($stats['pending_guides'] > 0)
        <div class="alert alert-warning border-0 shadow-sm d-flex align-items-center justify-content-between p-3 mb-4" style="background-color: #FFF4D6; border-left: 4px solid #F39C12 !important; border-radius: 8px;">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-exclamation-triangle-fill text-warning fs-5"></i>
                <div class="text-dark" style="font-size: 0.9rem;">You have <strong>{{ $stats['pending_guides'] }}</strong> pending tour guide application(s) awaiting review.</div>
            </div>
            <a href="{{ route('admin.guides.index') }}" class="btn btn-sm btn-gondar-gold py-1 px-3" style="font-size: 0.8rem;">Review Applications</a>
        </div>
        @endif

        {{-- STAT CARDS --}}
        <div class="row g-3 mb-4">
            <div class="col-6 col-lg-2">
                <div class="stat-card">
                    <div class="stat-icon stat-icon-gold"><i class="bi bi-building"></i></div>
                    <div>
                        <div class="stat-num">{{ $stats['attractions'] }}</div>
                        <div class="stat-label">Attractions</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-2">
                <div class="stat-card">
                    <div class="stat-icon stat-icon-green"><i class="bi bi-person-badge"></i></div>
                    <div>
                        <div class="stat-num">{{ $stats['guides'] }}</div>
                        <div class="stat-label">Guides</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-2">
                <div class="stat-card">
                    <div class="stat-icon stat-icon-red"><i class="bi bi-hourglass-split"></i></div>
                    <div>
                        <div class="stat-num">{{ $stats['pending_guides'] }}</div>
                        <div class="stat-label">Pending</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-2">
                <div class="stat-card">
                    <div class="stat-icon stat-icon-blue"><i class="bi bi-envelope-check"></i></div>
                    <div>
                        <div class="stat-num">{{ $stats['requests'] }}</div>
                        <div class="stat-label">Requests</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-2">
                <div class="stat-card">
                    <div class="stat-icon stat-icon-purple"><i class="bi bi-calendar-event"></i></div>
                    <div>
                        <div class="stat-num">{{ $stats['events'] }}</div>
                        <div class="stat-label">Events</div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-2">
                <div class="stat-card">
                    <div class="stat-icon stat-icon-teal"><i class="bi bi-chat-square-dots"></i></div>
                    <div>
                        <div class="stat-num">{{ $stats['feedback'] }}</div>
                        <div class="stat-label">Feedback</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            {{-- QUICK ACTIONS --}}
            <div class="col-md-4">
                <div class="panel h-100">
                    <div class="panel-header">
                        <span class="panel-title">Quick Actions</span>
                    </div>
                    <div class="panel-body p-2">
                        <a href="{{ route('admin.attractions.create') }}" class="sidebar-link" style="color:#5A5A5A; border-left-color:transparent;">
                            <i class="bi bi-plus-circle" style="color:var(--gold-dark);"></i> Add Attraction
                        </a>
                        <a href="{{ route('admin.events.create') }}" class="sidebar-link" style="color:#5A5A5A; border-left-color:transparent;">
                            <i class="bi bi-calendar-plus" style="color:var(--gold-dark);"></i> Add Event
                        </a>
                        <a href="{{ route('admin.guides.index') }}" class="sidebar-link" style="color:#5A5A5A; border-left-color:transparent;">
                            <i class="bi bi-person-check" style="color:var(--gold-dark);"></i> Review Guides
                        </a>
                        <a href="{{ route('admin.requests.index') }}" class="sidebar-link" style="color:#5A5A5A; border-left-color:transparent;">
                            <i class="bi bi-inbox" style="color:var(--gold-dark);"></i> View Requests
                        </a>
                    </div>
                </div>
            </div>

            {{-- RECENT REQUESTS --}}
            <div class="col-md-8">
                <div class="panel">
                    <div class="panel-header">
                        <span class="panel-title">Recent Guide Requests</span>
                        <a href="{{ route('admin.requests.index') }}" class="btn-card" style="font-size:0.875rem; padding:0.5rem 1.125rem;">View All <i class="bi bi-arrow-right"></i></a>
                    </div>
                    <div style="overflow-x:auto;">
                        <table class="table table-premium mb-0">
                            <thead>
                                <tr>
                                    <th>Tourist</th>
                                    <th>Guide</th>
                                    <th>Visit Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentRequests as $req)
                                <tr>
                                    <td>{{ $req->tourist_name }}</td>
                                    <td>{{ $req->guide?->user?->name ?? '—' }}</td>
                                    <td>{{ $req->visit_date ?? '—' }}</td>
                                    <td>
                                        <span class="badge-status-{{ $req->status }}">{{ ucfirst($req->status) }}</span>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" style="text-align:center; color:#6B6B6B; padding:2.5rem;">
                                        <i class="bi bi-inbox d-block mb-2" style="font-size:2rem; opacity:0.4;"></i>
                                        No requests yet
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
