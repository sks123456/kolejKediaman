<!-- Uniform List -->
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Senarai Pendaftaran Saluran Uniform Permohonan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="senarai_session" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Saluran</th>
                            <th>Status</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list->result() as $row) : ?>
                            <tr>
                                <!-- placing data into the table -->
                                <td><?= $row->UNIFORM_NAME ?></td>
                                <td><?= $row->UNIFORM_STATUS ?></td>
                                <td>
                                    <a class="btn btn-primary" href="<?= base_url('CodeIgniterTraining/index.php/cruduniform/updateUniform/' . $row->UNIFORM_ID) ?>" onclick="return confirm('Adakah anda pasti nak mengedit record ini?')">UPDATE</a>
                                    <a class="btn btn-primary" href="<?= base_url('CodeIgniterTraining/index.php/cruduniform/delete/' . $row->UNIFORM_ID) ?>" onclick="return confirm('Adakah anda pasti nak padam record ini?')">DELETE</a>   
                                </td>
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
