<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Counter POS customer and user account directory.">
    <title>@yield('title', 'Home') | Counter POS</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="site-header">
        <div class="container nav-wrap">
            <a class="brand" href="{{ route('home') }}"><span class="brand-mark" aria-hidden="true">c.</span> counter<span class="brand-light">pos</span></a>
            <nav aria-label="Main navigation">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}" @if(request()->routeIs('home')) aria-current="page" @endif>Home</a>
                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}" @if(request()->routeIs('about')) aria-current="page" @endif>About</a>
                <a href="{{ route('customers') }}" class="{{ request()->routeIs('customers') ? 'active' : '' }}" @if(request()->routeIs('customers')) aria-current="page" @endif>Customers</a>
                <a href="{{ route('users') }}" class="{{ request()->routeIs('users') ? 'active' : '' }}" @if(request()->routeIs('users')) aria-current="page" @endif>Users</a>
            </nav>
            <span class="header-label">ACCOUNT WORKSPACE</span>
        </div>
    </header>
    <main class="container main-content" id="main-content">
        @yield('content')
    </main>
    <footer class="site-footer">
        <div class="container footer-wrap"><span>&copy; {{ date('Y') }} Counter POS</span><span>IT0049 &middot; Laravel POS Foundations</span></div>
    </footer>
</body>
</html>
