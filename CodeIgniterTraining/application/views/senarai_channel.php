<!-- Permohonan List -->
<table class="table border text-nowrap mb-0 align-middle">
    <thead class="text-dark fs-4">
        <tr>
            <th>
                <h6 class="fs-4 fw-semibold mb-0">Channel</h6>
            </th>
            <th>
                <h6 class="fs-4 fw-semibold mb-0">Channel Status</h6>
            </th>
            <th>
                <h6 class="fs-4 fw-semibold mb-0">Action</h6>
            </th>
    </thead>
    <tbody>
        <?php foreach ($list->result() as $channel) : ?>
            <tr>
                <!-- placing data into the table -->
                <td><?= $channel->CHANNEL_NAME ?></td>
                <td><?= $channel->CHANNEL_STATUS ?></td>
                <td>
                    <a class="btn btn-info btn-sm edit-channel" data-bs-toggle="modal" data-bs-target="#updateModal<?= $channel->CHANNEL_ID ?>"><i class="fa fa-edit"></i></a>
                    <!-- .modal for add task -->
                    <div class="modal fade" id="updateModal<?= $channel->CHANNEL_ID ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" style="width:100%">
                                <div class="modal-header d-flex align-items-center">
                                    <h4 class="modal-title">Update Session</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <?php

                                $data['channel'] = $channel;
                                $data['update'] = true;

                                $this->load->view("channel_form", $data);
                                ?>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                    </div>
                    <a class="btn btn-danger btn-sm" href="<?= base_url('CodeIgniterTraining/index.php/crudchannel/delete/' . $channel->CHANNEL_ID) ?>" onclick="return confirm('Adakah anda pasti nak padam record ini?')"><i class="fa fa-trash"></i></a>

                </td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

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

                // Update modal with session data
                const modalTitle = document.querySelector('.modal-title');
                const sessionForm = document.querySelector('.channel-form');

                modalTitle.textContent = 'Update Session';

                // Assuming session form elements have IDs, update their values
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