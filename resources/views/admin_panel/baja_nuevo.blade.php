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
                            <img src="{{asset('res/assets/images/logo-light-text.png')}}" class="light-logo" alt="homepage" />
                        </span>
                    </a>
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
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-settings"></i> Configuraci??n</a>
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
                                <li><a href="javascript:void(0)"><i class="ti-settings"></i> Configuraci??n</a></li>
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
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-map-alt"></i><span class="hide-menu">Sucursales <span class="badge badge-pill badge-cyan ml-auto">2</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('admin/usuarios/ubicaciones')}}">Todas las sucursales</a></li>
                                <li><a href="{{route('admin/inventario/ingreso')}}">Ingreso</a></li>
                                <li><a href="{{route('admin/inventario/bajas')}}">Baja</a></li>
                                <li><a href="{{route('admin/reportes')}}">Generar Reportes</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-bar-chart"></i><span class="hide-menu">Diagramas <span class="badge badge-pill badge-cyan ml-auto">2</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('diagramas') }}">Generar</a></li>
                                <li><a href="{{route('mis_diagramas')}}">Mis diagramas</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-settings"></i><span class="hide-menu">Configuraci??n <span class="badge badge-pill badge-cyan ml-auto">2</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                @if(Auth::user()->tipo_usuario == 1)
                                <li><a href="{{route('admin/usuarios/control')}}">Usuarios</a></li>
                                @endif

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
                        <h4 class="text-themecolor">Bajas Inventario Nuevo</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Inventario</a></li>
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

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <!--
                                @foreach($productos as $prod)
                                <img src="{{ asset('storage/images/'.$prod->imagen) }}" alt="" title="">
                                @endforeach
                            -->
                                <div class="row show-grid">
                                    <div class="col-xs-6 col-sm-4"></div>
                                    <div class="col-xs-6 col-sm-4">

                                    </div>
                                    <!-- Optional: clear the XS cols if their content doesn't match in height -->
                                    <div class="clearfix visible-xs"></div>
                                    <div class="col-xs-6 col-sm-4"></div>
                                </div>
                                <div class="table-responsive m-t-40">

                                    <table id="example30" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Sucursal</th>
                                                <th>Producto</th>
                                                <th>Cantidad</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($existencias as $exist)
                                            <tr>
                                                <td>
                                                    @foreach($ubicaciones as $suc)
                                                    @if($suc->id == $exist->id_ubicacion)
                                                    {{$suc->nombre}}
                                                    @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($productos as $prod)
                                                    @if($prod->id == $exist->id_producto)
                                                    {{$prod->nombre}}
                                                    @endif
                                                    @endforeach
                                                </td>
                                                <td>{{$exist->cantidad}}</td>

                                                <td><button type="button" class="btn btn-warning btn-circle waves-light" data-toggle="modal" data-target="#exampleModal-{{$exist->id}}"><i class="fa fa-pencil-square-o" title="Generar" data-toggle="tooltip"></i></button></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                        <!--  Edit Modal ---------->
                        @foreach($existencias as $ingres)
                        <div class="modal fade" id="exampleModal-{{$ingres->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bc-colored bg-danger">
                                        <h4 class="modal-title" id="exampleModalLabel1">Generar Baja de Producto</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('admin/inventario/bajas/nuevo/generar')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row p-t-20">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="control-label">Producto:</label>
                                                            <input type="text" hidden name="producto" class="form-control" value="{{$ingres->id_producto}}">
                                                            <input type="text" hidden name="ingres" class="form-control" value="{{$ingres->id}}">
                                                            @foreach($productos as $prod)
                                                            @if($prod->id == $ingres->id_producto)
                                                            <input type="text" name="producto-name" class="form-control" placeholder="{{$prod->nombre}}" readonly>
                                                            @endif
                                                            @endforeach

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="control-label">Cantidad:</label>
                                                            <input type="number" name="cantidad" min="1" max="{{$ingres->cantidad}}" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="message-text" class="control-label">Descripci??n:</label>
                                                            <textarea class="form-control" name="descripcion" id="message-text1"></textarea>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="recipient-name" class="control-label">Sucursal:</label>
                                                            <input type="text" hidden name="sucursal" class="form-control" value="{{$ingres->id_ubicacion}}">
                                                            @foreach($ubicaciones as $suc)
                                                            @if($suc->id == $ingres->id_ubicacion)
                                                            <input type="text" name="sucursal-name" class="form-control" placeholder="{{$suc->nombre}}" readonly>
                                                            @endif
                                                            @endforeach

                                                        </div>

                                                    </div>
                                                </div>
                                                <!--/row-->
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

                        <!-- End Edit Modal ---------->

                        <!-- Modal DEL---------->
                        @foreach($productos as $prod)
                        <div class="modal fade" id="exampleModal-del{{$prod->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog  " role="document">
                                <div class="modal-content ">
                                    <div class="modal-header bc-colored bg-danger">
                                        <h4 class="modal-title" id="exampleModalLabel1">Eliminar Producto: {{$prod->nombre}}</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('admin/productos/eliminar')}}" method="POST">
                                            @csrf
                                            <input hidden type="text" name="id_pr" value="{{$prod->id}}" class="form-control">
                                            <div class="alert alert-warning">
                                                <h3 class="text-warning"><i class="fa fa-exclamation-triangle"></i> Deseas eliminar el Producto:</h3>
                                                Nombre: {{$prod->nombre}} <br>
                                                Descripci??n: {{$prod->descripcion}} <br>
                                                Esta acci??n no se podr?? revertir
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

                        <!-- ============================================================== -->
                        <!-- End Info box -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Over Visitor, Our income , slaes different and  sales prediction -->
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
                    ?? 2021 Soleman
                </footer>
                <!-- ============================================================== -->
                <!-- End footer -->
                <!-- ============================================================== -->
            </div>
            @include('include.panel_footer')
</body>

</html>