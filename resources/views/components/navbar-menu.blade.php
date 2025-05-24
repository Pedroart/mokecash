@php
    function isActive($patterns) {
        foreach ((array) $patterns as $pattern) {
            if (request()->routeIs($pattern) || request()->is($pattern . '/*')) {
                return 'text-white';
            }
        }
        return 'text-secondary fw-bold';
    }
@endphp

<ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link {{ isActive('home') }}">Home</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('simulador') }}" class="nav-link {{ isActive('simulador') }}">Simulador</a>
    </li>
</ul>
