<!-- Buka Permohonan Form -->
<!-- Content Header (Page header) -->
<section class="content-header">
        <h1>
          Buka Permohonan
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Setup Permohonan</a></li>
          <li class="active">Update Permohonan</li>
        </ol>
      </section>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Modifikasi Permohonan</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form role="form" action="<?= base_url() ?>CodeIgniterTraining/index.php/crudsession/save" method="post">
            <!-- System -->
            <div class="form-group">
                <label>Jenis Permohonan</label>
                <div class="row">
                    <div class="col-md-3">
                        <label class="radio-inline">
                            <input type="radio" name="application_type" value="Permohonan Biasa" required> Permohonan Biasa
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label class="radio-inline">
                            <input type="radio" name="application_type" value="Permohonan Rayuan"required> Permohonan Rayuan
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label class="radio-inline">
                            <input type="radio" name="application_type" value="Status Permohonan"required> Status Permohonan
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label class="radio-inline">
                            <input type="radio" name="application_type" value="Pengesahan Terimaan"required> Pengesahan Terimaan
                        </label>
                    </div>
                </div>
            </div>

            <!-- Semester -->
            <div class="form-group">
                <label>Semester</label>
                <select class="form-control" name="session_name" required>
                    <option>-- Sila Pilih --</option>
                    <option>SEMESTER I SESI 2023/2024 (SARJANA MUDA)</option>
                    <option>SEMESTER I SESI 2023/2024 (DIPLOMA)</option>
                    <option>SEMESTER II SESI 2023/2024 (SARJANA MUDA)</option>
                    <option>SEMESTER II SESI 2023/2024 (DIPLOMA)</option>
                </select>
            </div>

            <!-- Date -->
            <div class="row form-group">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="pull-left">Tarikh Mula</label>
                        <div class="input-group date pull-right" style="width:60%;">
                            <input type="date" class="form-control" name="start_date" id="start_date" onchange="validateForm()">
                        </div>
                    </div>
                </div>
                <div class = "col-md-4"></div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="pull-left">Tarikh Tamat</label>
                        <div class="input-group date pull-right" style="width:60%;">
                            <input type="date" class="form-control" name="end_date" id="end_date" onchange="validateForm()">
                        </div>
                    </div>
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary  col-md-6 pull-right" style="width:max-content;">SIMPAN</button>
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
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->