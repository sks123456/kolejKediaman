<table id="room_list" class="table table-bordered table-hover" style="width:1160px;">
    <thead>
        <tr class="text-center">
            <th>Session</th>
            <th>Kolej</th>
            <th>Block</th>
            <th>Active Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($records)) : ?>
            <?php foreach ($records as $record) : ?>
                <tr>
                    <td class="text-center"><?= $record->KOD_SESI ?></td>
                    <td><?= $record->KOLEJ ?></td>
                    <td class="text-center"><?= $record->BLOCK ?></td>
                    <td class="text-center">
                        <?php if ($record->is_active == 'Active') : ?>
                            <span class="badge rounded-pill bg-success-subtle text-success fw-semibold fs-2">Active</span>
                        <?php else : ?>
                            <span class="badge rounded-pill bg-danger-subtle text-danger fw-semibold fs-2">Not Active</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <button class="btn btn-info btn-sm edit-btn" data-bs-toggle="modal" data-bs-target="#updateModal" data-session="<?= $record->KOD_SESI ?>" data-kolej="<?= $record->KOLEJ ?>" data-block="<?= $record->BLOCK ?>"><i class="fa fa-edit"></i></button>
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

<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width:100%">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title">Update Block Status</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateForm" action="<?= base_url('CodeIgniterTraining/index.php/Block_Update/updateBlock') ?>" method="post">
                    <input type="hidden" name="session" id="modalSession">
                    <div class="mb-3">
                        <label for="modalKolej" class="form-label">Kolej</label>
                        <input type="text" class="form-control" id="modalKolej" name="kolej" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="modalBlock" class="form-label">Block</label>
                        <input type="text" class="form-control" id="modalBlock" name="block" readonly>
                    </div>
                    <div class="col-md-3">
                        <label class="radio-inline">
                            <input type="radio" name="status" value="1" required> Active
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label class="radio-inline">
                            <input type="radio" name="status" value="0" required> Non-Active
                        </label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Pagination links -->
<div class="pagination">
    <?php echo $this->pagination->create_links(); ?>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var editButtons = document.querySelectorAll('.edit-btn');
        
        editButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var session = this.getAttribute('data-session');
                var kolej = this.getAttribute('data-kolej');
                var block = this.getAttribute('data-block');
                
                document.getElementById('modalSession').value = session;
                document.getElementById('modalKolej').value = kolej;
                document.getElementById('modalBlock').value = block;
            });
        });
    });
</script>

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
