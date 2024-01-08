<!-- Buka Permohonan Form -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Buka Permohonan
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Setup Permohonan</a></li>
        <li class="active"><?= isset($update) && $update ? 'Update Permohonan' : 'Pembukaan Permohonan Baru' ?></li>
    </ol>
</section>
<section class="content">
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"><?= isset($update) && $update ? 'Update Permohonan' : 'Pembukaan Permohonan Baru' ?></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form role="form" action="<?= base_url() ?>CodeIgniterTraining/index.php/crudsession/<?= isset($update) && $update ? 'update' : 'save' ?>" method="post">
            <!-- System -->
            <div class="form-group">
                <?php if ($update && $session->num_rows() > 0) : ?>
                    <?php $row = $session->row(); ?>
                    <!-- Hidden field for session_id -->
                    <input type="hidden" name="session_id" value="<?= $row->SESSION_ID ?>">
                <?php endif; ?>

                <label>Jenis Permohonan</label>
                <div class="row">
                    <?php if ($update && $session->num_rows() > 0) : ?>
                        <?php $row = $session->row(); ?>
                        <div class="col-md-3">
                            <label class="radio-inline">
                                <input type="radio" name="application_type" value="Permohonan Biasa" <?= ($row->APPLICATION_TYPE == 'Permohonan Biasa') ? 'checked' : 'disabled' ?> required> Permohonan Biasa
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="radio-inline">
                                <input type="radio" name="application_type" value="Permohonan Rayuan" <?= ($row->APPLICATION_TYPE == 'Permohonan Rayuan') ? 'checked' : 'disabled' ?> required> Permohonan Rayuan
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="radio-inline">
                                <input type="radio" name="application_type" value="Status Permohonan" <?= ($row->APPLICATION_TYPE == 'Status Permohonan') ? 'checked' : 'disabled' ?> required> Status Permohonan
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="radio-inline">
                                <input type="radio" name="application_type" value="Pengesahan Terimaan" <?= ($row->APPLICATION_TYPE == 'Pengesahan Terimaan') ? 'checked' : 'disabled' ?> required> Pengesahan Terimaan
                            </label>
                        </div>
                    <?php else : ?>
                        <div class="col-md-3">
                            <label class="radio-inline">
                                <input type="radio" name="application_type" value="Permohonan Biasa" required> Permohonan Biasa
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="radio-inline">
                                <input type="radio" name="application_type" value="Permohonan Biasa" required> Permohonan Rayuan
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="radio-inline">
                                <input type="radio" name="application_type" value="Permohonan Biasa" required> Status Permohonan
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="radio-inline">
                                <input type="radio" name="application_type" value="Permohonan Biasa" required> Pengesahan Terimaan
                            </label>
                        </div>
                        <!-- Add similar blocks for other radio options -->
                    <?php endif; ?>
                </div>
            </div>

            <!-- Semester -->
            <div class="form-group">
                <label>Semester</label>
                <select class="form-control" name="session_name" <?php echo ($update && $session->num_rows() > 0) ? 'readonly' : ''; ?>>
                    <?php if ($update && $session->num_rows() > 0) : ?>
                        <?php $row = $session->row(); ?>
                        <option selected><?= $row->SESSION_NAME ?></option>
                        <!-- Add similar blocks for other session options -->
                    <?php else : ?>
                        <option>-- Sila Pilih --</option>
                        <option>SEMESTER I SESI 2023/2024 (SARJANA MUDA)</option>
                        <option>SEMESTER I SESI 2023/2024 (DIPLOMA)</option>
                        <option>SEMESTER II SESI 2023/2024 (SARJANA MUDA)</option>
                        <option>SEMESTER II SESI 2023/2024 (DIPLOMA)</option>
                    <?php endif; ?>
                </select>
            </div>
            <!-- Date -->
            <div class="row form-group">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="pull-left">Tarikh Mula</label>
                        <div class="input-group date pull-right" style="width:60%;">
                            <?php if ($update && $session->num_rows() > 0) : ?>
                                <?php $row = $session->row(); ?>
                                <input type="date" class="form-control" name="start_date" id="start_date" onchange="validateForm()" value="<?= $row->START_DATE ?>">
                            <?php else : ?>
                                <input type="date" class="form-control" name="start_date" id="start_date" onchange="validateForm()">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="pull-left">Tarikh Tamat</label>
                        <div class="input-group date pull-right" style="width:60%;">
                            <?php if ($update && $session->num_rows() > 0) : ?>
                                <?php $row = $session->row(); ?>
                                <input type="date" class="form-control" name="end_date" id="end_date" onchange="validateForm()" value="<?= $row->END_DATE ?>">
                            <?php else : ?>
                                <input type="date" class="form-control" name="end_date" id="end_date" onchange="validateForm()">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary  col-md-6 pull-right" style="width:max-content;">
                    <?= $update ? 'KEMASKINI' : 'SIMPAN' ?>
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