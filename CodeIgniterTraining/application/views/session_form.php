<div class="modal-body">

    <form role="form" action="<?= base_url() ?>CodeIgniterTraining/index.php/crudsession/<?= isset($update) && $update ? 'update' : 'save' ?>" method="post" enctype="multipart/form-data">
        <!-- System -->
        <div class="form-group">
            <?php if ($update && !empty($session)) : ?>
                <?php $row = $session; ?>
                <!-- Hidden field for session_id -->
                <input type="hidden" name="session_id" value="<?= $row->SESSION_ID ?>">
            <?php endif; ?>

            <label>Type of Application</label>
            <div class="row">
                <?php if ($update) : ?>
                    <?php $row = $session; ?>
                    <div class="col-md-3">
                        <label class="radio-inline">
                            <input type="radio" name="application_type" value="Common Student" <?= ($row->APPLICATION_TYPE == 'Common Student') ? 'checked' : 'disabled' ?> required> Common Student
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label class="radio-inline">
                            <input type="radio" name="application_type" value="Appeal Application" <?= ($row->APPLICATION_TYPE == 'Appeal Application') ? 'checked' : 'disabled' ?> required> Appeal Application
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label class="radio-inline">
                            <input type="radio" name="application_type" value="Status Application" <?= ($row->APPLICATION_TYPE == 'Status Application') ? 'checked' : 'disabled' ?> required> Status Application
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label class="radio-inline">
                            <input type="radio" name="Acceptance Confirmation" value="Acceptance Confirmation" <?= ($row->APPLICATION_TYPE == 'Pengesahan Terimaan') ? 'checked' : 'disabled' ?> required> Acceptance Confirmation
                        </label>
                    </div>
                <?php else : ?>
                    <div class="col-md-3">
                        <label class="radio-inline">
                            <input type="radio" name="application_type" value="Common Student" required> Common Student
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label class="radio-inline">
                            <input type="radio" name="application_type" value="Appeal Application" required> Appeal Application
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label class="radio-inline">
                            <input type="radio" name="application_type" value="Status Application" required> Status Application
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label class="radio-inline">
                            <input type="radio" name="application_type" value="Acceptance Confirmation" required> Acceptance Confirmation
                        </label>
                    </div>
                    <!-- Add similar blocks for other radio options -->
                <?php endif; ?>
            </div>
        </div>

        <!-- Semester -->
        <div class="mb-3">
            <label>Semester</label>
            <select class="form-control" name="session_name" <?php echo ($update && !empty($session)) ? 'readonly' : ''; ?>>
                <?php if ($update && !empty($session)) : ?>
                    <?php $row = $session; ?>
                    <option selected><?= $row->SEM_DESC ?></option>
                    <!-- Add similar blocks for other session options -->
                <?php else : ?>
                    <option>-- Please Choose --</option>
                    <?php foreach ($listSem as $sem) : ?>
                        <option value="<?=$sem->SEM_KOD_SESISEM?>"><?=$sem->SEM_DESC?></option>
                    <?php endforeach?>
                <?php endif; ?>
            </select>
        </div>
        <!-- Date -->
        <div class="row mb-3">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="pull-left">Start Date</label>
                    <div class="input-group date pull-right" style="width:60%;">
                        <?php if ($update && !empty($session)) : ?>
                            <?php $row = $session?>
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
                    <label class="pull-left">End Date</label>
                    <div class="input-group date pull-right" style="width:60%;">
                        <?php if ($update && !empty($session)) : ?>
                            <?php $row = $session?>
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
            <label for="pdf_document">Upload Rules Appication Document PDF</label>

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
                <input  class="form-control form-control-sm" type="file" name="pdf_document" id="pdf_document" accept=".pdf">

            <?php endif; ?>
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