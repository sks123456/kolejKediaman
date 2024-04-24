<table class="table border text-nowrap mb-0 align-middle">
  <thead class="text-dark fs-4">
    <tr>
      <th>
        <h6 class="fs-4 fw-semibold mb-0">Semester</h6>
      </th>
      <th>
        <h6 class="fs-4 fw-semibold mb-0">Registration Type</h6>
      </th>
      <th>
        <h6 class="fs-4 fw-semibold mb-0">Start Date</h6>
      </th>
      <th>
        <h6 class="fs-4 fw-semibold mb-0">End Date</h6>
      </th>
      <th>
        <h6 class="fs-4 fw-semibold mb-0">Status</h6>
      </th>
      <th>
        <h6 class="fs-4 fw-semibold mb-0">Rule Document</h6>
      </th>
      <th>
        <h6 class="fs-4 fw-semibold mb-0">Action</h6>
      </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($list->result() as $session) : ?>
      <?php
      // Check if START_DATE or END_DATE is '0000-00-00'
      $showDeleteButton = ($session->START_DATE == '0000-00-00' || $session->END_DATE == '0000-00-00');
      // Display 'N/A' for '0000-00-00' dates
      $startDate = ($session->START_DATE == '0000-00-00') ? 'N/A' : $session->START_DATE;
      $endDate = ($session->END_DATE == '0000-00-00') ? 'N/A' : $session->END_DATE;

      // Determine the class based on the status
      $statusClass = ($session->SESSION_STATUS == "Active") ? "badge rounded-pill bg-success-subtle text-success fw-semibold fs-2" : "badge rounded-pill bg-danger-subtle text-danger fw-semibold fs-2";
      ?>
      <tr>
        <td>
          <p class="mb-0 fw-normal fs-4"><?= $session->SESSION_NAME ?></p>
        </td>
        <td>
          <p class="mb-0 fw-normal fs-4"><?= $session->APPLICATION_TYPE ?></p>
        </td>
        <td>
          <p class="mb-0 fw-normal fs-4"><?= $startDate ?></p>
        </td>
        <td>
          <p class="mb-0 fw-normal fs-4"><?= $endDate ?></p>
        </td>
        <td>
          <span class="<?= $statusClass ?>"><?= $session->SESSION_STATUS ?></span>
        </td>
        <td>
          <?php if ($session->DOCUMENT) : ?>
            <a href="<?= base_url('CodeIgniterTraining/index.php/crudsession/download/' . $session->SESSION_ID) ?>" target="_blank"><?= $session->DOCUMENT_NAME ?></a>
          <?php else : ?>
            No Document Found
          <?php endif; ?>
        </td>
        <td>
          <table border=0>
            <tr>
              <td>
                <a class="btn btn-info btn-sm " data-bs-toggle="modal" data-bs-target="#updateModal"><i class="fa fa-edit"></i></a>
                <!-- .modal for add task -->
                <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content" style="width:max-content">
                      <div class="modal-header d-flex align-items-center">
                        <h4 class="modal-title">Update Session</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <?php
                      
                      $data['session'] = $session;
                      $data['update'] = true;

                      $this->load->view("session_form", $data);
                      ?>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                </div>
              </td>
              <td>&nbsp;</td>
              <td>
                <?php if ($showDeleteButton) : ?>
                  <a class="btn btn-danger btn-sm" href="<?= base_url('CodeIgniterTraining/index.php/crudsession/delete/' . $session->SESSION_ID) ?>" onclick="return confirm('Confirmation for deleting the session?')"><i class="fa fa-trash"></i></a>
                <?php endif; ?>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<script>
  // JavaScript code to handle update button click
  document.addEventListener('DOMContentLoaded', function() {
    // Get all update buttons
    const updateButtons = document.querySelectorAll('.btn-info');

    // Iterate over each update button
    updateButtons.forEach(function(button) {
      // Add click event listener to each update button
      button.addEventListener('click', function(event) {
        // Prevent default link behavior
        event.preventDefault();

        // Get the row containing the clicked button
        const row = event.target.closest('tr');

        // Extract session data from the row
        const sessionName = row.querySelector('td:nth-child(1) p').textContent.trim();
        const applicationType = row.querySelector('td:nth-child(2) p').textContent.trim();
        const startDate = row.querySelector('td:nth-child(3) p').textContent.trim();
        const endDate = row.querySelector('td:nth-child(4) p').textContent.trim();
        const status = row.querySelector('td:nth-child(5) span').textContent.trim();
        const documentName = row.querySelector('td:nth-child(6) a').textContent.trim();

        // Update modal with session data
        const modalTitle = document.querySelector('.modal-title');
        const sessionForm = document.querySelector('.session-form');

        modalTitle.textContent = 'Update Session';

        // Assuming session form elements have IDs, update their values
        document.getElementById('sessionName').value = sessionName;
        document.getElementById('applicationType').value = applicationType;
        document.getElementById('startDate').value = startDate;
        document.getElementById('endDate').value = endDate;
        document.getElementById('status').value = status;
        document.getElementById('documentName').value = documentName;

        // Show the modal
        const myModal = new bootstrap.Modal(document.getElementById('updateModal'));
        myModal.show();
      });
    });
  });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>