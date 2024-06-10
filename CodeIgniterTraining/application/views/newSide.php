<aside class="left-sidebar with-vertical">
  <div><!-- ---------------------------------- -->
    <!-- Start Vertical Layout Sidebar -->
    <!-- ---------------------------------- -->
    <div class="brand-logo d-flex align-items-center justify-content-between">
      <a href="<?php echo base_url('CodeIgniterTraining/index.php/dashboard'); ?>" class="text-nowrap logo-img">
        <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/logos/dark-logo.svg" class="dark-logo" alt="Logo-Dark" />
        <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/logos/light-logo.svg" class="light-logo" alt="Logo-light" />
      </a>
      <a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-flex d-xl-none">
        <iconify-icon icon="solar:close-circle-outline"></iconify-icon>
      </a>
    </div>

    <nav class="sidebar-nav scroll-sidebar" data-simplebar>
      <ul id="sidebarnav">
        <!-- ---------------------------------- -->
        <!-- Home -->
        <!-- ---------------------------------- -->
        <!-- User Profile-->
        <li>
          <!-- User profile -->
          <div class="user-profile text-center position-relative pt-4 mt-1">
            <!-- User profile image -->
            <div class="profile-img m-auto">
              <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/profile/user-1.jpg" alt="user" class="w-100 rounded-circle" />
            </div>
            <!-- User profile text-->
            <div class="profile-text py-2 dropdown-center hide-menu">
              <a href="#" class="dropdown-toggle link u-dropdown" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Staff UMT <span class="caret"></span>
              </a>
              <div class="dropdown-menu animated flipInY dropdown-menu-end">
                <a class="dropdown-item d-flex align-items-center gap-2" href="#">
                  <iconify-icon icon="solar:user-linear" class="fs-5 text-info"></iconify-icon>
                  My Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item d-flex align-items-center gap-2" href="#">
                  <iconify-icon icon="solar:login-2-linear" class="fs-5 text-danger"></iconify-icon>
                  Logout
                </a>
                <div class="dropdown-divider"></div>
                <div class="p-2">
                  <button type="button" class="btn d-block w-100 btn-info rounded-pill">
                    View Profile
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- End User profile text-->
        </li>
        <!-- User Profile-->
        <!-- ---------------------------------- -->
        <!-- STUDENT -->
        <!-- ---------------------------------- -->
        <li class="sidebar-item">
          <a class="sidebar-link" href="<?php echo base_url('CodeIgniterTraining/index.php/enrollment'); ?>">
            <iconify-icon icon="solar:screencast-2-linear" class="aside-icon"></iconify-icon>
            <span class="hide-menu">Students' Information</span>
          </a>
        </li>

        <!-- ---------------------------------- -->
        <!-- SETUP -->
        <!-- ---------------------------------- -->
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
            <iconify-icon icon="solar:widget-linear" class="aside-icon"></iconify-icon>
            <span class="hide-menu">Information Setup</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="<?php echo base_url('CodeIgniterTraining/index.php/session'); ?>" class="sidebar-link">
                <iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
                <span class="hide-menu">Registration Sessions</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="<?php echo base_url('CodeIgniterTraining/index.php/channel'); ?>" class="sidebar-link">
                <iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
                <span class="hide-menu">Channels</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="<?php echo base_url('CodeIgniterTraining/index.php/uniform'); ?>" class="sidebar-link">
                <iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
                <span class="hide-menu">Uniform Unit</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="<?php echo base_url('CodeIgniterTraining/index.php/mpp'); ?>" class="sidebar-link">
                <iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
                <span class="hide-menu">Student Leaders</span>
              </a>
            </li>

          </ul>
        </li>
        <!-- ---------------------------------- -->
        <!-- Room -->
        <!-- ---------------------------------- -->
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
            <iconify-icon icon="solar:cardholder-linear" class="aside-icon"></iconify-icon>
            <span class="hide-menu">Manage Room</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="<?php echo base_url('CodeIgniterTraining/index.php/room'); ?>" class="sidebar-link">
                <iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
                <span class="hide-menu">List of Rooms for Seniors</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="<?php echo base_url('CodeIgniterTraining/index.php/generate_room') ?>" class="sidebar-link">
                <iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
                <span class="hide-menu">Create Room</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="<?php echo base_url('CodeIgniterTraining/index.php/update_room') ?>" class="sidebar-link">
                <iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
                <span class="hide-menu">Update Room Information</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="<?php echo base_url('CodeIgniterTraining/index.php/update_block') ?>" class="sidebar-link">
                <iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
                <span class="hide-menu">Update Block Information</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="<?php echo base_url('CodeIgniterTraining/index.php/room_allocation') ?>" class="sidebar-link">
                <iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
                <span class="hide-menu">Manage Room Allocation</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
            <iconify-icon icon="solar:command-linear" class="aside-icon"></iconify-icon>
            <span class="hide-menu">Applications</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="<?php echo base_url('CodeIgniterTraining/index.php/application');?>" class="sidebar-link">
                <iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
                <span class="hide-menu">Register Application</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="<?php echo base_url('CodeIgniterTraining/index.php/application_approval');?>" class="sidebar-link">
                <iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
                <span class="hide-menu">Registration Approval</span>
              </a>
            </li>
          </ul>
        </li>

        <!-- ---------------------------------- -->
        <!-- Reports -->
        <!-- ---------------------------------- -->
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
            <iconify-icon icon="solar:notification-unread-lines-linear" class="aside-icon"></iconify-icon>
            <span class="hide-menu">Reports</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
          <li class="sidebar-item">
              <a href="<?php echo base_url() ?>monster-bt5-v8/dist/main/form-inputs.html" class="sidebar-link">
                <iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
                <span class="hide-menu">Overall Report</span>
              </a>
            </li>  
          <li class="sidebar-item">
              <a href="<?php echo base_url() ?>monster-bt5-v8/dist/main/form-inputs.html" class="sidebar-link">
                <iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
                <span class="hide-menu">List of Applications</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="<?php echo base_url() ?>monster-bt5-v8/dist/main/form-input-groups.html" class="sidebar-link">
                <iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
                <span class="hide-menu">List of Appeal Applications</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="<?php echo base_url() ?>monster-bt5-v8/dist/main/form-input-grid.html" class="sidebar-link">
                <iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
                <span class="hide-menu">LIst of Applications Categorized by Status</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="<?php echo base_url() ?>monster-bt5-v8/dist/main/form-checkbox-radio.html" class="sidebar-link">
                <iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
                <span class="hide-menu">List of Room Allocation</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="<?php echo base_url() ?>monster-bt5-v8/dist/main/form-bootstrap-touchspin.html" class="sidebar-link">
                <iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
                <span class="hide-menu">List of Applicant without Room</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="<?php echo base_url() ?>monster-bt5-v8/dist/main/form-bootstrap-switch.html" class="sidebar-link">
                <iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
                <span class="hide-menu">List of Rooms</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="<?php echo base_url() ?>monster-bt5-v8/dist/main/form-select2.html" class="sidebar-link">
                <iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
                <span class="hide-menu">Channels or Gender</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="<?php echo base_url() ?>monster-bt5-v8/dist/main/form-dual-listbox.html" class="sidebar-link">
                <iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
                <span class="hide-menu">Vacant Room</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="<?php echo base_url() ?>monster-bt5-v8/dist/main/form-dual-listbox.html" class="sidebar-link">
                <iconify-icon icon="solar:stop-circle-line-duotone" class="sidebar-icon"></iconify-icon>
                <span class="hide-menu">Validation Status</span>
              </a>
            </li>
          </ul>
        </li>
        
      </ul>
    </nav>

    <div class="sidebar-footer hide-menu">
      <!-- item-->
      <a href="<?php echo base_url() ?>monster-bt5-v8/dist/main/authentication-login.html" class="link" data-bs-toggle="tooltip" data-bs-placement="top" title="Logout"><iconify-icon icon="solar:power-bold"></iconify-icon></a>
    </div>

    <!-- ---------------------------------- -->
    <!-- Start Vertical Layout Sidebar -->
    <!-- ---------------------------------- -->
  </div>
</aside>