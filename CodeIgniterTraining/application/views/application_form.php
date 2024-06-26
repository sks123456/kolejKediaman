<div class="row">
    <div class="col-sm-12">
        <!-- start Default Form Elements -->
        <div class="card card-body">
            <h5>Register Application Form</h5>
            <p class="card-subtitle mb-3">
                Register Student Hostel Application Here
            </p>

            <?php if (!isset($student_data)) : ?>
                <form class="form-horizontal" action="<?= base_url() ?>CodeIgniterTraining/index.php/application/check_student_id" method="post" enctype="multipart/form-data">
            <?php endif; ?>

            <!-- Session selection -->
            <div class="mb-3">
                <label class="form-label">Session</label>
                <select class="form-select" name="session_selected">
                    <?php if (count($sessions) > 1) : ?>
                        <option value="">-- Please Choose --</option>
                    <?php endif ?>
                    <?php foreach ($sessions as $session) : ?>
                        <option value="<?= $session->session_id ?>"><?= $session->session_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <!-- Student ID input -->
                    <div class="mb-3">
                        <label class="form-label" for="student_id">Student ID</label>
                        <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Enter Student ID" value="<?= isset($_POST['student_id']) ? $_POST['student_id'] : '' ?>" required>
                        <?php if (isset($message)) echo '<div class="text-danger">' . $message . '</div>'; ?>
                    </div>
                    <?php if (!isset($student_data)) : ?>
                        <button type="submit" class="btn btn-primary">Check Matric ID</button>
                    <?php endif; ?>
                </div>

                <!-- Student details -->
                <?php if (isset($student_data)) : ?>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <h4>Student Details:</h4>
                            <p>Name: <?= $student_data['NAMA_PELAJAR'] ?></p>
                            <p>Program: <?= $student_data['PROGRAM'] ?></p>
                            <!-- Add more details as needed -->
                        </div>
                    </div>

                    <!-- New form -->
                    <div class="col-md-12">
                        <div class="card card-body">
                            <h5>Preferred Details</h5>
                            <form class="form-horizontal" action="<?= base_url() ?>CodeIgniterTraining/index.php/application/submit_application" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="stud_matric" value="<?= isset($_POST['student_id']) ? $_POST['student_id'] : '' ?>">
                                <input type="hidden" name="session_id" value="<?= $session->session_id ?>">

                                <div class="mb-3">
                                    <label class="form-label">Channel</label>
                                    <select class="form-select" name="channel_selected" id="channelSelect">
                                        <option value="">-- Please Choose --</option>
                                        <?php foreach ($channels as $channel) : ?>
                                            <option value="<?= $channel->channel_id ?>"><?= $channel->channel_name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="mb-3" id="unitUniformField" style="display: none;">
                                    <label class="form-label">Name of Unit Uniform</label>
                                    <select class="form-select" name="unit_uniform" id="unit_uniform">
                                        <option value="">-- Please Choose --</option>
                                        <?php foreach ($uniforms as $uniform) : ?>
                                            <option value="<?= $uniform->UNIFORM_ID ?>"><?= $uniform->UNIFORM_NAME ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="mb-3" id="pdfDocumentField" style="display: none;">
                                    <label class="form-label">Upload PDF Document</label>
                                    <input type="file" name="pdf_document" id="pdf_document" class="form-control" accept=".pdf">
                                </div>

                                <!-- Add more fields as needed -->

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <?php if (!isset($student_data)) : ?>
                </form>
            <?php endif; ?>
        </div>
        <!-- end Default Form Elements -->
    </div>
</div>

<script>
    document.getElementById('channelSelect').addEventListener('change', function() {
        var channelSelect = this;
        var selectedOption = channelSelect.options[channelSelect.selectedIndex].text;
        var unitUniformField = document.getElementById('unitUniformField');
        var pdfDocumentField = document.getElementById('pdfDocumentField');

        if (selectedOption === 'Unit Uniform') {
            unitUniformField.style.display = 'block';
            pdfDocumentField.style.display = 'block'; // Always show the PDF document field if 'Unit Uniform' is selected
        } else {
            unitUniformField.style.display = 'none';
            // Show PDF document field only if the selected option is not 'Biasa' or the default option
            if (selectedOption !== 'Biasa' && selectedOption !== '-- Sila Pilih --') {
                pdfDocumentField.style.display = 'block';
            } else {
                pdfDocumentField.style.display = 'none';
            }
        }
    });
</script>
