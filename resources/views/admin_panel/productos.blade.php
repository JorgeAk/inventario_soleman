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
                                <li><a href="index2.html">Ingresar</a></li>
                                <li><a href="{{route('admin/productos/categorias')}}">Categorias</a></li>
                                <li><a href="{{route('admin/productos/Sub_categorias')}}">Sub Categorias</a></li>
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
                                <li><a href="{{route('admin/usuarios/ubicaciones')}}">Todas las sucursales</a></li>
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
                        <h4 class="text-themecolor">Productos</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Productos</a></li>
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
                                        <button type="button" type="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat" class="btn btn-danger d-none d-lg-block m-l-15  m-t-30  m-b-10">
                                            <i class="fa fa-plus-circle"></i> Agregar nuevo Producto</button>
                                    </div>
                                    <!-- Optional: clear the XS cols if their content doesn't match in height -->
                                    <div class="clearfix visible-xs"></div>
                                    <div class="col-xs-6 col-sm-4"></div>
                                </div>
                                <div class="table-responsive m-t-40">

                                    <table id="example30" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Codigo</th>
                                                <th>Nombre</th>
                                                <th>Descripción</th>
                                                <th>Cantidad</th>
                                                <th>Estatus</th>
                                                <th>Creado</th>
                                                <th>Accion</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Codigo</th>
                                                <th>Nombre</th>
                                                <th>Descripción</th>
                                                <th>Cantidad</th>
                                                <th>Estatus</th>
                                                <th>Modificado</th>
                                                <th>Accion</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach($productos as $prod)
                                            <img src="{{ storage_path().'/app/public/images/'.$prod->imagen }}" alt="" title="">
                                            <tr>
                                                <td>{{$prod->codigo}} </td>
                                                <td>{{$prod->nombre}}</td>
                                                <td>{{$prod->descripcion}}</td>
                                                <td>{{$prod->cantidad}}</td>
                                                <td>{{$prod->estatus}}</td>
                                                <td>{{$prod->updated_at}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-circle waves-light"><a class="" href="{{route('barcode/',$prod->id)}}" style="color: #f9f9f9;"><i class="fa fa-eye" title="Etiqueta QR" data-toggle="tooltip"></i></a></button>
                                                    <button type="button" class="btn btn-warning btn-circle waves-light" data-toggle="modal" data-target="#exampleModal-{{$prod->id}}"><i class="fa fa-pencil-square-o" title="Modificar" data-toggle="tooltip"></i></button>
                                                    <button type="button" class="btn btn-danger btn-circle  waves-light" data-toggle="modal" data-target="#exampleModal-del{{$prod->id}}"><i class="fa fa-trash-o" title="Eliminar" data-toggle="tooltip"></i></button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                        <!-- Modal ---------->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog modal-lg " role="document">
                                <div class="modal-content ">
                                    <div class="modal-header bc-colored bg-danger">
                                        <h4 class="modal-title" id="exampleModalLabel1">Nuevo Producto</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('admin/productos/agregar')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            
                                            <div class="form-body">
                                                <div class="row p-t-20">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="control-label">Nombre del producto:</label>
                                                            <input type="text" name="nombre" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="control-label">Codigo:</label>
                                                            <input type="text" name="codigo" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="control-label">Cantidad:</label>
                                                            <input type="number" name="cantidad" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="message-text" class="control-label">Descripción:</label>
                                                            <textarea class="form-control" name="descripcion" id="message-text1"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-12">Categoria</label>
                                                            <div class="col-sm-12">
                                                                <select class="form-control form-control-line" name="categoria">
                                                                    <option value="1">Equipo electronico</option>
                                                                    <option value="2">Mobiliario</option>
                                                                    <option value="3">Consumibles</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="col-sm-12">Sub Categoria</label>
                                                            <div class="col-sm-12">
                                                                <select class="form-control form-control-line" name="sub_categoria">
                                                                    <option value="1">Computo</option>
                                                                    <option value="2">Silla</option>
                                                                    <option value="3">Impresora</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-12">Estatus</label>
                                                            <div class="col-sm-12">
                                                                <select class="form-control form-control-line" name="estatus">
                                                                    <option value="1">Activo</option>
                                                                    <option value="2">Pendiente</option>
                                                                    <option value="3">Terminado</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-12">Sucursal</label>
                                                            <div class="col-sm-12">
                                                                <select class="form-control form-control-line" name="sucursal">
                                                                    @foreach($sucursales as $suc)
                                                                    <option value="{{$suc->id}}">{{$suc->nombre}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name col-sm-12" class="control-label">Imagen:</label>
                                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                <div class="form-control" data-trigger="fileinput">
                                                                    <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                    <span class="fileinput-filename" style="font-size: 11px;"></span></span>
                                                                </div>
                                                                <span class="input-group-addon btn btn-default btn-file">
                                                                    <span class="fileinput-new">Selecciona</span>
                                                                    <span class="fileinput-exists">Cambiar</span>
                                                                    <input type="file" name="imagen"></span>
                                                                <a href="javascript:void(0)" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                                                            </div>
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
                        <!-- End Modal ---------->

                        <!--  Edit Modal ---------->
                        @foreach($productos as $prod)
                        <div class="modal fade" id="exampleModal-{{$prod->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bc-colored bg-danger">
                                        <h4 class="modal-title" id="exampleModalLabel1">Editar Producto</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="row">
                                            <!-- Column -->
                                            <div class="col-lg-4 col-xlg-3 col-md-5">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <center class="m-t-30"> <img src="{{ asset('storage/images/'.$prod->imagen) }}" class="" width="150" />
                                                            <h4 class="card-title m-t-15">{{ $prod->nombre }}</h4>
                                                            <h6 class="card-subtitle">Codigo: {{$prod->codigo}}</h6>
                                                            <div class="row text-center justify-content-md-center">

                                                                <div class="col-4">
                                                                    <a href="javascript:void(0)" class="link"><i class="ti-archive" style="font-size: 15px;"></i>
                                                                        <font class="font-medium" style="font-size: 15px;">Total: {{$prod->cantidad}}</font>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </center>
                                                    </div>
                                                    <div>
                                                        <hr>
                                                    </div>
                                                    <div class="card-body text-center">
                                                        <h5 class="card-title m-t-10 db">Generar Etiqueta</h5>
                                                        <a href="{{route('barcode/',$prod->id)}}" class="link"><i class="mdi mdi-barcode-scan" style="font-size: 25px;"></i>
                                                            <font class="font-medium"></font>
                                                        </a>
                                                    </div>
                                                    
                                                    <div>
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Column -->
                                            <!-- Column -->
                                            <div class="col-lg-8 col-xlg-9 col-md-7">
                                                <div class="card">
                                                    <!-- Nav tabs -->
                                                    <ul class="nav nav-tabs profile-tab" role="tablist">
                                                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Detalles de Producto</a> </li>
                                                    </ul>
                                                    <!-- Tab panes -->
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="home" role="tabpanel">
                                                            <div class="card-body">

                                                                <form action="{{route('admin/productos/actualizar')}}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input hidden type="text" name="id_pr" value="{{$prod->id}}" class="form-control">
                                                                    <div class="form-body">
                                                                        <div class="row p-t-20">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="recipient-name" class="control-label">Nombre del producto:</label>
                                                                                    <input type="text" name="nombre" value="{{$prod->nombre}}" class="form-control">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="recipient-name" class="control-label">Codigo:</label>
                                                                                    <input type="text" name="codigo" value="{{$prod->codigo}}" class="form-control">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="recipient-name" class="control-label">Cantidad:</label>
                                                                                    <input type="number" name="cantidad" value="{{$prod->cantidad}}" class="form-control">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="message-text" class="control-label">Descripción:</label>
                                                                                    <textarea class="form-control" name="descripcion" id="message-text1">{{$prod->descripcion}}</textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-12">Sub Categoria</label>
                                                                                    <div class="col-sm-12">
                                                                                        <select class="form-control form-control-line" name="sub_categoria">
                                                                                            <option value="1">Computo</option>
                                                                                            <option value="2">Silla</option>
                                                                                            <option value="3">Impresora</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-12">Estatus</label>
                                                                                    <div class="col-sm-12">
                                                                                        <select class="form-control form-control-line" name="estatus">
                                                                                            <option value="1">Activo</option>
                                                                                            <option value="2">Pendiente</option>
                                                                                            <option value="3">Terminado</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-12">Sucursal</label>
                                                                                    <div class="col-sm-12">
                                                                                        <select class="form-control form-control-line" name="sucursal">
                                                                                            @foreach($sucursales as $suc)
                                                                                            <option value="{{$suc->id}}">{{$suc->nombre}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-12">Categoria</label>
                                                                                    <div class="col-sm-12">
                                                                                        <select class="form-control form-control-line" name="categoria">
                                                                                            <option value="1">Equipo electronico</option>
                                                                                            <option value="2">Mobiliario</option>
                                                                                            <option value="3">Consumibles</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="recipient-name col-sm-12" class="control-label">Imagen:</label>
                                                                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                                        <div class="form-control" data-trigger="fileinput">
                                                                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                                            <span class="fileinput-filename" style="font-size: 11px;"></span></span>
                                                                                        </div>
                                                                                        <span class="input-group-addon btn btn-default btn-file">
                                                                                            <span class="fileinput-new">Selecciona</span>
                                                                                            <span class="fileinput-exists">Cambiar</span>
                                                                                            <input type="file" name="imagen"></span>
                                                                                        <a href="javascript:void(0)" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <!--/row-->
                                                                    </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Column -->
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
                                                        Descripción: {{$prod->descripcion}} <br>
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
                    © 2021 Soleman
                </footer>
                <!-- ============================================================== -->
                <!-- End footer -->
                <!-- ============================================================== -->
            </div>
            @include('include.panel_footer')
</body>

</html>