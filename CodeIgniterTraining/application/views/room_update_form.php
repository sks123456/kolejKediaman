<!-- Update Room Form -->
<div class="modal-body">
    <form role="form" action="<?= base_url('CodeIgniterTraining/index.php/Room_Update/updateRoom') ?>" method="post" enctype="multipart/form-data">

        <!-- Session -->
        <div class="form-group mb-3">
            <div class="mb-3">
                <label>Session</label>
                <select class="form-control" name="session">
                    <option value="">-- Please Choose --</option>
                    <?php foreach ($unique_sessions as $session): ?>
                        <option value="<?php echo $session->KOD_SESI; ?>"><?php echo $session->KOD_SESI; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <!-- Room Code and ID -->
        <div class="form-group mb-3">
            <div class="mb-3">
                <label>Room</label>
                <select class="form-control" name="room_id">
                    <option value="">-- Please Choose --</option>
                    <?php foreach ($room_codes as $room): ?>
                        <option value="<?php echo $room->ID; ?>"><?php echo $room->ROOM_CODE; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <!-- Status -->
        <div class="form-group">
            <div class="mb-3">
                <label>Room Status</label>
                <div class="row">
                    <div class="col-md-3">
                        <label class="radio-inline">
                            <input type="radio" name="status_active" value="1" required> Active
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label class="radio-inline">
                            <input type="radio" name="status_active" value="0" required> Non-Active
                        </label>
                    </div>
                </div>
            </div>
        </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
        Close
    </button>
    <button type="submit" class="btn btn-success">
        Save
    </button>
</div>
</form>
