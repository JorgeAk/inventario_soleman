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
                    <a class="navbar-brand" href="{{route('admin')}}">
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
                                <a href="{{route('admin/perfil')}}" class="dropdown-item"><i class="ti-user"></i> Mi Perfil</a>
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
                                <li><a href="{{route('admin/perfil')}}"><i class="ti-user"></i> Mi Perfil</a></li>
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
                                <li><a href="{{route('admin/productos')}}">Todos los Productos </a></li>
                                <li><a href="{{route('admin/productos/categorias')}}">Categorias</a></li>
                                <li><a href="{{route('admin/productos/Sub_categorias')}}">Sub Categorias</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-truck"></i><span class="hide-menu">Traslados <span class="badge badge-pill badge-cyan ml-auto">2</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('admin/traslados')}}">Generar Traslado</a></li>
                                <li><a href="app-chat.html">Generar Reportes</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-map-alt"></i><span class="hide-menu">Sucursales <span class="badge badge-pill badge-cyan ml-auto">2</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('admin/usuarios/ubicaciones')}}">Todas las sucursales</a></li>
                                <li><a href="{{route('admin/inventario/ingreso')}}">Ingreso</a></li>
                                <li><a href="{{route('admin/usuarios/ubicaciones')}}">Baja</a></li>
                                <li><a href="{{route('admin/reportes')}}">Generar Reportes</a></li>
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
                                <li><a href="{{route('admin/usuarios/control')}}">Usuarios</a></li>
                                <li><a href="{{route('admin/perfil')}}">Mi perfil</a></li>
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
                        <h4 class="text-themecolor">Home</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                                <li class="breadcrumb-item active">Inicio</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Info box -->
                <!-- ============================================================== -->
                <div class="card-group">
                    <div class="card" style="width: 20rem;">
                        <img class="card-img-top" src="https://blog.bind.com.mx/hubfs/2.0/Modulos/Bind-ERP-Modulos_Reportes-tiempo-real-existencias.png" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Existencias</h4>
                            <p class="card-text">Reporte de productos en las sucursales.</p>
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#existencias-modal">Generar</a>
                        </div>
                    </div>
                    <div class="card" style="width: 20rem;">
                        <img class="card-img-top" src="https://blog.bind.com.mx/hubfs/2.0/Modulos/Bind-ERP-Modulos_Reportes-tiempo-real-existencias.png" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Entradas de productos</h4>
                            <p class="card-text">Reporte de nuevos productos añadidos.</p>
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#entradas-modal">Generar</a>
                        </div>
                    </div>
                    <div class="card" style="width: 20rem;">
                        <img class="card-img-top" src="https://blog.bind.com.mx/hubfs/2.0/Modulos/Bind-ERP-Modulos_Reportes-tiempo-real-existencias.png" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Salida de productos</h4>
                            <p class="card-text">Reporte de produtos trasladados.</p>
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#salidas-modal">Generar</a>
                        </div>
                    </div>
                    <div class="card" style="width: 20rem;">
                        <img class="card-img-top" src="https://blog.bind.com.mx/hubfs/2.0/Modulos/Bind-ERP-Modulos_Reportes-tiempo-real-existencias.png" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Historico de productos por Ubicacion</h4>
                            <p class="card-text">Reporte de produtos trasladados.</p>
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#his-prod-modal">Generar</a>
                        </div>
                    </div>
                </div>
                <div class="card-group">

                </div>
                <!-- ============================================================== -->
                <!-- End Info box -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Over Visitor, Our income , slaes different and  sales prediction -->
                <!-- ============================================================== -->

                <!-- Existencias Modal -->
                <div id="existencias-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Existencia de productos</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('admin/existencias')}}" method="POST">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row p-t-20">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="col-sm-12">Selecciona Sucursal</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control form-control-line" name="sucursal">
                                                            <option value="all">Todas</option>
                                                            @foreach($sucursales as $suc)
                                                            <option value="{{$suc->id}}">{{$suc->nombre}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/row-->
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger waves-effect waves-light">Generar</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.End modal -->

                <!-- Entradas Modal -->
                <div id="entradas-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Entrada de productos</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                            <form action="{{route('admin/entradas')}}" method="POST">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12">Selecciona Sucursal</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control form-control-line" name="sucursal">
                                                            <option value="all">Todas</option>
                                                            @foreach($sucursales as $suc)
                                                            <option value="{{$suc->id}}">{{$suc->nombre}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Por fechas</label>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio1" name="xfecha" value="1" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio1">Si</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio2" name="xfecha" value="0" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio2">No</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Fecha: </label>
                                                    <input type="text" name="fecha" class="form-control input-daterange-datepicker">
                                                </div>
                                            </div>
                                        </div>
                                        <!--/row-->
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger waves-effect waves-light">Generar</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.End modal -->

                <!-- Salidas Modal -->
                <div id="salidas-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Salida de productos</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">Recipient:</label>
                                        <input type="text" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">Message:</label>
                                        <textarea class="form-control" id="message-text"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger waves-effect waves-light">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.End modal -->

                 <!-- Historico de Producto x  Ubicacion-->
                
                <div id="his-prod-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Historico de productos</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                            <form action="{{route('admin/reporte/historico/producto')}}" method="POST">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12">Selecciona Sucursal</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control form-control-line" name="sucursal">
                                                            @foreach($sucursales as $suc)
                                                            <option value="{{$suc->id}}">{{$suc->nombre}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-12">Selecciona Producto</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control form-control-line" name="producto">
                                                            @foreach($productos as $prod)
                                                            <option value="{{$prod->id}}">{{$prod->nombre}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Por fechas</label>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio12" name="xfecha" value="1" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio12">Si</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio22" name="xfecha" value="0" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio22">No</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Fecha: </label>
                                                    <input type="text" name="fecha" class="form-control input-daterange-datepicker">
                                                </div>
                                            </div>
                                        </div>
                                        <!--/row-->
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger waves-effect waves-light">Generar</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <!-- /.End modal -->

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