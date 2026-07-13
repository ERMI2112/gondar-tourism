@extends('layouts.app')

@section('title', 'Manage Events — Gondar Tourism')

@section('content')
<div class="admin-wrapper">

    {{-- SIDEBAR --}}
    @include('admin.partials.sidebar')

    {{-- MAIN CONTENT --}}
    <main class="admin-main">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <div class="admin-page-title">Manage Events & Festivals</div>
                <div class="admin-page-subtitle">Add cultural, historical, or religious festivals in Gondar.</div>
            </div>
            <div>
                <a href="{{ route('admin.events.create') }}" class="btn-gold">
                    <i class="bi bi-calendar-plus"></i> Add Event
                </a>
            </div>
        </div>

        <div class="panel">
            <div class="panel-header">
                <span class="panel-title">Scheduled Events</span>
            </div>
            <div style="overflow-x:auto;">
                <table class="table table-premium mb-0">
                    <thead>
                        <tr>
                            <th>Festival Title</th>
                            <th>Celebration Location</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($events as $event)
                        <tr>
                            <td class="fw-semibold text-white">
                                <div class="d-flex align-items-center gap-2">
                                    <div style="width:32px; height:32px; background:rgba(201,168,76,0.08); border:1px solid rgba(201,168,76,0.2); border-radius:6px; display:flex; align-items:center; justify-content:center; color:var(--gold);">
                                        <i class="bi bi-calendar3"></i>
                                    </div>
                                    {{ $event->title }}
                                </div>
                            </td>
                            <td><i class="bi bi-geo-alt me-1 text-muted"></i>{{ $event->location }}</td>
                            <td class="text-muted">{{ \Carbon\Carbon::parse($event->start_date)->format('M d, Y') }}</td>
                            <td class="text-muted">{{ $event->end_date ? \Carbon\Carbon::parse($event->end_date)->format('M d, Y') : '—' }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.events.edit', $event) }}" class="btn-card me-1">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-card" style="color:var(--accent-red); border-color:rgba(231,76,60,0.15); background:rgba(231,76,60,0.05);" onclick="return confirm('Are you sure you want to delete this event?')">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4" style="color:var(--text-muted);">
                                <i class="bi bi-inbox d-block mb-2" style="font-size:1.5rem;"></i>
                                No events scheduled yet
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-4">
            {{ $events->links() }}
        </div>
    </main>
</div>
@endsection
