<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'GameVault')</title>

    @vite(['resources/css/style.css', 'resources/js/style.js'])
</head>

<body class="{{ request()->is('/') || request()->is('login') ? 'login-page' : 'app-page' }}">

    @if (!request()->is('/') && !request()->is('login'))
        @include('components.navbar')
    @endif

    <main>
        @yield('content')
    </main>

    @if (!request()->is('/') && !request()->is('login'))
        <x-footer />
    @endif

    @stack('scripts')

</body>
</html>
