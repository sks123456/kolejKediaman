<table id="room_list" class="table table-bordered table-hover" style="width:1160px;">
    <thead>
        <tr class="text-center">
            <th><a href="?sort=ROOM_CODE&amp;dir=<?= $sortColumn == 'ROOM_CODE' && $sortDirection == 'asc' ? 'desc' : 'asc' ?>">Room Code <?= $sortColumn == 'ROOM_CODE' ? ($sortDirection == 'asc' ? '&#9650;' : '&#9660;') : '' ?></a></th>
            <th><a href="?sort=ROOM_LEVEL&amp;dir=<?= $sortColumn == 'ROOM_LEVEL' && $sortDirection == 'asc' ? 'desc' : 'asc' ?>">Room Level <?= $sortColumn == 'ROOM_LEVEL' ? ($sortDirection == 'asc' ? '&#9650;' : '&#9660;') : '' ?></a></th>
            <th>Room Type</th>
            <th>Gender</th>
            <th><a href="?sort=CAPACITY&amp;dir=<?= $sortColumn == 'CAPACITY' && $sortDirection == 'asc' ? 'desc' : 'asc' ?>">Capacity <?= $sortColumn == 'CAPACITY' ? ($sortDirection == 'asc' ? '&#9650;' : '&#9660;') : '' ?></a></th>
            <th><a href="?sort=FILLED_ROOM&amp;dir=<?= $sortColumn == 'FILLED_ROOM' && $sortDirection == 'asc' ? 'desc' : 'asc' ?>">Filled Room <?= $sortColumn == 'FILLED_ROOM' ? ($sortDirection == 'asc' ? '&#9650;' : '&#9660;') : '' ?></a></th>
            <th>Room Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($records)) : ?>
            <?php foreach ($records as $record) : ?>
                <tr>
                    <td><?= htmlspecialchars($record->ROOM_CODE, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($record->ROOM_LEVEL, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($record->ROOM_TYPE, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($record->ROOM_GENDER, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($record->CAPACITY, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($record->FILLED_ROOM, ENT_QUOTES, 'UTF-8') ?></td>
                    <td style="background-color: <?php
                        if ($record->ROOM_STATUS == '2') {
                            $roomStatus = "Not Active";
                            $statusClass = "badge rounded-pill bg-danger-subtle text-danger fw-semibold fs-2";
                        } elseif ($record->ROOM_STATUS == '1') {
                            $roomStatus = "Active";
                            $statusClass = "badge rounded-pill bg-success-subtle text-success fw-semibold fs-2";
                        }
                        ?> ;" text-align: center; class="<?= $statusClass ?>">
                        <?= htmlspecialchars($roomStatus, ENT_QUOTES, 'UTF-8') ?>
                    </td>

                    <td>
                        <a class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal"><i class="fa fa-edit"></i></a>
                        <!-- .modal for add task -->
                        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content" style="width:100%">
                                    <div class="modal-header d-flex align-items-center">
                                        <h4 class="modal-title">Update Room Status</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="8" class="text-center">No records available.</td>
            </tr>
        <?php endif; ?>
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
