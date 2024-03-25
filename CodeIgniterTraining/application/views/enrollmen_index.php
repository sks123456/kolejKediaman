<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Hostel App | Maklumat Pelajar</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>html_ref/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>html_ref/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>html_ref/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>html_ref/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url() ?>html_ref/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>html_ref/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>html_ref/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>html_ref/bower_components/select2/dist/css/select2.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>html_ref/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>html_ref/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>html_ref/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>html_ref/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="http://localhost/FYP_kk/CodeIgniterTraining/index.php/" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>U</b>MT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>UMT</b>Hostel</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url() ?>html_ref/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <span class="hidden-xs">John Doe</span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?php echo base_url() ?>html_ref/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                  <p>
                    John Doe - Staff KK
                    <small>Kolej Kediaman UMT</small>
                  </p>
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
            <!-- Control Sidebar Toggle Button -->
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <?php $this->load->view('sidebar'); ?>
    </aside>

    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height:max-content;">

    <section class="content-header">
        <h1>
            Enrolmen
        </h1>
        <ol class="breadcrumb">
            <li><a href="http://localhost/FYP_kk/CodeIgniterTraining/index.php/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Maklumat Pelajar</a></li>
            <li class="active">Enrolmen</li>
        </ol>
    </section>
    <!-- Main content -->
    <!-- search student -->
    <?php $this->load->view('enrollmen_search'); ?>

    <!-- student list -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Senarai Pelajar</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <!-- Back Button -->
                    <?php if(isset($searched_student)): ?>
                    <div class="pull-right">
                        <a href="<?php echo base_url('CodeIgniterTraining/index.php/enrollmen'); ?>" class="btn btn-default">Back</a>
                    </div>
                    <?php endif; ?>
                    <!-- End Back Button -->
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No Matrik</th>
                                <th>Nama Pelajar</th>
                                <th>Program</th>
                                <th>No K/P</th>
                                <th>Merit</th>
                                <th>Merit Kolej</th>
                                <th>Kenderaan</th>
                            </tr>
                        </thead>
                        <?php foreach($students as $std) : ?>
                        <tbody>
                            <tr>
                                <td><?= $std->STUD_MATRIC ?></td>
                                <td><?= $std->NAMA_PELAJAR ?></td>
                                <td><?= $std->PROGRAM ?></td>
                                <td><?= $std->ICNO ?></td>
                                <td><?= $std->MERIT ?></td>
                                <td><?= $std->MERIT_KOLEJ ?></td>
                                <td style="background-color: <?php
                                                                if ($std->VEHICLE === 'M') {
                                                                    echo 'orange';
                                                                } elseif ($std->VEHICLE === 'C') {
                                                                    echo 'red';
                                                                } else {
                                                                    echo 'green';
                                                                }
                                                                ?>;">
                                </td>
                            </tr>
                        </tbody>
                        <?php endforeach ?>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
</div>

      <!-- Footer -->
      <?php $this->load->view('footer'); ?>

      <!-- Control Sidebar -->
      <?php $this->load->view('control_sidebar'); ?>
    </div>
</body>

</html>