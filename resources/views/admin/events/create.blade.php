@extends('layouts.app')

@section('title', 'Add Event — Gondar Tourism')

@section('content')
<div class="admin-wrapper">

    {{-- SIDEBAR --}}
    @include('admin.partials.sidebar')

    {{-- MAIN CONTENT --}}
    <main class="admin-main">
        <div class="mb-4">
            <a href="{{ route('admin.events.index') }}" style="color:var(--gold); text-decoration:none; font-size:0.85rem;">
                <i class="bi bi-arrow-left me-1"></i> Back to Events
            </a>
            <div class="admin-page-title mt-2">Add New Event</div>
            <div class="admin-page-subtitle">Publish a new festival, celebration, or seasonal event to the public calendar.</div>
        </div>

        <div class="panel">
            <div class="panel-header">
                <span class="panel-title">Event Information</span>
            </div>
            <div class="panel-body form-premium">
                <form method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Event Title</label>
                        <input type="text" name="title" class="form-control" required placeholder="e.g. Timket (Epiphany) Celebration">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="4" placeholder="Detail the festival schedule, activities, and historical significance..."></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Location</label>
                        <input type="text" name="location" class="form-control" placeholder="e.g. Fasilides Bath, Gondar">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Start Date</label>
                            <input type="date" name="start_date" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">End Date (optional)</label>
                            <input type="date" name="end_date" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Featured Image File</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="mt-4 pt-3 border-top" style="border-color: rgba(201,168,76,0.1) !important;">
                        <button type="submit" class="btn-gold">
                            <i class="bi bi-calendar-check"></i> Create Event
                        </button>
                        <a href="{{ route('admin.events.index') }}" class="btn-outline-gold ms-2">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
@endsection
