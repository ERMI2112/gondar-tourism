@extends('layouts.app')

@section('title', 'Edit Attraction — Gondar Tourism')

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
            <div class="admin-page-title mt-2">Edit: {{ $attraction->name }}</div>
            <div class="admin-page-subtitle">Modify the attraction details, visitor information, or geographic coordinates.</div>
        </div>

        <div class="panel">
            <div class="panel-header">
                <span class="panel-title">Edit Attraction Details</span>
            </div>
            <div class="panel-body form-premium">
                <form method="POST" action="{{ route('admin.attractions.update', $attraction) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $attraction->name }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-select" required>
                                @foreach($categories as $c)
                                <option value="{{ $c->id }}" {{ $attraction->category_id == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="4" required>{{ $attraction->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">History</label>
                        <textarea name="history" class="form-control" rows="4">{{ $attraction->history }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Location Name</label>
                            <input type="text" name="location_name" class="form-control" value="{{ $attraction->location_name }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Latitude</label>
                            <input type="text" name="latitude" class="form-control" value="{{ $attraction->latitude }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Longitude</label>
                            <input type="text" name="longitude" class="form-control" value="{{ $attraction->longitude }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Opening Hours</label>
                            <input type="text" name="opening_hours" class="form-control" value="{{ $attraction->opening_hours }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Ticket Price</label>
                            <input type="text" name="ticket_price" class="form-control" value="{{ $attraction->ticket_price }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Image File (select only to replace)</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>

                    <div class="mt-4 pt-3 border-top" style="border-color: rgba(201,168,76,0.1) !important;">
                        <button type="submit" class="btn-gold">
                            <i class="bi bi-check-circle"></i> Save Changes
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
