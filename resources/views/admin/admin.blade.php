<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        #sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            padding-top: 20px;
            flex-shrink: 0;
        }
        #sidebar .sidebar-heading {
            padding: 10px 20px;
            font-size: 1.2rem;
            text-align: center;
            margin-bottom: 20px;
            color: #fff;
        }
        #sidebar .list-group-item {
            background-color: #343a40;
            color: white;
            border: none;
            padding: 10px 20px;
        }
        #sidebar .list-group-item:hover {
            background-color: #495057;
            color: #fff;
        }
        #sidebar .list-group-item.active {
            background-color: #0d6efd;
            color: #fff;
        }
        #content-wrapper {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        #topbar {
            background-color: #ffffff;
            border-bottom: 1px solid #dee2e6;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        #main-content {
            padding: 20px;
            flex-grow: 1;
        }
    </style>
</head>
<body>
    <div id="sidebar">
        <div class="sidebar-heading">AliyevStudio Admin</div>
        <div class="list-group list-group-flush">
            <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
            <a href="{{ route('admin.blogs.create') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.blogs.create') ? 'active' : '' }}">
                <i class="fas fa-plus-circle me-2"></i> Yeni Blog Əlavə Et
            </a>
            <a href="{{ route('admin.subscribers.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.subscribers.index') ? 'active' : '' }}">
                <i class="fas fa-users me-2"></i> Abunəçilər
            </a>
            {{-- Digər admin menuları buraya əlavə edilə bilər --}}
        </div>
    </div>

    <div id="content-wrapper">
        <div id="topbar">
            <h4 class="mb-0">@yield('title', 'Dashboard')</h4>
            <div>
                {{-- Admin istifadəçi məlumatı və ya çıxış düyməsi buraya əlavə edilə bilər --}}
                <span class="me-3">Admin İstifadəçi</span>
                <a href="#" class="btn btn-outline-secondary btn-sm">Çıxış</a>
            </div>
        </div>
        <div id="main-content">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    @stack('scripts')
</body>
</html>