<!-- Saluran Permohonan Form -->
<div class="modal-body">
    <form id="channelForm" role="form" action="<?= base_url() ?>CodeIgniterTraining/index.php/crudchannel/<?= isset($update) && $update ? 'update' : 'save' ?>" method="post" enctype="multipart/form-data">

        <!-- Channel Name and ID -->
        <div class="form-group mb-3">
            <?php if ($update && !empty($channel)) : ?>
                <?php $row = $channel; ?>
                <!-- Hidden field for channel_id -->
                <input type="hidden" name="channel_id" value="<?= $row->CHANNEL_ID ?>">
            <?php endif; ?>

            <label>Channel Name</label>
            <div class="row">
                <?php if ($update && !empty($channel)) : ?>
                    <input type="text" class="form-control" name="channel_name" value="<?= $row->CHANNEL_NAME ?>" <?php echo ($update && !empty($channel)) ? 'readonly' : '' ?> required>
                <?php else : ?>
                    <input type="text" class="form-control" name="channel_name" required>
                <?php endif ?>
            </div>
        </div>

        <!-- Status -->
        <div class="form-group">
            <?php if ($update && !empty($channel)) : ?>
                <?php $row = $channel ?>
                <!-- Hidden field for channel_id -->
                <input type="hidden" name="channel_id" value="<?= $row->CHANNEL_ID ?>">
            <?php endif; ?>
            <div class="mb-3">
                <label>Channel Status</label>
                <div class="row">
                    <?php if ($update && !empty($channel)) : ?>
                        <?php $row = $channel ?>
                        <div class="col-md-3">
                            <label class="radio-inline">
                                <input type="radio" name="channel_status" value="Active" <?= ($row->CHANNEL_STATUS == 'Active') ? 'checked' : '' ?> required> Active
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="radio-inline">
                                <input type="radio" name="channel_status" value="Non-Active" <?= ($row->CHANNEL_STATUS == 'Non-Active') ? 'checked' : '' ?> required> Non-Active
                            </label>
                        </div>
                    <?php else : ?>
                        <div class="col-md-3">
                            <label class="radio-inline">
                                <input type="radio" name="channel_status" value="Active" required> Active
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="radio-inline">
                                <input type="radio" name="channel_status" value="Non-Active" required> Non-Active
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
        <button type="submit" class="btn btn-success" onclick="validateForm();">
            <?= $update ? 'Update' : 'Save' ?>
        </button>
    </div>
    </form>

    <script>
        function validateForm(event) {
            // Check if all required fields are filled
            var form = document.getElementById('channelForm');
            if (!form.checkValidity()) {
                // If form is not valid, prevent submission and display a message (optional)
                event.preventDefault();
                event.stopPropagation();
                alert('Please fill out all required fields.');
            }
            // Optionally, handle other custom validation rules here

            // Example: Check if a specific condition is met before submission
            // if (someConditionNotMet) {
            //     event.preventDefault();
            //     event.stopPropagation();
            //     alert('Additional validation condition not met.');
            // }

            // Example: Handle AJAX form submission if needed
            // else {
            //     submitFormViaAjax();
            // }
        }
    </script>
