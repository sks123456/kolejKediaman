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
                            <h4 class="fs-6 mb-0">Confirmation</h4>
                        </div>
                    </div>

                    <!-- Room Allocation List -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card w-100 position-relative overflow-hidden">
                                <div class="px-4 py-3 border-bottom">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title mb-0">Confirmation</h4>
                                    </div>
                                </div>
                                <div class="card-body p-4">
                                    <div class="table-responsive mb-4">
                                        <section class="content">
                                            <?php if (isset($no_sessions) && $no_sessions) : ?>
                                                <div class="alert alert-info">
                                                    <strong>Info!</strong> Tiada sesi aktif ditemui.
                                                </div>
                                            <?php else : ?>
                                                <?php if (empty($applications)) : ?>
                                                    <div class="alert alert-info">
                                                        <strong>Info!</strong> Tiada permohonan yang sah dalam sesi semasa ditemui. Sila buat permohonan terlebih dahulu dan memastikan permohonan diterima.
                                                    </div>
                                                <?php else : ?>
                                                    <form id="pengesahanForm" action="<?= base_url('CodeIgniterTraining/index.php/cetak/pengesahanReturn') ?>" method="post">
                                                        <?php foreach ($applications as $application) : ?>
                                                            <div class="box box-primary">
                                                                <!-- /.box-header -->
                                                                <div class="box-header with-border">
                                                                    <h3 class="box-title"><?= $application['SESSION_NAME'] ?></h3>
                                                                </div>
                                                                <div class="box-body">
                                                                    <table class="table">
                                                                        <tr>
                                                                            <td style="width: 250px">Date of Application Submission </td>
                                                                            <td>: Submitted On <?= date('Y-m-d H:i:s', strtotime($application['SUBMITTED_BY'])) ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Application Status </td>
                                                                            <td>: <?= $application['APPLICATION_STATUS'] ?></td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; ?>

                                                        <div class="box box-primary">
                                                            <!-- /.box-header -->
                                                            <div class="box-header with-border">
                                                                <h3 class="box-title">Confirmation of Acceptance/Rejection of Application</h3>
                                                            </div>
                                                            <div class="box-body">
                                                                <table class="table">
                                                                    <tr>
                                                                        <td style="width: 250px">Channep</td>
                                                                        <td>: <?= $application['CHANNEL_NAME'] ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Applcation </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="approval" id="approve" value="approve" checked>
                                                                                <label class="form-check-label" for="approve">Accept</label>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="approval" id="reject" value="reject">
                                                                                <label class="form-check-label" for="reject">Reject</label>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="box box-primary" id="bilikSection">
                                                            <!-- /.box-header -->
                                                            <div class="box-header with-border">
                                                                <h3 class="box-title">Choose Room</h3>
                                                            </div>
                                                            <div class="box-body">
                                                                <table class="table">
                                                                    <tr>
                                                                        <td>Please Select a Room by Room Type</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width: 250px">Room Type</td>
                                                                        <td>
                                                                            <!-- Buttons to trigger the modals -->
                                                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalBilikBerdua">Twin Room RM5/Day @ RM 665/Semester</button>
                                                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalBilikBertiga">Three-Person Room RM4/Day @ RM 532/Semester</button>
                                                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalBilikBerempat">Four-Person Room RM3/Day @ RM 399/Semester</button>
                                                                        </td>
                                                                    </tr>

                                                                    <!-- Modal for Bilik Berdua -->
                                                                    <div class="modal fade" id="modalBilikBerdua" tabindex="-1" role="dialog" aria-labelledby="modalBilikBerduaLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="modalBilikBerduaLabel">Choice of Two-Person Room</h5>
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <!-- Nested array to store rooms grouped by block and level -->
                                                                                    <?php if (empty($room2)) : ?>
                                                                                        <div class="col-12">
                                                                                            <div class="alert alert-info" role="alert">
                                                                                                No rooms available.
                                                                                            </div>
                                                                                        </div>
                                                                                    <?php else : ?>
                                                                                        <?php $roomGroups = []; ?>
                                                                                        <?php foreach ($room2 as $room) : ?>
                                                                                            <?php if (!isset($roomGroups[$room->BLOCK][$room->ROOM_LEVEL])) $roomGroups[$room->BLOCK][$room->ROOM_LEVEL] = []; ?>
                                                                                            <?php $roomGroups[$room->BLOCK][$room->ROOM_LEVEL][] = $room; ?>
                                                                                        <?php endforeach; ?>

                                                                                        <!-- Display room cards for each block and level -->
                                                                                        <?php foreach ($roomGroups as $block => $levels) : ?>
                                                                                            <div class="row">
                                                                                                <div class="col-12">
                                                                                                    <h6><?= $block ?></h6>
                                                                                                </div>
                                                                                                <?php foreach ($levels as $level => $rooms) : ?>
                                                                                                    <?php if (empty($rooms)) : ?>
                                                                                                        <div class="col-12">
                                                                                                            <div class="alert alert-info" role="alert">
                                                                                                                No rooms available in this level.
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    <?php else : ?>
                                                                                                        <div class="col-12">
                                                                                                            <h6>Level <?= $level ?></h6>
                                                                                                        </div>
                                                                                                        <?php foreach ($rooms as $room) : ?>
                                                                                                            <div class="col-md-4 mb-4">
                                                                                                                <div id="<?= $room->ROOM_CODE ?>" class="card h-100">
                                                                                                                    <div class="card-body">
                                                                                                                        <h5 class="card-title"><?= $room->ROOM_CODE ?></h5>
                                                                                                                        <p class="card-text">Capacity: <?= $room->CAPACITY ?></p>
                                                                                                                        <p class="card-text">Available: <?= $room->CAPACITY - $room->FILLED_ROOM ?></p>
                                                                                                                        <!-- <p class="card-text">Description: <?= $room->ROOM_DESC ?></p> -->
                                                                                                                    </div>
                                                                                                                    <div class="card-footer">
                                                                                                                        <button type="button" class="btn btn-primary" onclick="selectRoom('<?= $room->ROOM_CODE ?>','<?= $room->CAPACITY ?>')">Select</button>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        <?php endforeach; ?>
                                                                                                    <?php endif; ?>
                                                                                                <?php endforeach; ?>
                                                                                            </div>
                                                                                        <?php endforeach; ?>
                                                                                    <?php endif ?>

                                                                                </div>
                                                                                <div class="modal-footer"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Modal for Bilik Bertiga -->
                                                                    <div class="modal fade" id="modalBilikBertiga" tabindex="-1" role="dialog" aria-labelledby="modalBilikBertigaLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="modalBilikBertigaLabel">Choice of Three-Person Room</h5>
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <!-- Nested array to store rooms grouped by block and level -->
                                                                                    <?php if (empty($room3)) : ?>
                                                                                        <div class="col-12">
                                                                                            <div class="alert alert-info" role="alert">
                                                                                                No rooms available.
                                                                                            </div>
                                                                                        </div>
                                                                                    <?php else : ?>
                                                                                        <?php $roomGroups = []; ?>
                                                                                        <?php foreach ($room3 as $room) : ?>
                                                                                            <?php if (!isset($roomGroups[$room->BLOCK][$room->ROOM_LEVEL])) $roomGroups[$room->BLOCK][$room->ROOM_LEVEL] = []; ?>
                                                                                            <?php $roomGroups[$room->BLOCK][$room->ROOM_LEVEL][] = $room; ?>
                                                                                        <?php endforeach; ?>

                                                                                        <!-- Display room cards for each block and level -->
                                                                                        <?php foreach ($roomGroups as $block => $levels) : ?>
                                                                                            <div class="row">
                                                                                                <div class="col-12">
                                                                                                    <h6><?= $block ?></h6>
                                                                                                </div>
                                                                                                <?php foreach ($levels as $level => $rooms) : ?>
                                                                                                    <?php if (empty($rooms)) : ?>
                                                                                                        <div class="col-12">
                                                                                                            <div class="alert alert-info" role="alert">
                                                                                                                No rooms available in this level.
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    <?php else : ?>
                                                                                                        <div class="col-12">
                                                                                                            <h6>Level <?= $level ?></h6>
                                                                                                        </div>
                                                                                                        <?php foreach ($rooms as $room) : ?>
                                                                                                            <div class="col-md-4 mb-4">
                                                                                                                <div id="<?= $room->ROOM_CODE ?>" class="card h-100">
                                                                                                                    <div class="card-body">
                                                                                                                        <h5 class="card-title"><?= $room->ROOM_CODE ?></h5>
                                                                                                                        <p class="card-text">Capacity: <?= $room->CAPACITY ?></p>
                                                                                                                        <p class="card-text">Available: <?= $room->CAPACITY - $room->FILLED_ROOM ?></p>
                                                                                                                        <!-- <p class="card-text">Description: <?= $room->ROOM_DESC ?></p> -->
                                                                                                                    </div>
                                                                                                                    <div class="card-footer">
                                                                                                                        <button type="button" class="btn btn-primary" onclick="selectRoom('<?= $room->ROOM_CODE ?>','<?= $room->CAPACITY ?>')">Select</button>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        <?php endforeach; ?>
                                                                                                    <?php endif; ?>
                                                                                                <?php endforeach; ?>
                                                                                            </div>
                                                                                        <?php endforeach; ?>
                                                                                    <?php endif ?>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Modal for Bilik Berempat -->
                                                                    <div class="modal fade" id="modalBilikBerempat" tabindex="-1" role="dialog" aria-labelledby="modalBilikBerempatLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="modalBilikBerempatLabel">Choice of Four-Person Room</h5>
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <!-- Nested array to store rooms grouped by block and level -->
                                                                                    <?php if (empty($room4)) : ?>
                                                                                        <div class="col-12">
                                                                                            <div class="alert alert-info" role="alert">
                                                                                                No rooms available.
                                                                                            </div>
                                                                                        </div>
                                                                                    <?php else : ?>
                                                                                        <?php $roomGroups = []; ?>
                                                                                        <?php foreach ($room4 as $room) : ?>
                                                                                            <?php if (!isset($roomGroups[$room->BLOCK][$room->ROOM_LEVEL])) $roomGroups[$room->BLOCK][$room->ROOM_LEVEL] = []; ?>
                                                                                            <?php $roomGroups[$room->BLOCK][$room->ROOM_LEVEL][] = $room; ?>
                                                                                        <?php endforeach; ?>

                                                                                        <!-- Display room cards for each block and level -->
                                                                                        <?php foreach ($roomGroups as $block => $levels) : ?>
                                                                                            <div class="row">
                                                                                                <div class="col-12">
                                                                                                    <h6><?= $block ?></h6>
                                                                                                </div>
                                                                                                <?php foreach ($levels as $level => $rooms) : ?>
                                                                                                    <?php if (empty($rooms)) : ?>
                                                                                                        <div class="col-12">
                                                                                                            <div class="alert alert-info" role="alert">
                                                                                                                No rooms available in this level.
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    <?php else : ?>
                                                                                                        <div class="col-12">
                                                                                                            <h6>Level <?= $level ?></h6>
                                                                                                        </div>
                                                                                                        <?php foreach ($rooms as $room) : ?>
                                                                                                            <div class="col-md-4 mb-4">
                                                                                                                <div id="<?= $room->ROOM_CODE ?>" class="card h-100">
                                                                                                                    <div class="card-body">
                                                                                                                        <h5 class="card-title"><?= $room->ROOM_CODE ?></h5>
                                                                                                                        <p class="card-text">Capacity: <?= $room->CAPACITY ?></p>
                                                                                                                        <p class="card-text">Available: <?= $room->CAPACITY - $room->FILLED_ROOM ?></p>
                                                                                                                        <!-- <p class="card-text">Description: <?= $room->ROOM_DESC ?></p> -->
                                                                                                                    </div>
                                                                                                                    <div class="card-footer">
                                                                                                                        <button type="button" class="btn btn-primary" onclick="selectRoom('<?= $room->ROOM_CODE ?>','<?= $room->CAPACITY ?>')">Select</button>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        <?php endforeach; ?>
                                                                                                    <?php endif; ?>
                                                                                                <?php endforeach; ?>
                                                                                            </div>
                                                                                        <?php endforeach; ?>
                                                                                    <?php endif ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </table>
                                                            </div>
                                                            <script>
                                                                // Function to handle room selection
                                                                function selectRoom(roomCode, roomType) {
                                                                    // Get the selected room from the modal
                                                                    const selectedRoom = roomCode;
                                                                    const selectedRoomType = roomCode;

                                                                    // Update the form with the selected room
                                                                    document.getElementById('selectedRoomCode').value = roomCode;
                                                                    document.getElementById('selectedRoomCapacity').value = roomType;

                                                                    // Close the modal
                                                                    $('.btn-close').click();
                                                                }
                                                            </script>
                                                        </div>
                                                        <div id="infoBilik">
                                                            <div class="box-header with-border">
                                                                <h3 class="box-title">Room Option Information</h3>
                                                            </div>
                                                            <div class="box-body">
                                                                <table class="table" id="info-bilik">
                                                                    <tr>
                                                                        <td style="width: 250px">Room Type</td>
                                                                        <td>
                                                                            <input type="hidden" id="applicationID" name="applicationID" value="<?= $application['APPLICATION_ID'] ?>">
                                                                            <input type="text" id="selectedRoomCapacity" name="selectedRoomCapacity">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Block</td>
                                                                        <td>
                                                                            <input type="text" id="selectedRoomCode" name="selectedRoomCode">
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <input type="submit" value="Submit">
                                                            </div>
                                                        </div>
                                                        <div class="box box-primary" id="confirmationSection" style="display: none;">
                                                            <div class="box-body">
                                                                <h4>Are you sure to reject this application?</h4>
                                                                <button class="btn btn-danger">Reject Application</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </section>
                                    </div>
                                </div>
                                <!-- Bootstrap 5 JS -->
                                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                                <script>
                                    // Script to show/hide the "Pilih Bilik" section based on radio button selection
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const rejectRadio = document.getElementById('reject');
                                        const approveRadio = document.getElementById('approve');
                                        const bilikSection = document.getElementById('bilikSection');
                                        const infoBilik = document.getElementById('infoBilik');
                                        const confirmationSection = document.getElementById('confirmationSection');

                                        rejectRadio.addEventListener('change', function() {
                                            if (this.checked) {
                                                bilikSection.style.display = 'none';
                                                confirmationSection.style.display = 'block';
                                                infoBilik.style.display = 'none';
                                            }
                                        });

                                        approveRadio.addEventListener('change', function() {
                                            if (this.checked) {
                                                bilikSection.style.display = 'block';
                                                confirmationSection.style.display = 'none';
                                                infoBilik.style.display = 'block';
                                            }
                                        });
                                    });
                                </script>
                            </div>
                        </div>
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