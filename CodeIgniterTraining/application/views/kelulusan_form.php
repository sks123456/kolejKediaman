<section class="content">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Kemaskini Status Kelulusan</h3>
        </div>
        <div class="box-body">
            <form role="form" action="<?= base_url() ?>CodeIgniterTraining/index.php/application_approval/query_list" method="post" enctype="multipart/form-data">
                <table class="table">
                    <tbody>
                        <tr>
                            <td><label for="session_selected">Permohonan:</label></td>
                            <td>
                                <select class="form-control" name="session_selected">
                                    <option value="">-- Sila Pilih --</option>
                                    <?php foreach ($sessions as $session) : ?>
                                        <option value="<?= $session->session_id ?>"><?= $session->session_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="channel_selected">Saluran:</label></td>
                            <td>
                                <select class="form-control" name="channel_selected" id="channelSelect">
                                    <option value="">-- Sila Pilih --</option>
                                    <?php foreach ($channels as $channel) : ?>
                                        <option value="<?= $channel->channel_id ?>"><?= $channel->channel_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="room_type">Jenis Bilik:</label></td>
                            <td>
                                <select class="form-control" name="room_type" id="room_type">
                                    <option value="">-- Sila Pilih --</option>
                                    <option value="Muslim">Bilik Muslim</option>
                                    <option value="Others">Bilik Bukan Muslim</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="gender">Jantina:</label></td>
                            <td>
                                <select class="form-control" name="gender" id="gender">
                                    <option value="">-- Sila Pilih --</option>
                                    <option value="m">Lelaki</option>
                                    <option value="f">Perempuan</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="status">Status:</label></td>
                            <td>
                                <select class="form-control" name="status" id="status">
                                    <option value="">-- Sila Pilih --</option>
                                    <option value="Submitted">Submitted</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Rejected">Rejected</option>
                                    <option value="Validated">Validated</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
            </form>
        </div>
    </div>
</section>