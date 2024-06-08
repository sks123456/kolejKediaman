 <table class="table table-bordered">
    <thead>
        <tr>
            <th>Room Codes</th>
            <th>Gender</th>
            <th>Religion</th>
            <th>Capacity</th>
            <th>Amount of Allocation</th>
            <th>College</th>
            <th>Block</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($allocations as $allocation) : ?>
            <tr>
                <td><?= $allocation['ROOM_CODE'] ?></td>
                <td><?= $allocation['ROOM_GENDER'] ?></td>
                <td><?= $allocation['ROOM_TYPE'] ?></td>
                <td><?= $allocation['CAPACITY'] ?></td>
                <td><?= $allocation['FILLED_ROOM'] ?></td>
                <td><?= $allocation['KOLEJ'] ?></td>
                <td><?= $allocation['BLOCK'] ?></td>
                <td>
                    <button class="btn btn-primary" onclick="showDetails('<?= $allocation['ROOM_CODE'] ?>')">View Details</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
    </div>

    <!-- Modal for displaying allocation details -->
    <div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailsModalLabel">Allocation Details for Room <?=$allocation['ROOM_CODE']?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered" id="detailsTable">
                        <thead>
                            <tr>
                                <th>STUD MATRIC</th>
                                <th>Name</th>
                                <th>Program</th>
                                <th>Merit</th>
                                <th>MERIT KOLEJ</th>
                                <th>CHANNEL NAME</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Details will be populated here using jQuery -->
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showDetails(roomCode) {
            $.ajax({
                url: '<?= base_url() ?>CodeIgniterTraining/index.php/room_allocation/details/' + roomCode,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    let detailsTableBody = $('#detailsTable tbody');
                    detailsTableBody.empty();
                    data.allocations.forEach(function(allocation) {
                        let row = `<tr>
                            <td>${allocation.STUD_MATRIC}</td>
                            <td>${allocation.NAMA_PELAJAR}</td>
                            <td>${allocation.PROGRAM}</td>
                            <td>${allocation.MERIT}</td>
                            <td>${allocation.MERIT_KOLEJ}</td>
                            <td>${allocation.CHANNEL_NAME}</td>
                        </tr>`;
                        detailsTableBody.append(row);
                    });
                    $('#detailsModal').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    </script>