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
                    Peraturan
                </h1>
                <ol class="breadcrumb">
                    <li><a href="http://localhost/fyp_kk/CodeIgniterTraining/index.php/studcrud/index#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Peraturan</li>
                </ol>
            </section>
            <section class="content">
                <div class="box box-info">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <iframe src="http://localhost/FYP_kk/CodeIgniterTraining/index.php/studcrud/peraturan" width="100%" height="902.75px" frameborder="0"></iframe>
                    </div>

                </div>
            </section>
            <?php $this->load->view('footer'); ?>
            <div class="control-sidebar-bg"></div>
            <?php $this->load->view('control_sidebar'); ?>
        </div>
    </div>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>