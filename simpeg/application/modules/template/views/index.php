<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SIMPEG | <?=$title?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?=base_url();?>assets/back/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?=base_url();?>assets/back/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?=base_url();?>assets/back/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="<?=base_url();?>assets/back/css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="<?=base_url();?>assets/back/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="<?=base_url();?>assets/back/css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?=base_url();?>assets/back/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?=base_url();?>assets/back/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?=base_url();?>assets/back/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- Jasny CSS -->
        <link href="<?=base_url();?>assets/back/css/jasny/jasny-bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url();?>assets/back/css/jasny/jasny-bootstrap.css.map" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?=base_url();?>assets/back/css/additional/add.css" rel="stylesheet" type="text/css" />


        <!-- iCheck for checkboxes and radio inputs -->
        <link href="<?=base_url();?>assets/back/css/iCheck/all.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap Color Picker -->
        <link href="<?=base_url();?>assets/back/css/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet"/>
        <!-- Bootstrap time Picker -->
        <link href="<?=base_url();?>assets/back/css/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                SIMPEG
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?=$username?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?=base_url();?>assets/back/img/avatar3.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?=$username?> - Admin
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>


        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?=base_url();?>assets/back/img/avatar3.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?=$username?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-fw fa-keyboard-o">
                                </i> <span>Layanan</span>                                
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?=base_url();?>data_profil_pegawai/daftar"><i class="fa fa-angle-double-right"></i>Data Profil Pegawai</a></li>
                                <li><a href="<?=base_url();?>data_riwayat_pendidikan/daftar"><i class="fa fa-angle-double-right"></i>Data Riwayat Pendidikan</a></li>
                                <li><a href="<?=base_url();?>data_diklat/daftar"><i class="fa fa-angle-double-right"></i>Data Diklat</a></li>
                                <li><a href="<?=base_url();?>data_keluarga/daftar"><i class="fa fa-angle-double-right"></i>Data Keluarga</a></li>
                                <li><a href="<?=base_url();?>hukuman_disiplin/daftar"><i class="fa fa-angle-double-right"></i>Data Hukuman dan Disiplin</a></li>
                                <li><a href="<?=base_url();?>pengalaman_organisasi/daftar"><i class="fa fa-angle-double-right"></i>Data Penglaman organisasi</a></li>
                                <li><a href="<?=base_url();?>riwayat_dp3/daftar"><i class="fa fa-angle-double-right"></i>Riwayat DP3</a></li>
                                <li><a href="<?=base_url();?>data_jabatan/daftar"><i class="fa fa-angle-double-right"></i>Data jabatan</a></li>
                                <li><a href="<?=base_url();?>kepangkatan/daftar"><i class="fa fa-angle-double-right"></i>Kepangkatan</a></li>
                                <li><a href="<?=base_url();?>pendidikan_non_formal/daftar"><i class="fa fa-angle-double-right"></i>Data Pendidikan Non Formal</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-fw fa-keyboard-o"></i>
                                <span>Laporan</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?=base_url();?>laporan"><i class="fa fa-angle-double-right"></i>lakip</a></li>
                                <li><a href="<?=base_url();?>laporan/lap_simpeg"><i class="fa fa-angle-double-right"></i>Laporan Simpeg</a></li>
                            </ul>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?=$title_header?>
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_url();?>admin"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active"><?=$title_header?></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                <?php
                $this->load->view($modules.'/'.$view_file);
                ?>
                </section><!-- /.content -->
                <div id="lap" style="height:500px;"></div>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        <!-- jQuery 1.11.1 -->
        <script src="<?=base_url();?>assets/back/js/jquery-1.11.1.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="<?=base_url();?>assets/back/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?=base_url();?>assets/back/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- InputMask -->
        <script src="<?=base_url();?>assets/back/js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="<?=base_url();?>assets/back/js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="<?=base_url();?>assets/back/js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="<?=base_url();?>assets/back/js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="<?=base_url();?>assets/back/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="<?=base_url();?>assets/back/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="<?=base_url();?>assets/back/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?=base_url();?>assets/back/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="<?=base_url();?>assets/back/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="<?=base_url();?>assets/back/js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- bootstrap color picker -->
        <script src="<?=base_url();?>assets/back/js/plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
        <!-- bootstrap time picker -->
        <script src="<?=base_url();?>assets/back/js/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?=base_url();?>assets/back/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?=base_url();?>assets/back/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="<?=base_url();?>assets/back/js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="<?=base_url();?>assets/back/js/AdminLTE/dashboard.js" type="text/javascript"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="<?=base_url();?>assets/back/js/AdminLTE/demo.js" type="text/javascript"></script>

        <!-- jasny for cahce memory picture-->
        <script src="<?=base_url();?>assets/back/js/plugins/jasny/jasny-bootstrap.js" type="text/javascript"></script>
        <!-- CK Editor -->
        <script src="<?=base_url();?>assets/back/js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function() {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('editor1');
                //bootstrap WYSIHTML5 - text editor
                $(".textarea").wysihtml5();
            });
        </script>

        <!-- Additional Script -->
        <script src="<?=base_url();?>assets/back/js/additional/<?=$javascript;?>" type="text/javascript"></script>

    </body>
</html>