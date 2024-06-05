<!DOCTYPE html>
<html>
<!-- Header -->
<?php $this->load->view('stud_header'); ?>
<?php
// Retrieve user data from session
$student_data = $this->session->userdata('student_data');
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <?php $this->load->view('stud_side'); ?>
</aside>

<div class="content-wrapper" style="min-height:max-content;">
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
        <?php if (isset($no_sessions) && $no_sessions) : ?>
            <div class="alert alert-info">
                <strong>Info!</strong> No active sessions found.
            </div>
        <?php else : ?>
            <form role="form" action="<?= base_url() ?>CodeIgniterTraining/index.php/application/stud_submit_application" method="post" enctype="multipart/form-data">
                <div class="box box-info">
                    <!-- /.box-header -->
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= $sessions['SESSION_NAME'] ?></h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" name="stud_matric" value="<?= $student_data['STUD_MATRIC'] ?>">
                            <input type="hidden" name="session_id" value="<?= $sessions['SESSION_ID'] ?>">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="col-md-2"><label for="Channels">Saluran Permohonan</label></td>
                                        <td class="col-md-3">
                                            <select class="form-control" name="channel_selected" id="channelSelect" required>
                                                <option value="">-- Sila Pilih --</option>
                                                <?php foreach ($channels as $channel) : ?>
                                                    <option value="<?= $channel['CHANNEL_ID'] ?>"><?= $channel['CHANNEL_NAME'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                        <td class="col-md-6"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group" id="unitUniformField" style="display: none;">
                                                <label for="unit_uniform">Nama Unit Uniform</label>
                                                <select class="form-control" name="unit_uniform" id="unit_uniform">
                                                    <option value="">-- Sila Pilih --</option>
                                                    <?php foreach ($uniforms as $uniform) : ?>
                                                        <option value="<?= $uniform['UNIFORM_ID'] ?>"><?= $uniform['UNIFORM_NAME'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        <td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!-- File Upload -->
                                            <div class="form-group" id="pdfDocumentField" style="display: none;">
                                                <label for="pdf_document">Muat Naik Dokumen PDF</label>
                                                <!-- Create new record - standard file upload input -->
                                                <input type="file" name="pdf_document" id="pdf_document" accept=".pdf">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Pengakuan</h3>
                    </div>
                    <div class="box-body">
                        <iframe src="../pengakuan/pengakuan.pdf" width="100%" height="600px"></iframe>
                        <h4>Jumlah Merit</h4>
                        <div class="box-body">
                            <table class="table col-md-6">
                                <tr>
                                    <td>
                                        Merit: <?= $student_data['MERIT'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Merit Kolej: <?= $student_data['MERIT_KOLEJ'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" id="checkbox" name="checkbox" required> Saya bersetuju dengan semua terma dan syarat yang dinyatakan di atas</td>
                                </tr>
                            </table>
                            <input type="submit" value="Simpan dan Hantar Permohonan">
                        </div>
                    </div>
                </div>
            </form>
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
        <?php endif; ?>
    </section>
</div>
<div>
    <?php $this->load->view('footer'); ?>
    <div class="control-sidebar-bg">
        <?php $this->load->view('control_sidebar'); ?>
    </div>
</div>
<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>