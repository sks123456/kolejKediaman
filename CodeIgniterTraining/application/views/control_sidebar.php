<aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript:void(0)">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript:void(0)">
                  <i class="menu-icon fa fa-user bg-yellow"></i>

                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript:void(0)">
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript:void(0)">
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>

                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul>
            <!-- /.control-sidebar-menu -->
      </aside>
      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="<?php echo base_url() ?>html_ref/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url() ?>html_ref/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url() ?>html_ref/bower_components/select2/dist/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="<?php echo base_url() ?>html_ref/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="<?php echo base_url() ?>html_ref/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="<?php echo base_url() ?>html_ref/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <script src="<?php echo base_url() ?>html_ref/bower_components/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url() ?>html_ref/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap datepicker -->
    <script src="<?php echo base_url() ?>html_ref/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- bootstrap color picker -->
    <script src="<?php echo base_url() ?>html_ref/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="<?php echo base_url() ?>html_ref/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url() ?>html_ref/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>html_ref/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url() ?>html_ref/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url() ?>html_ref/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="<?php echo base_url() ?>html_ref/plugins/iCheck/icheck.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() ?>html_ref/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url() ?>html_ref/dist/js/demo.js"></script>
    <!-- page script -->
    <script>
      $(function() {
        $('#example1').DataTable()
        $('#example2').DataTable({
          'paging': true,
          'lengthChange': false,
          'searching': false,
          'ordering': true,
          'info': true,
          'autoWidth': false
        })

        //Initialize Select2 Elements
        $('.select2').select2()

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
          'placeholder': 'dd/mm/yyyy'
        })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {
          'placeholder': 'mm/dd/yyyy'
        })

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        })

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        //Timepicker
        $('.timepicker').timepicker({
          showInputs: false
        })
      })
    </script>