<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Print-specific styles -->
    <style>
        @media print {

            /* Hide elements that shouldn't be printed */
            .main-sidebar,
            .content-header,
            .breadcrumb,
            .modal-footer,
            .btn,
            .control-sidebar-bg {
                display: none !important;
            }

            /* Ensure the modal content takes up the full page width */
            .modal-dialog {
                width: 100% !important;
                max-width: 100% !important;
            }

            .modal-content {
                border: none !important;
                box-shadow: none !important;
            }

            /* Adjust the printed table layout */
            .table {
                width: 100% !important;
                margin: 0 !important;
            }
        }
    </style>
    <!-- Meta tags and other head elements -->
    <?php $this->load->view('stud_header'); ?>
</head>

<body>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <?php $this->load->view('stud_side'); ?>
    </aside>

    <!-- Content Wrapper -->
    <div class="content-wrapper" style="min-height: 902.55px;">
        <section class="content-header">
            <h1>Cetak Borang Permohonan</h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url('studcrud/index') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Cetak</li>
            </ol>
        </section>
        <section class="content">
            <?php if (empty($applications)) : ?>
                <div class="alert alert-info">
                    <strong>Info!</strong> Tiada permohonan ditemui untuk pelajar ini.
                </div>
            <?php else : ?>
                <div class="list-group">
                    <?php foreach ($applications as $application) : ?>
                        <div class="list-group-item">
                            <div class="row">
                                <div class="col-xs-8">
                                    <span><?= $application['SESSION_NAME'] ?></span>
                                    <span class="text-danger"><?= $application['APPLICATION_STATUS'] ?></span>
                                </div>
                                <div class="col-xs-4 text-right">
                                    <button class="btn btn-primary" onclick="showDetails(<?= htmlspecialchars(json_encode($application), ENT_QUOTES, 'UTF-8') ?>, <?= htmlspecialchars(json_encode($student_data), ENT_QUOTES, 'UTF-8') ?>)">More</button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>
    </div>
    <div>
        <?php $this->load->view('footer'); ?>
    </div>
    <div class="control-sidebar-bg"></div>
    <?php $this->load->view('control_sidebar'); ?>

    <!-- Modal for Application Details -->
    <div class="modal fade" id="applicationModal" tabindex="-1" role="dialog" aria-labelledby="applicationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="applicationModalLabel">Application Details</h4>
                </div>
                <div class="modal-body" id="application-details"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="window.print()">Cetak</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showDetails(application, student_data) {
            const detailsContainer = document.getElementById('application-details');
            let detailsHtml = `
                <table class="table">
                    <tr>
                        <td style="width: 100px">Nama </td>
                        <td style="width: 400px">: ${student_data.NAMA_PELAJAR}</td>
                        <td style="width: 100px">No Matrik </td>
                        <td style="width: 400px">: ${student_data.STUD_MATRIC}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Program </td>
                        <td>: ${student_data.PROGRAM}</td>
                    </tr>
                    <tr>
                        <td>Saluran </td>
                        <td>: ${application.CHANNEL_NAME}</td>
                        ${application.CHANNEL_ID == '2' ? `
                        <td>Unit Uniform</td>
                        <td>${application.UNIFORM_NAME}</td>
                        ` : ''}
                    </tr>
                    <tr>
                        <td>Lampiran </td>
                        <td id="document-link">
                            ${application.APPLICATION_UPLOAD_NAME ? `<a href="<?= base_url('application_approval/download/') ?>${application.APPLICATION_ID}" target="_blank">${application.APPLICATION_UPLOAD_NAME}</a>` : 'Tiada Dokumen'}
                        </td>
                    </tr>
                    <tr>
                        <td>Merit </td>
                        <td>: ${application.MERIT}</td>
                    </tr>
                    <tr>
                        <td>Merit Kolej</td>
                        <td>: ${application.MERIT_KOLEJ}</td>
                    </tr>
                </table>
                <div id="document-content"></div>
            `;
            detailsContainer.innerHTML = detailsHtml;
            if (application.APPLICATION_UPLOAD_NAME) {
                fetchDocument(application.APPLICATION_ID);
            }
            $('#applicationModal').modal('show');
        }

        function fetchDocument(applicationId) {
            fetch(`<?= base_url('CodeIgniterTraining/index.php/application_approval/download/') ?>${applicationId}`)
                .then(response => response.blob())
                .then(blob => {
                    const url = URL.createObjectURL(blob);
                    const iframe = document.createElement('iframe');
                    iframe.src = url;
                    iframe.style.width = '100%';
                    iframe.style.height = '500px';
                    document.getElementById('document-content').appendChild(iframe);
                })
                .catch(error => {
                    console.error('Error fetching document:', error);
                });
        }
    </script>
</body>

</html>
