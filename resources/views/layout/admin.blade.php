<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title Page-->
    <title>@yield('titulo')</title>

    <!-- Fontfaces CSS-->
    <link href="{{ url('/') }}/css/font-face.css" rel="stylesheet" media="all">
    <link href="{{ url('/') }}/css/personal.css" rel="stylesheet" media="all">
    <link href="{{ url('/') }}/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="{{ url('/') }}/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="{{ url('/') }}/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="{{ url('/') }}/css/select2.css" rel="stylesheet"/>


    <!-- Bootstrap CSS-->
    <link href="{{ url('/') }}/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ url('/') }}/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="{{ url('/') }}/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="{{ url('/') }}/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="{{ url('/') }}/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="{{ url('/') }}/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="{{ url('/') }}/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="{{ url('/') }}/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ url('/') }}/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
<?php $role = array_column(json_decode($_COOKIE['roles']), 'id')?>
<?php $nombreRoles = array_column(json_decode($_COOKIE['roles']), 'nombre')?>

    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="{{ Route('dashboard') }}">
                            <img src="{{ url('/') }}/images/logoSena.png" width="50" alt="SENA" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="index.html">Dashboard 1</a>
                                </li>
                                <li>
                                    <a href="index2.html">Dashboard 2</a>
                                </li>
                                <li>
                                    <a href="index3.html">Dashboard 3</a>
                                </li>
                                <li>
                                    <a href="index4.html">Dashboard 4</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="chart.html">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li>
                            <a href="table.html">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li>
                            <a href="form.html">
                                <i class="far fa-check-square"></i>Forms</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href=" {{ Route('dashboard') }}">
                    <img src="{{ url('/') }}/images/logoSena.png" width="80" alt="SENA" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                      @if(in_array(1, $role))
                        <li class="has-sub" id="btnGestionApp">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-cogs"></i>Gestion de App</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li id="btnCrearUsuario">
                                    <a href="{{ Route('crearUsuario') }}">Crear Usuarios</a>
                                </li>
                                <li id="btnActualizarUsuario">
                                    <a href="{{ Route('modificarUsuario') }}">Modificar Usuarios</a>
                                </li>
                                <li id="btnCrearSectorEconomico">
                                    <a href="{{ Route('areas') }}">Sectores Económicos</a>
                                </li>
                                <li id="btnProgramaFormacion">
                                    <a href="{{ Route('programaFormacion') }}">Programas de Formación</a>
                                </li>
                                <li id="btnListarPrograma">
                                    <a href="{{ Route('listarPrograma') }}">Listar Programa F.</a>
                                </li>
                                <li id="btnProyecto">
                                    <a href="{{ Route('proyecto') }}">Proyecto</a>
                                </li>
                                <li id="btnListarProyecto">
                                    <a href="{{ Route('listarProyecto') }}">Listar Proyecto</a>
                                </li>
                                <li id="btnFicha">
                                    <a href="{{ Route('ficha') }}">Fichas</a>
                                </li>
                                <li>
                                    <a href="{{ Route('codigoUNSPSC') }}">Códigos UNSPSC</a>
                                </li>
                                <li>
                                    <a href="{{ Route('buscarCodigoUNSPSC') }}">Buscar Códigos UNSPSC</a>
                                </li>
                                <li>
                                    <a href="{{ Route('aprobarCodigoUNSPSC') }}">Aprobar Códigos UNSPSC</a>
                                </li>
                                <li id="btnProducto">
                                    <a href="{{ Route('crearProducto') }}">Crear Productos</a>
                                </li>
                                <li>
                                    <a href="{{ Route('buscarProducto') }}">Buscar Productos</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if(in_array(7, $role))
                                <li class="active has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-book"></i>Gestion Programa</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                 <li>
                                    <a href="{{ Route('programaFormacion') }}">Programas de Formación</a>
                                </li>
                                <li>
                                    <a href="{{ Route('listarPrograma') }}">Listar Programa F.</a>
                                </li>
                            </ul>
                            <li class="active has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-tasks"></i>Gestion Proyecto</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ Route('proyecto') }}">Proyecto</a>
                                </li>
                                <li>
                                    <a href="{{ Route('listarProyecto') }}">Listar Proyecto</a>
                                </li>
                            </ul>
                                <li>
                                    <a href="{{ Route('ficha') }}"><i class="fab fa-dochub"></i>Fichas</a>
                                </li>
                                <li>
                                    <a href="{{ Route('codigoUNSPSC') }}">Códigos UNSPSC</a>
                                </li>
                                
                                <li>
                                    <a href="{{ Route('aprobarCodigoUNSPSC') }}">Aprobar Códigos UNSPSC</a>
                                </li>
                                
                            <li>
                                 <a href="{{ Route('crearProducto') }}">
                                    <i class="fas fa-plus-circle"></i>
                                    Crear Productos</a>
                            </li>
                        @endif
                        @if(in_array(2, $role))
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="far fa-check-square"></i>Solicitudes</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ Route('crearSolicitud') }}">Crear Solicitud</a>
                                </li>
                                <li>
                                    <a href="{{ Route('listarSolicitud') }}">Listar Solicitudes</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if(in_array(3, $role) || in_array(4, $role) || in_array(5, $role) || in_array(6, $role))
                        <li>
                            <a href="{{ Route('aprobarSolicitud') }}">
                                <i class="fa fa-check"></i>Revisar Solicitudes</a>
                        </li>
                         <li>
                            <a href="{{ Route('HistorialSolicitud') }}">
                                <i class="fa fa-history"></i>Historial Solicitudes</a>
                        </li>
                        @endif
                        @if(in_array(3, $role))
                        <li>
                            <a href="{{ Route('ingresoAlmacen') }}">
                                <i class="fas fa-sign-in-alt"></i>Ingreso a Almacen</a>
                        </li>
                         <li>
                            <a href="{{ Route('salidaAlmacen') }}">
                                <i class="fas fa-sign-out-alt"></i>Salidas de Almancen</a>
                        </li>
                        @endif
                        <li>
                            <a href="{{ Route('listarSolicitud') }}">
                                <i class="fas fa-table"></i>Listar Solicitudes</a>
                        </li>
                        <li>
                          <a href="{{ Route('buscarCodigoUNSPSC') }}">
                            <i class="fa fa-search"></i>
                            Buscar Códigos</a>
                        </li>
                        <li>
                            <a href="{{ Route('solicitarCodigoUNSPSC') }}">
                                <i class="fa fa-barcode"></i>Solicitar Códigos</a>
                        </li>
                        <li>
                            <a href="{{ Route('buscarProducto') }}">
                              <i class="fa fa-list-alt"></i>Buscar Productos</a>
                        </li>
                        @if(in_array(1, $role) || in_array(6, $role))
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-file-excel-o"></i>Descargar Reporte</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ Route('index') }}">Consolidado de Pedido</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="header-button">
                              <p style="padding: 0px 30px 0px"> Aplicación de Compras </p>
                                
                                <div class="account-wrap chart-info__right">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="{{ url('/')}}/images/icon/avatar-01.jpg" alt="Usuario" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">  {{ Auth::user()->nombre_usuario }}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="{{ url('/')}}/images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">{{ Auth::user()->nombre_usuario }}</a>
                                                    </h5>
                                                    <span class="email">  {{ Auth::user()->correo }}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                              <div class="account-dropdown__footer">
                                                <h6 class="name">Roles Asignados:</h6>
                                              @foreach($nombreRoles as $llaveR)
                                               <p style="padding: 0px 30px 0px">{{ $llaveR->rol }}</p>
                                              @endforeach
                                              </div>
                                            <div class="account-dropdown__footer">
                                                <a href="{{ Route('salir') }}">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--w1830">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">@yield('titulo_pagina')</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            @yield('cuerpo')
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Servicio Nacional de Aprendizaje - Regional Risaralda</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{ url('/') }}/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="{{ url('/') }}/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="{{ url('/') }}/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="{{ url('/') }}/vendor/slick/slick.min.js">
    </script>
    <script src="{{ url('/') }}/vendor/wow/wow.min.js"></script>
    <script src="{{ url('/') }}/vendor/animsition/animsition.min.js"></script>
    <script src="{{ url('/') }}/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="{{ url('/') }}/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="{{ url('/') }}/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="{{ url('/') }}/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="{{ url('/') }}/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ url('/') }}/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="{{ url('/') }}/vendor/select2/select2.min.js">
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

    <!-- Main JS-->
    <script src="{{ url('/') }}/js/main.js"></script>
    @yield('jsfoot')

</body>

</html>
<!-- end document-->
