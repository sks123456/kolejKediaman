<!DOCTYPE html>
<html>
<!-- Header -->
<?php $this->load->view('stud_header');
$student_data = $this->session->userdata('student_data');
?>


<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <?php $this->load->view('stud_side'); ?>
</aside>

<div class="content-wrapper" style="min-height:max-content;">

    <div class="container mt-5 " style="padding-block-start:2%">
        <div class="row">
            <!-- Makluman Pelajar -->
            <div class="col-md-4">
                <div class="card bg-dark">
                    <a href="<?php echo (base_url('CodeIgniterTraining/index.php/studcrud/viewPeraturan')); ?>">
                        <div class="card-body">
                            <i class="fa fa-book"></i>
                            <h5 class="card-title">PERATURAN</h5>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Setup Maklumat -->
            <div class="col-md-4">
                <div class="card bg-dark">
                    <a href="<?php echo (base_url('CodeIgniterTraining/index.php/studapplication')); ?>">
                        <div class="card-body">
                            <i class="fa fa-file"></i>
                            <h5 class="card-title">PERMOHONAN</h5>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Bilik -->
            <div class="col-md-4">
                <div class="card bg-dark">
                    <a href="<?php echo (base_url('CodeIgniterTraining/index.php/cetak/index/')); ?><?= $student_data['STUD_MATRIC'] ?>">
                        <div class="card-body">
                            <i class="fa fa-print"></i>
                            <h5 class="card-title">CETAK</h5>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Permohonan -->
            <div class="col-md-4">
                <div class="card bg-dark">
                    <div class="card-body">
                        <i class="fa fa-spinner"></i>
                        <h5 class="card-title">STATUS PERMOHONAN</h5>
                    </div>
                </div>
            </div>

            <!-- Report -->
            <div class="col-md-4">
                <div class="card bg-dark">
                    <div class="card-body">
                        <i class="fa fa-check-circle"></i>
                        <h5 class="card-title">PENGESAHAN</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php $this->load->view('footer'); ?>
<div class="control-sidebar-bg"></div>
<?php $this->load->view('control_sidebar'); ?>

</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>