<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

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
  <!-- <div class="preloader">
    <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/logos/favicon.png" alt="loader" class="lds-ripple img-fluid" />
  </div> -->
  <div id="main-wrapper">
    <!-- Sidebar Start -->
    <?php $this->load->view('newSide'); ?>

    <!--  Sidebar End -->
    <div class="page-wrapper">
      <!--  Header Start -->
      <?php $this->load->view('newTopBar'); ?>
      <!--  Header End -->
      <div class="body-wrapper">
        <div class="container-fluid">

        <!--  Alert Message -->
        <?php if ($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger">
              <?= $this->session->flashdata('error') ?>
            </div>
          <?php endif; ?>

          <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success">
              <?= $this->session->flashdata('success') ?>
            </div>
          <?php endif; ?>

          <div class="d-md-flex align-items-center justify-content-between mb-7">
            <div class="mb-4 mb-md-0">
              <h4 class="fs-6 mb-0">Update Block Information</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none" href="http://localhost/FYP_kk/CodeIgniterTraining/index.php/">Home</a>
                  </li>
                  <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none">Room</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Update Block Information</li>
                </ol>
              </nav>
            </div>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Column -->
            <div class="col-lg-12">
              <div class="card w-100 position-relative overflow-hidden">
                <div class="px-4 py-3 border-bottom">
                  <div class="d-flex align-items-center">
                    <h4 class="card-title mb-0">List of Blocks</h4>
                    <!-- <div class="ms-auto">
                      <button class="btn btn-rounded btn-success hstack gap-1" data-bs-toggle="modal" data-bs-target="#myModal">
                        <i class="ti ti-plus fs-6"></i>
                        Update Block
                      </button>
                    </div>
                    <!-- .modal for add create new session -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content" style="width:100%">
                          <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title"></h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <?php $this->load->view("block_update_form") ?>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                </div>
              </div>

              <!-- room list -->
              <!-- Row -->
              <div class="row">
                <!-- Column -->
                <div class="col-lg-12">
                  <div class="card w-100 position-relative overflow-hidden">
                    <div class="px-4 py-3 border-bottom">
                      <div class="d-flex align-items-center">
                        <!-- .modal for add create new session -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content" style="width:full-content">
                              <div class="modal-header d-flex align-items-center">
                                <h4 class="modal-title">Filter Room</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <?php $this->load->view("room_list_query_form") ?>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->
                    </div>
                    <div class="card-body p-4">
                      <div class="table-responsive mb-4">
                        <?php $this->load->view("block_update_list"); ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <!-- Row -->
        </div>
      </div>
    </div>
  </div>
  </div>
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