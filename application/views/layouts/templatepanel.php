<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <title>. : SISTEMA GRANJA : .</title>
        <meta name="description" content="">
        <meta name="author" content="">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- #CSS Links -->
        <!-- Basic Styles -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() ?>public/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/font-awesome.min.css">

        <!-- SmartAdmin Styles : Please note (smartadmin-production.css) was created using LESS variables -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() ?>public/css/smartadmin-production.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() ?>public/css/smartadmin-skins.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() ?>public/css/curiosity.css">
        <!-- SmartAdmin RTL Support is under construction
                 This RTL CSS will be released in version 1.5
        <link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-rtl.min.css"> -->

        <!-- We recommend you use "your_style.css" to override SmartAdmin
             specific styles this will also ensure you retrain your customization with each SmartAdmin update.
        <link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

        <!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() ?>public/css/demo.min.css">

        <!-- #FAVICONS -->
        <!--		<link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
                        <link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon">-->

        <!-- #GOOGLE FONT -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">
        <link rel="stylesheet" href="https://select2.github.io/dist/css/select2.min.css">
        <script type="text/javascript">
            var baseurl = '<?php echo base_url(); ?>';
        </script>
        <script src="<?php echo base_url() ?>public/js/libs/jquery-2.0.2.min.js"></script>
        <script src="<?php echo base_url() ?>public/js/libs/jquery-ui-1.10.3.min.js"></script>
        <script src="https://select2.github.io/dist/js/select2.full.js"></script>
        <script src="<?php echo base_url() ?>public/js/app.config.js"></script>

        <!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
        <script src="<?php echo base_url() ?>public/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script>

        <!-- BOOTSTRAP JS -->
<!--		<script src="js/bootstrap/bootstrap.min.js"></script>-->
        <script src="<?php echo base_url() ?>public/js/bootstrap/bootstrap.min.js"></script>

        <!-- CUSTOM NOTIFICATION -->
        <script src="<?php echo base_url() ?>public/js/notification/SmartNotification.min.js"></script>

        <!-- JARVIS WIDGETS -->
        <script src="<?php echo base_url() ?>public/js/smartwidgets/jarvis.widget.min.js"></script>

 

        <!-- JQUERY MASKED INPUT -->
        <script src="<?php echo base_url() ?>public/js/plugin/masked-input/jquery.maskedinput.min.js"></script>

    
        <!-- JQUERY UI + Bootstrap Slider -->
        <script src="<?php echo base_url() ?>public/js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

        <!-- browser msie issue fix -->
        <script src="<?php echo base_url() ?>public/js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

        <!-- FastClick: For mobile devices: you can disable this in app.js -->
        <script src="<?php echo base_url() ?>public/js/plugin/fastclick/fastclick.min.js"></script>

        <script type="text/javascript" src="<?php echo base_url() ?>public/js/plugin/datatables/jquery.dataTables.min.js" ></script>
        <script type="text/javascript" src="<?php echo base_url() ?>public/js/plugin/datatables/dataTables.bootstrap.min.js" ></script>
         <script type="text/javascript" src="<?php echo base_url() ?>public/js/bootbox.min.js"></script>

    </head>
    <body class=" smart-style-3 fixed-header fixed-navigation fixed-ribbon fixed-page-footer">
        <header id="header">
            <div id="logo-group">
                <img width="20%"  src="<?php echo base_url();?>public/img/tcpdf_logo.jpg" />    
                <!-- PLACE YOUR LOGO HERE -->
                <span  id="logo" style="font-size: 30px;color:white;font-weight: bold;float: left;">  SISGRANJA </span>

            </div>


            <!-- pulled right: nav area -->
            <div class="pull-right">

                <!-- collapse menu button -->
                <div id="hide-menu" class="btn-header pull-right">
                    <span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
                </div>
                <!-- end collapse menu -->

                <!-- #MOBILE -->
                <!-- Top menu profile link : this shows only when top menu is active -->
                <ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
                    <li class="">
                        <a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown">
                            <img src="<?php echo base_url(); ?>public/img/miller.jpg" alt="Me" class="online" />
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"><i class="fa fa-cog"></i> Setting</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#ajax/profile.html" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-user"></i> <u>P</u>rofile</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="toggleShortcut"><i class="fa fa-arrow-down"></i> <u>S</u>hortcut</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Full <u>S</u>creen</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo base_url(); ?>login/delete" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong></a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <!-- logout button -->
                <div id="logout" class="btn-header transparent pull-right">
                    <span> <a href="<?php echo base_url(); ?>login/delete" title="Sign Out" data-action="userLogout" data-logout-msg="(Seguridad) cerrar sesion antes de cerrar el navegador web"><i class="fa fa-sign-out"></i></a> </span>
                </div>

                <!-- fullscreen button -->
                <div id="fullscreen" class="btn-header transparent pull-right">
                    <span> <a id="maximizar" href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>
                </div>


            </div>
            <!-- end pulled right: nav area -->

        </header>
        <aside id="left-panel">

            <!-- User info -->
            <div class="login-info">
                <span> <!-- User image size is adjusted inside CSS, it should stay as is -->
                    <a href="javascript:void(0);" >
                        <i class="fa fa-user fa-2x"></i>
                        <span>
                            <?php echo $_SESSION["username"]; ?>
                        </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                </span>
            </div>
            <!-- end user info -->

            <!-- NAVIGATION : This navigation is also responsive

            To make this navigation dynamic please make sure to link the node
            (the reference to the nav > ul) after page load. Or the navigation
            will not initialize.
            -->
            <nav>
                <ul>
                    <li class="">
                        <a href="panel/vienvenida" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Principal</span></a>
                    </li>
                    <?php print menu_levels("0"); ?>
<!--                    <li>
                        <a href="#"><i class="fa fa-lg fa-fw fa-folder"></i> <span class="menu-item-parent">Administracion</span></a>
                        <ul>
                             <li>
                                <a href="animales">Animales</a>
                            </li>
                            <li>
                                <a href="#">Causa Aborto</a>
                            </li>
                            <li>
                                <a href="#">Causa Rechazo</a>
                            </li>
                            <li>
                                <a href="#">Causa no Inceminada</a>
                            </li>
                            <li>
                                <a href="#">Diagnostico de Utero</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-lg fa-fw fa-cog"></i> <span class="menu-item-parent">Gestionar Eventos</span></a>
                        <ul>
                            <li>
                                
                                <a href="#">Crear Evento</a>
                            </li>
                            <li>
                                <a href="eventos">Eventos</a>
                            </li>
                        </ul>
                    </li>
                    -->
               




                </ul>

            </nav>
            <span class="minifyme" data-action="minifyMenu"> <i class="fa fa-arrow-circle-left hit"></i> </span>

        </aside>
        <!-- END NAVIGATION -->

        <!-- #MAIN PANEL -->
        <div id="main" role="main">

            <!-- RIBBON -->
            <div id="ribbon">

                <span class="ribbon-button-alignment">
                    <span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh" data-placement="bottom"  data-html="true" data-reset-msg="Estas seguro de deseas recargar el sistema?"><i class="fa fa-refresh"></i></span>
                </span>

                <!-- breadcrumb -->
                <ol class="breadcrumb">
                    <!-- This is auto generated -->
                </ol>
                <!-- end breadcrumb -->


            </div>
            <!-- END RIBBON -->

            <!-- #MAIN CONTENT -->
            <div id="content">
                <?php echo $content_for_layout; ?>
            </div>
            <div class="hidden">
                <div id="dialog-smart-error">
                    <p>
                        Usted debe seleccionar un registro para poder ejecutar esta accion.
                    </p>
                </div>
            </div>
            <!-- END #MAIN CONTENT -->

        </div>
        <!-- END #MAIN PANEL -->

        <!-- #PAGE FOOTER -->
        <div class="page-footer">
            <div class="row">
                <div class="col-xs-12 col-sm-12 text-right">
                    <span class="txt-color-white">Curiosity © 2016</span>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- END FOOTER -->

        <!-- #SHORTCUT AREA : With large tiles (activated via clicking user name tag)
                 Note: These tiles are completely responsive, you can add as many as you like -->

        <script src="<?php echo base_url() ?>public/js/demo.min.js"></script>

        <!-- MAIN APP JS FILE -->
        <script src="<?php echo base_url() ?>public/js/app.min.js"></script>

        <!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
        <!-- Voice command : plugin -->
        <script src="<?php echo base_url() ?>public/js/speech/voicecommand.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>public/js/curiosity.js" ></script>

    </body>
</html>
