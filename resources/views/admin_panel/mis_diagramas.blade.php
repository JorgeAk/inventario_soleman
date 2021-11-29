<!DOCTYPE html>
<html lang="en">

@include('include.panel_head')

<body class="skin-red fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Soleman admin</p>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="{{asset('res/assets/images/logo-icon.png')}}" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="{{asset('res/assets/images/logo-light-icon.png')}}" alt="homepage" class="text-center" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                            <!-- dark Logo text -->
                            <img src="{{asset('res/assets/images/logo-text.png')}}" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="{{asset('res/assets/images/logo-light-text.png')}}" class="light-logo" alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-sm-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item">
                            <form class="app-search d-none d-md-block d-lg-block">
                                <input type="text" class="form-control" placeholder="Buscar">
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">


                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- User Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('res/assets/images/users/1.jpg')}}" alt="user" class=""> <span class="hidden-md-down">{{ Auth::user()->name }} &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <!-- text-->
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> Mi Perfil</a>
                                <!-- text-->
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-settings"></i> Configuración</a>
                                <!-- text-->
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Salir</a>
                                <!-- text-->
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End User Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"></a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img src="{{asset('res/assets/images/users/1.jpg')}}" alt="user-img" class="img-circle"><span class="hide-menu">{{ Auth::user()->name }}</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="javascript:void(0)"><i class="ti-user"></i> Mi Perfil</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-settings"></i> Configuración</a></li>
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Salir</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                        <li class="nav-small-cap">--- INVENTARIO</li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Productos <span class="badge badge-pill badge-cyan ml-auto">3</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="index.html">Todos los Productos </a></li>
                                <li><a href="index2.html">Ingresar</a></li>
                                <li><a href="index3.html">Categorias</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-truck"></i><span class="hide-menu">Traslados <span class="badge badge-pill badge-cyan ml-auto">2</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="app-calendar.html">Generar Traslado</a></li>
                                <li><a href="app-chat.html">Generar Reportes</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-map-alt"></i><span class="hide-menu">Sucursales <span class="badge badge-pill badge-cyan ml-auto">2</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="app-email.html">Todas las sucursales</a></li>
                                <li><a href="app-chat.html">Generar Reportes</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-bar-chart"></i><span class="hide-menu">Diagramas <span class="badge badge-pill badge-cyan ml-auto">2</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('diagramas') }}">Generar</a></li>
                                <li><a href="{{route('mis_diagramas')}}">Mis diagramas</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-settings"></i><span class="hide-menu">Configuración <span class="badge badge-pill badge-cyan ml-auto">2</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="app-email.html">Usuarios</a></li>
                                <li><a href="app-email-detail.html">Mi perfil</a></li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Diagrama de Gantt</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Diagramas</a></li>
                                <li class="breadcrumb-item active">Generar</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Formulario -->
                <!-- ============================================================== -->

                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-header bg-danger">
                                <h4 class="m-b-0 text-white">Mis diagramas</h4>
                            </div>
                            <div class="card-body">
                                
                                <h6 class="card-subtitle">Exportar tabla : Copiar, CSV, Excel, PDF & Imprimir</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Descripción</th>
                                                <th>Duración</th>
                                                <th>Periodo</th>
                                                <th>creacion</th>
                                                <th>Se modifico</th>
                                                <th>Acciónes</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Descripción</th>
                                                <th>Duración</th>
                                                <th>Periodo</th>
                                                <th>creacion</th>
                                                <th>Se modifico</th>
                                                <th>Acciónes</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach($diagramas as $diag)
                                            <tr>
                                                <td>{{$diag->nombre}}</td>
                                                <td>{{$diag->descripcion}}</td>
                                                <td>{{$diag->duracion}}</td>
                                                <td>@foreach($periodo as $per)@if($diag->id_periodo == $per->id){{$per->nombre}} @endif @endforeach</td>
                                                <td>{{$diag->created_at}}</td>
                                                <td>{{$diag->updated_at}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-circle waves-light"><a class=""  href="{{route('mis_diagramas/diagrama',$diag->id)}}" style="color: #f9f9f9;" ><i class="fa fa-eye" title="Ver" data-toggle="tooltip"></i></a></button>
                                                    <button type="button" class="btn btn-warning btn-circle waves-light"><i class="fa fa-pencil-square-o" title="Modificar" data-toggle="tooltip"></i></button>
                                                    <button type="button" class="btn btn-danger btn-circle  waves-light"><i class="fa fa-trash-o" title="Eliminar" data-toggle="tooltip"></i></button>
                                                </td>
                                            </tr>

                                            @endforeach



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- Row -->

                <!-- ============================================================== -->
                <!-- End Formulario -->
                <!-- ============================================================== -->

            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            © 2021 Soleman
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    @include('include.panel_footer')
</body>

</html>