
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Inicio</div>
                <a class="nav-link" href = "/dashboard" >
                    <div class="sb-nav-link-icon"><i class="fas fa-home" style="color: #3196cf"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Menu</div>
                <a class="nav-link" href="/medidor">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt" style="color: #3196cf"></i></div>
                    Medidores
                </a>
                <a class="nav-link" href="/persona">
                    <div class="sb-nav-link-icon"><i class="fas fa-users" style="color: #3196cf"></i></div>
                    Clientes
                </a>
                <a class="nav-link" href="/empleado">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-user-tie" style="color: #3196cf"></i></div>
                    Empleados
                </a>
                <a class="nav-link" href="/canton">
                    <div class="sb-nav-link-icon"><i class="fas fa-location-dot" style="color: #3196cf"></i></div>
                    Cantones
                </a>
                <a class="nav-link" href="/consumo">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area" style="color: #3196cf"></i></div>
                    Consumos
                </a>
                <a class="nav-link" href="">
                            <i class="fas fa-folder-open fa-fw me-3" style="color: #3196cf"></i>Reportes<i class="fa-solid fa-angle-down fa-sm ms-2" style="color: #3196cf"></i>
                        </a>
                        <ul class="submenu collapse bg-dark text-light">
                            <li style="list-style: none;"><a class="nav-link mt-2" href=""></a></li>
                            <li style="list-style: none;"><a class="nav-link mt-2" href=""></a></li>
                        </ul>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Bienvenido</div>
            {{session()->has('usuario')?session()->get('usuario')->persona->nombre.' '.session()->get('usuario')->persona->Apellido:'unknown'}}
        </div>
    </nav>
</div>