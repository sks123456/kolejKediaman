<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="nav-link <?php if($this->uri->segment(1) == 'enrollment') echo 'active' ?>">
            <a href="<?php echo base_url('CodeIgniterTraining/index.php/enrollment');?>">
                <i class="fa fa-users"></i> <span>Maklumat Pelajar</span>
            </a>
        </li>
        <li class="treeview <?php if(in_array($this->uri->segment(1), ['session', 'channel', 'uniform'])) echo 'active menu-open'; ?>">
            <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Setup Maklumat</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="nav-link <?php if($this->uri->segment(1) == 'session') echo 'active' ?>"><a href="<?php echo base_url('CodeIgniterTraining/index.php/session');?>"> Buka Permohonan</a></li>
                <li class="nav-link <?php if($this->uri->segment(1) == 'channel') echo 'active' ?>"><a href="<?php echo base_url('CodeIgniterTraining/index.php/channel');?>"> Saluran Permohonan</a></li>
                <li class="nav-link <?php if($this->uri->segment(1) == 'uniform') echo 'active' ?>"><a href="<?php echo base_url('CodeIgniterTraining/index.php/uniform');?>"> Saluran Unit Uniform</a></li>
                <li class="nav-link <?php if($this->uri->segment(1) == 'mpp') echo 'active' ?>"><a href="<?php echo base_url('CodeIgniterTraining/index.php/mpp');?>"> Pendaftaran JPKK/MPP</a></li>
            </ul>
        </li>
        <li class="treeview <?php if($this->uri->segment(1) == 'room') echo 'active menu-open'; ?>">
            <a href="#">
                <i class="fa fa-book"></i>
                <span>Bilik</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="#"> Senarai Bilik Senior(KK)</a></li>
                <li><a href="#"> Jana Bilik</a></li>
                <li><a href="#"> Kemaskini Bilik</a></li>
                <li><a href="#"> Kemaskini Blok</a></li>
                <li><a href="#"> Jana Penempatan Bilik</a></li>
                <li><a href="#"> Ralat Kapasiti Bilik</a></li>
            </ul>
        </li>
        <li class="treeview <?php if(in_array($this->uri->segment(1), ['application', 'application_approval'])) echo 'active menu-open'; ?>">
            <a href="#">
                <i class="fa fa-edit"></i> <span>Permohonan</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="nav-link <?php if($this->uri->segment(1) == 'application') echo 'active' ?>"><a href="<?php echo base_url('CodeIgniterTraining/index.php/application');?>"> Pendaftaran Permohonan</a></li>
                <li class="nav-link <?php if($this->uri->segment(1) == 'application_approval') echo 'active' ?>"><a href="<?php echo base_url('CodeIgniterTraining/index.php/application_approval');?>"> Kemaskini Status Kelulusan</a></li>
            </ul>
        </li>
        <li class="treeview <?php if($this->uri->segment(1) == 'laporan') echo 'active menu-open'; ?>">
            <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Laporan</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="#"> Senarai Keseluruhan</a></li>
                <li><a href="#"> Senarai Permohonan</a></li>
                <li><a href="#"> Senarai Permohonan Rayuan</a></li>
                <li><a href="#"> Senarai Mengikut Status Kelulusan</a></li>
                <li><a href="#"> Senarai Penempatan Bilik</a></li>
                <li><a href="#"> Senarai Tiada Penempatan</a></li>
                <li><a href="#"> Senarai Bilik</a></li>
                <li><a href="#"> Statistik Saluran/Jantina</a></li>
                <li><a href="#"> Statistik Status/Saluran/Jantina</a></li>
                <li><a href="#"> Statistik Status Pengesahan</a></li>
                <li><a href="#"> Statistik Bilik Kosong</a></li>
            </ul>
        </li>
    </ul>
</section>
<!-- /.sidebar -->
