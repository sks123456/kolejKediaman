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
                        <?php foreach ($list->result() as $row) : ?>
                          <?php
                          // Check if START_DATE or END_DATE is '0000-00-00'
                          $showDeleteButton = ($row->START_DATE == '0000-00-00' || $row->END_DATE == '0000-00-00');
                          // Display 'N/A' for '0000-00-00' dates
                          $startDate = ($row->START_DATE == '0000-00-00') ? 'N/A' : $row->START_DATE;
                          $endDate = ($row->END_DATE == '0000-00-00') ? 'N/A' : $row->END_DATE;

                          // Determine the class based on the status
                          $statusClass = ($row->SESSION_STATUS == "Active") ? "badge rounded-pill bg-success-subtle text-success fw-semibold fs-2" : "badge rounded-pill bg-danger-subtle text-danger fw-semibold fs-2";
                          ?>
                          <tr>
                            <td>
                              <p class="mb-0 fw-normal fs-4"><?= $row->SESSION_NAME ?></p>
                            </td>
                            <td>
                              <p class="mb-0 fw-normal fs-4"><?= $row->APPLICATION_TYPE ?></p>
                            </td>
                            <td>
                              <p class="mb-0 fw-normal fs-4"><?= $startDate ?></p>
                            </td>
                            <td>
                              <p class="mb-0 fw-normal fs-4"><?= $endDate ?></p>
                            </td>
                            <td>
                              <span class="<?=$statusClass?>"><?= $row->SESSION_STATUS ?></span>
                            </td>
                            <td>
                              <?php if ($row->DOCUMENT) : ?>
                                <a href="<?= base_url('CodeIgniterTraining/index.php/crudsession/download/' . $row->SESSION_ID) ?>" target="_blank"><?= $row->DOCUMENT_NAME ?></a>
                              <?php else : ?>
                                No Document Found
                              <?php endif; ?>
                            </td>
                            <td>
                              <table border=0>
                                <tr>
                                  <td>
                                    <a class="btn btn-info btn-sm" href="<?= base_url('CodeIgniterTraining/index.php/crudsession/updateSession/' . $row->SESSION_ID) ?>" onclick="return confirm('Adakah anda pasti nak mengedit record ini?')"><i class="fa fa-edit"></i></a>
                                  </td>
                                  <td>&nbsp;</td>
                                  <td>
                                    <?php if ($showDeleteButton) : ?>
                                      <a class="btn btn-danger btn-sm" href="<?= base_url('CodeIgniterTraining/index.php/crudsession/delete/' . $row->SESSION_ID) ?>" onclick="return confirm('Confirmation for deleting the session?')"><i class="fa fa-trash"></i></a>
                                    <?php endif; ?>
                                  </td>
                                </tr>
                              </table>


                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>