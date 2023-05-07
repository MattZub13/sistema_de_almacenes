<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Zoogler - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Mannatthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="public/assets/images/favicon.ico">

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
                        <a href="index.html" class="logo">
                            <i class="mdi mdi-bowling text-success mr-1"></i> <span class="hide-phone">Zoogler</span>
                        </a>

                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras topbar-custom">

                        <ul class="list-unstyled float-right mb-0">
                            
                            <!-- language-->
                            <li class="dropdown notification-list hide-phone">
                                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                                    aria-haspopup="false" aria-expanded="false">
                                    English <img src="public/assets/images/flags/us_flag.jpg" class="ml-2" height="16" alt=""/>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right language-switch">
                                    <a class="dropdown-item" href="#"><img src="public/assets/images/flags/italy_flag.jpg" alt="" height="16"/><span> Italian </span></a>
                                    <a class="dropdown-item" href="#"><img src="public/assets/images/flags/french_flag.jpg" alt="" height="16"/><span> French </span></a>
                                    <a class="dropdown-item" href="#"><img src="public/assets/images/flags/spain_flag.jpg" alt="" height="16"/><span> Spanish </span></a>
                                    <a class="dropdown-item" href="#"><img src="public/assets/images/flags/russia_flag.jpg" alt="" height="16"/><span> Russian </span></a>
                                </div>
                            </li>

                             <!-- notification-->
                             <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <i class="dripicons-mail noti-icon"></i>
                                    <span class="badge badge-danger noti-icon-badge">5</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg border-0">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h5><span class="badge badge-danger float-right">745</span>Messages</h5>
                                    </div>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon"><img src="public/assets/images/users/avatar-2.jpg" alt="user-img" class="img-fluid rounded-circle" /> </div>
                                        <p class="notify-details"><b>Charles M. Jones</b><small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon"><img src="public/assets/images/users/avatar-3.jpg" alt="user-img" class="img-fluid rounded-circle" /> </div>
                                        <p class="notify-details"><b>Thomas J. Mimms</b><small class="text-muted">You have 87 unread messages</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon"><img src="public/assets/images/users/avatar-4.jpg" alt="user-img" class="img-fluid rounded-circle" /> </div>
                                        <p class="notify-details"><b>Luis M. Konrad</b><small class="text-muted">It is a long established fact that a reader will</small></p>
                                    </a>

                                    <!-- All-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item border-top">
                                        View All
                                    </a>

                                </div>
                            </li>

                            <!-- notification-->
                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <i class="dripicons-bell noti-icon"></i>
                                    <span class="badge badge-success noti-icon-badge">2</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg border-0">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h5>Notification (3)</h5>
                                    </div>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                        <p class="notify-details"><b>Your order is placed</b><small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-warning"><i class="mdi mdi-message"></i></div>
                                        <p class="notify-details"><b>New Message received</b><small class="text-muted">You have 87 unread messages</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-info"><i class="mdi mdi-glass-cocktail"></i></div>
                                        <p class="notify-details"><b>Your item is shipped</b><small class="text-muted">It is a long established fact that a reader will</small></p>
                                    </a>

                                    <!-- All-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item border-top">
                                        View All
                                    </a>

                                </div>
                            </li>
                            <!-- User-->
                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <img src="public/assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown  border-0">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h5>Welcome</h5>
                                    </div>
                                    <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                                    <a class="dropdown-item" href="#"><i class="mdi mdi-wallet m-r-5 text-muted"></i> My Wallet</a>
                                    <a class="dropdown-item" href="#"><span class="badge badge-success float-right">5</span><i class="mdi mdi-settings m-r-5 text-muted"></i> Settings</a>
                                    <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline m-r-5 text-muted"></i> Lock screen</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                                </div>
                            </li>
                            <li class="menu-item">
                                <!-- Mobile menu toggle-->
                                <a class="navbar-toggle nav-link">
                                    <div class="lines">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <!-- End mobile menu toggle-->
                            </li>

                        </ul>
                    </div>
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
                                <a href="index.html"><i class="dripicons-device-desktop"></i>Dashboard</a>
                            </li>

                            <li class="has-submenu">
                                <a href="calender.html"><i class="dripicons-to-do"></i>Calendar</a>                                
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="dripicons-jewel"></i>User Interface</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li><a href="ui-alerts.html">Alerts</a></li>
                                            <li><a href="ui-alertify.html">Alertify</a></li>
                                            <li><a href="ui-badge.html">Badge</a></li>
                                            <li><a href="ui-buttons.html">Buttons</a></li>
                                            <li><a href="ui-carousel.html">Carousel</a></li>                                   
                                            <li><a href="ui-cards.html">Cards</a></li>
                                            <li><a href="ui-dropdowns.html">Dropdowns</a></li>        
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><a href="ui-grid.html">Grid</a></li>
                                            <li><a href="ui-images.html">Images</a></li>
                                            <li><a href="ui-lightbox.html">Lightbox</a></li>
                                            <li><a href="ui-modals.html">Modals</a></li>
                                            <li><a href="ui-navs.html">Navs</a></li>
                                            <li><a href="ui-progressbars.html">Progress Bars</a></li>
                                            <li><a href="ui-pagination.html">Pagination</a></li>        
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><a href="ui-popover-tooltips.html">Popover & Tooltips</a></li>
                                            <li><a href="ui-rating.html">Rating</a></li>                                    
                                            <li><a href="ui-rangeslider.html">Range Slider</a></li>
                                            <li><a href="ui-sweet-alert.html">Sweet-Alert</a></li>                                    
                                            <li><a href="ui-typography.html">Typography</a></li>
                                            <li><a href="ui-tabs-accordions.html">Tabs &amp; Accordions</a></li>
                                            <li><a href="ui-video.html">Video</a></li> 
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="dripicons-blog"></i>Components</a>
                                <ul class="submenu">
                                    <li class="has-submenu">
                                        <a href="#">Forms</a>
                                        <ul class="submenu">
                                            <li><a href="form-advanced.html">Form Advanced</a></li>
                                            <li><a href="form-elements.html">Form Elements</a></li>
                                            <li><a href="form-editors.html">Form Editors</a></li>
                                            <li><a href="form-uploads.html">Form File Upload</a></li>
                                            <li><a href="form-mask.html">Form Mask</a></li>
                                            <li><a href="form-summernote.html">Summernote</a></li>
                                            <li><a href="form-validation.html">Form Validation</a></li>                                    
                                            <li><a href="form-xeditable.html">Form Xeditable</a></li>
                                        </ul>
                                    </li>
                                    
                                    <li class="has-submenu">
                                        <a href="#">Charts</a>
                                        <ul class="submenu">
                                            <li><a href="charts-chartist.html">Chartist Chart</a></li>
                                            <li><a href="charts-chartjs.html">Chartjs Chart</a></li>
                                            <li><a href="charts-c3.html">C3 Chart</a></li>
                                            <li><a href="charts-flot.html">Flot Chart</a></li>
                                            <li><a href="charts-other.html">Jquery Knob Chart</a></li>
                                            <li><a href="charts-morris.html">Morris Chart</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-submenu">
                                        <a href="#">Tables </a>
                                        <ul class="submenu">
                                            <li><a href="tables-basic.html">Basic Tables</a></li>
                                            <li><a href="tables-datatable.html">Data Table</a></li>
                                            <li><a href="tables-editable.html">Editable Table</a></li>
                                            <li><a href="tables-responsive.html">Responsive Table</a></li> 
                                        </ul>
                                    </li>
                                    <li class="has-submenu">
                                        <a href="#">Icons</a>
                                        <ul class="submenu">
                                            <li><a href="icons-dripicons.html">Dripicons</a></li>
                                            <li><a href="icons-fontawesome.html">Font Awesome</a></li>
                                            <li><a href="icons-ion.html">Ion Icons</a></li>
                                            <li><a href="icons-material.html">Material Design</a></li>
                                            <li><a href="icons-themify.html">Themify Icons</a></li>
                                            <li><a href="icons-typicons.html">Typicons Icons</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-submenu">
                                        <a href="#">Maps</a>
                                        <ul class="submenu">
                                            <li><a href="maps-google.html"> Google Map</a></li>
                                            <li><a href="maps-vector.html"> Vector Map</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="dripicons-copy"></i>Pages</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li><a href="pages-login.html">Login</a></li>
                                            <li><a href="pages-register.html">Register</a></li>
                                            <li><a href="pages-recoverpw.html">Recover Password</a></li>
                                            <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><a href="pages-blank.html">Blank Page</a></li>
                                            <li><a href="pages-404.html">Error 404</a></li>
                                            <li><a href="pages-500.html">Error 500</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->


        <div class="wrapper">
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
                            <h4 class="page-title">Dashboard</h4>
                            <div class="btn-group mt-2">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item"><a href="#">Zoogler</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                <div class="row">
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="icon-contain">
                                            <div class="row">
                                                <div class="col-2 align-self-center">
                                                    <i class="fas fa-tasks text-gradient-success"></i>
                                                </div>
                                                <div class="col-10 text-right">
                                                    <h5 class="mt-0 mb-1">190</h5>
                                                    <p class="mb-0 font-12 text-muted">Active Tasks</p>   
                                                </div>
                                            </div>                                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body justify-content-center">
                                        <div class="icon-contain">
                                            <div class="row">
                                                <div class="col-2 align-self-center">
                                                    <i class="far fa-gem text-gradient-danger"></i>
                                                </div>
                                                <div class="col-10 text-right">
                                                    <h5 class="mt-0 mb-1">62</h5>
                                                    <p class="mb-0 font-12 text-muted">Project</p>
                                                </div>
                                            </div>                                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="icon-contain">
                                            <div class="row">
                                                <div class="col-2 align-self-center">
                                                    <i class="fas fa-users text-gradient-warning"></i>
                                                </div>
                                                <div class="col-10 text-right">
                                                    <h5 class="mt-0 mb-1">14</h5>
                                                    <p class="mb-0 font-12 text-muted">Teams</p>    
                                                </div>
                                            </div>                                                        
                                        </div>                                                    
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card ">
                                    <div class="card-body">
                                        <div class="icon-contain">
                                            <div class="row">
                                                <div class="col-2 align-self-center">
                                                    <i class="fas fa-database text-gradient-primary"></i>
                                                </div>
                                                <div class="col-10 text-right">
                                                    <h5 class="mt-0 mb-1">$15562</h5>
                                                    <p class="mb-0 font-12 text-muted">Budget</p>    
                                                </div>
                                            </div>                                                        
                                        </div>                                                    
                                    </div>
                                </div>
                            </div>                                             
                        </div> 
                        <div class="card">
                            <div class="card-body">
                                <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                                    <label class="btn btn-primary btn-sm active">
                                        <input type="radio" name="options" id="option1" checked=""> This Week
                                    </label>
                                    <label class="btn btn-primary btn-sm">
                                        <input type="radio" name="options" id="option2"> Last Month
                                    </label>                                                
                                </div>
                                <h5 class="header-title mb-4 mt-0">Weekly Record</h5>
                                <canvas id="lineChart" height="80"></canvas>
                            </div>
                        </div>                                    
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown d-inline-block float-right">
                                    <a class="nav-link dropdown-toggle arrow-none" id="dLabel4" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v font-20 text-muted"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel4">
                                        <a class="dropdown-item" href="#">Create Project</a>
                                        <a class="dropdown-item" href="#">Open Project</a>
                                        <a class="dropdown-item" href="#">Tasks Details</a>
                                    </div>
                                </div>
                                <h5 class="header-title mb-4 mt-0">Activity</h5>
                                <div>
                                    <canvas id="dash-doughnut" height="200"></canvas>
                                </div>
                                <ul class="list-unstyled list-inline text-center mb-0 mt-3">
                                    <li class="mb-2 list-inline-item text-muted font-13"><i class="mdi mdi-label text-success mr-2"></i>Active</li>
                                    <li class="mb-2 list-inline-item text-muted font-13"><i class="mdi mdi-label text-danger mr-2"></i>Complete</li>
                                    <li class="mb-2 list-inline-item text-muted font-13"><i class="mdi mdi-label text-warning mr-2"></i>Panding</li>
                                </ul>
                            </div>                               
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-6">
                                        <p class="mb-0 text-muted font-13"><i class="mdi mdi-album mr-2 text-warning"></i>New Leads</p>                            
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="mb-0 text-muted font-13"><i class="mdi mdi-album mr-2 text-danger"></i>New Leads Target</p>
                                    </div>
                                </div>
                                <div class="progress bg-gradient1 mb-3" style="height:5px;">
                                    <div class="progress-bar bg-gradient3" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <a class="btn btn-primary btn-sm btn-block text-white">Read More</a>
                            </div>
                            
                        </div>
                    </div>                                
                </div>
                <div class="row">
                    
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown d-inline-block float-right">
                                    <a class="nav-link dropdown-toggle arrow-none" id="dLabel5" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v font-20 text-muted"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel5">
                                        <a class="dropdown-item" href="#">New Messages</a>
                                        <a class="dropdown-item" href="#">Open Messages</a>
                                    </div>
                                </div>
                                <h5 class="header-title pb-3 mt-0">New Clients</h5>
                                <div class="table-responsive boxscroll" style="overflow: hidden; outline: none;">
                                    <table class="table mb-0">                                                                
                                        <tbody>
                                            <tr>
                                                <td class="border-top-0">
                                                    <div class="media">
                                                        <img src="public/assets/images/users/avatar-2.jpg" alt="" class="thumb-md rounded-circle"> 
                                                        <div class="media-body ml-2">
                                                            <p class="mb-0">Roy Saunders <span class="badge badge-soft-danger">USA</span></p>
                                                            <span class="font-12 text-muted">CEO of facebook</span>
                                                        </div>
                                                    </div>                                                                            
                                                </td> 
                                                <td class="border-top-0 text-right">
                                                    <a href="#" class="btn btn-light btn-sm"><i class="far fa-comments mr-2 text-success"></i>Chat</a>
                                                </td>                                                                        
                                            </tr>      
                                            <tr>
                                                <td>
                                                    <div class="media">
                                                        <img src="public/assets/images/users/avatar-3.jpg" alt="" class="thumb-md rounded-circle"> 
                                                        <div class="media-body ml-2">
                                                            <p class="mb-0">Tiger Nixon <span class="badge badge-soft-info">UK</span></p>
                                                            <span class="font-12 text-muted">CEO of WhatsApp</span>
                                                        </div>
                                                    </div>                                                                            
                                                </td>  
                                                <td class="text-right">
                                                    <a href="#" class="btn btn-light btn-sm"><i class="far fa-comments mr-2 text-success"></i>Chat</a>
                                                </td>                                                                        
                                            </tr>      
                                            <tr>
                                                <td>
                                                    <div class="media">
                                                        <img src="public/assets/images/users/avatar-4.jpg" alt="" class="thumb-md rounded-circle"> 
                                                        <div class="media-body ml-2">
                                                            <p class="mb-0">Ashton Cox <span class="badge badge-soft-pink">USA</span></p>
                                                            <span class="font-12 text-muted">founder of Google</span>
                                                        </div>
                                                    </div>                                                                            
                                                </td> 
                                                <td class="text-right">
                                                    <a href="#" class="btn btn-light btn-sm"><i class="far fa-comments mr-2 text-success"></i>Chat</a>
                                                </td>                                                                        
                                            </tr>      
                                            <tr>
                                                <td>
                                                    <div class="media">
                                                        <img src="public/assets/images/users/avatar-5.jpg" alt="" class="thumb-md rounded-circle"> 
                                                        <div class="media-body ml-2">
                                                            <p class="mb-0">Cedric Kelly <span class="badge badge-soft-purple">Canada</span></p>
                                                            <span class="font-12 text-muted">CEO of Paypal</span>
                                                        </div>
                                                    </div>                                                                            
                                                </td>  
                                                <td class="text-right">
                                                    <a href="#" class="btn btn-light btn-sm"><i class="far fa-comments mr-2 text-success"></i>Chat</a>
                                                </td>                                                                        
                                            </tr>  
                                            <tr>
                                                <td class="">
                                                    <div class="media">
                                                        <img src="public/assets/images/users/avatar-2.jpg" alt="" class="thumb-md rounded-circle"> 
                                                        <div class="media-body ml-2">
                                                            <p class="mb-0">Garry Pearson <span class="badge badge-soft-info">India</span></p>
                                                            <span class="font-12 text-muted">CEO of facebook</span>
                                                        </div>
                                                    </div>                                                                            
                                                </td> 
                                                <td class="text-right">
                                                    <a href="#" class="btn btn-light btn-sm"><i class="far fa-comments mr-2 text-success"></i>Chat</a>
                                                </td>                                                                        
                                            </tr> 
                                            <tr>
                                                <td>
                                                    <div class="media">
                                                        <img src="public/assets/images/users/avatar-4.jpg" alt="" class="thumb-md rounded-circle"> 
                                                        <div class="media-body ml-2">
                                                            <p class="mb-0">Ashton Cox <span class="badge badge-soft-pink">Africa</span></p>
                                                            <span class="font-12 text-muted">founder of Google</span>
                                                        </div>
                                                    </div>                                                                            
                                                </td> 
                                                <td class="text-right">
                                                    <a href="#" class="btn btn-light btn-sm"><i class="far fa-comments mr-2 text-success"></i>Chat</a>
                                                </td>                                                                        
                                            </tr>               
                                            <tr>
                                                <td>
                                                    <div class="media">
                                                        <img src="public/assets/images/users/avatar-1.jpg" alt="" class="thumb-md rounded-circle"> 
                                                        <div class="media-body ml-2">
                                                            <p class="mb-0">Roy Saunders <span class="badge badge-soft-success">USA</span></p>
                                                            <span class="font-12 text-muted">Manager of Bank</span>
                                                        </div>
                                                    </div>                                                                            
                                                </td>  
                                                <td class="text-right">
                                                    <a href="#" class="btn btn-light btn-sm"><i class="far fa-comments mr-2 text-success"></i>Chat</a>
                                                </td>                                                                        
                                            </tr> 
                                                                                        
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <a href="#" class="btn btn-outline-success float-right">Withdraw Monthly</a>
                                <h5 class="header-title mb-4 mt-0">Monthly Revenue</h5>
                                <h4 class="mb-4">$15,421.50</h4>
                                <p class="font-14 text-muted mb-3">
                                    <i class="mdi mdi-message-reply text-danger mr-2 font-18"></i>
                                    $ 1500 when an unknown printer took a galley.
                                </p>                                        
                                <canvas id="bar-data" height="125"></canvas> 
                            </div>                         
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex align-self-center">
                                        <img src="public/assets/images/widgets/code.svg" alt="" class="" height="100">
                                    <div class="media-body ml-3">
                                        <h6 class="mt-0">Code Confirmed</h6>
                                        <p class="text-muted font-13 ">Contrary to popular belief, generators on  Lorem Ipsum is not simply random text.</p>
                                        <a href="#" class="btn btn-gradient-secondary">Confirm</a>
                                    </div>
                                </div>                                            
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4  col-lg-6">
                        <div class="card timeline-card">
                            <div class="card-body p-0">                               
                                <div class="bg-gradient2 text-white text-center py-3 mb-4">
                                    <p class="mb-0 font-18"><i class="mdi mdi-clock-outline font-20"></i> This Week's Activity</p>                                       
                                </div>
                            </div>
                            <div class="card-body boxscroll">
                                <div class="timeline">
                                    <div class="entry">
                                        <div class="title">
                                            <h6>10/ Oct</h6>
                                        </div>
                                        <div class="body">
                                            <p>There are many variations of passages of  Lorem Ipsum available.....<a href="#" class="text-primary"> Read More</a></p>                                                                
                                        </div>
                                    </div>
                                    <div class="entry">
                                        <div class="title">
                                            <h6>9/ Oct</h6>
                                        </div>
                                        <div class="body">
                                            <p>All the Lorem Ipsum generators on the  predefined chunks as necessary.....<a href="#" class="text-primary"> Read More</a></p>                                                                
                                        </div>
                                    </div>
                                    <div class="entry">
                                        <div class="title">
                                            <h6>8/ Oct</h6>
                                        </div>
                                        <div class="body">
                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text.....<a href="#" class="text-primary"> Read More</a></p>                                                                
                                        </div>
                                    </div>
                                    <div class="entry">
                                        <div class="title">
                                            <h6>7/ Oct</h6>
                                        </div>
                                        <div class="body">
                                            <p class="pb-1">Many desktop publishing packages and web page editors now.....<a href="#" class="text-primary"> Read More</a></p>                                                                
                                        </div>
                                    </div> 
                                    <div class="entry">
                                        <div class="title">
                                            <h6>6/ Oct</h6>
                                        </div>
                                        <div class="body">
                                            <p class="pb-1 mb-0">All the Lorem Ipsum generators on the  predefined chunks as necessary.....<a href="#" class="text-primary"> Read More</a></p>                                                                
                                        </div>
                                    </div>                                                              
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">                                
                            <div class="card-body">
                                <h5 class="header-title pb-3 mt-0">Payments</h5>
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr class="align-self-center">
                                                <th>Project Name</th>
                                                <th>Client Name</th>
                                                <th>Payment Type</th>
                                                <th>Paid Date</th>
                                                <th>Amount</th>
                                                <th>Transaction</th>                                                                                    
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Product Devlopment</td>
                                                <td>
                                                    <img src="public/assets/images/users/avatar-1.jpg" alt="" class="thumb-sm rounded-circle mr-2">
                                                    Kevin Heal
                                                </td>
                                                <td>Paypal</td>
                                                <td>5/8/2018</td>
                                                <td>$15,000</td>
                                                <td><span class="badge badge-boxed  badge-soft-warning">panding</span></td>                                                                        
                                            </tr>
                                            <tr>
                                                <td>New Office Building</td>
                                                <td>
                                                    <img src="public/assets/images/users/avatar-2.jpg" alt="" class="thumb-sm rounded-circle mr-2">
                                                    Frank M. Lyons
                                                </td>
                                                <td>Paypal</td>
                                                <td>15/7/2018</td> 
                                                <td>$35,000</td> 
                                                <td><span class="badge badge-boxed  badge-soft-primary">Success</span></td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Market Research</td>
                                                <td>
                                                    <img src="public/assets/images/users/avatar-3.jpg" alt="" class="thumb-sm rounded-circle mr-2">
                                                    Angelo Butler
                                                </td>
                                                <td>Pioneer</td>
                                                <td>30/9/2018</td>                                                                        
                                                <td>$45,000</td>
                                                <td><span class="badge badge-boxed  badge-soft-warning">Panding</span></td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Website &amp; Blog</td>
                                                <td>
                                                    <img src="public/assets/images/users/avatar-4.jpg" alt="" class="thumb-sm rounded-circle mr-2">
                                                    Phillip Morse
                                                </td>
                                                <td>Paypal</td>
                                                <td>2/6/2018</td>
                                                <td>$70,000</td>
                                                <td><span class="badge badge-boxed  badge-soft-warning">Success</span></td>
                                            </tr>
                                            <tr>
                                                <td>Product Devlopment</td>
                                                <td>
                                                    <img src="public/assets/images/users/avatar-5.jpg" alt="" class="thumb-sm rounded-circle mr-2">
                                                    Kevin Heal
                                                </td>
                                                <td>Paypal</td>
                                                <td>5/8/2018</td>
                                                <td>$15,000</td>
                                                <td><span class="badge badge-boxed  badge-soft-primary">panding</span></td>                                                                        
                                            </tr>
                                            <tr>
                                                <td>New Office Building</td>
                                                <td>
                                                    <img src="public/assets/images/users/avatar-6.jpg" alt="" class="thumb-sm rounded-circle mr-2">
                                                    Frank M. Lyons
                                                </td>
                                                <td>Paypal</td>
                                                <td>15/7/2018</td> 
                                                <td>$35,000</td> 
                                                <td><span class="badge badge-boxed  badge-soft-primary">Success</span></td>
                                            </tr>                                                                        
                                        </tbody>
                                    </table>
                                </div><!--end table-responsive-->
                                <div class="pt-3 border-top text-right">
                                    <a href="#" class="text-primary">View all <i class="mdi mdi-arrow-right"></i></a>
                                </div> 
                            </div>
                        </div>                                                                   
                    </div> 
                </div>
                <!-- end row -->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->


        <!-- Footer -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        © 2022 Zoogler by Mannatthemes.
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->


        <!-- jQuery  -->
        <script src="../public/assets/js/jquery.min.js"></script>
        <script src="../public/assets/js/popper.min.js"></script>
        <script src="../public/assets/js/bootstrap.min.js"></script>
        <script src="../public/assets/js/modernizr.min.js"></script>
        <script src="../public/assets/js/waves.js"></script>
        <script src="../public/assets/js/jquery.slimscroll.js"></script>
        <script src="../public/assets/js/jquery.nicescroll.js"></script>
        <script src="../public/assets/js/jquery.scrollTo.min.js"></script>

        <!-- KNOB JS -->
        <script src="../public/assets/plugins/jquery-knob/excanvas.js"></script>
        <script src="../public/assets/plugins/jquery-knob/jquery.knob.js"></script> 

        <script src="../public/assets/plugins/chart.js/chart.min.js"></script>
        <script src="../public/assets/pages/dashboard.js"></script>

        <!-- App js -->
        <script src="../public/assets/js/app.js"></script>
       
    </body>
</html>