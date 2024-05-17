<!DOCTYPE html>
<html>
<!-- Header -->
<?php $this->load->view('stud_header'); ?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <?php $this->load->view('stud_side'); ?>
</aside>
<!-- Content Header (Page header) -->
<!-- Content Wrapper -->
<div class="content-wrapper" style="min-height:902.55px;">
    <section class="content-header">
        <h1>Pengesahan</h1>
        <ol class="breadcrumb">
            <li><a href="http://localhost/fyp_kk/CodeIgniterTraining/index.php/studcrud/index#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Pengesahan</li>
        </ol>
    </section>
    <section class="content">
        <?php if (empty($applications)) : ?>
            <div class="alert alert-info">
                <strong>Info!</strong> Tiada permohonan dalam sesi semasa ditemui.
            </div>
        <?php else : ?>
            <?php foreach ($applications as $application) : ?>
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= $application['SESSION_NAME'] ?></h3>
                    </div>
                    <div class="box-body">
                        <table class="table">
                            <tr>
                                <td style="width: 250px">Tarikh Hantar Permohonan </td>
                                <td>: Disimpan pada <?= date('Y-m-d H:i:s', strtotime($application['SUBMITTED_BY'])) ?></td>
                            </tr>
                            <tr>
                                <td>Status Kelulusan </td>
                                <td>: <?= $application['APPLICATION_STATUS'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-header with-border">
                <h3 class="box-title">Pengesahan Terimaan/Tolak Permohonan</h3>
            </div>
            <div class="box-body">
                <table class="table">
                    <tr>
                        <td style="width: 250px">Saluran</td>
                        <td>: <?= $application['CHANNEL_NAME'] ?></td>
                    </tr>
                    <tr>
                        <td>Permohonan </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="approval" id="approve" value="approve" checked>
                                <label class="form-check-label" for="approve">
                                    Terima
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="approval" id="reject" value="reject">
                                <label class="form-check-label" for="reject">
                                    Tolak
                                </label>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="box box-primary" id="bilikSection">
            <!-- /.box-header -->
            <div class="box-header with-border">
                <h3 class="box-title">Pilih Bilik</h3>
            </div>
            <div class="box-body">
                <table class="table">
                    <tr>
                        <td>Sila Pilih Bilik Mengikut Jenis Bilik</td>
                    </tr>
                    <tr>
                        <td style="width: 250px">Jenis Bilik</td>
                        <td>
                            <!-- Buttons to trigger the modals -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBilikBerdua">Bilik Berdua RM5/Hari @ RM 665/Sem</button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBilikBertiga">Bilik Bertiga RM4/Hari @ RM 532/Sem</button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBilikBerempat">Bilik Berempat RM3/Hari @ RM 399/Sem</button>
                        </td>
                    </tr>

                    <!-- Modal for Bilik Berdua -->
                    <div class="modal fade" id="modalBilikBerdua" tabindex="-1" role="dialog" aria-labelledby="modalBilikBerduaLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalBilikBerduaLabel">Pilihan Bilik Berdua</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Card deck to contain room cards -->
                                    <div class="card-deck">
                                        <?php if (empty($room2)) : ?>
                                            <div class="col-12">
                                                <div class="alert alert-info" role="alert">
                                                    No rooms available.
                                                </div>
                                            </div>
                                        <?php else : ?>
                                            <?php foreach ($room2 as $room) : ?>
                                                <?php $availableRooms = $room->CAPACITY - $room->FILLED_ROOM; ?>
                                                <div class="col-md-4 mb-4">
                                                    <div id="<?= $room->ROOM_CODE ?>" class="card h-100"> <!-- Assigning ID here -->
                                                        <div class="card-body">
                                                            <h5 class="card-title"><?= $room->ROOM_CODE ?></h5>
                                                            <p class="card-text">Capacity: <?= $room->CAPACITY ?></p>
                                                            <p class="card-text">Available: <?= $availableRooms ?></p>
                                                            <p class="card-text">Description: <?= $room->ROOM_DESC ?></p>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button type="button" class="btn btn-primary" onclick="selectRoom('<?= $room->ROOM_CODE ?>','<?= $room->CAPACITY ?>'  )">Select</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal for Bilik Bertiga -->
                    <div class="modal fade" id="modalBilikBertiga" tabindex="-1" role="dialog" aria-labelledby="modalBilikBertigaLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalBilikBertigaLabel">Pilihan Bilik Bertiga</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Card deck to contain room cards -->
                                    <div class="card-deck">
                                        <?php if (empty($room3)) : ?>
                                            <div class="col-12">
                                                <div class="alert alert-info" role="alert">
                                                    No rooms available.
                                                </div>
                                            </div>
                                        <?php else : ?>
                                            <?php foreach ($room3 as $room) : ?>
                                                <?php $availableRooms = $room->CAPACITY - $room->FILLED_ROOM; ?>
                                                <div class="col-md-4 mb-4">
                                                    <div id="<?= $room->ROOM_CODE ?>" class="card h-100"> <!-- Assigning ID here -->
                                                        <div class="card-body">
                                                            <h5 class="card-title"><?= $room->ROOM_CODE ?></h5>
                                                            <p class="card-text">Capacity: <?= $room->CAPACITY ?></p>
                                                            <p class="card-text">Available: <?= $availableRooms ?></p>
                                                            <p class="card-text">Description: <?= $room->ROOM_DESC ?></p>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button type="button" class="btn btn-primary" onclick="selectRoom('<?= $room->ROOM_CODE ?>','<?= $room->CAPACITY ?>')">Select</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal for Bilik Berempat -->
                    <div class="modal fade" id="modalBilikBerempat" tabindex="-1" role="dialog" aria-labelledby="modalBilikBerempatLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalBilikBerempatLabel">Pilihan Bilik Berempat</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Card deck to contain room cards -->
                                    <div class="card-deck">
                                        <?php if (empty($room4)) : ?>
                                            <div class="col-12">
                                                <div class="alert alert-info" role="alert">
                                                    No rooms available.
                                                </div>
                                            </div>
                                        <?php else : ?>
                                            <?php foreach ($room4 as $room) : ?>
                                                <?php $availableRooms = $room->CAPACITY - $room->FILLED_ROOM; ?>
                                                <div class="col-md-4 mb-4">
                                                    <div id="<?= $room->ROOM_CODE ?>" class="card h-100"> <!-- Assigning ID here -->
                                                        <div class="card-body">
                                                            <h5 class="card-title"><?= $room->ROOM_CODE ?></h5>
                                                            <p class="card-text">Capacity: <?= $room->CAPACITY ?></p>
                                                            <p class="card-text">Available: <?= $availableRooms ?></p>
                                                            <p class="card-text">Description: <?= $room->ROOM_DESC ?></p>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button type="button" class="btn btn-primary" onclick="selectRoom('<?= $room->ROOM_CODE ?>','<?= $room->CAPACITY ?>')">Select</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
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
                    $('.close').click;
                }
            </script>
            </table>
        </div>
        <div id="infoBilik">
            <div class="box-header with-border">
                <h3 class="box-title">Maklumat Pilihan Bilik</h3>
            </div>
            <div class="box-body">
                <table class="table" id="info-bilik">
                    <tr>
                        <td style="width: 250px">Jenis Bilik</td>
                        <td>
                            <input type="text" id="selectedRoomCapacity" name="selectedRoomCapacity">
                        </td>
                    </tr>
                    <tr>
                        <td>Blok</td>
                        <td>
                            <input type="text" id="selectedRoomCode" name="selectedRoomCode">

                        </td>
                    </tr>
                </table>
                <input type="submit" value="Hantar">
            </div>
        </div>
        <div class="box box-primary" id="confirmationSection" style="display: none;">
            <div class="box-body">
                <h4>Anda pasti untuk menolak permohonan ini?</h4>
                <button class="btn btn-danger">Tolak Permohonan</button>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('footer'); ?>
<div class="control-sidebar-bg"></div>
<?php $this->load->view('control_sidebar'); ?>
</div>
<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Script to show/hide the "Pilih Bilik" section based on radio button selection
    document.addEventListener('DOMContentLoaded', function() {
        const rejectRadio = document.getElementById('reject');
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
    });
    document.addEventListener('DOMContentLoaded', function() {
        const rejectRadio = document.getElementById('approve');
        const bilikSection = document.getElementById('bilikSection');
        const confirmationSection = document.getElementById('confirmationSection');

        rejectRadio.addEventListener('change', function() {
            if (this.checked) {
                bilikSection.style.display = 'block';
                confirmationSection.style.display = 'none';
                infoBilik.style.display = 'block';

            }
        });
    });
</script>
</body>

</html>