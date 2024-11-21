<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark toggled" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-car"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item{{ request()->is('dashboard') ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tablero</span></a>
    </li>

    @can('create', App\User::class)
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Admins -->
    <li class="nav-item {{ request()->is('admins*') ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('admins.index') }}">
            <i class="fas fa-user-tag"></i>
            <span>Menú de Admin</span></a>
    </li>
    @endcan

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Customers -->
    <li class="nav-item{{ request()->is('customers*') ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('customers.index') }}">
            <i class="fas fa-fw fa-user-alt"></i>
            <span>Menú de Clientes</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Cars -->
    <li class="nav-item{{ request()->is('cars*') ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('cars.index', ['status' => 'AVAILABLE']) }}">
            <i class="fas fa-fw fa-car-alt"></i>
            <span>Menú de Autos</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Transactions -->
    <li class="nav-item{{ request()->is('transactions*') ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('transactions.index') }}">
            <i class="fas fa-cash-register"></i>
            <span>Menú de Transacciones</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Logout -->
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt"></i>
            <span>Cerrar sesión</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
