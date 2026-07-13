<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gondar Smart Tourism')</title>
    <meta name="description" content="Smart Tourism Information and Tour Guide Management System for Gondar City, Ethiopia">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <style>
        :root {
            /* Gondar Imperial Palette */
            --imperial-red: #8B1538;
            --crimson: #A91D3A;
            --crimson-light: #C73659;
            --crimson-dark: #6B0F2A;
            --gold: #D4AF37;
            --gold-light: #F4D06F;
            --gold-dark: #B8941F;
            --charcoal: #1A1A1D;
            --charcoal-light: #2D2D32;
            --charcoal-medium: #3E3E44;
            --charcoal-dark: #0F0F11;
            --warm-white: #F9F6F1;
            --warm-gray: #C9BEB1;
            --text-muted: #9B8F82;
            --accent-green: #2ECC71;
            
            /* Legacy mappings for compatibility */
            --dark: var(--charcoal);
            --dark-2: var(--charcoal-dark);
            --dark-3: var(--charcoal-light);
            --dark-4: var(--charcoal-medium);
            --dark-5: #4A4A52;
            --text-light: var(--warm-white);
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--charcoal);
            color: var(--warm-white);
            min-height: 100vh;
            font-size: 1.0625rem; /* 17px */
            line-height: 1.65;
        }

        h1, h2, h3, .brand-font { 
            font-family: 'Playfair Display', serif; 
            font-weight: 600;
            color: var(--warm-white);
        }

        h1 { font-size: 2.75rem; line-height: 1.2; }
        h2 { font-size: 2rem; line-height: 1.3; }
        h3 { font-size: 1.5rem; line-height: 1.4; }

        /* ===== NAVBAR ===== */
        .navbar-premium {
            background: linear-gradient(to bottom, rgba(26,26,29,0.98), rgba(26,26,29,0.95));
            backdrop-filter: blur(24px);
            border-bottom: 1px solid rgba(212,175,55,0.15);
            box-shadow: 0 2px 16px rgba(0,0,0,0.3);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand-custom {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: var(--gold) !important;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
            letter-spacing: 0.3px;
            font-weight: 600;
        }

        .navbar-brand-custom .brand-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--crimson), var(--imperial-red));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            box-shadow: 0 4px 12px rgba(139,21,56,0.3);
        }

        .nav-link-custom {
            color: rgba(249,246,241,0.8) !important;
            font-size: 0.9375rem;
            font-weight: 500;
            padding: 0.625rem 1.125rem !important;
            border-radius: 8px;
            transition: all 0.25s ease;
            text-decoration: none;
            letter-spacing: 0.2px;
        }

        .nav-link-custom:hover {
            color: var(--gold-light) !important;
            background: rgba(212,175,55,0.1);
        }

        .nav-link-custom.active {
            color: var(--gold) !important;
            background: rgba(212,175,55,0.08);
        }

        .btn-nav-login {
            background: transparent;
            border: 1.5px solid rgba(212,175,55,0.4);
            color: var(--gold-light) !important;
            font-size: 0.9375rem;
            padding: 0.5rem 1.375rem;
            border-radius: 8px;
            transition: all 0.25s ease;
            font-weight: 500;
        }

        .btn-nav-login:hover {
            background: var(--gold);
            color: var(--charcoal) !important;
            border-color: var(--gold);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(212,175,55,0.25);
        }

        .btn-nav-admin {
            background: linear-gradient(135deg, var(--crimson), var(--imperial-red));
            border: none;
            color: var(--warm-white) !important;
            font-size: 0.9375rem;
            font-weight: 600;
            padding: 0.5rem 1.375rem;
            border-radius: 8px;
            transition: all 0.25s ease;
            box-shadow: 0 2px 8px rgba(139,21,56,0.3);
        }

        .btn-nav-admin:hover { 
            opacity: 0.92; 
            transform: translateY(-1px); 
            box-shadow: 0 4px 16px rgba(139,21,56,0.4);
        }

        /* ===== HERO ===== */
        .hero-section {
            min-height: 90vh;
            background:
                linear-gradient(to bottom, rgba(26,26,29,0.25) 0%, rgba(26,26,29,0.65) 50%, rgba(26,26,29,0.95) 100%),
                url('https://images.unsplash.com/photo-1580910533733-6e07c6543e2c?auto=format&fit=crop&w=1600&q=90') center/cover no-repeat;
            display: flex;
            align-items: center;
            position: relative;
            padding: 4rem 0;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, rgba(139,21,56,0.15), rgba(169,29,58,0.1));
            border: 1px solid rgba(212,175,55,0.3);
            color: var(--gold-light);
            padding: 7px 18px;
            border-radius: 50px;
            font-size: 0.8125rem;
            font-weight: 600;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            margin-bottom: 2rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.5rem, 5.5vw, 4.5rem);
            font-weight: 700;
            line-height: 1.15;
            color: var(--warm-white);
            margin-bottom: 1.5rem;
            text-shadow: 0 2px 24px rgba(0,0,0,0.4);
        }

        .hero-title .highlight {
            background: linear-gradient(135deg, var(--gold-light), var(--crimson-light));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-subtitle {
            font-size: 1.125rem;
            color: rgba(249,246,241,0.82);
            font-weight: 400;
            line-height: 1.75;
            max-width: 560px;
            margin-bottom: 3rem;
        }

        .btn-gold {
            background: linear-gradient(135deg, var(--gold), var(--gold-dark));
            border: none;
            color: var(--charcoal);
            font-weight: 700;
            padding: 1rem 2.5rem;
            border-radius: 12px;
            font-size: 1.0625rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 16px rgba(212,175,55,0.3);
        }

        .btn-gold:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 32px rgba(212,175,55,0.45);
            color: var(--charcoal);
            background: linear-gradient(135deg, var(--gold-light), var(--gold));
        }

        .btn-outline-gold {
            background: transparent;
            border: 2px solid rgba(212,175,55,0.6);
            color: var(--gold-light);
            font-weight: 600;
            padding: 0.9375rem 2.375rem;
            border-radius: 12px;
            font-size: 1.0625rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-outline-gold:hover {
            background: rgba(212,175,55,0.15);
            border-color: var(--gold);
            color: var(--gold);
            transform: translateY(-3px);
            box-shadow: 0 4px 20px rgba(212,175,55,0.25);
        }

        .hero-stats {
            display: flex;
            gap: 3rem;
            margin-top: 4rem;
            padding-top: 2.5rem;
            border-top: 1px solid rgba(212,175,55,0.2);
        }

        .hero-stat-num {
            font-family: 'Playfair Display', serif;
            font-size: 2.25rem;
            font-weight: 700;
            color: var(--gold);
            text-shadow: 0 2px 8px rgba(0,0,0,0.3);
        }

        .hero-stat-label {
            font-size: 0.8125rem;
            color: var(--warm-gray);
            text-transform: uppercase;
            letter-spacing: 1.2px;
            margin-top: 4px;
        }

        /* ===== SECTIONS ===== */
        .section-label {
            font-size: 0.8125rem;
            font-weight: 700;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: var(--crimson-light);
            margin-bottom: 0.75rem;
            display: inline-block;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.875rem, 3vw, 2.5rem);
            color: var(--warm-white);
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .section-desc {
            color: var(--warm-gray);
            font-size: 1.0625rem;
            line-height: 1.75;
            max-width: 560px;
        }

        /* ===== CARDS ===== */
        .card-premium {
            background: var(--warm-white);
            border: none;
            border-radius: 16px;
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            height: 100%;
            box-shadow: 0 2px 16px rgba(0,0,0,0.12);
        }

        .card-premium:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 40px rgba(0,0,0,0.25);
        }

        .card-premium .card-img-top {
            height: 320px;
            width: 100%;
            object-fit: cover;
            aspect-ratio: 16/9;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-premium:hover .card-img-top {
            transform: scale(1.06);
        }

        .card-img-placeholder {
            height: 320px;
            aspect-ratio: 16/9;
            background: linear-gradient(135deg, #E8E3DA, #D4CEC1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3.5rem;
            color: var(--gold-dark);
            opacity: 0.4;
        }

        .card-premium .card-body { 
            padding: 2rem 2rem 1.75rem; 
            background: var(--warm-white);
        }

        .card-category-badge {
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            background: linear-gradient(135deg, var(--crimson), var(--imperial-red));
            color: white;
            border: none;
            padding: 6px 16px;
            border-radius: 50px;
            display: inline-block;
            margin-bottom: 1.125rem;
            box-shadow: 0 2px 8px rgba(139,21,56,0.25);
        }

        .card-premium .card-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.375rem;
            color: var(--charcoal);
            margin-bottom: 0.875rem;
            font-weight: 600;
            line-height: 1.35;
        }

        .card-premium .card-text {
            color: #5A5A5A;
            font-size: 1rem;
            line-height: 1.7;
        }

        .card-footer-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.125rem 2rem;
            border-top: 1px solid rgba(0,0,0,0.08);
            background: #F5F1E9;
            font-size: 0.875rem;
            color: #6B6B6B;
        }

        .btn-card {
            background: linear-gradient(135deg, var(--gold), var(--gold-dark));
            border: none;
            color: var(--charcoal);
            font-size: 0.9375rem;
            font-weight: 700;
            padding: 0.625rem 1.5rem;
            border-radius: 8px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            box-shadow: 0 2px 8px rgba(212,175,55,0.25);
        }

        .btn-card:hover {
            background: linear-gradient(135deg, var(--gold-light), var(--gold));
            color: var(--charcoal);
            transform: translateX(4px);
            box-shadow: 0 4px 16px rgba(212,175,55,0.4);
        }

        #map {
            height: 450px;
            width: 100%;
            border-radius: 16px;
            border: 1px solid rgba(212,175,55,0.18);
            box-shadow: 0 4px 20px rgba(0,0,0,0.25);
        }

        /* ===== GUIDE CARD ===== */
        .guide-card {
            background: var(--warm-white);
            border: none;
            border-radius: 16px;
            padding: 2.25rem;
            text-align: center;
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 2px 16px rgba(0,0,0,0.12);
        }

        .guide-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 40px rgba(0,0,0,0.25);
        }

        .guide-avatar {
            width: 96px;
            height: 96px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--crimson), var(--imperial-red));
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            color: white;
            margin: 0 auto 1.5rem;
            font-weight: 700;
            box-shadow: 0 8px 24px rgba(139,21,56,0.3);
        }

        .guide-name {
            font-family: 'Playfair Display', serif;
            font-size: 1.375rem;
            color: var(--charcoal);
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .guide-spec {
            font-size: 0.9375rem;
            color: #6B6B6B;
            margin-bottom: 1.25rem;
        }

        .badge-available {
            background: #E8F8F0;
            border: 1px solid #2ECC71;
            color: #229954;
            font-size: 0.8125rem;
            font-weight: 700;
            padding: 6px 16px;
            border-radius: 50px;
            letter-spacing: 0.5px;
        }

        .badge-busy {
            background: #FCE8EC;
            border: 1px solid var(--crimson);
            color: var(--imperial-red);
            font-size: 0.8125rem;
            font-weight: 700;
            padding: 6px 16px;
            border-radius: 50px;
            letter-spacing: 0.5px;
        }

        /* ===== EVENT CARD ===== */
        .event-card {
            background: var(--warm-white);
            border: none;
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 2px 16px rgba(0,0,0,0.12);
        }

        .event-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 40px rgba(0,0,0,0.25);
        }

        .event-date-badge {
            background: linear-gradient(135deg, var(--crimson), var(--imperial-red));
            color: white;
            padding: 1.25rem 1.5rem;
            text-align: center;
            min-width: 90px;
            box-shadow: inset 0 -2px 8px rgba(0,0,0,0.15);
        }

        .event-date-badge .day {
            font-family: 'Playfair Display', serif;
            font-size: 2.25rem;
            font-weight: 700;
            line-height: 1;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        .event-date-badge .month {
            font-size: 0.8125rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.8px;
            margin-top: 6px;
            opacity: 0.95;
        }

        /* ===== ADMIN PANEL ===== */
        .admin-wrapper {
            display: flex;
            min-height: calc(100vh - 73px);
            background: var(--charcoal);
        }

        .admin-sidebar {
            width: 260px;
            min-width: 260px;
            background: var(--charcoal-dark);
            border-right: 1px solid rgba(212,175,55,0.12);
            padding: 2rem 0;
        }

        .sidebar-section-label {
            font-size: 0.6875rem;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: #9A9080;
            padding: 0 1.5rem;
            margin: 1.75rem 0 0.75rem;
            font-weight: 700;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0.75rem 1.5rem;
            color: rgba(249,246,241,0.7);
            font-size: 0.9375rem;
            text-decoration: none;
            border-left: 3px solid transparent;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .sidebar-link:hover {
            color: var(--gold-light);
            background: rgba(212,175,55,0.08);
            border-left-color: rgba(212,175,55,0.4);
        }

        .sidebar-link.active {
            color: var(--gold);
            background: rgba(212,175,55,0.12);
            border-left-color: var(--gold);
            font-weight: 600;
        }

        .sidebar-link i { font-size: 1.125rem; width: 20px; }

        .admin-main {
            flex: 1;
            padding: 2.5rem;
            overflow-y: auto;
            background: var(--charcoal);
        }

        .admin-page-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            color: var(--warm-white);
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .admin-page-subtitle {
            font-size: 0.9375rem;
            color: var(--warm-gray);
            margin-bottom: 2.5rem;
        }

        /* ===== STAT CARDS ===== */
        .stat-card {
            background: var(--warm-white);
            border: none;
            border-radius: 16px;
            padding: 1.75rem 2rem;
            display: flex;
            align-items: center;
            gap: 1.5rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 2px 12px rgba(0,0,0,0.1);
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 28px rgba(0,0,0,0.2);
        }

        .stat-icon {
            width: 64px;
            height: 64px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(0,0,0,0.12);
        }

        .stat-icon-gold { background: linear-gradient(135deg, #FFF4D6, #FFEAA7); color: var(--gold-dark); }
        .stat-icon-green { background: linear-gradient(135deg, #E8F8F0, #D5F4E6); color: #229954; }
        .stat-icon-blue { background: linear-gradient(135deg, #EBF5FB, #D6EAF8); color: #2874A6; }
        .stat-icon-purple { background: linear-gradient(135deg, #F4ECF7, #EBDEF0); color: #7D3C98; }
        .stat-icon-red { background: linear-gradient(135deg, #FCE8EC, #F9D7DC); color: var(--imperial-red); }
        .stat-icon-teal { background: linear-gradient(135deg, #E8F6F3, #D1F2EB); color: #138D75; }

        .stat-num {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--charcoal);
            line-height: 1;
        }

        .stat-label {
            font-size: 0.875rem;
            color: #6B6B6B;
            margin-top: 8px;
            font-weight: 600;
        }

        /* ===== TABLES ===== */
        .table-premium {
            color: var(--charcoal);
            border-color: rgba(0,0,0,0.08);
        }

        .table-premium thead th {
            background: #F5F1E9;
            color: #6B6B6B;
            font-size: 0.8125rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            border-color: rgba(0,0,0,0.08);
            padding: 1.125rem 1.5rem;
        }

        .table-premium tbody td {
            background: var(--warm-white);
            border-color: rgba(0,0,0,0.06);
            padding: 1.125rem 1.5rem;
            font-size: 1rem;
            vertical-align: middle;
            color: var(--charcoal);
        }

        .table-premium tbody tr:hover td {
            background: #FDFCFA;
        }

        /* ===== FORMS ===== */
        .form-premium .form-label {
            font-size: 0.875rem;
            font-weight: 700;
            color: var(--charcoal);
            margin-bottom: 0.625rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-premium .form-control,
        .form-premium .form-select {
            background: white;
            border: 1.5px solid rgba(0,0,0,0.15);
            color: var(--charcoal);
            border-radius: 10px;
            padding: 0.875rem 1.25rem;
            font-size: 1rem;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .form-premium .form-control:focus,
        .form-premium .form-select:focus {
            background: white;
            border-color: var(--gold);
            box-shadow: 0 0 0 4px rgba(212,175,55,0.15);
            color: var(--charcoal);
            outline: none;
        }

        .form-premium .form-control::placeholder { 
            color: rgba(0,0,0,0.4); 
        }

        /* ===== BADGES ===== */
        .badge-status-pending {
            background: #FFF4D6;
            border: 1px solid #F39C12;
            color: #D68910;
            font-size: 0.8125rem;
            font-weight: 700;
            padding: 6px 14px;
            border-radius: 50px;
            letter-spacing: 0.5px;
        }

        .badge-status-approved {
            background: #E8F8F0;
            border: 1px solid #2ECC71;
            color: #229954;
            font-size: 0.8125rem;
            font-weight: 700;
            padding: 6px 14px;
            border-radius: 50px;
            letter-spacing: 0.5px;
        }

        .badge-status-rejected {
            background: #FCE8EC;
            border: 1px solid var(--crimson);
            color: var(--imperial-red);
            font-size: 0.8125rem;
            font-weight: 700;
            padding: 6px 14px;
            border-radius: 50px;
            letter-spacing: 0.5px;
        }

        .badge-status-completed {
            background: #EBF5FB;
            border: 1px solid #3498DB;
            color: #2874A6;
            font-size: 0.8125rem;
            font-weight: 700;
            padding: 6px 14px;
            border-radius: 50px;
            letter-spacing: 0.5px;
        }

        /* ===== ALERTS ===== */
        .alert-premium {
            background: #E8F8F0;
            border: 1px solid #2ECC71;
            color: #229954;
            border-radius: 10px;
            padding: 1.125rem 1.5rem;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        /* ===== PANELS ===== */
        .panel {
            background: var(--warm-white);
            border: none;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 2px 16px rgba(0,0,0,0.12);
        }

        .panel-header {
            padding: 1.5rem 2rem;
            border-bottom: 1px solid rgba(0,0,0,0.08);
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #F5F1E9;
        }

        .panel-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.25rem;
            color: var(--charcoal);
            font-weight: 600;
        }

        .panel-body { padding: 2rem; }

        /* ===== FOOTER ===== */
        .footer-premium {
            background: var(--charcoal-dark);
            border-top: 1px solid rgba(212,175,55,0.15);
            padding: 3.5rem 0 2rem;
            margin-top: 6rem;
        }

        .footer-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.375rem;
            color: var(--gold);
            margin-bottom: 0.75rem;
            font-weight: 600;
        }

        .footer-desc { 
            font-size: 0.9375rem; 
            color: var(--warm-gray); 
            line-height: 1.7;
        }

        .footer-link {
            color: var(--warm-gray);
            text-decoration: none;
            font-size: 0.9375rem;
            transition: color 0.25s ease;
            display: block;
            margin-bottom: 0.625rem;
        }

        .footer-link:hover { 
            color: var(--gold-light); 
            padding-left: 4px;
        }

        .footer-bottom {
            border-top: 1px solid rgba(212,175,55,0.1);
            margin-top: 2.5rem;
            padding-top: 1.75rem;
            font-size: 0.875rem;
            color: var(--text-muted);
        }

        /* ===== MISC ===== */
        .divider-gold {
            border-top: 1px solid rgba(212,175,55,0.2);
            margin: 3rem 0;
        }

        section.py-premium { padding: 6rem 0; }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-up { animation: fadeUp 0.7s ease forwards; }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: var(--charcoal-dark); }
        ::-webkit-scrollbar-thumb { background: rgba(212,175,55,0.4); border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--gold); }

        /* Leaflet dark theme */
        .leaflet-container { background: #1a1a1a; }

        /* ===== RESPONSIVE ADJUSTMENTS ===== */
        @media (max-width: 768px) {
            body { font-size: 1rem; }
            h1 { font-size: 2rem; }
            h2 { font-size: 1.5rem; }
            
            .hero-section { min-height: 75vh; padding: 3rem 0; }
            .hero-title { font-size: 2rem; }
            .hero-subtitle { font-size: 1rem; }
            .hero-stats { flex-wrap: wrap; gap: 1.5rem; }
            
            .card-premium .card-img-top,
            .card-img-placeholder { height: 240px; }
            
            .card-premium .card-body { padding: 1.5rem; }
            .card-footer-meta { padding: 1rem 1.5rem; flex-direction: column; gap: 1rem; align-items: flex-start; }
            
            .btn-gold, .btn-outline-gold { padding: 0.875rem 2rem; font-size: 1rem; }
            
            .stat-card { flex-direction: column; text-align: center; padding: 1.5rem; }
            .stat-icon { margin-bottom: 1rem; }
            
            .guide-card { padding: 1.75rem; }
            .guide-avatar { width: 80px; height: 80px; font-size: 1.75rem; }
            
            section.py-premium { padding: 4rem 0; }
            
            .admin-wrapper { flex-direction: column; }
            .admin-sidebar { width: 100%; border-right: none; border-bottom: 1px solid rgba(212,175,55,0.12); }
            .admin-main { padding: 1.5rem; }
        }

        @media (max-width: 576px) {
            .navbar-premium .d-flex { flex-wrap: wrap; }
            .nav-link-custom { padding: 0.5rem 0.75rem !important; font-size: 0.875rem; }
        }
    </style>

    @yield('styles')
</head>
<body>

{{-- NAVBAR --}}
<nav class="navbar-premium">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between w-100">
            <a class="navbar-brand-custom" href="{{ route('home') }}">
                <div class="brand-icon">
                    <i class="bi bi-compass-fill" style="color: var(--dark);"></i>
                </div>
                Gondar Tourism
            </a>

            <div class="d-none d-md-flex align-items-center gap-1">
                <a href="{{ route('home') }}" class="nav-link-custom {{ request()->routeIs('home') ? 'active' : '' }}">
                    <i class="bi bi-house me-1"></i>Home
                </a>
                <a href="{{ route('attractions.index') }}" class="nav-link-custom {{ request()->routeIs('attractions*') ? 'active' : '' }}">
                    <i class="bi bi-building me-1"></i>Attractions
                </a>
                <a href="{{ route('hotels.index') }}" class="nav-link-custom {{ request()->routeIs('hotels*') ? 'active' : '' }}">
                    <i class="bi bi-house-door me-1"></i>Hotels
                </a>
                <a href="{{ route('guides.index') }}" class="nav-link-custom {{ request()->routeIs('guides*') ? 'active' : '' }}">
                    <i class="bi bi-person-badge me-1"></i>Guides
                </a>
                <a href="{{ route('events.index') }}" class="nav-link-custom {{ request()->routeIs('events*') ? 'active' : '' }}">
                    <i class="bi bi-calendar-event me-1"></i>Events
                </a>
                <a href="{{ route('contact') }}" class="nav-link-custom {{ request()->routeIs('contact') ? 'active' : '' }}">
                    <i class="bi bi-chat-dots me-1"></i>Contact
                </a>
            </div>

            <div class="d-flex align-items-center gap-2">
                @auth
                    @if(auth()->user()->isAdmin() || auth()->user()->isTourismOfficer())
                        <a href="{{ route('admin.dashboard') }}" class="btn-nav-admin">
                            <i class="bi bi-grid-fill me-1"></i>Admin Panel
                        </a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn-nav-login">
                            <i class="bi bi-box-arrow-right me-1"></i>Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn-nav-login">Login</a>
                    <a href="{{ route('register') }}" class="btn-gold" style="padding: 0.4rem 1.2rem; font-size: 0.875rem;">Register</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

{{-- FLASH MESSAGE --}}
@if(session('success'))
<div class="container mt-3">
    <div class="alert-premium d-flex align-items-center gap-2">
        <i class="bi bi-check-circle-fill"></i>
        {{ session('success') }}
    </div>
</div>
@endif

@if(session('error'))
<div class="container mt-3">
    <div class="alert-premium" style="background: rgba(231,76,60,0.08); border-color: rgba(231,76,60,0.25); color: #E74C3C;">
        <i class="bi bi-exclamation-circle-fill me-2"></i>{{ session('error') }}
    </div>
</div>
@endif

@yield('content')

{{-- FOOTER --}}
@unless(request()->is('admin/*'))
<footer class="footer-premium">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="footer-brand"><i class="bi bi-compass-fill me-2"></i>Gondar Tourism</div>
                <p class="footer-desc mt-2">Smart Tourism Information and Tour Guide Management System for Gondar City, Ethiopia.</p>
            </div>
            <div class="col-md-2">
                <div class="sidebar-section-label mb-2">Explore</div>
                <a href="{{ route('attractions.index') }}" class="footer-link">Attractions</a>
                <a href="{{ route('hotels.index') }}" class="footer-link">Hotels & Stays</a>
                <a href="{{ route('guides.index') }}" class="footer-link">Tour Guides</a>
                <a href="{{ route('events.index') }}" class="footer-link">Events</a>
            </div>
            <div class="col-md-3">
                <div class="sidebar-section-label mb-2">Guides</div>
                <a href="{{ route('guides.create') }}" class="footer-link">Register as Guide</a>
                <a href="{{ route('contact') }}" class="footer-link">Contact & Feedback</a>
                <a href="{{ route('login') }}" class="footer-link">Admin Login</a>
            </div>
            <div class="col-md-3">
                <div class="sidebar-section-label mb-2">Contact</div>
                <p class="footer-link"><i class="bi bi-geo-alt me-2"></i>Gondar City, Amhara, Ethiopia</p>
                <p class="footer-link"><i class="bi bi-telephone me-2"></i>+251 58 111 0000</p>
                <p class="footer-link"><i class="bi bi-envelope me-2"></i>info@gondar.gov.et</p>
            </div>
        </div>
        <div class="footer-bottom d-flex justify-content-between align-items-center">
            <span>&copy; {{ date('Y') }} Gondar City Tourism Bureau. All rights reserved.</span>
            <span>Smart Tourism System &mdash; Thesis Project</span>
        </div>
    </div>
</footer>
@endunless

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
@yield('scripts')
</body>
</html>
