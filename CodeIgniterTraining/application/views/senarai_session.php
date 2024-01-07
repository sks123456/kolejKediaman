<!-- Permohonan List -->
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Senarai Pendaftaran Kawalan Permohonan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Bil</th>
                            <th>Semester</th>
                            <th>Permohonan</th>
                            <th>Tarikh Mula</th>
                            <th>Tarikh Tamat</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list->result() as $row) : ?>
                            <tr>
                                <!-- placing data into the table -->
                                <td><?= $row->SESSION_ID ?></td>
                                <td><?= $row->SESSION_NAME ?></td>
                                <td><?= $row->APPLICATION_TYPE ?></td>
                                <td><?= $row->START_DATE ?></td>
                                <td><?= $row->END_DATE ?></td>
                                <td><?= $row->SESSION_STATUS ?></td>
                                <td><a class="delete-link" href="<?= base_url('CodeIgniterTraining/index.php/crudsession/delete/' . $row->SESSION_ID) ?>" onclick="return confirm('Adakah anda pasti nak padam record ini?')">DELETE</a></td>
                                <td><a class="delete-link" href="<?= base_url('CodeIgniterTraining/index.php/crudsession/update/' . $row->SESSION_ID) ?>" onclick="return confirm('Adakah anda pasti nak mengedit record ini?')">UPDATE</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
