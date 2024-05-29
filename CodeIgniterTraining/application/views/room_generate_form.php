<!-- Update Room Form -->
<div class="modal-body">
    <form role="form" action="<?= base_url() ?>CodeIgniterTraining/index.php/room_update/update" method="post" enctype="multipart/form-data">

        <!-- Room Code and ID -->
        <div class="form-group mb-3">
            
            <!-- Room -->
            <div class="mb-3">
                <label>Session</label>
                <select class="form-control" name="room_id">
                    <option value="">-- Please Choose --</option>
                    <option value="">S202526-I</option>
                    <option value="">S202526-II</option>
                    <option value="">D202526-II</option>
                    <option value="">D202526-I</option>
                </select>
            </div>
        </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
        Close
    </button>
    <button type="submit" class="btn btn-success" data-bs-dismiss="modal">
        Create
    </button>
</div>
</form>