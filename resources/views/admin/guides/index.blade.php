@extends('layouts.app')

@section('title', 'Manage Guides — Gondar Tourism')

@section('content')
<div class="admin-wrapper">

    {{-- SIDEBAR --}}
    @include('admin.partials.sidebar')

    {{-- MAIN CONTENT --}}
    <main class="admin-main">
        <div class="mb-4">
            <div class="admin-page-title">Manage Tour Guides</div>
            <div class="admin-page-subtitle">Verify licenses, review qualifications, and approve or reject guide applications.</div>
        </div>

        <div class="panel">
            <div class="panel-header">
                <span class="panel-title">Registered Guides</span>
            </div>
            <div style="overflow-x:auto;">
                <table class="table table-premium mb-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Languages</th>
                            <th>License No.</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($guides as $guide)
                        <tr>
                            <td class="fw-semibold text-white">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="guide-avatar" style="width:30px; height:30px; font-size:0.75rem; margin:0;">{{ substr($guide->user->name ?? 'G', 0, 1) }}</div>
                                    {{ $guide->user->name ?? 'None' }}
                                </div>
                            </td>
                            <td>{{ $guide->phone }}</td>
                            <td>
                                @if($guide->languages)
                                    @foreach(explode(',', $guide->languages) as $lang)
                                    <span style="font-size:0.72rem; background:rgba(201,168,76,0.08); border:1px solid rgba(201,168,76,0.2); color:var(--gold-light); padding:1px 6px; border-radius:50px; margin:1px; display:inline-block;">{{ trim($lang) }}</span>
                                    @endforeach
                                @else
                                    —
                                @endif
                            </td>
                            <td class="font-monospace text-muted" style="font-size:0.8rem;">{{ $guide->license_number ?? '—' }}</td>
                            <td>
                                @php
                                $badgeClass = $guide->approval_status == 'approved' ? 'approved' : ($guide->approval_status == 'pending' ? 'pending' : 'rejected');
                                @endphp
                                <span class="badge-status-{{ $badgeClass }}">{{ ucfirst($guide->approval_status) }}</span>
                            </td>
                            <td class="text-end">
                                @if($guide->approval_status !== 'approved')
                                <form action="{{ route('admin.guides.approve', $guide) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn-card me-1" style="color:var(--accent-green); border-color:rgba(46,204,113,0.2); background:rgba(46,204,113,0.05);">
                                        <i class="bi bi-check-lg"></i> Approve
                                    </button>
                                </form>
                                @endif
                                @if($guide->approval_status !== 'rejected')
                                <form action="{{ route('admin.guides.reject', $guide) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn-card" style="color:var(--accent-red); border-color:rgba(231,76,60,0.2); background:rgba(231,76,60,0.05);">
                                        <i class="bi bi-x-lg"></i> Reject
                                    </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4" style="color:var(--text-muted);">
                                <i class="bi bi-people d-block mb-2" style="font-size:1.5rem;"></i>
                                No guide accounts registered yet
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-4">
            {{ $guides->links() }}
        </div>
    </main>
</div>
@endsection
