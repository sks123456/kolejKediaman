<!-- buka permohonan form -->
<div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Pendaftaran Buka Permohonan</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form role="form" action="<?php echo base_url() ?>CodeIgniterTraining/index.php/crudsession/save" method="post" onsubmit=>
              <!-- system -->
              <div>
                <label style="margin-right: 10px;">Jenis Permohonan</label>
                <div style="display: flex; flex-direction: row;">
                  <div class="radio">
                    <label>
                      <input type="radio" name="application_type" id="optionsRadios1" value="Permohonan Biasa">
                      Permohonan Biasa
                    </label>
                  </div>
                  <div class="radio" style="margin: 10px;">
                    <label>
                      <input type="radio" name="application_type" id="optionsRadios2" value="Permohonan Rayuan">
                      Permohonan Rayuan
                    </label>
                  </div>
                  <div class="radio" style="margin: 10px;">
                    <label>
                      <input type="radio" name="application_type" id="optionsRadios3" value="Status Permohonan">
                      Status Permohonan
                    </label>
                  </div>
                  <div class="radio" style="margin: 10px;">
                    <label>
                      <input type="radio" name="application_type" id="optionsRadios4" value="Pengesahan Terimaan">
                      Pengesahan Terimaan
                    </label>
                  </div>
                </div>
              </div>


              <!-- semester -->
              <div class="form-group">
                <label>Semester</label>
                <select class="form-control" style="width:max-content;" name="session_name">
                  <option>-- Sila Pilih --</option>
                  <option>SEMESTER I SESI 2023/2024 (SARJANA MUDA)</option>
                  <option>SEMESTER I SESI 2023/2024 (DIPLOMA)</option>
                  <option>SEMESTER II SESI 2023/2024 (SARJANA MUDA)</option>
                  <option>SEMESTER II SESI 2023/2024 (DIPLOMA)</option>
                </select>
              </div>

              <!-- date -->
              <div class="row" style="display:flex; flex-direction:row; margin-left:auto">
                <div class="form-group" style="margin-right: 7%;">
                  <label>Tarikh Mula</label>
                  <div class="input-group date">
                    <input type="date" class="form-control pull-right" name="start_date" id="start_date" onchange="return validateForm()">
                  </div>
                </div>
                <div class="form-group">
                  <label>Tarikh Tamat</label>
                  <div class="input-group date">
                    <input type="date" class="form-control pull-right" name="end_date" id="end_date" onchange="return validateForm()">
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Simpan</button>
              </div>
            </form>

            <script>
              function validateForm() {
                var startDate = new Date(document.getElementById("start_date").value);
                var endDate = new Date(document.getElementById("end_date").value);

                if (startDate > endDate) {
                  alert("Tarikh Tamat harus selepas Tarikh Mula. Sila pilih tarikh yang betul.");
                  document.getElementById("start_date").value = null;
                  document.getElementById("end_date").value = null;
                }

                return true; // Allow form submission
              }
            </script>
            </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
