<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">
<?php $this->load->view('stud_header');
$student_data = $this->session->userdata('student_data');
?>

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/logos/favicon.png" />

    <!-- Core Css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>monster-bt5-v8/dist/assets/css/styles.css" />
    <title><?php echo base_url() ?>Hostel App | Admin</title>
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="<?php echo base_url() ?>monster-bt5-v8/dist/assets/libs/owl.carousel/dist/assets/owl.carousel.min.css" />
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/logos/favicon.png" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <div id="main-wrapper">
        <!-- Sidebar Start -->
        <?php $this->load->view('stud_Side'); ?>

        <!--  Sidebar End -->
        <div class="page-wrapper">
            <!--  Header Start -->
            <?php $this->load->view('stud_header'); ?>
            <!--  Header End -->
            <div class="body-wrapper">
                <div class="container-fluid">
                    <div class="d-md-flex align-items-center justify-content-between mb-7">
                        <div class="mb-4 mb-md-0">
                            <h4 class="fs-6 mb-0">List of Previous Applications</h4>
                        </div>
                    </div>

                    <div class="container mt-5 " style="padding-block-start:2%">
                        <div class="row">
                            <section class="content">
                                <?php if (empty($applications)) : ?>
                                    <div class="alert alert-info">
                                        <strong>Info!</strong> Tiada permohonan ditemui untuk pelajar ini.
                                    </div>
                                <?php else : ?>
                                    <div class="list-group">
                                        <?php foreach ($applications as $application) : ?>
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <div>
                                                    <span><?= $application['SESSION_NAME'] ?></span>
                                                    <span class="text-danger"><?= $application['APPLICATION_STATUS'] ?></span>
                                                </div>
                                                <div>
                                                    <button class="btn btn-primary" onclick="showDetails(<?= htmlspecialchars(json_encode($application), ENT_QUOTES, 'UTF-8') ?>, <?= htmlspecialchars(json_encode($student_data), ENT_QUOTES, 'UTF-8') ?>)">More</button>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>

                                <?php endif; ?>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Modal for Application Details -->
    <div class="modal fade" id="applicationModal" tabindex="-1" role="dialog" aria-labelledby="applicationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="applicationModalLabel">Application Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body" id="application-details"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
    <script>
        function handleColorTheme(e) {
            $("html").attr("data-color-theme", e);
            $(e).prop("checked", !0);
        }
    </script>
    <button class="btn btn-info p-3 rounded-circle d-flex align-items-center justify-content-center customizer-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
        <iconify-icon icon="solar:settings-linear" class="fs-7"></iconify-icon>
    </button>

    <div class="offcanvas customizer offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
            <h4 class="offcanvas-title fw-semibold" id="offcanvasExampleLabel">
                Settings
            </h4>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body h-n80" data-simplebar>
            <h6 class="fw-semibold fs-4 mb-2">Theme</h6>

            <div class="d-flex flex-row gap-3 customizer-box" role="group">
                <input type="radio" class="btn-check light-layout" name="theme-layout" id="light-layout" autocomplete="off" />
                <label class="btn p-9 btn-outline-primary" for="light-layout">
                    <iconify-icon icon="solar:sun-2-bold" class="icon fs-7 me-2"></iconify-icon>Light</label>

                <input type="radio" class="btn-check dark-layout" name="theme-layout" id="dark-layout" autocomplete="off" />
                <label class="btn p-9 btn-outline-primary" for="dark-layout"><iconify-icon icon="solar:moon-linear" class="icon fs-7 me-2"></iconify-icon>Dark</label>
            </div>

            <h6 class="mt-5 fw-semibold fs-4 mb-2">Theme Direction</h6>
            <div class="d-flex flex-row gap-3 customizer-box" role="group">
                <input type="radio" class="btn-check" name="direction-l" id="ltr-layout" autocomplete="off" />
                <label class="btn p-9 btn-outline-primary" for="ltr-layout">
                    <iconify-icon icon="solar:align-left-linear" class="icon fs-7 me-2"></iconify-icon>LTR</label>

                <input type="radio" class="btn-check" name="direction-l" id="rtl-layout" autocomplete="off" />
                <label class="btn p-9 btn-outline-primary" for="rtl-layout"><iconify-icon icon="solar:align-right-linear" class="icon fs-7 me-2"></iconify-icon>RTL</label>
            </div>

            <h6 class="mt-5 fw-semibold fs-4 mb-2">Theme Colors</h6>

            <div class="d-flex flex-row flex-wrap gap-3 customizer-box color-pallete" role="group">
                <input type="radio" class="btn-check" name="color-theme-layout" id="Blue_Theme" autocomplete="off" />
                <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Blue_Theme')" for="Blue_Theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="BLUE_THEME">
                    <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-1">
                        <iconify-icon icon="tabler:check" class="text-white d-flex icon fs-5"></iconify-icon>
                    </div>
                </label>

                <input type="radio" class="btn-check" name="color-theme-layout" id="Aqua_Theme" autocomplete="off" />
                <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Aqua_Theme')" for="Aqua_Theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="AQUA_THEME">
                    <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-2">
                        <iconify-icon icon="tabler:check" class="text-white d-flex icon fs-5"></iconify-icon>
                    </div>
                </label>

                <input type="radio" class="btn-check" name="color-theme-layout" id="Purple_Theme" autocomplete="off" />
                <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Purple_Theme')" for="Purple_Theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="PURPLE_THEME">
                    <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-3">
                        <iconify-icon icon="tabler:check" class="text-white d-flex icon fs-5"></iconify-icon>
                    </div>
                </label>

                <input type="radio" class="btn-check" name="color-theme-layout" id="green-theme-layout" autocomplete="off" />
                <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Green_Theme')" for="green-theme-layout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="GREEN_THEME">
                    <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-4">
                        <iconify-icon icon="tabler:check" class="text-white d-flex icon fs-5"></iconify-icon>
                    </div>
                </label>

                <input type="radio" class="btn-check" name="color-theme-layout" id="cyan-theme-layout" autocomplete="off" />
                <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Cyan_Theme')" for="cyan-theme-layout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="CYAN_THEME">
                    <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-5">
                        <iconify-icon icon="tabler:check" class="text-white d-flex icon fs-5"></iconify-icon>
                    </div>
                </label>

                <input type="radio" class="btn-check" name="color-theme-layout" id="orange-theme-layout" autocomplete="off" />
                <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Orange_Theme')" for="orange-theme-layout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="ORANGE_THEME">
                    <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-6">
                        <iconify-icon icon="tabler:check" class="text-white d-flex icon fs-5"></iconify-icon>
                    </div>
                </label>
            </div>

            <h6 class="mt-5 fw-semibold fs-4 mb-2">Layout Type</h6>
            <div class="d-flex flex-row gap-3 customizer-box" role="group">
                <div>
                    <input type="radio" class="btn-check" name="page-layout" id="vertical-layout" autocomplete="off" />
                    <label class="btn p-9 btn-outline-primary" for="vertical-layout"><iconify-icon icon="solar:sidebar-minimalistic-linear" class="icon fs-7 me-2"></iconify-icon>Vertical</label>
                </div>
                <div>
                    <input type="radio" class="btn-check" name="page-layout" id="horizontal-layout" autocomplete="off" />
                    <label class="btn p-9 btn-outline-primary" for="horizontal-layout"><iconify-icon icon="solar:airbuds-case-minimalistic-linear" class="icon fs-7 me-2"></iconify-icon>Horizontal</label>
                </div>
            </div>

            <h6 class="mt-5 fw-semibold fs-4 mb-2">Container Option</h6>

            <div class="d-flex flex-row gap-3 customizer-box" role="group">
                <input type="radio" class="btn-check" name="layout" id="boxed-layout" autocomplete="off" />
                <label class="btn p-9 btn-outline-primary" for="boxed-layout"><iconify-icon icon="solar:align-horizonta-spacing-linear" class="icon fs-7 me-2"></iconify-icon>Boxed</label>

                <input type="radio" class="btn-check" name="layout" id="full-layout" autocomplete="off" />
                <label class="btn p-9 btn-outline-primary" for="full-layout"><iconify-icon icon="solar:align-vertical-spacing-linear" class="icon fs-7 me-2"></iconify-icon>Full</label>
            </div>

            <h6 class="fw-semibold fs-4 mb-2 mt-5">Sidebar Type</h6>
            <div class="d-flex flex-row gap-3 customizer-box" role="group">
                <a href="javascript:void(0)" class="fullsidebar">
                    <input type="radio" class="btn-check" name="sidebar-type" id="full-sidebar" autocomplete="off" />
                    <label class="btn p-9 btn-outline-primary" for="full-sidebar"><iconify-icon icon="solar:mirror-left-linear" class="icon fs-7 me-2"></iconify-icon>Full</label>
                </a>
                <div>
                    <input type="radio" class="btn-check " name="sidebar-type" id="mini-sidebar" autocomplete="off" />
                    <label class="btn p-9 btn-outline-primary" for="mini-sidebar"><iconify-icon icon="solar:mirror-right-linear" class="icon fs-7 me-2"></iconify-icon>Collapse</label>
                </div>
            </div>

            <h6 class="mt-5 fw-semibold fs-4 mb-2">Card With</h6>

            <div class="d-flex flex-row gap-3 customizer-box" role="group">
                <input type="radio" class="btn-check" name="card-layout" id="card-with-border" autocomplete="off" />
                <label class="btn p-9 btn-outline-primary" for="card-with-border"><iconify-icon icon="solar:quit-full-screen-square-linear" class="icon fs-7 me-2"></iconify-icon>Border</label>

                <input type="radio" class="btn-check" name="card-layout" id="card-without-border" autocomplete="off" />
                <label class="btn p-9 btn-outline-primary" for="card-without-border"><iconify-icon icon="solar:minimize-square-2-linear" class="icon fs-7 me-2"></iconify-icon>Shadow</label>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="dark-transparent sidebartoggler"></div>
    <script src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/js/vendor.min.js"></script>
    <!-- Import Js Files -->
    <script src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/js/theme/app.init.js"></script>
    <script src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/js/theme/theme.js"></script>
    <script src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/js/theme/app.min.js"></script>
    <script src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/js/theme/sidebarmenu.js"></script>

    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <script src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/libs/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/js/dashboards/dashboard.js"></script>
</body>

</html>