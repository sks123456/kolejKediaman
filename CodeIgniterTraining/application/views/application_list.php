<!-- Permohonan List -->
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Senarai Applikasi</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
                <table id="senarai_session" class="table table-bordered table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>Status</th>
                            <th>Matric No</th>
                            <th>Name</th>
                            <th>Session</th>
                            <th>Channel</th>
                            <th>Document</th>
                            <th>Room Type</th>
                            <th>Gender</th>
                            <th>MERIT</th>
                            <th>MERIT_KOLEJ</th>
                            <th>Vehicle</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($records as $record) : ?>
                            <tr>
                                <td><?= $record->APPLICATION_STATUS ?></td>
                                <td><?= $record->STUD_MATRIC ?></td>
                                <td><?= $record->NAMA_PELAJAR ?></td>
                                <td><?= $record->SESSION_NAME ?></td>
                                <td><?= $record->CHANNEL_NAME ?></td>
                                <td>
                                    <?php if ($record->DOCUMENT) : ?>
                                        <a href="<?= base_url('CodeIgniterTraining/index.php/application_approval/download/' . $record->APPLICATION_ID) ?>" target="_blank"><?= $record->APPLICATION_UPLOAD_NAME ?></a>
                                    <?php else : ?>
                                        Tiada Dokumen
                                    <?php endif; ?>
                                </td>
                                <td><?= $record->RELIGION ?></td>
                                <td><?= $record->GENDER ?></td>
                                <td><?= $record->MERIT ?></td>
                                <td><?= $record->MERIT_KOLEJ?></td>
                                <td style="background-color: <?php
                                                                if ($record->VEHICLE === 'M') {
                                                                    echo 'orange';
                                                                } elseif ($record->VEHICLE === 'C') {
                                                                    echo 'red';
                                                                } else {
                                                                    echo 'green';
                                                                }
                                                                ?>;">
                                </td>
                                <td>
                                    <table border=0>
                                        <tr>
                                            <td id='approve<?= $record->APPLICATION_ID ?>' <?php if ($record->APPLICATION_STATUS !== 'SUBMITTED') echo 'style="display:none;"' ?>>
                                                <a class="btn btn-info btn-sm" href="<?= base_url('CodeIgniterTraining/index.php/application_approval/approve/' . $record->APPLICATION_ID) ?>">Approve</a>
                                            </td>
                                            <td>&nbsp;</td>
                                            <td id='reject<?= $record->APPLICATION_ID ?>' <?php if ($record->APPLICATION_STATUS !== 'SUBMITTED') echo 'style="display:none;"' ?>>
                                                <a class="btn btn-danger btn-sm" href="<?= base_url('CodeIgniterTraining/index.php/application_approval/reject/' . $record->APPLICATION_ID) ?>">Reject</a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <script>
                                // Get the application status for this record
                                var applicationStatus<?= $record->APPLICATION_ID ?> = "<?= $record->APPLICATION_STATUS ?>";
                                // Function to show or hide buttons based on application status
                                function toggleButtons<?= $record->APPLICATION_ID ?>() {
                                    var approveButton<?= $record->APPLICATION_ID ?> = document.getElementById('approve<?= $record->APPLICATION_ID ?>');
                                    var rejectButton<?= $record->APPLICATION_ID ?> = document.getElementById('reject<?= $record->APPLICATION_ID ?>');

                                    // If application status is 'Submitted', show both approve and reject buttons
                                    if (applicationStatus<?= $record->APPLICATION_ID ?> === 'SUBMITTED') {
                                        approveButton<?= $record->APPLICATION_ID ?>.style.display = 'inline';
                                        rejectButton<?= $record->APPLICATION_ID ?>.style.display = 'inline';
                                    }
                                    // If application status is 'Approved', show only the reject button
                                    else if (applicationStatus<?= $record->APPLICATION_ID ?> === 'APPROVED') {
                                        approveButton<?= $record->APPLICATION_ID ?>.style.display = 'none';
                                        rejectButton<?= $record->APPLICATION_ID ?>.style.display = 'inline';
                                    }
                                    // If application status is 'Rejected', show only the reject button
                                    else if (applicationStatus<?= $record->APPLICATION_ID ?> === 'REJECTED') {
                                        approveButton<?= $record->APPLICATION_ID ?>.style.display = 'inline';
                                        rejectButton<?= $record->APPLICATION_ID ?>.style.display = 'none';
                                    }
                                    // Otherwise, hide both buttons
                                    else {
                                        approveButton<?= $record->APPLICATION_ID ?>.style.display = 'none';
                                        rejectButton<?= $record->APPLICATION_ID ?>.style.display = 'none';
                                    }
                                }

                                // Call the function to toggle buttons when the page loads
                                toggleButtons<?= $record->APPLICATION_ID ?>();
                            </script>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
