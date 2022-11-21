<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Food Delivery</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider mb-2">
    {{--  <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>  --}}

    <!-- Heading -->
    <div class="sidebar-heading">
        Configuración
    </div>



    <li class="nav-item {{Request::is('users*') ? 'active' : ''}}" >
        <a class="nav-link" href="{{ route('users.index') }}">
            <i class="fas fa-users-cog"></i>
            <span>Usuarios</span></a>
    <!-- Nav Item - tipo usuarios-->
    <li class="nav-item {{Request::is('tipo_usuario*') ? 'active' : ''}}" >
        <a class="nav-link" href="{{ route('tipo_usuario.index') }}">
            <i class="fas fa-users-cog"></i>
            <span>Tipo de Usuario</span></a>
    </li>

    <!-- Nav Item - Negocios-->
    <li class="nav-item {{Request::is('negocio*') ? 'active' : ''}}" >
        <a class="nav-link" href="{{ route('negocio.index') }}">
            <i class="fas fa-building"></i>
            <span>Negocios</span></a>
    </li>
    <!-- Nav Item - productos-->
    <li class="nav-item {{Request::is('producto*') ? 'active' : ''}}" >
        <a class="nav-link" href="{{ route('productos.index') }}">
            <i class="fas fa-utensils"></i>
            <span>Productos</span></a>
    </li>

    </li>
    <!-- Nav Item - Categoria -->
    <li class="nav-item {{Request::is('categoria*') ? 'active' : ''}}" >
        <a class="nav-link" href="{{ route('categoria.index') }}">
            <i class="fas fa-tags"></i>
            <span>Categorías</span></a>

    </li>
    <!-- Nav Item - pedido-->
    {{--  <li class="nav-item {{Request::is('pedido*') ? 'active' : ''}}" >
        <a class="nav-link" href="{{ route('pedidos.index') }}">
            <i class="fa-solid fa-cart-plus"></i>
            <span>Pedido</span></a>
    </li>  --}}
    {{--  <li class="nav-item {{Request::is('horario*') ? 'active' : ''}}" >
        <a class="nav-link" href="{{ route('horarios.index') }}">
            <i class="fas fa-users-cog"></i>
            <span>Horario</span></a>
    </li>  --}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Ejemplo de submenu -->
    {{--  <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li>  --}}
</ul>
