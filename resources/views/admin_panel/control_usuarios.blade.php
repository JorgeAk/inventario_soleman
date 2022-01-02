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
                        <h4 class="text-themecolor">Usuarios</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
                                <li class="breadcrumb-item active">Configuración</li>
                                <li class="breadcrumb-item active">Usuarios</li>
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
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Lista de usuarios registrados</h4>
                                <h6 class="card-subtitle"></h6>
                                <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nombre</th>
                                                <th>Correo</th>
                                                <th>Rol</th>
                                                <th>F.Creacion</th>
                                                <th>F.Modificación</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($usuarios as $key => $user)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>
                                                    <a href="javascript:void(0)"><img src="{{asset('res/assets/images/users/1.jpg')}}" alt="user" width="40" class="img-circle" /> {{$user->name}}</a>
                                                </td>
                                                <td>{{$user->email}}</td>
                                                <td><span class="label label-danger">@if($user->tipo_usuario==1) {{'Administrador'}}@endif @if($user->tipo_usuario==2) {{'Supervisor'}}@endif @if($user->tipo_usuario==3) {{'Us.Estandar'}}@endif</span> </td>
                                                <td>{{date('d/m/Y H:i:s', strtotime($user->created_at))}}</td>
                                                <td>{{date('d/m/Y H:i:s', strtotime($user->updated_at))}}</td>
                                                <td style="display: inline-flex;">
                                                    <button type="button" class="btn btn-warning btn-circle waves-light" data-toggle="modal" data-target="#exampleModal-{{$user->id}}"><i class="fa fa-pencil-square-o" title="Modificar" data-toggle="tooltip"></i></button>&nbsp;
                                                    <button type="button" class="btn btn-danger btn-circle  waves-light" data-toggle="modal" data-target="#exampleModal-del{{$user->id}}"><i class="fa fa-trash-o" title="Eliminar" data-toggle="tooltip"></i></button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="2">
                                                    <button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#add-contact">Añadir nuevo Contacto</button>
                                                </td>
                                                <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header bc-colored bg-danger">
                                                                <h4 class="modal-title" id="myModalLabel">Añadir nuevo contacto</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <from class="form-horizontal form-material">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" class="form-control" placeholder="Nombre"> </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" class="form-control" placeholder="Correo"> </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" class="form-control" placeholder="Teléfono"> </div>
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="password" class="form-control" placeholder="Contraseña"> </div>
                                                                        <div class="form-group">
                                                                            <label class="col-sm-12">Sucursal a la que pertenece</label>
                                                                            <div class="col-sm-12">
                                                                                <select class="form-control form-control-line">
                                                                                    <option>Morelia,Mich.</option>
                                                                                    <option>Uruapán,Mich.</option>
                                                                                    <option>Querétaro</option>
                                                                                    <option>Toluca, Edo. México</option>
                                                                                    <option>Ezequiel Montes</option>
                                                                                    <option>Guanajuato</option>
                                                                                    <option>San Juan del Río</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-sm-12">Selecciona tipo de usuario</label>
                                                                            <div class="col-sm-12">
                                                                                <select name="tipo_usuario" class="form-control form-control-line">
                                                                                    <option value="1">Administrador</option>
                                                                                    <option value="2">Supervisor</option>
                                                                                    <option value="3">Usuario Estandar</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <!-- <div class="col-md-12 m-b-20">
                                                                            <div class="fileupload btn btn-danger btn-rounded waves-effect waves-light"><span><i class="ion-upload m-r-5"></i>Upload Contact Image</span>
                                                                                <input type="file" class="upload"> </div>
                                                                        </div>-->
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer text-center">
                                                                <button type="submit" class="btn btn-info waves-effect" data-dismiss="modal">Guardar</button>
                                                                </from>
                                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <td colspan="7">
                                                    <div class="text-right">
                                                        <ul class="pagination"> </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach($usuarios as $user)
                <!-- Modal ---------->
                <div class="modal fade" id="exampleModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bc-colored bg-danger">
                                <h4 class="modal-title" id="exampleModalLabel1">Editar usuario: {{$user->name}}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('admin/usuarios/control/actualizar')}}" method="POST">
                                    @csrf
                                    <input hidden type="text" name="usr" value="{{$user->id}}" class="form-control">
                                    <div class="form-body">
                                    <span class="label label-success">*si no desea actualizar algun dato dejarlo como esta</span>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Nombre del diagrama </label>
                                                    <input type="text" id="firstName" name="name" value="{{$user->name}}" class="form-control" placeholder="Usuario">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Correo</label>
                                                    <input type="text" id="email" name="email" value="{{$user->email}}" class="form-control" placeholder="Correo">
                                                </div>
                                            </div>
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Contraseña</label>
                                                    <input type="password" id="password" name="password" value="password" class="form-control form-control-line" placeholder="Contraseña">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <label class="control-label text-right ">Tipo de usuario:</label>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <select class="form-control form-control-line" name="tipo_usuario">
                                                                <option value="1">Administrador</option>
                                                                <option value="2">Supervisor</option>
                                                                <option value="3">Usuario Estandar</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
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
                @endforeach

                <!-- Modal DEL---------->
                @foreach($usuarios as $diag)
                                <div class="modal fade" id="exampleModal-del{{$diag->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                    <div class="modal-dialog  " role="document">
                                        <div class="modal-content ">
                                            <div class="modal-header bc-colored bg-danger">
                                                <h4 class="modal-title" id="exampleModalLabel1">Eliminar Usuario: {{$diag->name}}</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('diagrama/eliminar')}}" method="POST">
                                                    @csrf
                                                    <input hidden type="text" name="dg" value="{{$diag->id}}" class="form-control">
                                                    <div class="alert alert-warning">
                                                        <h3 class="text-warning"><i class="fa fa-exclamation-triangle"></i> Deseas eliminar al Usuario:</h3>
                                                        Nombre: {{$diag->name}} <br>
                                                        
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

                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->

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