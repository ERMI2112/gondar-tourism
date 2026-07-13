<aside class="admin-sidebar d-none d-md-block">
    <div class="px-4 pb-3 mb-2" style="border-bottom: 1px solid rgba(201,168,76,0.1);">
        <div style="font-family:'Playfair Display',serif; color:var(--gold); font-size:0.95rem;">Control Panel</div>
        <div style="font-size:0.75rem; color:var(--text-muted);">{{ auth()->user()->name }}</div>
    </div>

    <div class="sidebar-section-label">Overview</div>
    <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="bi bi-grid-1x2"></i> Dashboard
    </a>

    <div class="sidebar-section-label">Manage</div>
    <a href="{{ route('admin.attractions.index') }}" class="sidebar-link {{ request()->routeIs('admin.attractions*') ? 'active' : '' }}">
        <i class="bi bi-building"></i> Attractions
    </a>
    <a href="{{ route('admin.guides.index') }}" class="sidebar-link {{ request()->routeIs('admin.guides*') ? 'active' : '' }}">
        <i class="bi bi-person-badge"></i> Guides
    </a>
    <a href="{{ route('admin.events.index') }}" class="sidebar-link {{ request()->routeIs('admin.events*') ? 'active' : '' }}">
        <i class="bi bi-calendar-event"></i> Events
    </a>
    <a href="{{ route('admin.requests.index') }}" class="sidebar-link {{ request()->routeIs('admin.requests*') ? 'active' : '' }}">
        <i class="bi bi-envelope-check"></i> Guide Requests
    </a>

    <div class="sidebar-section-label">Site</div>
    <a href="{{ route('home') }}" class="sidebar-link" target="_blank">
        <i class="bi bi-box-arrow-up-right"></i> View Website
    </a>
    <form method="POST" action="{{ route('logout') }}" class="d-inline w-100">
        @csrf
        <button type="submit" class="sidebar-link w-100 text-start border-0" style="background:none;">
            <i class="bi bi-box-arrow-right"></i> Logout
        </button>
    </form>
</aside>
