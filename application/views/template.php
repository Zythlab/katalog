<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
     <title><?php echo $sites?> | <?php echo $pages?></title> 
    <!-- <title>Dashboard</title> -->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo base_url('assets');?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo base_url('assets');?>/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="<?php echo base_url('assets');?>/css/ionicons.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" media="screen" href="<?php echo base_url('assets')?>/css/jquery-ui.min.css">
    <!-- DATA TABLES -->
    <link href="<?php echo base_url('assets');?>/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Date picker -->
    <link href="<?php echo base_url('assets');?>/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url('assets');?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets');?>/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets');?>/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url('assets');?>/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the post via file:// -->
    <!--
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    -->
    <!-- jQuery 2.1.3 -->
    <script src="<?php echo base_url('assets');?>/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url('assets');?>/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url('assets');?>/js/jquery-ui.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets');?>/js/app.min.js" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?php echo base_url('assets');?>/js/loader.js"></script>
    <script src="<?php echo base_url('assets');?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  </head>
  <body class="skin-red">

    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url("Dashboard")?>" class="logo"><i class="fa fa-th-large"></i> <!-- <?php echo $sites->site_name?> --> Dashboard</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="<?php echo base_url('akun/logout')?>">
                  <span class="hidden-xs"><b>Logout</b></span>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li><a href="<?php echo base_url('katalog')?>"><i class="fa fa-male"></i>Katalog</a></li>
            <li><a href="<?php echo base_url('akun')?>"><i class="fa fa-legal"></i>Manajemen Akun</a></li>
            <li><a href="<?php echo base_url('kategori')?>"><i class="fa fa-legal"></i>Kategori</a></li>
            <li><a href="<?php echo base_url('website')?>"><i class="fa fa-legal"></i>Konfigurasi Website</a></li>
          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Right side column. Contains the navbar and content of the post -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?=$pages?>
          </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo $base = base_url('Dashboard');?>"><i class="fa fa-dashboard"></i> <!-- <?php echo $sites->site_name?> -->Dashboard</a></li>
                <?php
                $segments = $this->uri->segment_array();
                foreach($segments as $segment){
                    if($segment != end($segments)){
                        $base .= $segment.'/';
                        echo "<li class='upper><a href='$base'>$segment</a></li>";
                    } else echo '
                        <li class="upper active">'.$segment.'</li>';
                }?>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
			<?=$content?>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <!-- <?php echo $sites->site_name?> --> Dashboard 
        </div>
        <strong>Copyright &copy; <?=date('Y')?> <a href="#"></a></strong>&nbsp; All rights reserved.
      </footer>

    </div><!-- ./wrapper -->

    <!-- DATA TABES SCRIPT -->
    <script src="<?php echo base_url('assets');?>/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets');?>/plugins/datatables/jquery.dataTables.columnFilter.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets');?>/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url('assets');?>/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets');?>/plugins/chartjs/Chart.min.js"></script>
  </body>
</html>
<style>.datepicker{z-index:1200 !important;}</style>