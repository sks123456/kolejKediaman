<!-- Update Room Form -->
<div class="modal-body">
    <form role="form" action="<?= base_url() ?>CodeIgniterTraining/index.php/register_studrole/save" method="post" enctype="multipart/form-data">

        <div class="form-group mb-3">        
            <!-- Session -->
            <div class="mb-3">
                <label>Academic Session</label>
                <select class="form-control" name="session_id">
                    <option value="">-- Please Choose --</option>
                    <option value="">1</option>
                </select>
            </div>
        </div>

        <!-- Student ID -->
        <div class="form-group">
            <div class="mb-3">
                <label>Matric ID</label>
                    <input type="text" class="form-control" name="student_id">
            </div>
        </div>

        <!-- Role -->
        <div class="form-group">
            <div class="mb-3">
                <label>Role</label>
                <div class="row">
                    <div class="col-md-3">
                        <label class="radio-inline">
                            <input type="radio" name="studrole_role" required> MKS
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label class="radio-inline">
                            <input type="radio" name="studrole_role" required> JPKK
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label class="radio-inline">
                            <input type="radio" name="studrole_role" required> MPP
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Status -->
        <div class="form-group">
            <div class="mb-3">
                <label>Status</label>
                <div class="row">
                    <div class="col-md-3">
                        <label class="radio-inline">
                            <input type="radio" name="studrole_status" required> Active
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label class="radio-inline">
                            <input type="radio" name="studrole_status" required> Non-Active
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
    <button type="submit" class="btn btn-success" data-bs-dismiss="modal">
        Save
    </button>
</div>
</form>