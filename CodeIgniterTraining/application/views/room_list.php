<table id="room_list" class="table table-bordered" style="width:fit-content;">
    <thead>
        <?php
        $sortColumn = isset($_GET['sort']) ? $_GET['sort'] : ''; // Initialize $sortColumn with the sort parameter from the URL
        $sortDirection = isset($_GET['dir']) ? $_GET['dir'] : ''; // Initialize $sortDirection with the dir parameter from the URL
        ?>

        <tr class="text-center">
            <th><a href="?sort=ROOM_CODE&amp;dir=<?= $sortColumn == 'ROOM_CODE' && $sortDirection == 'asc' ? 'desc' : 'asc' ?>">Room Code <?= $sortColumn == 'ROOM_CODE' ? ($sortDirection == 'asc' ? '&#9650;' : '&#9660;') : '' ?></a></th>
            <th>Room Type</th>
            <th>Room GENDER</th>
            <th><a href="?sort=KOLEJ&amp;dir=<?= $sortColumn == 'KOLEJ' && $sortDirection == 'asc' ? 'desc' : 'asc' ?>">KOLEJ<?= $sortColumn == 'KOLEJ' ? ($sortDirection == 'asc' ? '&#9650;' : '&#9660;') : '' ?></a></th>
            <th>Block</th>
            <th><a href="?sort=ROOM_LEVEL&amp;dir=<?= $sortColumn == 'ROOM_LEVEL' && $sortDirection == 'asc' ? 'desc' : 'asc' ?>">Room Level <?= $sortColumn == 'ROOM_LEVEL' ? ($sortDirection == 'asc' ? '&#9650;' : '&#9660;') : '' ?></a></th>
            <th>Room Description</th>
            <th><a href="?sort=CAPACITY&amp;dir=<?= $sortColumn == 'CAPACITY' && $sortDirection == 'asc' ? 'desc' : 'asc' ?>">CAPACITY <?= $sortColumn == 'CAPACITY' ? ($sortDirection == 'asc' ? '&#9650;' : '&#9660;') : '' ?></a></th>
            <th><a href="?sort=FILLED_ROOM&amp;dir=<?= $sortColumn == 'FILLED_ROOM' && $sortDirection == 'asc' ? 'desc' : 'asc' ?>">FILLED_ROOM <?= $sortColumn == 'FILLED_ROOM' ? ($sortDirection == 'asc' ? '&#9650;' : '&#9660;') : '' ?></a></th>
            <th>Room Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $recordsPerPage = 10;
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($currentPage - 1) * $recordsPerPage;
        $end = $start + $recordsPerPage;
        $totalPages = ceil(count($records) / $recordsPerPage);

        // Slice the records array to display only the records for the current page
        $paginatedRecords = array_slice($records, $start, $recordsPerPage);

        foreach ($paginatedRecords as $record) :
        ?>
            <tr>
                <td class="text-center"><?= $record->ROOM_CODE ?></td>
                <td class="text-center"><?= $record->ROOM_TYPE ?></td>
                <td class="text-center"><?= $record->ROOM_GENDER ?></td>
                <td><?= $record->KOLEJ ?></td>
                <td class="text-center"><?= $record->BLOCK ?></td>
                <td class="text-center"><?= $record->ROOM_LEVEL ?></td>
                <td><?= $record->ROOM_DESC ?></td>
                <td class="text-center"><?= $record->CAPACITY ?></td>
                <td class="text-center"><?= $record->FILLED_ROOM ?></td>
                <td style="background-color <?php
                                                if ($record->ROOM_STATUS === '2') {
                                                    $statusClass =  'badge rounded-pill bg-danger-subtle text-danger fw-semibold fs-2';
                                                    $roomStatus = "Full";
                                                } elseif ($record->ROOM_STATUS === '1') {
                                                    $statusClass = 'badge rounded-pill bg-success-subtle text-success fw-semibold fs-2';
                                                    $roomStatus = "Available";
                                                } else {
                                                    $statusClass = 'badge rounded-pill bg-warning-subtle text-warning fw-semibold fs-2';
                                                    $roomStatus = "Not Available";
                                                }
                                                ?>;" text-align: center; class="<?= $statusClass ?>">
                    <?= $roomStatus ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Pagination links -->
<div class="pagination">
    <?php echo $this->pagination->create_links(); ?>
</div>


<script>
    var sortDirection = [];


    function toggleSortIcon(columnIndex) {
        var headers = document.getElementsByTagName('th');
        for (var i = 0; i < headers.length; i++) {
            var sortIcon = headers[i].getElementsByClassName('sort-icon')[0];
            if (sortIcon) {
                sortIcon.innerHTML = '';
            }
        }
        var sortIcon = headers[columnIndex].getElementsByClassName('sort-icon')[0];
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