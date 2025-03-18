<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">CONTROLES</div>

                             <a class="nav-link" href="#" onclick="siembras_agronomo();">
                                <div class="sb-nav-link-icon"><i class="fas fa-seedling"></i></div>
                               Siembras
                            </a>

                       <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                                Orden de Trabajo
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" onclick="crear_orden_de_trabajo();" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-pencil"></i></div>
                                Emitir Orden
                                 </a>
                                    <a class="nav-link" href="#" onclick="ondenes_en_espera();">                                        
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-hourglass-start"></i></div>
                                    Ordenes en Espera
                                </a>
                                    <a class="nav-link" href="#" onclick="ordenes_aprobadas();" >
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-flag-checkered"></i></i></div>
                                    Ordenes Aprobadas
                                </a>

                                </nav>
                            </div>

                   <!--
                          <a class="nav-link" href="#" onclick="registro_y_control_de_siembra();">
                                <div class="sb-nav-link-icon"><i class="fas fa-industry"></i></div>
                               Registro de Siembra
                            </a>
                            <a class="nav-link" href="#" onclick="siembras();">
                                <div class="sb-nav-link-icon"><i class="fas fa-seedling"></i></div>
                               Siembras
                            </a>



                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                Listas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" onclick="admin_lista_de_registrados();" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Usuarios
                                 </a>
                                    <a class="nav-link" href="#" onclick="lista_de_proveedores();">                                        
                                    <div class="sb-nav-link-icon"><i class="fas fa-cart-shopping"></i></div>
                                    Proveedores
                                </a>
                                    <a class="nav-link" href="#" onclick="lista_de_productos();" >
                                <div class="sb-nav-link-icon"><i class="fas fa-tags"></i></div>
                                    Productos
                                </a>

                                </nav>
                            </div>


                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-list-ul"></i></div>
                                Registros
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" onclick="pag_registro();" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-plus"></i></div>
                                Usuarios
                                 </a>
                                    <a class="nav-link" href="#" onclick="registro_proveedor();">
                                        <div class="sb-nav-link-icon"><i class="fas fa-cart-plus"></i></div>
                                    Proveedores
                                </a>
                                    <a class="nav-link" href="#" onclick="registro_producto();">
                                        <div class="sb-nav-link-icon"><i class="fas fa-tag"></i></div>
                                    Productos
                                </a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                Desplegables
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" onclick="desplegables_tipos_de_cultivo();" href="#">
                                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                    Tipos de Cultivo
                                </a>
                                 <a class="nav-link" onclick="desplegables_tipos_de_siembra();" href="#">
                                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                    Tipos de Siembra
                                </a>
                                <a class="nav-link" onclick="desplegables_ubicaciones();" href="#">
                                    <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                    Ubicaciones
                                </a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts4" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                Reportes
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts4" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                
                                </nav>
                            </div>
-->

                          <!--
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                        -->
                        <!--
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>

                        -->
                        </div>
                    </div>
                </nav>
            </div>