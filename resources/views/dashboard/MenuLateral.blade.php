<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Inicio</div>
                <a class="nav-link" href="/dashboard">
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
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                   aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i style="color: #3196cf !important" class="fas fa-folder"></i>
                    </div>
                    Resportes
                    <div class="sb-sidenav-collapse-arrow"><i style="color: #3196cf !important"
                                                              class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#generarcierre">
                            <div class="sb-nav-link-icon"><i style="color: #3196cf !important"
                                    class="fas fa-chart-column"></i></div>
                            Ingresos mensuales/canton
                        </a>
                        <a class="nav-link" href="inicioperiodo.jsp">
                            <div class="sb-nav-link-icon"><i style="color: #3196cf !important"
                                    class="fas fa-chart-pie"></i></div>
                            Consumo promedio de agua/Cantón
                        </a>
                    </nav>
                </div>
               
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Bienvenido</div>
            {{ session()->has('usuario') ? session()->get('usuario')->persona->nombre . ' ' . session()->get('usuario')->persona->Apellido : 'unknown' }}
        </div>
    </nav>
</div>
