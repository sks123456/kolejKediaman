<!-- Permohonan List -->
<section class="content">
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
                                <th onclick="sortTable(0)">Status <span class="sort-icon">&uarr;</span></th>
                                <th onclick="sortTable(1)">Matric No <span class="sort-icon">&uarr;</span></th>
                                <th onclick="sortTable(2)">Name <span class="sort-icon">&uarr;</span></th>
                                <th onclick="sortTable(3)">Session <span class="sort-icon">&uarr;</span></th>
                                <th onclick="sortTable(4)">Channel <span class="sort-icon">&uarr;</span></th>
                                <th>Document</th>
                                <th onclick="sortTable(6)">Room Type <span class="sort-icon">&uarr;</span></th>
                                <th onclick="sortTable(7)">Gender <span class="sort-icon">&uarr;</span></th>
                                <th onclick="sortTable(8)">MERIT <span class="sort-icon">&uarr;</span></th>
                                <th onclick="sortTable(9)">MERIT KOLEJ<span class="sort-icon">&uarr;</span></th>
                                <th>Vehicle</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                       <tbody>
                        <?php
                        $recordsPerPage = 2;
                        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                        $start = ($currentPage - 1) * $recordsPerPage;
                        $end = $start + $recordsPerPage;
                        $totalPages = ceil(count($records) / $recordsPerPage);

                        // Slice the records array to display only the records for the current page
                        $paginatedRecords = array_slice($records, $start, $recordsPerPage);

                        foreach ($paginatedRecords as $record) :
                        ?>
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

                <!-- Pagination links -->
                <ul class="pagination pull-right">
                    <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                        <li <?php if ($i == $currentPage) echo 'class="active"'; ?>>
                            <a href="?page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
</section>
<script>
    var sortDirection = [];

    function sortTable(columnIndex) {
        var table, rows, switching, i, x, y, shouldSwitch;
        table = document.getElementById("senarai_session");
        switching = true;
        while (switching) {
            switching = false;
            rows = table.rows;
            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("td")[columnIndex];
                y = rows[i + 1].getElementsByTagName("td")[columnIndex];
                var xValue = x.innerHTML.toLowerCase();
                var yValue = y.innerHTML.toLowerCase();
                if (sortDirection[columnIndex] === 'asc') {
                    if (xValue > yValue) {
                        shouldSwitch = true;
                        break;
                    }
                } else {
                    if (xValue < yValue) {
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
            }
        }
        toggleSortIcon(columnIndex);
        updateSortDirection(columnIndex);
    }

    function toggleSortIcon(columnIndex) {
        var header = document.getElementsByTagName('th')[columnIndex];
        var sortIcon = header.getElementsByClassName('sort-icon')[0];
        if (sortDirection[columnIndex] === 'asc') {
            sortIcon.innerHTML = '&uarr;';
        } else {
            sortIcon.innerHTML = '&darr;';
        }
    }

    function updateSortDirection(columnIndex) {
        if (!sortDirection[columnIndex] || sortDirection[columnIndex] === 'asc') {
            sortDirection[columnIndex] = 'desc';
        } else {
            sortDirection[columnIndex] = 'asc';
        }
    }
</script>
