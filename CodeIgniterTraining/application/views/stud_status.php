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
<div class="content-wrapper" style="min-height:902.55px;">
    <section class="content-header">
        <h1>
            Status Permohonan
        </h1>
        <ol class="breadcrumb">
            <li><a href="http://localhost/fyp_kk/CodeIgniterTraining/index.php/studcrud/index#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Status Permohonan Semasa</li>
        </ol>
    </section>
    <section class="content">
        <?php if (empty($applications)) : ?>
            <div class="alert alert-info">
                <strong>Info!</strong> Tiada permohonan dalam sesi semasa ditemui.
            </div>
        <?php else : ?>
            <?php foreach ($applications as $application) : ?>
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= $application['SESSION_NAME'] ?></h3>
                    </div>
                    <div class="box-body">
                        <table class="table">
                            <tr>
                                <td style="width: 250px">Tarikh Hantar Permohonan </td>
                                <td>: Disimpan pada <?= date('Y-m-d H:i:s', strtotime($application['SUBMITTED_BY'])) ?></td>
                            </tr>
                            </tr>
                            <tr>
                                <td>Status Kelulusan </td>
                                <td>: <?= $application['APPLICATION_STATUS'] ?></td>
                            </tr>
                        </table>
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
</div>
<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>