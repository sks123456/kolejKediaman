<!-- Update Room Form -->
<div class="modal-body">
    <form role="form" action="<?= base_url('CodeIgniterTraining/index.php/room_generate/create_room') ?>" method="post" enctype="multipart/form-data">

        <!-- Room Code and ID -->
        <div class="form-group mb-3">
            
            <!-- Room -->
            <!-- Session -->
            <div class="mb-3">
                <label>Session</label>
                <select class="form-control" name="session_id" required> <!-- Add required attribute here -->
                    <option value="">-- Please Choose --</option>
                    <?php foreach ($sessions as $session) : ?>
                        <option value="<?= $session->academic_id ?>"><?= $session->session_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                Close
            </button>
            <button type="submit" class="btn btn-success">
                Create
            </button>
        </div>
    </form>
</div>
