<!DOCTYPE html>
<html>
<!-- Header -->
<?php $this->load->view('stud_header'); ?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <?php $this->load->view('stud_side'); ?>
</aside>
<!-- Buka Permohonan Form -->
<!-- Content Header (Page header) -->
<!-- Content Wrapper -->
<div class="content-wrapper" style="min-height:902.55px;">
    <section class="content-header">
        <h1>Cetak Borang Permohonan</h1>
        <ol class="breadcrumb">
            <li><a href="http://localhost/fyp_kk/CodeIgniterTraining/index.php/studcrud/index#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Cetak</li>
        </ol>
    </section>
    <section class="content">
        <?php if (empty($applications)) : ?>
            <div class="alert alert-info">
                <strong>Info!</strong> Tiada permohonan ditemui untuk pelajar ini.
            </div>
        <?php else : ?>
            <?php foreach ($applications as $application) : ?>
                <!-- Card for each application -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <table>
                                <tr>
                                    <td style="padding-right: 25px" ;><?= $application['SESSION_NAME'] ?>
                                    <td>
                                    <td style="color:red" ;><?= $application['APPLICATION_STATUS'] ?></td>
                                    </td>
                            </table>
                        </h3>
                    </div>
                    <div class="box-body">
                        <table class="table">
                            <tr>
                                <td style="width: 100px">Nama </td>
                                <td style="width: 400px">: <?= $student_data['NAMA_PELAJAR'] ?></td>
                                <td style="width: 100px">No Matrik </td>
                                <td style="width: 400px">: <?= $student_data['STUD_MATRIC'] ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Program </td>
                                <td>: <?= $student_data['PROGRAM'] ?></td>
                            </tr>
                            <tr>
                                <td>Saluran </td>
                                <td>: <?= $application['CHANNEL_NAME'] ?></td>
                                <?php if ($application['CHANNEL_ID'] == '2') : ?>
                                    <td>Unit Uniform</td>
                                    <td><?= $application['UNIFORM_NAME'] ?></td>
                                <?php endif ?>
                            </tr>
                            <tr>
                                <td>Lampiran </td>
                                <td>
                                    <?php if (isset($application['APPLICATION_UPLOAD_NAME'])) : ?>
                                        <a href="<?= base_url('CodeIgniterTraining/index.php/application_approval/download/' . $application['APPLICATION_ID']) ?>" target="_blank"><?= $application['APPLICATION_UPLOAD_NAME'] ?></a>
                                    <?php else : ?>
                                        Tiada Dokumen
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Merit </td>
                                <td>: <?= $application['MERIT'] ?></td>
                            </tr>
                            <tr>
                                <td>Merit Kolej</td>
                                <td>: <?= $application['MERIT_KOLEJ'] ?></td>
                            </tr>
                        </table>
                        <br>
                        <button type="submit" class="btn bg-purple">Cetak</button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>
</div>
<?php $this->load->view('footer'); ?>
<div class="control-sidebar-bg"></div>
<?php $this->load->view('control_sidebar'); ?>
</div>
<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>