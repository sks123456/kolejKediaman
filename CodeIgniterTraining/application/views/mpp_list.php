<!-- Buka Permohonan Form -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Buka Permohonan
    </h1>
    <ol class="breadcrumb">
        <li><a href="http://localhost/FYP_kk/CodeIgniterTraining/index.php/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Setup Permohonan</a></li>
    </ol>
</section>
<section class="content">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Pendaftaran JPKK/MPP</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form role="form" action="" method="post" enctype="multipart/form-data">
                <!-- Sesi Akademik -->
                <div class="form-group">
                    <label>Sesi Akademik</label>
                    <select class="form-control" name="session_name">
                        <option selected></option>
                        <!-- Add similar blocks for other session options -->
                        <option>-- Sila Pilih --</option>
                        <option>S202324-I</option>
                        <option>S202324-II</option>
                        <option>S202425-I</option>
                        <option>S202425-II</option>
                    </select>
                </div>
                
                <!-- Matrik No -->
                <div class="form-group">
                    <label for="student_id">Matrik</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Sila Masukkan ID Pelajar" value="<?= isset($_POST['student_id']) ? $_POST['student_id'] : '' ?>" required>
                        <span class="input-group-btn">
                            <button type="submit">Semak Matrik >></button>
                        </span>
                    </div>
                </div>
                
                <!-- Jawatan -->
                <div class="form-group">
                    <!-- Hidden field for role_id -->
                    <input type="hidden" name="role_id" value="">
                    <label>Jawatan</label>
                    <div>
                        <label class="radio-inline">
                            <input type="radio" name="std_role" value="MKS" required> MKS
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="std_role" value="JPKK" required> JPKK
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="std_role" value="MPP" required> MPP
                        </label>
                    </div>
                </div>

                <!-- Status -->
                <div class="form-group">
                    <!-- Hidden field for role_id -->
                    <input type="hidden" name="status_id" value="">
                    <label>Status Aktif</label>
                    <div>
                        <label class="radio-inline">
                            <input type="radio" name="std_status" value="MKS" required> Ya
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="std_status" value="JPKK" required> Tidak
                        </label>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right" style="width:max-content;"> Simpan
                    </button>
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
</section>
