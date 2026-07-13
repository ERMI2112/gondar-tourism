@extends('layouts.app')

@section('title', 'Add Attraction — Gondar Tourism')

@section('content')
<div class="admin-wrapper">

    {{-- SIDEBAR --}}
    @include('admin.partials.sidebar')

    {{-- MAIN CONTENT --}}
    <main class="admin-main">
        <div class="mb-4">
            <a href="{{ route('admin.attractions.index') }}" style="color:var(--gold); text-decoration:none; font-size:0.85rem;">
                <i class="bi bi-arrow-left me-1"></i> Back to Attractions
            </a>
            <div class="admin-page-title mt-2">Add New Attraction</div>
            <div class="admin-page-subtitle">Publish a new historical, cultural, or religious attraction to the platform.</div>
        </div>

        <div class="panel">
            <div class="panel-header">
                <span class="panel-title">Attraction Details</span>
            </div>
            <div class="panel-body form-premium">
                <form method="POST" action="{{ route('admin.attractions.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" required placeholder="e.g. Fasil Ghebbi (Royal Enclosure)">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-select" required>
                                @foreach($categories as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="4" required placeholder="Describe the attraction, details for tourists..."></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">History</label>
                        <textarea name="history" class="form-control" rows="4" placeholder="Historical background, build dates, kings associated..."></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Location Name</label>
                            <input type="text" name="location_name" class="form-control" required placeholder="e.g. Gondar Town Center">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Latitude</label>
                            <input type="text" name="latitude" class="form-control" placeholder="e.g. 12.608">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Longitude</label>
                            <input type="text" name="longitude" class="form-control" placeholder="e.g. 37.466">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Opening Hours</label>
                            <input type="text" name="opening_hours" class="form-control" placeholder="e.g. 8:00 AM - 5:30 PM">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Ticket Price</label>
                            <input type="text" name="ticket_price" class="form-control" placeholder="e.g. 100 ETB for locals, 300 for foreigners">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Image File</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>

                    <div class="mt-4 pt-3 border-top" style="border-color: rgba(201,168,76,0.1) !important;">
                        <button type="submit" class="btn-gold">
                            <i class="bi bi-check-circle"></i> Create Attraction
                        </button>
                        <a href="{{ route('admin.attractions.index') }}" class="btn-outline-gold ms-2">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
@endsection
