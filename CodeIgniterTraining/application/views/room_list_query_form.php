<form role="form" action="<?= base_url() ?>CodeIgniterTraining/index.php/manage_room/query_list" method="post" enctype="multipart/form-data">
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="room_type">Room Type:</label>
                    <select class="form-control" name="room_type">
                        <option value="">-- Sila Pilih --</option>
                        <option value="MUSLIM">Muslim</option>
                        <option value="OTHERS">Others</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control" name="status" id="status">
                        <option value="">-- Sila Pilih --</option>
                        <option value="1">FULL</option>
                        <option value="2">NOT FULL</option>
                        <option value="3">NOT AVAILABLE</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="kolej">Kolej:</label>
                    <select class="form-control" name="kolej" id="channelSelect">
                        <option value="">-- Sila Pilih --</option>
                        <option value="AT-TARMIDZI(ATT)">AT-TARMIDZI(ATT)</option>
                        <option value="IBNU SINA(IS)">IBNU SINA(IS)</option>
                        <option value="IBNU HIBBAN(IH)">IBNU HIBBAN(IH)</option>
                        <option value="AT-THABRANI(ATB)">AT-THABRANI(ATB)</option>
                        <option value="AN NASAI'(ANN)">AN NASAI'(ANN)</option>
                        <option value="IBNU JARIR(IJ)">IBNU JARIR(IJ)</option>
                        <option value="IBNU ABBAS(IA)">IBNU ABBAS(IA)</option>
                        <option value="IBNU MAJAH(IM)">IBNU MAJAH(IM)</option>
                                                
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="gender">GENDER:</label>
                    <select class="form-control" name="gender" id="gender">
                        <option value="">-- Sila Pilih --</option>
                        <option value="M">MALE</option>
                        <option value="F">FEMALE</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary pull-right">Find</button>
            </div>
        </div>
    </div>
</form>