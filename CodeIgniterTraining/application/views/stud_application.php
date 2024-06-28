<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">
<?php $this->load->view('stud_header'); ?>
<?php
// Retrieve user data from session
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
    <title>Hostel App | Admin</title>
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
        <?php $this->load->view('stud_side'); ?>

        <!--  Sidebar End -->
        <div class="page-wrapper">
            <!--  Header Start -->
            <?php $this->load->view('stud_header'); ?>
            <!--  Header End -->
            <div class="body-wrapper">
                <div class="container-fluid">
                    <div class="d-md-flex align-items-center justify-content-between mb-7">
                        <div class="mb-4 mb-md-0">
                            <h4 class="fs-6 mb-0">Application</h4>
                        </div>
                    </div>

                    <!-- Room Allocation List -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card w-100 position-relative overflow-hidden">
                                <div class="card-body p-4">
                                    <div class="table-responsive mb-4">
                                        <section class="content">
                                            <?php if (isset($no_sessions) && $no_sessions) : ?>
                                                <div class="alert alert-info">
                                                    <strong>Info!</strong> No active sessions found.
                                                </div>
                                            <?php else : ?>
                                                <form role="form" action="<?= base_url() ?>CodeIgniterTraining/index.php/application/stud_submit_application" method="post" enctype="multipart/form-data">
                                                    <div class="box box-info">
                                                        <!-- /.box-header -->
                                                        <div class="box-header with-border">
                                                            <h3 class="box-title"><?= $sessions->SESSION_NAME ?></h3>
                                                        </div>
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <input type="hidden" name="stud_matric" value="<?= $student_data['STUD_MATRIC'] ?>">
                                                                <input type="hidden" name="session_id" value="<?= $sessions->SESSION_ID ?>">
                                                                <table class="table">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="col-md-2"><label for="Channels">Application Channel</label></td>
                                                                            <td class="col-md-3">
                                                                                <select class="form-control" name="channel_selected" id="channelSelect" required>
                                                                                    <option value="">-- Please Choose --</option>
                                                                                    <?php foreach ($channels as $channel) : ?>
                                                                                        <option value="<?= $channel['CHANNEL_ID'] ?>"><?= $channel['CHANNEL_NAME'] ?></option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                            </td>
                                                                            <td class="col-md-6"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <div class="form-group" id="unitUniformField" style="display: none;">
                                                                                    <label for="unit_uniform">Unit Uniform Name</label>
                                                                                    <select class="form-control" name="unit_uniform" id="unit_uniform">
                                                                                        <option value="">-- Please Choose --</option>
                                                                                        <?php foreach ($uniforms as $uniform) : ?>
                                                                                            <option value="<?= $uniform['UNIFORM_ID'] ?>"><?= $uniform['UNIFORM_NAME'] ?></option>
                                                                                        <?php endforeach; ?>
                                                                                    </select>
                                                                                </div>
                                                                            <td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <!-- File Upload -->
                                                                                <div class="form-group" id="pdfDocumentField" style="display: none;">
                                                                                    <label for="pdf_document">Upload PDF Document</label>
                                                                                    <!-- Create new record - standard file upload input -->
                                                                                    <input type="file" name="pdf_document" id="pdf_document" accept=".pdf">
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="box box-info">
                                                        <div class="box-header with-border">
                                                            <h3 class="box-title">Declaration of Acknowledgment</h3>
                                                        </div>
                                                        <div class="box-body">
                                                            <iframe src="../pengakuan/pengakuan.pdf" width="100%" height="600px"></iframe>
                                                            <h4>Jumlah Merit</h4>
                                                            <div class="box-body">
                                                                <table class="table col-md-6">
                                                                    <tr>
                                                                        <td>
                                                                            Merit: <?= $student_data['MERIT'] ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            College Merit: <?= $student_data['MERIT_KOLEJ'] ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox" id="checkbox" name="checkbox" required> I hereby acknowledge and agree to all the terms and conditions as stated above</td>
                                                                    </tr>
                                                                </table>
                                                                <input type="submit" value="Save and Submit Application">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <script>
                                                    document.getElementById('channelSelect').addEventListener('change', function() {
                                                        var channelSelect = this;
                                                        var selectedOption = channelSelect.options[channelSelect.selectedIndex].text;
                                                        var unitUniformField = document.getElementById('unitUniformField');
                                                        var pdfDocumentField = document.getElementById('pdfDocumentField');

                                                        if (selectedOption === 'Unit Uniform') {
                                                            unitUniformField.style.display = 'block';
                                                            pdfDocumentField.style.display = 'block'; // Always show the PDF document field if 'Unit Uniform' is selected
                                                        } else {
                                                            unitUniformField.style.display = 'none';
                                                            // Show PDF document field only if the selected option is not 'Biasa' or the default option
                                                            if (selectedOption !== 'COMMON STUDENT' && selectedOption !== '-- Please Choose --') {
                                                                pdfDocumentField.style.display = 'block';
                                                            } else {
                                                                pdfDocumentField.style.display = 'none';
                                                            }
                                                        }
                                                    });
                                                </script>
                                            <?php endif; ?>
                                        </section>
                                    </div>
                                    <!-- Bootstrap 5 JS -->
                                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
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