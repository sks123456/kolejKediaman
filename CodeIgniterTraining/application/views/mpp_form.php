<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Setup Maklumat
    </h1>
    <ol class="breadcrumb">
        <li><a href="http://localhost/FYP_kk/CodeIgniterTraining/index.php/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Registration for JPKK/MPP</a></li>
    </ol>
</section>
<section class="content">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Registration for JPKK/MPP</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php if (!isset($student_data)) : ?>
                <form role="form" action="<?= base_url() ?>CodeIgniterTraining/index.php/register_MPP/check_student_id" method="post" enctype="multipart/form-data">
            <?php endif; ?>

            <!-- Sesi Akademik -->
            <div class="form-group">
                <label for="session_selected">Academic Session</label>
                <select class="form-control" name="session_selected">
                    <?php if (count($sessions) > 1) : ?>
                        <option value="">-- Please Choose --</option>
                    <?php endif ?>
                    <?php foreach ($sessions as $academic_session) : ?>
                        <option value="<?= $academic_session->sesi_akademik_id ?>"><?= $academic_session->sesi_akademik_desc ?></option>
                    <?php endforeach; ?>

                </select>
            </div>

            <!-- Student ID input -->
            <div class="form-group">
                <label for="student_id">Student ID</label>
                <div class="row">
                    <div class="col-xs-10">
                        <input type="text" style="width: 300px" class="form-control" id="student_id" name="student_id" placeholder="Enter Student ID" value="<?= isset($_POST['student_id']) ? $_POST['student_id'] : '' ?>" required>
                        <?php if (isset($message)) echo '<div class="text-danger">' . $message . '</div>'; ?>
                    </div>
                    <div class="col-xs-2">
                        <?php if (!isset($student_data)) : ?>
                            <button type="submit" class="btn btn-primary">Check Matric ID >></button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Student details -->
            <?php if (isset($student_data)) : ?>
                <div class="col-md-6">
                    <div class="form-group">
                        <h4>Student Details:</h4>
                        <p>Name: <?= $student_data['NAMA_PELAJAR'] ?></p>
                        <p>Program: <?= $student_data['PROGRAM'] ?></p>
                        <!-- Add more details as needed -->
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Student Role Information</h3>
                        </div>
                        <div class="box-body">
                            <form role="form" action="<?= base_url() ?>CodeIgniterTraining/index.php/register_MPP/submit_form" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="stud_matric" value="<?= isset($_POST['student_id']) ? $_POST['student_id'] : '' ?>">
                                
                                <!-- Role -->
                                <div class="form-group">
                                    <label>Role</label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="radio-inline">
                                                <input type="radio" name="studrole_role" value="MKS" required> MKS
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="radio-inline">
                                                <input type="radio" name="studrole_role" value="JPKK" required> JPKK
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="radio-inline">
                                                <input type="radio" name="studrole_role" value="MPP" required> MPP
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="form-group">
                                    <label>Status</label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="radio-inline">
                                                <input type="radio" name="studrole_status" value="Active" required> Active
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="radio-inline">
                                                <input type="radio" name="studrole_status" value="Not Active" required> Not Active
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            </form> <!-- Closing form tag moved here -->


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
