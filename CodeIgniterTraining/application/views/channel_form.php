<!-- Saluran Permohonan Form -->
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Saluran Permohonan
    </h1>
    <ol class="breadcrumb">
        <li><a href="http://localhost/FYP_kk/CodeIgniterTraining/index.php/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Setup Permohonan</a></li>
        <li class="active"><?= isset($update) && $update ? 'Update Saluran' : 'Pembukaan Saluran Baru' ?></li>
    </ol>
</section>
<section class="content">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><?= isset($update) && $update ? 'Update Saluran' : 'Pembukaan Saluran Baru' ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form role="form" action="<?= base_url() ?>CodeIgniterTraining/index.php/crudchannel/<?= isset($update) && $update ? 'update' : 'save' ?>" method="post">

                <!-- Channel -->
                <div class="form-group">
                    <?php if ($update && $channel->num_rows() > 0) : ?>
                        <?php $row = $channel->row(); ?>
                        <!-- Hidden field for channel_id -->
                        <input type="hidden" name="channel_id" value="<?= $row->CHANNEL_ID ?>">
                    <?php endif; ?>
                    <?php if ($update && $channel->num_rows() > 0) : ?>
                        <label>Nama Saluran</label>
                        <input type="text" class="form-control" name="channel_name" value="<?= $row->CHANNEL_NAME ?>" <?php echo ($update && $channel->num_rows() > 0) ? 'readonly' : '' ?>>
                    <?php else : ?>
                        <input type="text" class="form-control" name="channel_name">
                    <?php endif ?>
                </div>

                <!-- Status -->
                <div class="form-group">
                    <?php if ($update && $channel->num_rows() > 0) : ?>
                        <?php $row = $channel->row(); ?>
                        <!-- Hidden field for channel_id -->
                        <input type="hidden" name="channel_id" value="<?= $row->CHANNEL_ID ?>">
                    <?php endif; ?>
                    <label>Status Aktif</label>
                    <div class="row">
                        <?php if ($update && $channel->num_rows() > 0) : ?>
                            <?php $row = $channel->row(); ?>
                            <div class="col-md-3">
                                <label class="radio-inline">
                                    <input type="radio" name="channel_status" value="Aktif" <?= ($row->CHANNEL_STATUS == 'Aktif') ? 'checked' : '' ?> required> Ya
                                </label>
                            </div>
                            <div class="col-md-3">
                                <label class="radio-inline">
                                    <input type="radio" name="channel_status" value="Tidak Aktif" <?= ($row->CHANNEL_STATUS == 'Tidak Aktif') ? 'checked' : '' ?> required> Tidak
                                </label>
                            </div>
                        <?php else : ?>
                            <div class="col-md-3">
                                <label class="radio-inline">
                                    <input type="radio" name="channel_status" value="Aktif" required> Ya
                                </label>
                            </div>
                            <div class="col-md-3">
                                <label class="radio-inline">
                                    <input type="radio" name="channel_status" value="Tidak Aktif" required> Tidak
                                </label>
                            </div>
                            <!-- Add similar blocks for other radio options -->
                        <?php endif; ?>
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