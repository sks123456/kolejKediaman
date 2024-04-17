<!-- sidebar: style can be found in sidebar.less -->
<?php
// Retrieve user data from session
$student_data = $this->session->userdata('student_data');
?>
<section class="sidebar">
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li class="nav-link <?php if($this->uri->segment(1) == 'studcrud') echo 'active' ?>" name="rules">
            <a href="<?php echo (base_url('CodeIgniterTraining/index.php/studcrud/viewPeraturan'));?>">
              <i class="fa fa-book"></i> <span>PERATURAN</span>
              <span class="pull-right-container">
              </span>
            </a>
          </li>
          <li class="nav-link <?php if($this->uri->segment(1) == 'studapplication') echo 'active' ?>" name="application">
            <a href="<?php echo (base_url('CodeIgniterTraining/index.php/studapplication')); ?>">
              <i class="fa fa-file"></i>
              <span>PERMOHONAN</span>
              <span class="pull-right-container">
              </span>
            </a>
          </li>
          <li class="nav-link <?php if($this->uri->segment(1) == 'cetak' && $this->uri->segment(2) != 'stud_status') echo 'active' ?>" name="print">
              <a href="<?php echo (base_url('CodeIgniterTraining/index.php/cetak/index/'));?><?=$student_data['STUD_MATRIC']?>"><i class="fa fa-print"></i>
              <span>CETAK</span></a>
              <span class="pull-right-container">
              </span>
          </li>
          <li class="nav-link <?php if($this->uri->segment(1) == 'cetak' && $this->uri->segment(2) == 'stud_status') echo 'active' ?>" name="status">
            <a href="<?php echo (base_url('CodeIgniterTraining/index.php/cetak/stud_status/'));?><?=$student_data['STUD_MATRIC']?>">
              <i class="fa fa-spinner"></i> <span>STATUS PERMOHONAN</span>
            </a>
          </li>
          <li class="" name="confirm">
            <a href="#">
              <i class="fa fa-check-circle"></i>
              <span>PENGESAHAN</span>
              </span>
            </a>
           
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
