<!-- Update Room Form -->
<div class="modal-body">
    <form role="form" action="<?= base_url() ?>CodeIgniterTraining/index.php/room_update/update" method="post" enctype="multipart/form-data">

        <!-- Session -->
        <div class="form-group mb-3">
            
            <!-- Session -->
            <div class="mb-3">
                <label>Session</label>
                <select class="form-control" name="session">
                    <option value="">-- Please Choose --</option>
                    <option value="">S202526-I</option>
                    <option value="">S202526-II</option>
                    <option value="">D202526-II</option>
                    <option value="">D202526-I</option>
                </select>
            </div>
        </div>

        <!-- Block Code and ID -->
        <div class="form-group mb-3">
            
            <!-- Block -->
            <div class="mb-3">
                <label>Block</label>
                <select class="form-control" name="room_id">
                    <option value="">-- Please Choose --</option>
                    <option value="">Block 1</option>
                    <option value="">Block 2</option>
                    <option value="">Ibnu Majah</option>
                </select>
            </div>
        </div>


        <!-- Status -->
        <div class="form-group">
            <div class="mb-3">
                <label>Status</label>
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