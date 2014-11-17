<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Administracion Demo</title>

    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="css/plugins/timeline/timeline.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand">Path of the food</a>
            </div>
            <!-- /.navbar-header -->
            <div class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="admins"><i class="fa fa-home"></i> Inicio</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user"></i> Usuarios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admins/create"> Alta de usuarios</a>
                                </li>
                                <li>
                                    <a href="#">Edicion de Usuarios <span class="fa arrow"></span></a>
                                        <!-- /.nav-second-level -->
                                    <ul class="nav nav-third-level">
                                        @foreach($admins as $admin)
                                            <li> {{ link_to ("admins/{$admin->username}/edit", $admin->username)}}</li>
                                          @endforeach
                                    </ul >
                                        <!-- /.nav-third-level -->
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="restaurant"><i class="fa fa-coffee"></i> Restaurantes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="restaurant">Ver restaurantes</a>
                                </li>
                                <li>
                                    <a href="restaurant/create"> Alta de Restaurante</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="menu"><i class="fa fa-cutlery"></i> Comidas<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                            <li>
                                <a href="menu">Ver Comidas</a>
                            </li>
                            <li>
                                <a href="menu/create"> Alta de Comidas</a>
                            </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-map-marker"></i> Pedidos</a>

                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cog"></i> Dispositivos<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                             <li>
                                <a href="devices">Ver Dispositivos</a>
                             </li>
                             <li>
                                <a href="devices/create"> Alta de Dispositivos</a>
                             </li>
                                </ul>
                        </li>
                        <li>
                            <a href="logout"><i class="fa fa-cog"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /#side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
               @yield('doce')
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            @yield('ocho')
                <!-- /.col-lg-8 -->
                        @yield('cuatro')
                            </div>
                            </div>
                            </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Dashboard -->
    <script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="js/plugins/morris/morris.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="js/demo/dashboard-demo.js"></script>

     @if(isset($view) && $view == 'restaurant')
            <script type="application/javascript" src="js/map/restaurant.js"></script>
     @endif

</body>

</html>
