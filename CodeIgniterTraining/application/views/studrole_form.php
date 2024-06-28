<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Room Form</title>
    <!-- Include jQuery from CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="modal-body">
        <div id="message"></div> <!-- Message area -->
        <form role="form" action="<?= base_url() ?>CodeIgniterTraining/index.php/register_studrole/save" method="post" enctype="multipart/form-data">
            <div class="form-group mb-3">
                <!-- Session -->
                <div class="mb-3">
                    <label>Academic Session</label>
                    <select class="form-control" name="session_id">
                        <option value="">-- Please Choose --</option>
                        <?php foreach ($sessions as $session) : ?>
                            <option value="<?= $session->SEM_KOD_SESISEM ?>"><?= $session->SEM_DESC ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- Student ID -->
            <div class="form-group">
                <div class="mb-3">
                    <label>Matric ID</label>
                    <input type="text" class="form-control" name="student_id" id="student_id">
                </div>
            </div>

            <!-- Role -->
            <div class="form-group">
                <div class="mb-3">
                    <label>Role</label>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="radio-inline">
                                <input type="radio" name="studrole_role" required value="MKS"> MKS
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="radio-inline">
                                <input type="radio" name="studrole_role" required value="JPKK"> JPKK
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="radio-inline">
                                <input type="radio" name="studrole_role" required value="MPP"> MPP
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Status -->
            <div class="form-group">
                <div class="mb-3">
                    <label>Status</label>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="radio-inline">
                                <input type="radio" name="studrole_status" required value="1"> Active
                            </label>
                        </div>
                        <div class="col-md-3">
                            <label class="radio-inline">
                                <input type="radio" name="studrole_status" required value="0"> Non-Active
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>

    <!-- jQuery AJAX script -->
    <script>
        $(document).ready(function() {
            $('#student_id').on('change', function() {
                var student_id = $(this).val();
                $.ajax({
                    url: '<?= base_url() ?>CodeIgniterTraining/index.php/register_studrole/check_student_id',
                    type: 'POST',
                    data: { student_id: student_id },
                    success: function(response) {
                        var data = JSON.parse(response);
                        var messageDiv = $('#message');
                        messageDiv.empty(); // Clear any previous messages
                        if (data.status === 'success') {
                            messageDiv.html('<div class="alert alert-success">' + data.message + '</div>');
                        } else {
                            messageDiv.html('<div class="alert alert-danger">' + data.message + '</div>');
                        }
                    },
                    error: function() {
                        alert('An error occurred. Please try again.');
                    }
                });
            });
        });
    </script>
</body>
</html>
