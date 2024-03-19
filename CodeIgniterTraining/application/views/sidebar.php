<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li class="treeview" name="pelajar">
            <a href="#">
              <i class="fa fa-users"></i> <span>Makluman Pelajar</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href=""></i> Enrolmen</a></li>
              <li><a href=""> Carian Pelajar</a></li>
            </ul>
          </li>
          <li class="active treeview" name="setup">
            <a href="#">
              <i class="fa fa-laptop"></i>
              <span>Setup Maklumat</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo (base_url('CodeIgniterTraining/index.php/session'));?>"> Buka Permohonan</a></li>
              <li><a href="<?php echo (base_url('CodeIgniterTraining/index.php/channel'));?>"> Saluran Permohonan</a></li>
              <li><a href="<?php echo (base_url('CodeIgniterTraining/index.php/uniform'));?>"> Saluran Unit Uniform</a></li>
              <li><a href="Admin_mppReg.html"> Pendaftaran JPKK/MPP</a></li>
            </ul>
          </li>
          <li class="treeview" name="bilik">
            <a href="#">
              <i class="fa fa-book"></i>
              <span>Bilik</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="Admin_roomList.html"> Senarai Bilik Senior(KK)</a></li>
              <li><a href="Admin_roomGenerate.html"> Jana Bilik</a></li>
              <li><a href="Admin_roomReg.html"> Kemaskini Bilik</a></li>
              <li><a href="Admin_blokUpdate.html"> Kemaskini Blok</a></li>
              <li><a href="Admin_roomAllocate.html"> Jana Penempatan Bilik</a></li>
              <li><a href="Admin_roomErr.html"> Ralat Kapasiti Bilik</a></li>
            </ul>
          </li>
          <li class="treeview" name="permohonan">
            <a href="#">
              <i class="fa fa-edit"></i> <span>Permohonan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo (base_url('CodeIgniterTraining/index.php/application'));?>"> Pendaftaran Permohonan</a></li>
              <li><a href=""> Kemaskini Status Kelulusan</a></li>
            </ul>
          </li>
          <li class="treeview" name="laporan">
            <a href="#">
              <i class="fa fa-pie-chart"></i>
              <span>Laporan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href=""> Senarai Keseluruhan</a></li>
              <li><a href=""> Senarai Permohonan</a></li>
              <li><a href=""> Senarai Permohonan Rayuan</a></li>
              <li><a href=""> Senarai Mengikut Status Kelulusan</a></li>
              <li><a href=""> Senarai Penempatan Bilik</a></li>
              <li><a href=""> Senarai Tiada Penempatan</a></li>
              <li><a href=""> Senarai Bilik</a></li>
              <li><a href=""> Statistik Saluran/Jantina</a></li>
              <li><a href=""> Statistik Status/Saluran/Jantina</a></li>
              <li><a href=""> Statistik Status Pengesahan</a></li>
              <li><a href=""> Statistik Bilik Kosong</a></li>
            </ul>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->