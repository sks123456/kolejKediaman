<table class="table border text-nowrap mb-0 align-middle">
    <thead class="text-dark fs-4 text-center">
        <tr>
            <th>
                <h6 class="fs-4 fw-semibold mb-0">Session</h6>
            </th>
            <th>
                <h6 class="fs-4 fw-semibold mb-0">Matric Id</h6>
            </th>
            <th>
                <h6 class="fs-4 fw-semibold mb-0">Name</h6>
            </th>
            <th>
                <h6 class="fs-4 fw-semibold mb-0">Programme</h6>
            </th>
            <th>
                <h6 class="fs-4 fw-semibold mb-0">Role</h6>
            </th>
            <th>
                <h6 class="fs-4 fw-semibold mb-0">Status</h6>
            </th>
            <th>
                <h6 class="fs-4 fw-semibold mb-0">Action</h6>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($roles as $role) : ?>
            <tr>
                <!-- placing data into the table -->
                <td><?= $role->CODE_SEM ?></td>
                <td><?= $role->STUD_MATRIC ?></td>
                <td><?= $role->NAMA_PELAJAR ?></td>
                <td><?= $role->PROGRAM ?></td>
                <td><?= $role->ROLE ?></td>
                <td>
                    <?php if ($role->STATUS == 1) : ?>
                        <span class="badge rounded-pill bg-success-subtle text-success fw-semibold fs-2">Active</span>
                    <?php else : ?>
                        <span class="badge rounded-pill bg-danger-subtle text-danger fw-semibold fs-2">Inactive</span>
                    <?php endif; ?>
                </td>
                <td>
                    <a class="btn btn-info btn-sm edit-channel" data-bs-toggle="modal" data-bs-target="#updateModal"><i class="fa fa-edit"></i></a>
                    <!-- .modal for add task -->
                    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" style="width:100%">
                                <div class="modal-header d-flex align-items-center">
                                    <h4 class="modal-title">Update Student Role</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="updateRoleForm" method="post" action="<?= base_url('your_controller/updateRole') ?>">
                                        <input type="hidden" id="roleId" name="role_id">
                                        <div class="mb-3">
                                            <label for="updateSession" class="form-label">Session</label>
                                            <input type="text" class="form-control" id="updateSession" name="session" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="updateMatric" class="form-label">Matric Id</label>
                                            <input type="text" class="form-control" id="updateMatric" name="matric_id" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="updateName" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="updateName" name="name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="updateProgram" class="form-label">Programme</label>
                                            <input type="text" class="form-control" id="updateProgram" name="program" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="updateRole" class="form-label">Role</label>
                                            <input type="text" class="form-control" id="updateRole" name="role" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="updateStatus" class="form-label">Status</label>
                                            <select class="form-control" id="updateStatus" name="status" required>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                    </div>
                    <a class="btn btn-danger btn-sm" href=""><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    // JavaScript code to handle update button click
    document.addEventListener('DOMContentLoaded', function() {
        // Get all update buttons
        const updateButtons = document.querySelectorAll('.btn-info');

        // Iterate over each update button
        updateButtons.forEach(function(button) {
            // Add click event listener to each update button
            button.addEventListener('click', function(event) {
                // Prevent default link behavior
                event.preventDefault();

                // Get the row containing the clicked button
                const row = event.target.closest('tr');

                // Extract session data from the row
                const channelName = row.querySelector('td:nth-child(1) p').textContent.trim();
                const channelStatus = row.querySelector('td:nth-child(2) p').textContent.trim();

                // Update modal with channel data
                const modalTitle = document.querySelector('.modal-title');
                const channelForm = document.querySelector('.channel-form');

                modalTitle.textContent = 'Update Channel';

                // Assuming channel form elements have IDs, update their values
                document.getElementById('channelName').value = channelName;
                document.getElementById('channelStatus').value = channelStatus;

                // Show the modal
                const myModal = new bootstrap.Modal(document.getElementById('updateModal'));
                myModal.show();
            });
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>