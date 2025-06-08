@php
    function isActive($patterns) {
        foreach ((array) $patterns as $pattern) {
            if (request()->routeIs($pattern) || request()->routeIs($pattern . '.*')) {
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

    <li class="nav-item">
        <a href="{{ route('proceso.index') }}" class="nav-link {{ isActive('proceso') }}">Proceso</a>
    </li>

    <li class="nav-item">
        <a href="{{ route('producto.view') }}" class="nav-link {{ isActive('producto') }}">Productos</a>
    </li>

    <li class="nav-item">
        <a href="{{ route('simulador.selector') }}" class="nav-link {{ isActive('simulador.selector') }}">Simulador 2</a>
    </li>

    @role('admin')
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ isActive('admin.dashboard') }}">Admin</a>
        </li>
    @endrole
</ul>
