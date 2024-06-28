<div class="modal-body">
    <form role="form" action="<?= base_url() ?>CodeIgniterTraining/index.php/crudsession/<?= isset($update) && $update ? 'update' : 'save' ?>" method="post" enctype="multipart/form-data">
        <!-- Hidden fields for session_id and session_name -->
        <input type="hidden" id="session-id" name="session_id">
        <input type="hidden" id="session-name" name="session_name">
        <!-- System -->
        <div class="form-group">
            <?php if ($update && !empty($session)) : ?>
                <?php $row = $session; ?>
                <!-- Hidden field for session_id if updating -->
                <input type="hidden" name="session_id" value="<?= $row->SESSION_ID ?>">
            <?php endif; ?>


        </div>

        <!-- Semester -->
        <div class="mb-3">
            <label>Semester</label>
            <select class="form-control" id="semester-select" name="" <?php echo ($update && !empty($session)) ? 'readonly' : ''; ?>>
                <?php if ($update && !empty($session)) : ?>
                    <?php $row = $session; ?>
                    <option selected data-session-id="<?= $row->SEM_KOD_SESISEM ?>" data-session-name="<?= $row->SEM_DESC . ' (' . $row->SEM_PERINGKAT . ')' ?>"><?= $row->SEM_DESC . ' (' . $row->SEM_PERINGKAT . ')' ?></option>
                    <!-- Add similar blocks for other session options -->
                <?php else : ?>
                    <option>-- Please Choose --</option>
                    <?php foreach ($listSem as $sem) : ?>
                        <option value="<?= $sem->SEM_KOD_SESISEM ?>" data-session-id="<?= $sem->SEM_KOD_SESISEM ?>" data-session-name="<?= $sem->SEM_DESC . ' (' . $sem->SEM_PERINGKAT . ')' ?>"><?= $sem->SEM_DESC . ' (' . $sem->SEM_PERINGKAT . ')' ?></option>
                    <?php endforeach ?>
                <?php endif; ?>
            </select>
        </div>

        <!-- Date -->
        <div class="row mb-3">
            <div class="col-md-5">
                <div class="form-group">
                    <label class="pull-left">Start Date</label>
                    <div class="input-group date pull-right" style="width:100%;">
                        <?php if ($update && !empty($session)) : ?>
                            <?php $row = $session ?>
                            <input type="date" style="width: max-content;" class="form-control" name="start_date" id="start_date" onchange="validateForm()" value="<?= $row->START_DATE ?>">
                        <?php else : ?>
                            <input type="date" class="form-control" name="start_date" id="start_date" onchange="validateForm()">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5">
                <div class="form-group">
                    <label class="pull-left">End Date</label>
                    <div class="input-group date pull-right" style="width:100%;">
                        <?php if ($update && !empty($session)) : ?>
                            <?php $row = $session ?>
                            <input type="date" class="form-control" name="end_date" id="end_date" onchange="validateForm()" value="<?= $row->END_DATE ?>">
                        <?php else : ?>
                            <input type="date" class="form-control" name="end_date" id="end_date" onchange="validateForm()">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- File Upload -->
        <div class="mb-3">
            <label for="pdf_document">Upload Rules Application Document PDF</label>
            <?php if ($update && !empty($session)) : ?>
                <?php $row = $session; ?>
                <!-- Display existing document and provide option to replace -->
                <div>
                    <label>Current Document:</label>
                    <?php if (!empty($row->DOCUMENT)) : ?>
                        <div>
                            <a href="<?= base_url('CodeIgniterTraining/index.php/crudsession/download/' . $row->SESSION_ID) ?>" target="_blank">
                                <?php echo $row->DOCUMENT_NAME; ?>
                            </a>
                        </div>
                    <?php else : ?>
                        <div>No Uploaded Document.</div>
                    <?php endif; ?>
                    <!-- Option to replace the existing document -->
                    <label for="replace_document">Upload New Document:</label>
                    <input class="form-control form-control-sm" type="file" name="pdf_document" id="pdf_document" accept=".pdf">
                </div>
            <?php else : ?>
                <!-- Create new record - standard file upload input -->
                <input class="form-control form-control-sm" type="file" name="pdf_document" id="pdf_document" accept=".pdf">
            <?php endif; ?>
        </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-success" data-bs-dismiss="modal"><?= $update ? 'Update' : 'Save' ?></button>
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

    document.addEventListener('DOMContentLoaded', function() {
        var selectElement = document.getElementById('semester-select');
        var sessionIdInput = document.getElementById('session-id');
        var sessionNameInput = document.getElementById('session-name');

        // Function to update hidden inputs
        function updateHiddenInputs() {
            var selectedOption = selectElement.options[selectElement.selectedIndex];
            sessionIdInput.value = selectedOption.getAttribute('data-session-id');
            sessionNameInput.value = selectedOption.getAttribute('data-session-name');
        }

        // Update hidden inputs on page load if an option is already selected
        updateHiddenInputs();

        // Add event listener to update hidden inputs when selection changes
        selectElement.addEventListener('change', updateHiddenInputs);
    });
</script>