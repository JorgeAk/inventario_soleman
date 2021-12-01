<!DOCTYPE html>
<html lang="es">

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
                        <h4 class="text-themecolor">Diagrama de Gantt</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('mis_diagramas')}}">Diagramas</a></li>
                                <li class="breadcrumb-item">Generar</li>
                                <li class="breadcrumb-item active">Tareas</li>
                            </ol>

                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Formulario -->
                <!-- ============================================================== -->

                <!-- Row -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-danger">
                                <h4 class="m-b-0 text-white">Mi diagrama</h4>
                                
                            </div>
                            <div class="card-body printableArea">
                                <h4 class="card-title">Diagrama</h4>
                                <h6 class="card-subtitle">Fecha de creacion: {{$creacion}}</h6>
                                <div class="row show-grid">
                                    <div class="col-xs-6 col-sm-4"></div>
                                    <div class="col-xs-6 col-sm-4">
                                        <button type="button" type="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat" class="btn btn-danger d-none d-lg-block m-l-15  m-t-30  m-b-10">
                                            <i class="fa fa-plus-circle"></i> Agregar nueva tarea</button></div>
                                    <!-- Optional: clear the XS cols if their content doesn't match in height -->
                                    <div class="clearfix visible-xs"></div>
                                    <div class="col-xs-6 col-sm-4"></div>
                                </div>
                                <!--<button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>-->
                                <table id="example23" class="table-bordered" >

                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">Tarea x @if($periodo== 1) {{"Dia"}} @endif @if($periodo== 2) {{"Mes"}} @endif @if($periodo== 3) {{"Años"}} @endif</th>
                                            <th style="text-align: center;">Descripcion</th>
                                            <th style="text-align: center;">Acción</th>
                                            @for ($i = 1; $i <= $maximo ; $i++) <th style="text-align: center;">{{$i}}</th>@endfor
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($tareas as $tarea)
                                        <tr>
                                            <td style="white-space: pre-wrap;">{{$tarea->nombre}}&nbsp;&nbsp;</td>
                                            <td style="white-space: pre-wrap;">{{$tarea->descripcion}}</td>
                                            <td style="text-align: center;">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                    <div class="dropdown-menu animated bounce" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                        <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal-{{$tarea->id}}" href="javascript:void(0)">Editar</a>
                                                        <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal-del{{$tarea->id}}" href="javascript:void(0)">Eliminar</a>
                                                    </div>
                                                </div>
                                            </td>
                                            @for ($i = 1; $i <= $maximo ; $i++) @if(($i>= $tarea->f_inicio) && ($i<= $tarea->f_fin))
                                                    <td whith="5px" style="background: {{$tarea->color}}; text-align: center;">X</td>
                                                    @else
                                                    <td whith="5px"></td>
                                                    @endif
                                                    @endfor
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <!-- Modal ---------->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                    <div class="modal-dialog  " role="document">
                                        <div class="modal-content ">
                                            <div class="modal-header bc-colored bg-danger">
                                                <h4 class="modal-title" id="exampleModalLabel1">Nueva tarea</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('tarea/nueva')}}" method="POST">
                                                    @csrf
                                                    <input hidden type="text" name="dg" value="{{$dg}}" class="form-control">

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Nombre de la tarea:</label>
                                                        <input type="text" name="nombre" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">Descripción:</label>
                                                        <textarea class="form-control" name="descripcion" id="message-text1"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Inicio:</label>
                                                        <input type="number" name="f_inicio" min="1" max="{{$maximo}}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Fin:</label>
                                                        <input type="number" name="f_fin" min="1" max="{{$maximo}}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Color:</label>
                                                        <input type="color" name="color" class="form-control">
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-danger">Guardar</button>
                                            </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal ---------->

                                <!-- Modal Edit---------->
                                @foreach($tareas as $tarea)
                                <div class="modal fade" id="exampleModal-{{$tarea->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                    <div class="modal-dialog  " role="document">
                                        <div class="modal-content ">
                                            <div class="modal-header bc-colored bg-danger">
                                                <h4 class="modal-title" id="exampleModalLabel1">Editar tarea: {{$tarea->nombre}}</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('tarea/actualizar')}}" method="POST">
                                                    @csrf
                                                    <input hidden type="text" name="tarea" value="{{$tarea->id}}" class="form-control">
                                                    <input hidden type="text" name="dg" value="{{$dg}}" class="form-control">

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Nombre de la tarea:</label>
                                                        <input type="text" name="nombre" value="{{$tarea->nombre}}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">Descripción:</label>
                                                        <textarea class="form-control" name="descripcion" id="message-text1">{{$tarea->descripcion}}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Inicio:</label>
                                                        <input type="number" name="f_inicio" value="{{$tarea->f_inicio}}" min="1" max="{{$maximo}}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Fin:</label>
                                                        <input type="number" name="f_fin" min="1" value="{{$tarea->f_fin}}" max="{{$maximo}}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="control-label">Color:</label>
                                                        <input type="color" value="{{$tarea->color}}" name="color" class="form-control">
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-danger">Guardar</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- End Modal ---------->

                                <!-- Modal DEL---------->
                                @foreach($tareas as $tarea)
                                <div class="modal fade" id="exampleModal-del{{$tarea->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                    <div class="modal-dialog  " role="document">
                                        <div class="modal-content ">
                                            <div class="modal-header bc-colored bg-danger">
                                                <h4 class="modal-title" id="exampleModalLabel1">Eliminar tarea: {{$tarea->nombre}}</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('tarea/eliminar')}}" method="POST">
                                                    @csrf
                                                    <input hidden type="text" name="tarea" value="{{$tarea->id}}" class="form-control">
                                                    <input hidden type="text" name="dg" value="{{$dg}}" class="form-control">
                                                    <div class="alert alert-warning">
                                                        <h3 class="text-warning"><i class="fa fa-exclamation-triangle"></i> Deseas eliminar la tarea:</h3>
                                                        Nombre:{{$tarea->nombre}} <br>
                                                        Descripción: {{$tarea->descripcion}}<br>
                                                        Esta acción no se podrá revertir
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- End Modal DEL ---------->
                            </div>
                        </div>
                        <!-- Table -->
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