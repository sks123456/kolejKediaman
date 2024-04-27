<form role="form" action="<?= base_url() ?>CodeIgniterTraining/index.php/application_approval/query_list" method="post" enctype="multipart/form-data">
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="session_selected">Permohonan:</label>
                    <select class="form-control" name="session_selected">
                        <option value="">-- Sila Pilih --</option>
                        <?php foreach ($sessions as $session) : ?>
                            <option value="<?= $session->session_id ?>"><?= $session->session_name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control" name="status" id="status">
                        <option value="">-- Sila Pilih --</option>
                        <option value="Submitted">Submitted</option>
                        <option value="Approved">Approved</option>
                        <option value="Rejected">Rejected</option>
                        <option value="Validated">Validated</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="channel_selected">Saluran:</label>
                    <select class="form-control" name="channel_selected" id="channelSelect">
                        <option value="">-- Sila Pilih --</option>
                        <?php foreach ($channels as $channel) : ?>
                            <option value="<?= $channel->channel_id ?>"><?= $channel->channel_name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="gender">Jantina:</label>
                    <select class="form-control" name="gender" id="gender">
                        <option value="">-- Sila Pilih --</option>
                        <option value="m">Lelaki</option>
                        <option value="f">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="room_type">Jenis Bilik:</label>
                    <select class="form-control" name="room_type" id="room_type">
                        <option value="">-- Sila Pilih --</option>
                        <option value="Muslim">Bilik Muslim</option>
                        <option value="Others">Bilik Bukan Muslim</option>
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
