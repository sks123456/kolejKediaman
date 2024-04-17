<!DOCTYPE html>
<html>
<!-- Header -->
<?php $this->load->view('stud_header'); ?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <?php $this->load->view('stud_side'); ?>
</aside>
<!-- Content Header (Page header) -->
<!-- Content Wrapper -->
<div class="content-wrapper" style="min-height:902.55px;">
    <section class="content-header">
        <h1>Pengesahan</h1>
        <ol class="breadcrumb">
            <li><a href="http://localhost/fyp_kk/CodeIgniterTraining/index.php/studcrud/index#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Pengesahan</li>
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
                            <tr>
                                <td>Status Kelulusan </td>
                                <td>: <?= $application['APPLICATION_STATUS'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-header with-border">
                <h3 class="box-title">Pengesahan Terimaan/Tolak Permohonan</h3>
            </div>
            <div class="box-body">
                <table class="table">
                    <tr>
                        <td style="width: 250px">Saluran</td>
                        <td>: <?= $application['CHANNEL_NAME'] ?></td>
                    </tr>
                    <tr>
                        <td>Permohonan </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="approval" id="approve" value="approve">
                                <label class="form-check-label" for="approve">
                                    Terima
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="approval" id="reject" value="reject">
                                <label class="form-check-label" for="reject">
                                    Tolak
                                </label>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="box box-primary" id="bilikSection">
            <!-- /.box-header -->
            <div class="box-header with-border">
                <h3 class="box-title">Pilih Bilik</h3>
            </div>
            <div class="box-body">
                <table class="table">
                    <tr>
                        <td>Sila Pilih Bilik Mengikut Jenis Bilik</td>
                    </tr>
                    <tr>
                        <td style="width: 250px">Jenis Bilik</td>
                        <td>
                            <button>Bilik Berdua RM5/Hari @ RM 665/Sem</button>
                            <button>Bilik Bertiga RM4/Hari @ RM 532/Sem</button>
                            <button>Bilik Berempat RM3/Hari @ RM 399/Sem</button>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="box-header with-border">
                <h3 class="box-title">Maklumat Pilihan Bilik</h3>
            </div>
            <div class="box-body">
                <table class="table">
                    <tr>
                        <td style="width: 250px">Jenis Bilik</td>
                        <td>
                            <select name="room_type">
                                <option value="2">Bilik Berdua</option>
                                <option value="3">Bilik Bertiga</option>
                                <option value="4">Bilik Berempat</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Blok</td>
                        <td>
                            <select name="block">
                                <option value="b1">B1</option>
                                <option value="b2">B2</option>
                                <option value="att">ATT</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <input type="submit" value="Hantar">
            </div>
        </div>
        <div class="box box-primary" id="confirmationSection" style="display: none;">
            <div class="box-body">
                <h4>Anda pasti untuk menolak permohonan ini?</h4>
                <button class="btn btn-danger">Tolak Permohonan</button>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('footer'); ?>
<div class="control-sidebar-bg"></div>
<?php $this->load->view('control_sidebar'); ?>
</div>
<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Script to show/hide the "Pilih Bilik" section based on radio button selection
    document.addEventListener('DOMContentLoaded', function () {
        const rejectRadio = document.getElementById('reject');
        const bilikSection = document.getElementById('bilikSection');
        const confirmationSection = document.getElementById('confirmationSection');

        rejectRadio.addEventListener('change', function () {
            if (this.checked) {
                bilikSection.style.display = 'none';
                confirmationSection.style.display = 'block';
            }
        });
    });
    document.addEventListener('DOMContentLoaded', function () {
        const rejectRadio = document.getElementById('approve');
        const bilikSection = document.getElementById('bilikSection');
        const confirmationSection = document.getElementById('confirmationSection');

        rejectRadio.addEventListener('change', function () {
            if (this.checked) {
                bilikSection.style.display = 'block';
                confirmationSection.style.display = 'none';
            }
        });
    });
</script>
</body>

</html>
