<style>
    .text-center {
        text-align: center;
    }
</style>

<table id="room_list" class="table table-bordered table-hover text-center" style="width:1160px;">
    <thead>
        <tr class="text-center">
            <th>SESSION</th>
            <th>
                <a href="?sort=ROOM_CODE&amp;dir=<?= $sortColumn == 'ROOM_CODE' && $sortDirection == 'asc' ? 'desc' : 'asc' ?>">
                    Room Code <?= $sortColumn == 'ROOM_CODE' ? ($sortDirection == 'asc' ? '&#9650;' : '&#9660;') : '' ?>
                </a>
            </th>
            <th>
                <a href="?sort=ROOM_LEVEL&amp;dir=<?= $sortColumn == 'ROOM_LEVEL' && $sortDirection == 'asc' ? 'desc' : 'asc' ?>">
                    Room Level <?= $sortColumn == 'ROOM_LEVEL' ? ($sortDirection == 'asc' ? '&#9650;' : '&#9660;') : '' ?>
                </a>
            </th>
            <th>Room Type</th>
            <th>Gender</th>
            <th>
                <a href="?sort=CAPACITY&amp;dir=<?= $sortColumn == 'CAPACITY' && $sortDirection == 'asc' ? 'desc' : 'asc' ?>">
                    Capacity <?= $sortColumn == 'CAPACITY' ? ($sortDirection == 'asc' ? '&#9650;' : '&#9660;') : '' ?>
                </a>
            </th>
            <th>
                <a href="?sort=FILLED_ROOM&amp;dir=<?= $sortColumn == 'FILLED_ROOM' && $sortDirection == 'asc' ? 'desc' : 'asc' ?>">
                    Filled Room <?= $sortColumn == 'FILLED_ROOM' ? ($sortDirection == 'asc' ? '&#9650;' : '&#9660;') : '' ?>
                </a>
            </th>
            <th>Active Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($records)) : ?>
            <?php foreach ($records as $record) : ?>
                <tr>
                    <td><?= htmlspecialchars($record->KOD_SESI, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($record->ROOM_CODE, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($record->ROOM_LEVEL, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($record->ROOM_TYPE, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($record->ROOM_GENDER, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($record->CAPACITY, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($record->FILLED_ROOM, ENT_QUOTES, 'UTF-8') ?></td>
                    <td style="background-color: <?php
                        if ($record->STATUS_ACTIVE == '0') {
                            $roomStatus = "Not Active";
                            $statusClass = "badge rounded-pill bg-danger-subtle text-danger fw-semibold fs-2";
                        } elseif ($record->STATUS_ACTIVE == '1') {
                            $roomStatus = "Active";
                            $statusClass = "badge rounded-pill bg-success-subtle text-success fw-semibold fs-2";
                        }
                        ?>;" text-align: center; class="<?= $statusClass ?>">
                        <?= htmlspecialchars($roomStatus, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <td>
                        <button class="btn btn-info btn-sm edit-btn" data-bs-toggle="modal" data-bs-target="#updateModal" data-session="<?= $record->KOD_SESI ?>" data-room_id="<?= $record->ROOM_CODE ?>" data-status_active="<?= $record->STATUS_ACTIVE ?>">
                            <i class="fa fa-edit"></i>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="9" class="text-center">No records available.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width:100%">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title">Update Room Status</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateForm" action="<?= base_url('CodeIgniterTraining/index.php/Room_Update/updateRoom') ?>" method="post">
                    <input type="hidden" name="session" id="modalSession">
                    <div class="mb-3">
                        <label for="modalroom_id" class="form-label">Room Code</label>
                        <input type="text" class="form-control" id="modalroom_id" name="room_id" readonly>
                    </div>
                    <!-- Status -->
                    <div class="form-group">
                        <div class="mb-3">
                            <label>Room Status</label>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="radio-inline">
                                        <input type="radio" name="status_active" id="modalStatusActive" value="1" required> Active
                                    </label>
                                </div>
                                <div class="col-md-3">
                                    <label class="radio-inline">
                                        <input type="radio" name="status_active" id="modalStatusInactive" value="0" required> Non-Active
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Pagination links -->
<div class="pagination">
    <?= $this->pagination->create_links(); ?>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Event delegation for handling modal data
        document.querySelectorAll('.edit-btn').forEach(function(button) {
            button.addEventListener('click', function() {
                var session = this.getAttribute('data-session');
                var roomId = this.getAttribute('data-room_id');
                var statusActive = this.getAttribute('data-status_active');

                document.getElementById('modalSession').value = session;
                document.getElementById('modalroom_id').value = roomId;

                if (statusActive == '1') {
                    document.getElementById('modalStatusActive').checked = true;
                } else {
                    document.getElementById('modalStatusInactive').checked = true;
                }
            });
        });
    });
</script>
