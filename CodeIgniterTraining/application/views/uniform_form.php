<!-- Saluran Permohonan Form -->
<div class="modal-body">
    <form role="form" action="<?= base_url() ?>CodeIgniterTraining/index.php/cruduniform/<?= isset($update) && $update ? 'update' : 'save' ?>" method="post" enctype="multipart/form-data">

        <!-- Uniform Name and ID -->
        <div class="form-group mb-3">
            <?php if ($update && !empty($uniform)) : ?>
                <?php $row = $uniform; ?>
                <!-- Hidden field for uniform_id -->
                <input type="hidden" name="uniform_id" value="<?= $row->UNIFORM_ID ?>">
            <?php endif; ?>

            <label>Uniform Name</label>
            <div class="row">

                <?php if ($update && !empty($uniform)) : ?>
                    <input type="text" class="form-control" name="uniform_name" value="<?= $row->UNIFORM_NAME ?>" <?php echo ($update && !empty($uniform)) ? 'readonly' : '' ?>>
                <?php else : ?>
                    <input type="text" class="form-control" name="uniform_name">
                <?php endif ?>
            </div>
        </div>

        <!-- Status -->
        <div class="form-group">
            <?php if ($update && !empty($uniform)) : ?>
                <?php $row = $uniform ?>
                <!-- Hidden field for Uniform_id -->
                <input type="hidden" name="uniform_id" value="<?= $row->UNIFORM_ID ?>">
            <?php endif; ?>
            <div class="mb-3">

                <label>Uniform Status</label>
                <div class="row">
                    <?php if ($update && !empty($uniform)) : ?>
                        <?php $row = $uniform ?>
                        <div class="col-md-3">
                            <label class="radio-inline">
                                <input type="radio" name="uniform_status" value="Active" <?= ($row->UNIFORM_STATUS == 'Active') ? 'checked' : '' ?> required> Active
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="radio-inline">
                                <input type="radio" name="uniform_status" value="Non-Active" <?= ($row->UNIFORM_STATUS == 'Non-Active') ? 'checked' : '' ?> required> Non-Active
                            </label>
                        </div>
                    <?php else : ?>
                        <div class="col-md-3">
                            <label class="radio-inline">
                                <input type="radio" name="uniform_status" value="Active" required> Active
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="radio-inline">
                                <input type="radio" name="uniform_status" value="Non-Active" required> Non-Active
                            </label>
                        </div>
                        <!-- Add similar blocks for other radio options -->
                    <?php endif; ?>
                </div>
            </div>
        </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
        Close
    </button>
    <button type="submit" class="btn btn-success" data-bs-dismiss="modal">
        <?= $update ? 'Update' : 'Save' ?>
    </button>
</div>
</form>