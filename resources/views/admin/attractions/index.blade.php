@extends('layouts.app')

@section('title', 'Manage Attractions — Gondar Tourism Admin')

@section('content')
<div class="admin-wrapper">
    @include('admin.partials.sidebar')

    <main class="admin-main">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <div class="admin-page-title">Attractions</div>
                <div class="admin-page-subtitle">Manage all tourist attractions displayed on the platform.</div>
            </div>
            <a href="{{ route('admin.attractions.create') }}" class="btn-gold" style="font-size:0.875rem; padding:0.5rem 1.25rem;">
                <i class="bi bi-plus-circle"></i> Add Attraction
            </a>
        </div>

        @if(session('success'))
        <div class="alert-premium mb-4">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
        </div>
        @endif

        <div class="panel">
            <div class="panel-header">
                <span class="panel-title"><i class="bi bi-building me-2"></i>All Attractions ({{ $attractions->total() }})</span>
            </div>
            <div style="overflow-x:auto;">
                <table class="table table-premium mb-0">
                    <thead>
                        <tr>
                            <th style="width:50px;">#</th>
                            <th>Attraction</th>
                            <th>Category</th>
                            <th>Location</th>
                            <th>Ticket</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($attractions as $attraction)
                        <tr>
                            <td style="color:var(--text-muted);">{{ $attraction->id }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    @if($attraction->image)
                                    <img
                                        src="{{ Str::startsWith($attraction->image, ['http://', 'https://']) ? $attraction->image : asset('images/' . $attraction->image) }}"
                                        style="width:44px; height:44px; object-fit:cover; border-radius:8px; border:1px solid rgba(201,168,76,0.2);"
                                        alt="{{ $attraction->name }}"
                                        onerror="this.style.display='none'"
                                        loading="lazy"
                                    >
                                    @else
                                    <div style="width:44px; height:44px; background:var(--dark-4); border-radius:8px; display:flex; align-items:center; justify-content:center; color:var(--gold); font-size:1.1rem; border:1px solid rgba(201,168,76,0.1);">
                                        <i class="bi bi-image"></i>
                                    </div>
                                    @endif
                                    <div>
                                        <div style="color:var(--text-light); font-weight:500; font-size:0.9rem;">{{ $attraction->name }}</div>
                                        <div style="font-size:0.75rem; color:var(--text-muted);">{{ Str::limit($attraction->description, 55) }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="card-category-badge">{{ $attraction->category->name ?? '—' }}</span>
                            </td>
                            <td style="font-size:0.85rem; color:var(--text-muted);">
                                <i class="bi bi-geo-alt me-1" style="color:var(--gold);"></i>
                                {{ Str::limit($attraction->location_name, 25) }}
                            </td>
                            <td style="font-size:0.82rem; color:var(--text-muted);">{{ $attraction->ticket_price ?? '—' }}</td>
                            <td class="text-end">
                                <div class="d-flex gap-2 justify-content-end">
                                    <a href="{{ route('attractions.show', $attraction) }}" target="_blank" class="btn-card" style="font-size:0.78rem; padding:0.3rem 0.75rem;" title="View on site">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.attractions.edit', $attraction) }}" class="btn-card" style="font-size:0.78rem; padding:0.3rem 0.75rem;">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.attractions.destroy', $attraction) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('Delete {{ addslashes($attraction->name) }}? This cannot be undone.');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn-card" style="color:var(--accent-red); border-color:rgba(231,76,60,0.2); background:rgba(231,76,60,0.05); font-size:0.78rem; padding:0.3rem 0.75rem; cursor:pointer;">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5" style="color:var(--text-muted);">
                                <i class="bi bi-building d-block mb-2" style="font-size:2rem; color:rgba(201,168,76,0.3);"></i>
                                No attractions added yet.
                                <a href="{{ route('admin.attractions.create') }}" style="color:var(--gold);">Add the first one</a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-4">{{ $attractions->links() }}</div>
    </main>
</div>
@endsection
