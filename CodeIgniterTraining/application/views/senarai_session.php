<!-- Permohonan List -->
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Senarai Pendaftaran Kawalan Permohonan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="senarai_session" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>SESSION_ID</th>
                            <th>Semester</th>
                            <th>Jenis Permohonan</th>
                            <th>Tarikh Mula</th>
                            <th>Tarikh Tamat</th>
                            <th>Status</th>
                            <th>Dokumen</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list->result() as $row) : ?>
                            <?php
                            // Check if START_DATE or END_DATE is '0000-00-00'
                            $showDeleteButton = ($row->START_DATE == '0000-00-00' || $row->END_DATE == '0000-00-00');
                            // Display 'N/A' for '0000-00-00' dates
                            $startDate = ($row->START_DATE == '0000-00-00') ? 'N/A' : $row->START_DATE;
                            $endDate = ($row->END_DATE == '0000-00-00') ? 'N/A' : $row->END_DATE;
                            ?>
                            <tr>
                                <!-- placing data into the table -->
                                <td><?= $row->SESSION_ID ?></td>
                                <td><?= $row->SESSION_NAME ?></td>
                                <td><?= $row->APPLICATION_TYPE ?></td>
                                <td><?= $startDate ?></td>
                                <td><?= $endDate ?></td>
                                <td><?= $row->SESSION_STATUS ?></td>
                                <!-- Inside the <tbody> of your table -->
                                <td>
                                    <?php if ($row->DOCUMENT) : ?>
                                        <a href="<?= base_url('CodeIgniterTraining/index.php/crudsession/download/' . $row->SESSION_ID) ?>" target="_blank"><?= $row->DOCUMENT_NAME ?></a>
                                    <?php else : ?>
                                        No Document
                                    <?php endif; ?>
                                </td>

                                <td>
                                    <a class="btn btn-primary" href="<?= base_url('CodeIgniterTraining/index.php/crudsession/updateSession/' . $row->SESSION_ID) ?>" onclick="return confirm('Adakah anda pasti nak mengedit record ini?')">UPDATE</a>
                                    <?php if ($showDeleteButton) : ?>
                                        <a class="btn btn-primary pull-right" href="<?= base_url('CodeIgniterTraining/index.php/crudsession/delete/' . $row->SESSION_ID) ?>" onclick="return confirm('Adakah anda pasti nak padam record ini?')">DELETE</a>
                                    <?php endif; ?>
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