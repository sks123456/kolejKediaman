<!DOCTYPE html>
<html>
<?php
// Retrieve user data from session
$student_data = $this->session->userdata('student_data');
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hostel App | Student</title>
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

    <!-- Additional Styles -->
    <style>
        .card {
            border: 1px solid #ddd;
            /* Add border to the card */
            margin-bottom: 20px;
            /* Adjust spacing between cards */
        }

        .card-body {
            padding: 15px;
            /* Add padding to the card body */
        }

        .card-title {
            margin-bottom: 15px;
            /* Adjust spacing between card title and list */
        }

        .list-unstyled {
            margin-left: 20px;
            /* Adjust spacing for the list */
        }
    </style>
</head>

<body class="hold-transition skin-purple sidebar-mini sidebar-collapse">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="http://localhost/FYP_kk/CodeIgniterTraining/index.php/student" class="logo">
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
                                <span class="hidden-xs"><?=$student_data['STUD_MATRIC']?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?php echo base_url() ?>html_ref/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                    <p>
                                        John Doe - Student
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
                        <!-- <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li> -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <?php $this->load->view('stud_side'); ?>
        </aside>
        <!-- Buka Permohonan Form -->
        <!-- Content Header (Page header) -->
        <div class="content-wrapper" style="min-height:902.55px;">
            <section class="content-header">
                <h1>
                    Cetak Borang Permohonan
                </h1>
                <ol class="breadcrumb">
                    <li><a href="http://localhost/fyp_kk/CodeIgniterTraining/index.php/studcrud/index#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Cetak</li>
                </ol>
            </section>
            <section class="content">
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <div class="box-header with-border">
                        <h3 class="box-title"><?=$sessions['SESSION_NAME']?></h3>
                    </div>
                    <div class="box-body">
                        <table class="table">
                            <tr>
                                <td style="width: 100px">Nama </td>
                                <td style="width: 400px">: <?=$student_data['NAMA_PELAJAR']?></td>
                                <td style="width: 100px">No Matrik </td>
                                <td style="width: 400px">: <?=$student_data['STUD_MATRIC']?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Program </td>
                                <td>: <?=$student_data['PROGRAM']?></td>
                            </tr>
                            <tr>
                                <td>Saluran </td>
                                <td>: <?=$application['CHANNEL_NAME']?></td>
                            </tr>
                            <tr>
                                <td>Lampiran </td>
                                <td>:*Dokumen*</td>
                            </tr>
                            <tr>
                                <td>Merit </td>
                                <td>: <?=$application['MERIT']?></td>

                            </tr>
                            <tr>
                                <td>Merit Kolej</td>
                                <td>: <?=$application['MERIT_KOLEJ']?></td>

                            </tr>
                        </table>
                        <br>
                        <button type="submit" class="btn bg-purple ">Cetak</button>
                    </div>

                </div>
            </section>
            <?php $this->load->view('footer'); ?>
            <div class="control-sidebar-bg"></div>
            <?php $this->load->view('control_sidebar'); ?>
        </div>
    </div>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>