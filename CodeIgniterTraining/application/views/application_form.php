<!-- Pendaftaran Permohonan Form -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Pendaftaran Permohonan
    </h1>
    <ol class="breadcrumb">
        <li><a href="http://localhost/FYP_kk/CodeIgniterTraining/index.php/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Pendaftaran</a></li>
        <li class="active">Pendaftaran Permohonan</li>
    </ol>
</section>
<section class="content">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Pendaftaran Permohonan</h3>
        </div>
        <!-- /.box-header -->
        <!-- registration_index.php -->
        <div class="box-body">
            <?php if (!isset($student_data)) : ?>
                <form role="form" action="<?= base_url() ?>CodeIgniterTraining/index.php/application/check_student_id" method="post" enctype="multipart/form-data">
                <?php endif; ?>

                <!-- System -->
                <!-- Session selection -->
                <div class="form-group">
                    <label for="session_selected">Session</label>
                    <select class="form-control" name="session_selected">
                        <?php if (count($sessions) > 1) : ?>
                            <option value="">-- Sila Pilih --</option>
                        <?php endif ?>
                        <?php foreach ($sessions as $session) : ?>
                            <option value="<?= $session->session_id ?>"><?= $session->session_name ?></option>
                        <?php endforeach; ?>

                    </select>
                </div>
        </div>
        <!-- Student ID input -->
        <div class="row">
            <div class="box-body">

                <div class="col-md-6" style="margin-bottom:10px">
                    <div class="form-group">
                        <label for="student_id">Student ID</label>
                        <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Enter Student ID" value="<?= isset($_POST['student_id']) ? $_POST['student_id'] : '' ?>" required>
                        <?php if (isset($message)) echo '<div class="text-danger">' . $message . '</div>'; ?>
                    </div>
                    <?php if (!isset($student_data)) : ?>
                        <button type="submit" class="btn btn-primary">Semak Matrik</button>
                    <?php endif; ?>

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
                    <!-- New form -->
                    <div class="col-md-12">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Maklumat Pilihan</h3>
                            </div>
                            <div class="box-body">
                                <form role="form" action="<?= base_url() ?>CodeIgniterTraining/index.php/application/submit_application" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="stud_matric" value="<?= isset($_POST['student_id']) ? $_POST['student_id'] : '' ?>">
                                    <input type="hidden" name="session_id" value="<?= $session->session_id ?>">
                                    <div class="form-group">
                                        <label for="Channels">Saluran Permohonan :</label>
                                        <select class="form-control" name="channel_selected" id="channelSelect">
                                            <option value="">-- Sila Pilih --</option>
                                            <?php foreach ($channels as $channel) : ?>
                                                <option value="<?= $channel->channel_id ?>"><?= $channel->channel_name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group" id="unitUniformField" style="display: none;">
                                        <label for="unit_uniform">Nama Unit Uniform</label>
                                        <select class="form-control" name="unit_uniform" id="unit_uniform">
                                            <option value="">-- Sila Pilih --</option>
                                            <?php foreach ($uniforms as $uniform) : ?>
                                                <option value="<?= $uniform->UNIFORM_ID ?>"><?= $uniform->UNIFORM_NAME ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <!-- File Upload -->
                                    <div class="form-group" id="pdfDocumentField" style="display: none;">
                                        <label for="pdf_document">Muat Naik Dokumen PDF</label>
                                        <!-- Create new record - standard file upload input -->
                                        <input type="file" name="pdf_document" id="pdf_document" accept=".pdf">
                                    </div>
                                    <script>
                                        document.getElementById('channelSelect').addEventListener('change', function() {
                                            var channelSelect = this;
                                            var selectedOption = channelSelect.options[channelSelect.selectedIndex].text;
                                            var unitUniformField = document.getElementById('unitUniformField');
                                            var pdfDocumentField = document.getElementById('pdfDocumentField');

                                            if (selectedOption === 'Unit Uniform') {
                                                unitUniformField.style.display = 'block';
                                                pdfDocumentField.style.display = 'block'; // Always show the PDF document field if 'Unit Uniform' is selected
                                            } else {
                                                unitUniformField.style.display = 'none';
                                                // Show PDF document field only if the selected option is not 'Biasa' or the default option
                                                if (selectedOption !== 'Biasa' && selectedOption !== '-- Sila Pilih --') {
                                                    pdfDocumentField.style.display = 'block';
                                                } else {
                                                    pdfDocumentField.style.display = 'none';
                                                }
                                            }
                                        });
                                    </script>



                                    <!-- Add more fields as needed -->
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            </form>
        </div>
    </div>
</section>