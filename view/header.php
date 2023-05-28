<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Sistema de Almacenes UCB</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Mannatthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="../public/assets/images/favicon.ico">
        <link href="../public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../public/assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="../public/assets/css/style.css" rel="stylesheet" type="text/css">

    </head>


    <body>

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container-fluid">

                    <!-- Logo container-->
                    <div class="logo">
                        <a href="./dashboard.php" class="logo">
                            <i class="mdi mdi-bowling text-success mr-1"></i> <span class="hide-phone">Sistema de Almacenes UCB</span>
                        </a>

                    </div>
                    <!-- End Logo container-->

                    <!-- end menu-extras -->

                    <div class="clearfix"></div>

                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->
            <!-- MENU Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <li class="has-submenu">
                                <a href="./dashboard.php"><i class="dripicons-device-desktop"></i>Dashboard</a>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="fa fa-boxes"></i>Almacen</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li><a href="./almacen.php">Almacenes</a></li>
                                            <li><a href="./articulo.php">Artículos</a></li>
                                            <li><a href="./categoria.php">Categorias</a></li>     
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="fa fa-car"></i>Vehículo</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li><a href="./vehiculo.php">Automoviles</a></li>
                                            <li><a href="./surtidor.php">Surtidor</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="dripicons-user-group"></i>Personal</a>
                                <ul class="submenu">                                       

                                    <li>
                                        <ul>
                                            <li><a href="./empleado.php">Empleados</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><a href="./oficina_dashboard.php">Oficinas</a></li>
                                        </ul>
                                    </li>

                                </ul>
                            </li>
                            <li class="has-submenu">

                            </li>


                        </ul>
                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->


        <!-- <div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="float-right hide-phone">
                                <ul class="list-inline">
                                    <li class="list-inline-item mr-3">
                                        <input class="knob" data-width="48" data-height="48" data-linecap=round
                                                           data-fgColor="#605daf" value="80" data-skin="tron" data-angleOffset="180"
                                                           data-readOnly=true data-thickness=".1"/>
                                    </li>
                                    <li class="list-inline-item">
                                        <span class="text-muted">Storage used</span>
                                        <h6>400GB/524.84GB</h6>
                                    </li>
                                </ul>                                
                            </div>
                            <h4 class="page-title">Starter</h4>
                            <div class="btn-group mt-2">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item"><a href="#">UCB</a></li>
                                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                    <li class="breadcrumb-item active">Starter</li>
                                </ol>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

            </div> <!-- end container -->
        </div> -->
        <!-- end wrapper -->
            