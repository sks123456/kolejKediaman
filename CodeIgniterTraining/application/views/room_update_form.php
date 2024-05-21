<!-- Update Room Form -->
<div class="modal-body">
    <form role="form" action="<?= base_url() ?>CodeIgniterTraining/index.php/room_update/update" method="post" enctype="multipart/form-data">

        <!-- Room Code and ID -->
        <div class="form-group mb-3">
            
            <!-- Room -->
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
                            <input type="radio" name="room_status" value="1" required> Active
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label class="radio-inline">
                            <input type="radio" name="room_status" value="2" required> Non-Active
                        </label>
                    </div>
                    <!-- Add similar blocks for other radio options -->
                </div>
            </div>
        </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
        Close
    </button>
    <button type="submit" class="btn btn-success" data-bs-dismiss="modal">
        Save
    </button>
</div>
</form>