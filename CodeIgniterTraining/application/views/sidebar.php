<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-users"></i> <span>Makluman Pelajar</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href=""><i class="fa fa-circle-o"></i> Enrolmen</a></li>
              <li><a href=""><i class="fa fa-circle-o"></i> Carian Pelajar</a></li>
            </ul>
          </li>
          <li class="active treeview">
            <a href="#">
              <i class="fa fa-laptop"></i>
              <span>Setup Maklumat</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo (base_url('CodeIgniterTraining/index.php/crudsession/index'));?>"><i class="fa fa-circle-o"></i> Buka Permohonan</a></li>
              <li><a href="<?php echo (base_url('CodeIgniterTraining/index.php/crudchannel/index'));?>"><i class="fa fa-circle-o"></i> Saluran Permohonan</a></li>
              <li><a href="Admin_channelUni.html"><i class="fa fa-circle-o"></i> Saluran Uniform</a></li>
              <li><a href="Admin_mppReg.html"><i class="fa fa-circle-o"></i> Pendaftaran JPKK/MPP</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-book"></i>
              <span>Bilik</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="Admin_roomList.html"><i class="fa fa-circle-o"></i> Senarai Bilik Senior(KK)</a></li>
              <li><a href="Admin_roomGenerate.html"><i class="fa fa-circle-o"></i> Jana Bilik</a></li>
              <li><a href="Admin_roomReg.html"><i class="fa fa-circle-o"></i> Kemaskini Bilik</a></li>
              <li><a href="Admin_blokUpdate.html"><i class="fa fa-circle-o"></i> Kemaskini Blok</a></li>
              <li><a href="Admin_roomAllocate.html"><i class="fa fa-circle-o"></i> Jana Penempatan Bilik</a></li>
              <li><a href="Admin_roomErr.html"><i class="fa fa-circle-o"></i> Ralat Kapasiti Bilik</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-edit"></i> <span>Permohonan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href=""><i class="fa fa-circle-o"></i> Pendaftaran Permohonan</a></li>
              <li><a href=""><i class="fa fa-circle-o"></i> Kemaskini Status Kelulusan</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-pie-chart"></i>
              <span>Laporan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href=""><i class="fa fa-circle-o"></i> Senarai Keseluruhan</a></li>
              <li><a href=""><i class="fa fa-circle-o"></i> Senarai Permohonan</a></li>
              <li><a href=""><i class="fa fa-circle-o"></i> Senarai Permohonan Rayuan</a></li>
              <li><a href=""><i class="fa fa-circle-o"></i> Senarai Mengikut Status Kelulusan</a></li>
              <li><a href=""><i class="fa fa-circle-o"></i> Senarai Penempatan Bilik</a></li>
              <li><a href=""><i class="fa fa-circle-o"></i> Senarai Tiada Penempatan</a></li>
              <li><a href=""><i class="fa fa-circle-o"></i> Senarai Bilik</a></li>
              <li><a href=""><i class="fa fa-circle-o"></i> Statistik Saluran/Jantina</a></li>
              <li><a href=""><i class="fa fa-circle-o"></i> Statistik Status/Saluran/Jantina</a></li>
              <li><a href=""><i class="fa fa-circle-o"></i> Statistik Status Pengesahan</a></li>
              <li><a href=""><i class="fa fa-circle-o"></i> Statistik Bilik Kosong</a></li>
            </ul>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->