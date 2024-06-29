<!-- Saluran Permohonan Form -->
<div class="modal-body">
    <form role="form" action="<?= base_url() ?>CodeIgniterTraining/index.php/cruduniform/<?= isset($update) && $update ? 'update' : 'save' ?>" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">

        <!-- Uniform Name and ID -->
        <div class="form-group mb-3">
            <?php if ($update && !empty($uniform)) : ?>
                <?php $row = $uniform; ?>
                <!-- Hidden field for uniform_id -->
                <input type="hidden" name="uniform_id" value="<?= $row->UNIFORM_ID ?>">
            <?php endif; ?>

            <label>Uniform Name</label>
            <div class="row">
                <input type="text" class="form-control" name="uniform_name" value="<?= $update && !empty($uniform) ? $row->UNIFORM_NAME : '' ?>" <?= $update && !empty($uniform) ? 'readonly' : '' ?> required>
            </div>
        </div>

        <!-- Status -->
        <div class="form-group mb-3">
            <label>Uniform Status</label>
            <div class="row">
                <div class="col-md-3">
                    <label class="radio-inline">
                        <input type="radio" name="uniform_status" value="Active" <?= $update && !empty($uniform) && $row->UNIFORM_STATUS == 'Active' ? 'checked' : '' ?> required> Active
                    </label>
                </div>
                <div class="col-md-3">
                    <label class="radio-inline">
                        <input type="radio" name="uniform_status" value="Non-Active" <?= $update && !empty($uniform) && $row->UNIFORM_STATUS == 'Non-Active' ? 'checked' : '' ?> required> Non-Active
                    </label>
                </div>
            </div>
        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Close
        </button>
        <button type="submit" class="btn btn-success">
            <?= $update ? 'Update' : 'Save' ?>
        </button>
    </div>
    </form>

    <script>
        function validateForm() {
            // Check if all required fields are filled
            const uniformName = document.querySelector('input[name="uniform_name"]').value.trim();
            const uniformStatus = document.querySelector('input[name="uniform_status"]:checked');

            if (!uniformName || !uniformStatus) {
                alert('All fields are required.');
                return false;
            }
            return true; // Proceed with form submission
        }

        // Automatically close the modal on form submit success
        const form = document.querySelector('form');
        form.addEventListener('submit', function (event) {
            if (validateForm()) {
                event.preventDefault();
                fetch(form.action, {
                    method: form.method,
                    body: new FormData(form)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Close modal on success
                        const modal = document.querySelector('.modal');
                        const modalInstance = bootstrap.Modal.getInstance(modal);
                        modalInstance.hide();
                    } else {
                        // Display error message
                        alert(data.error || 'An error occurred.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred.');
                });
            }
        });
    </script>
