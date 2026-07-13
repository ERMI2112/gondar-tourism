@extends('layouts.app')

@section('title', 'Guide Requests — Gondar Tourism')

@section('content')
<div class="admin-wrapper">

    {{-- SIDEBAR --}}
    @include('admin.partials.sidebar')

    {{-- MAIN CONTENT --}}
    <main class="admin-main">
        <div class="mb-4">
            <div class="admin-page-title">Guide Requests</div>
            <div class="admin-page-subtitle">Manage bookings made by tourists, coordinate schedules, and assign statuses.</div>
        </div>

        <div class="panel">
            <div class="panel-header">
                <span class="panel-title">Tourist Booking Inquiries</span>
            </div>
            <div style="overflow-x:auto;">
                <table class="table table-premium mb-0">
                    <thead>
                        <tr>
                            <th>Tourist Info</th>
                            <th>Requested Guide</th>
                            <th>Target Attraction</th>
                            <th>Visit Date</th>
                            <th>Group Size</th>
                            <th>Status</th>
                            <th class="text-end" style="width: 180px;">Action Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($requests as $req)
                        <tr>
                            <td>
                                <div class="fw-semibold text-white">{{ $req->tourist_name }}</div>
                                <div style="font-size:0.75rem; color:var(--text-muted);"><i class="bi bi-envelope me-1"></i>{{ $req->tourist_email }}</div>
                            </td>
                            <td>
                                @if($req->guide?->user)
                                <div class="d-flex align-items-center gap-2">
                                    <div class="guide-avatar" style="width:24px; height:24px; font-size:0.65rem; margin:0;">{{ substr($req->guide->user->name, 0, 1) }}</div>
                                    <span style="font-size:0.875rem;">{{ $req->guide->user->name }}</span>
                                </div>
                                @else
                                <span class="text-muted">—</span>
                                @endif
                            </td>
                            <td>
                                <span class="card-category-badge">{{ $req->attraction?->name ?? 'General' }}</span>
                            </td>
                            <td class="text-muted">{{ $req->visit_date ? \Carbon\Carbon::parse($req->visit_date)->format('M d, Y') : '—' }}</td>
                            <td>{{ $req->group_size ?? '1' }} {{ Str::plural('person', $req->group_size) }}</td>
                            <td>
                                @php
                                $badgeClass = $req->status == 'approved' ? 'approved' : ($req->status == 'pending' ? 'pending' : ($req->status == 'completed' ? 'completed' : 'rejected'));
                                @endphp
                                <span class="badge-status-{{ $badgeClass }}">{{ ucfirst($req->status) }}</span>
                            </td>
                            <td class="text-end">
                                <form method="POST" action="{{ route('admin.requests.update', $req) }}" class="form-premium d-inline">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="form-select form-select-sm" style="background-color: var(--dark-4); font-size: 0.78rem; padding: 0.35rem 1.5rem 0.35rem 0.65rem; border-color: rgba(201,168,76,0.25);" onchange="this.form.submit()">
                                        <option value="pending" {{ $req->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="approved" {{ $req->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                        <option value="rejected" {{ $req->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                        <option value="completed" {{ $req->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4" style="color:var(--text-muted);">
                                <i class="bi bi-inbox d-block mb-2" style="font-size:1.5rem;"></i>
                                No booking requests yet
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-4">
            {{ $requests->links() }}
        </div>
    </main>
</div>
@endsection
