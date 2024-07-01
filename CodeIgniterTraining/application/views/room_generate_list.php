<table id="room_list" class="table table-bordered text-center" style="width: 1160px;">
    <thead>
        <tr class="text-center">
            <th><a href="?sort=ROOM_CODE&dir=<?= $sortColumn == 'ROOM_CODE' && $sortDirection == 'asc' ? 'desc' : 'asc' ?>">Room Code <?= $sortColumn == 'ROOM_CODE' ? ($sortDirection == 'asc' ? '&#9650;' : '&#9660;') : '' ?></a></th>
            <th><a href="?sort=ROOM_LEVEL&dir=<?= $sortColumn == 'ROOM_LEVEL' && $sortDirection == 'asc' ? 'desc' : 'asc' ?>">Room Level <?= $sortColumn == 'ROOM_LEVEL' ? ($sortDirection == 'asc' ? '&#9650;' : '&#9660;') : '' ?></a></th>
            <th>Room Type</th>
            <th>Gender</th>
            <th><a href="?sort=CAPACITY&dir=<?= $sortColumn == 'CAPACITY' && $sortDirection == 'asc' ? 'desc' : 'asc' ?>">Capacity <?= $sortColumn == 'CAPACITY' ? ($sortDirection == 'asc' ? '&#9650;' : '&#9660;') : '' ?></a></th>
            <th><a href="?sort=FILLED_ROOM&dir=<?= $sortColumn == 'FILLED_ROOM' && $sortDirection == 'asc' ? 'desc' : 'asc' ?>">Filled Room <?= $sortColumn == 'FILLED_ROOM' ? ($sortDirection == 'asc' ? '&#9650;' : '&#9660;') : '' ?></a></th>
            <th>Room Status</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($records)) : ?>
            <?php foreach ($records as $room) : ?>
                <tr>
                    <td><?= $room->ROOM_CODE ?></td>
                    <td><?= $room->ROOM_LEVEL ?></td>
                    <td><?= $room->ROOM_TYPE ?></td>
                    <td><?= $room->ROOM_GENDER ?></td>
                    <td><?= $room->CAPACITY ?></td>
                    <td><?= $room->FILLED_ROOM ?></td>
                    <td style="background-color: <?php
                        if ($room->ROOM_STATUS == '0') {
                            $roomStatus = "Not Active";
                            $statusClass = "badge rounded-pill bg-danger-subtle text-danger fw-semibold fs-2";
                        } elseif ($room->STATUS_ACTIVE == '1') {
                            $roomStatus = "Active";
                            $statusClass = "badge rounded-pill bg-success-subtle text-success fw-semibold fs-2";
                        }
                        ?>;" text-align: center; class="<?= $statusClass ?>">
                        <?= htmlspecialchars($roomStatus, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="7" class="text-center">No records available.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<!-- Pagination links -->
<div class="pagination">
    <?= $pagination ?>
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

    // Call toggleSortIcon and updateSortDirection based on your implementation
</script>
