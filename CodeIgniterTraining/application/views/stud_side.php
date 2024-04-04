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
          <li class="" name="application">
            <a href="#">
              <i class="fa fa-file"></i>
              <span>PERMOHONAN</span>
              <span class="pull-right-container">
              </span>
            </a>
          </li>
          <li class="nav-link <?php if($this->uri->segment(1) == 'cetak') echo 'active' ?>" name="print">
              <a href="<?php echo (base_url('CodeIgniterTraining/index.php/cetak/index/'));?><?=$student_data['STUD_MATRIC']?>"><i class="fa fa-print"></i>
              <span>CETAK</span></a>
              <span class="pull-right-container">
              </span>
          </li>
          <li class="nav-link <?php if($this->uri->segment(1) == 'status_permohonan') echo 'active' ?>" name="status">
            <a href="<?php echo (base_url('CodeIgniterTraining/index.php/status_permohonan/index'));?>">
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