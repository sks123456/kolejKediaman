<header class="topbar">
  <div class="with-vertical"><!-- ---------------------------------- -->
    <!-- Start Vertical Layout Header -->
    <!-- ---------------------------------- -->
    <nav class="navbar navbar-expand-lg p-0">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
            <iconify-icon icon="solar:hamburger-menu-linear"></iconify-icon>
          </a>
        </li>

      </ul>

      <div class="d-block d-lg-none">
        <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/logos/fypkk_logo-light.png" class="" width="180" alt="" />
      </div>
      <a class="navbar-toggler border-0 text-white nav-icon-hover" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <iconify-icon icon="solar:menu-dots-bold" class="fs-7"></iconify-icon>
      </a>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <div class="d-flex align-items-center justify-content-between">
          <!-- ------------------------------- -->
          <!-- start mega-dropdown Dropdown -->
          <!-- ------------------------------- -->
          </ul>
          <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">

            <li class="nav-item">
              <a class="nav-link nav-icon-hover moon dark-layout" href="javascript:void(0)">
                <iconify-icon icon="solar:moon-line-duotone" class="moon"></iconify-icon>
              </a>
              <a class="nav-link nav-icon-hover sun light-layout" href="javascript:void(0)">
                <iconify-icon icon="solar:sun-2-line-duotone" class="sun"></iconify-icon>
              </a>
            </li>

            <!-- ------------------------------- -->
            <!-- start language Dropdown -->
            <!-- ------------------------------- -->
             <!--
            <li class="nav-item hover-dd dropdown">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" aria-expanded="false">
                <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/svgs/icon-flag-en.svg" alt="" width="20px" height="20px" class="rounded-circle object-fit-cover round-20" />
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                <div class="message-body">
                  <a href="javascript:void(0)" class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                    <div class="position-relative">
                      <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/svgs/icon-flag-en.svg" alt="" width="20px" height="20px" class="rounded-circle object-fit-cover round-20" />
                    </div>
                    <p class="mb-0 fs-3">English (UK)</p>
                  </a>
                  <a href="javascript:void(0)" class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                    <div class="position-relative">
                      <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/svgs/icon-flag-cn.svg" alt="" width="20px" height="20px" class="rounded-circle object-fit-cover round-20" />
                    </div>
                    <p class="mb-0 fs-3">中国人 (Chinese)</p>
                  </a>
                  <a href="javascript:void(0)" class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                    <div class="position-relative">
                      <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/svgs/icon-flag-fr.svg" alt="" width="20px" height="20px" class="rounded-circle object-fit-cover round-20" />
                    </div>
                    <p class="mb-0 fs-3">français (French)</p>
                  </a>
                  <a href="javascript:void(0)" class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                    <div class="position-relative">
                      <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/svgs/icon-flag-sa.svg" alt="" width="20px" height="20px" class="rounded-circle object-fit-cover round-20" />
                    </div>
                    <p class="mb-0 fs-3">عربي (Arabic)</p>
                  </a>
                </div>
              </div>
            </li> -->
            <!-- ------------------------------- -->
            <!-- end language Dropdown -->
            <!-- ------------------------------- -->

            <!-- ------------------------------- -->
            <!-- start profile Dropdown -->
            <!-- ------------------------------- -->
            <li class="nav-item hover-dd dropdown">
              <a class="nav-link" href="javascript:void(0)" id="drop1" aria-expanded="false">
                <div class="d-flex align-items-center">
                  <div class="user-profile-img">
                    <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/profile/user-1.jpg" class="rounded-circle" width="30" height="30" alt="" />
                  </div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end content-dd dropdown-menu-animate-up user-dd animated flipInY" aria-labelledby="drop1">
                <div class="profile-dropdown position-relative" data-simplebar>
                  <div class="py-3 px-7 pb-0">
                    <h5 class="mb-0 fs-5">User Profile</h5>
                  </div>
                  <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                    <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/profile/user-1.jpg" class="rounded-circle" width="80" height="80" alt="" />
                    <div class="ms-3">
                      <h5 class="mb-1 fs-4">Staff UMT</h5>
                      <span class="mb-1 d-block">KOLEJ KEDIAMAN</span>
                      <p class="mb-0 d-flex align-items-center gap-2">
                        <!-- email address -->
                      </p>
                    </div>
                  </div>
                  <div class="message-body">
                  </div>
                  <div class="d-grid py-4 px-7 pt-8">
                    <a href="#" class="btn btn-info">Log Out</a>
                  </div>
                </div>
              </div>
            </li>
            <!-- ------------------------------- -->
            <!-- end profile Dropdown -->
            <!-- ------------------------------- -->

          </ul>
        </div>
      </div>
    </nav>
    <!-- ---------------------------------- -->
    <!-- End Vertical Layout Header -->
    <!-- ---------------------------------- -->

    <!-- ------------------------------- -->
    <!-- apps Dropdown in Small screen -->
    <!-- ------------------------------- -->

    <!--  Mobilenavbar -->
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="mobilenavbar" aria-labelledby="offcanvasWithBothOptionsLabel">
      <nav class="sidebar-nav scroll-sidebar">
        <div class="offcanvas-header justify-content-between">
          <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/logos/dark-logo.svg" alt="" class="img-fluid" />
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body h-n80" data-simplebar>
          <ul id="sidebarnav">
            <li class="sidebar-item">
              <a class="sidebar-link has-arrow px-1" href="javascript:void(0)" aria-expanded="false">
                <span class="d-flex">
                  <iconify-icon icon="solar:shield-plus-outline" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Apps</span>
              </a>
              <ul aria-expanded="false" class="collapse first-level my-3">
                <li class="sidebar-item py-2">
                  <a href="<?php echo base_url() ?>monster-bt5-v8/dist/main/app-chat.html" class="d-flex align-items-center position-relative ">
                    <div class="bg-primary-subtle rounded-circle round-40 me-3 p-6 d-flex align-items-center justify-content-center">
                      <iconify-icon icon="solar:chat-line-linear" class="text-primary fs-5"></iconify-icon>
                    </div>
                    <div class="d-inline-block ">
                      <h6 class="mb-0 ">Chat Application</h6>
                      <span class="fs-3 d-block text-muted">New messages arrived</span>
                    </div>
                  </a>
                </li>
                <li class="sidebar-item py-2">
                  <a href="<?php echo base_url() ?>monster-bt5-v8/dist/main/app-invoice.html" class="d-flex align-items-center position-relative">
                    <div class="bg-secondary-subtle rounded-circle round-40 me-3 p-6 d-flex align-items-center justify-content-center">
                      <iconify-icon icon="solar:bill-list-linear" class="text-secondary fs-5"></iconify-icon>
                    </div>
                    <div class="d-inline-block">
                      <h6 class="mb-0">Invoice App</h6>
                      <span class="fs-3 d-block text-muted">Get latest invoice</span>
                    </div>
                  </a>
                </li>
                <li class="sidebar-item py-2">
                  <a href="<?php echo base_url() ?>monster-bt5-v8/dist/main/app-contact2.html" class="d-flex align-items-center position-relative">
                    <div class="bg-success-subtle rounded-circle round-40 me-3 p-6 d-flex align-items-center justify-content-center">
                      <iconify-icon icon="solar:bedside-table-2-linear" class="text-success fs-5"></iconify-icon>
                    </div>
                    <div class="d-inline-block">
                      <h6 class="mb-0">Contact Application</h6>
                      <span class="fs-3 d-block text-muted">2 Unsaved Contacts</span>
                    </div>
                  </a>
                </li>
                <li class="sidebar-item py-2">
                  <a href="<?php echo base_url() ?>monster-bt5-v8/dist/main/app-email.html" class="d-flex align-items-center position-relative">
                    <div class="bg-warning-subtle rounded-circle round-40 me-3 p-6 d-flex align-items-center justify-content-center">
                      <iconify-icon icon="solar:letter-unread-linear" class="text-warning fs-5"></iconify-icon>
                    </div>
                    <div class="d-inline-block">
                      <h6 class="mb-0">Email App</h6>
                      <span class="fs-3 d-block text-muted">Get new emails</span>
                    </div>
                  </a>
                </li>
                <li class="sidebar-item py-2">
                  <a href="<?php echo base_url() ?>monster-bt5-v8/dist/main/page-user-profile.html" class="d-flex align-items-center position-relative">
                    <div class="bg-danger-subtle rounded-circle round-40 me-3 p-6 d-flex align-items-center justify-content-center">
                      <iconify-icon icon="solar:cart-large-2-linear" class="text-danger fs-5"></iconify-icon>
                    </div>
                    <div class="d-inline-block">
                      <h6 class="mb-0">User Profile</h6>
                      <span class="fs-3 d-block text-muted">learn more information</span>
                    </div>
                  </a>
                </li>
                <li class="sidebar-item py-2">
                  <a href="<?php echo base_url() ?>monster-bt5-v8/dist/main/app-calendar.html" class="d-flex align-items-center position-relative">
                    <div class="bg-primary-subtle rounded-circle round-40 me-3 p-6 d-flex align-items-center justify-content-center">
                      <iconify-icon icon="solar:calendar-linear" class="text-primary fs-5"></iconify-icon>
                    </div>
                    <div class="d-inline-block">
                      <h6 class="mb-0">Calendar App</h6>
                      <span class="fs-3 d-block text-muted">Get dates</span>
                    </div>
                  </a>
                </li>
                <li class="sidebar-item py-2">
                  <a href="<?php echo base_url() ?>monster-bt5-v8/dist/main/app-contact.html" class="d-flex align-items-center position-relative">
                    <div class="bg-secondary-subtle rounded-circle round-40 me-3 p-6 d-flex align-items-center justify-content-center">
                      <iconify-icon icon="solar:bedside-table-linear" class="text-secondary fs-5"></iconify-icon>
                    </div>
                    <div class="d-inline-block">
                      <h6 class="mb-0">Contact List Table</h6>
                      <span class="fs-3 d-block text-muted">Add new contact</span>
                    </div>
                  </a>
                </li>
                <li class="sidebar-item py-2">
                  <a href="<?php echo base_url() ?>monster-bt5-v8/dist/main/app-notes.html" class="d-flex align-items-center position-relative">
                    <div class="bg-success-subtle rounded-circle round-40 me-3 p-6 d-flex align-items-center justify-content-center">
                      <iconify-icon icon="solar:palette-linear" class="text-success fs-5"></iconify-icon>
                    </div>
                    <div class="d-inline-block">
                      <h6 class="mb-0">Notes Application</h6>
                      <span class="fs-3 d-block text-muted">To-do and Daily tasks</span>
                    </div>
                  </a>
                </li>
                <ul class="px-8 mt-7 mb-4">
                  <li class="sidebar-item mb-3">
                    <h5 class="fs-5 fw-semibold">Quick Links</h5>
                  </li>
                  <li class="sidebar-item py-2">
                    <a class="fs-3" href="<?php echo base_url() ?>monster-bt5-v8/dist/main/page-pricing.html">Pricing
                      Page</a>
                  </li>
                  <li class="sidebar-item py-2">
                    <a class="fs-3" href="<?php echo base_url() ?>monster-bt5-v8/dist/main/authentication-login.html">Authentication Design</a>
                  </li>
                  <li class="sidebar-item py-2">
                    <a class="fs-3" href="<?php echo base_url() ?>monster-bt5-v8/dist/main/authentication-register.html">Register Now</a>
                  </li>
                  <li class="sidebar-item py-2">
                    <a class="fs-3" href="<?php echo base_url() ?>monster-bt5-v8/dist/main/authentication-error.html">404
                      Error Page</a>
                  </li>
                  <li class="sidebar-item py-2">
                    <a class="fs-3" href="<?php echo base_url() ?>monster-bt5-v8/dist/main/app-notes.html">Notes App</a>
                  </li>
                  <li class="sidebar-item py-2">
                    <a class="fs-3" href="<?php echo base_url() ?>monster-bt5-v8/dist/main/page-user-profile.html">User
                      Application</a>
                  </li>
                  <li class="sidebar-item py-2">
                    <a class="fs-3" href="<?php echo base_url() ?>monster-bt5-v8/dist/main/page-account-settings.html">Account Settings</a>
                  </li>
                </ul>
              </ul>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link px-1" href="<?php echo base_url() ?>monster-bt5-v8/dist/main/app-chat.html" aria-expanded="false">
                <span class="d-flex">
                  <iconify-icon icon="solar:chat-unread-outline" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Chat</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link px-1" href="<?php echo base_url() ?>monster-bt5-v8/dist/main/app-calendar.html" aria-expanded="false">
                <span class="d-flex">
                  <iconify-icon icon="solar:calendar-minimalistic-outline" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Calendar</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link px-1" href="<?php echo base_url() ?>monster-bt5-v8/dist/main/app-email.html" aria-expanded="false">
                <span class="d-flex">
                  <iconify-icon icon="solar:inbox-unread-outline" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Email</span>
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
  <div class="app-header with-horizontal">
    <nav class="navbar navbar-expand-xl container-fluid p-0">
      <ul class="navbar-nav">
        <li class="nav-item d-block d-xl-none">
          <a class="nav-link sidebartoggler ms-n3" id="sidebarCollapse" href="javascript:void(0)">
            <i class="ti ti-menu-2"></i>
          </a>
        </li>
        <li class="nav-item d-none d-xl-block">
          <a href="index.html" class="text-nowrap nav-link">
            <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/logos/light-logo.svg" class="" width="180" alt="" />
          </a>
        </li>
      </ul>
        
      <div class="d-block d-xl-none">
        <a href="index.html" class="text-nowrap nav-link">
          <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/logos/dark-logo.svg" width="180" alt="" />
        </a>
      </div>
      <a class="navbar-toggler nav-icon-hover p-0 border-0" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="p-2">
          <i class="ti ti-dots fs-7"></i>
        </span>
      </a>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <div class="d-flex align-items-center justify-content-between px-0 px-xl-8">
          <a href="javascript:void(0)" class="nav-link round-40 p-1 ps-0 d-flex d-xl-none align-items-center justify-content-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar" aria-controls="offcanvasWithBothOptions">
            <i class="ti ti-align-justified fs-7"></i>
          </a>
          <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
            <li class="nav-item search-box d-none d-md-flex align-items-center">
              <div class="nav-link">
                <form class="app-search position-relative">
                  <input type="text" class="form-control rounded-pill border-0 shadow-none" placeholder="Search for..." />
                  <a href="#" class="srh-btn"><iconify-icon icon="solar:magnifer-linear" class="position-absolute top-50 end-0 translate-middle-y me-2"></iconify-icon></a>
                </form>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover moon dark-layout" href="javascript:void(0)">
                <iconify-icon icon="solar:moon-line-duotone" class="moon"></iconify-icon>
              </a>
              <a class="nav-link nav-icon-hover sun light-layout" href="javascript:void(0)">
                <iconify-icon icon="solar:sun-2-line-duotone" class="sun"></iconify-icon>
              </a>
            </li>

            <!-- ------------------------------- -->
            <!-- start language Dropdown -->
            <!-- ------------------------------- -->
            <li class="nav-item hover-dd dropdown">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" aria-expanded="false">
                <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/svgs/icon-flag-en.svg" alt="" width="20px" height="20px" class="rounded-circle object-fit-cover round-20" />
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                <div class="message-body">
                  <a href="javascript:void(0)" class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                    <div class="position-relative">
                      <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/svgs/icon-flag-en.svg" alt="" width="20px" height="20px" class="rounded-circle object-fit-cover round-20" />
                    </div>
                    <p class="mb-0 fs-3">English (UK)</p>
                  </a>
                  <a href="javascript:void(0)" class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                    <div class="position-relative">
                      <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/svgs/icon-flag-cn.svg" alt="" width="20px" height="20px" class="rounded-circle object-fit-cover round-20" />
                    </div>
                    <p class="mb-0 fs-3">中国人 (Chinese)</p>
                  </a>
                  <a href="javascript:void(0)" class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                    <div class="position-relative">
                      <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/svgs/icon-flag-fr.svg" alt="" width="20px" height="20px" class="rounded-circle object-fit-cover round-20" />
                    </div>
                    <p class="mb-0 fs-3">français (French)</p>
                  </a>
                  <a href="javascript:void(0)" class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                    <div class="position-relative">
                      <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/svgs/icon-flag-sa.svg" alt="" width="20px" height="20px" class="rounded-circle object-fit-cover round-20" />
                    </div>
                    <p class="mb-0 fs-3">عربي (Arabic)</p>
                  </a>
                </div>
              </div>
            </li>
            <!-- ------------------------------- -->
            <!-- end language Dropdown -->
            <!-- ------------------------------- -->

            <!-- ------------------------------- -->
            <!-- start profile Dropdown -->
            <!-- ------------------------------- -->
            <li class="nav-item hover-dd dropdown">
              <a class="nav-link" href="javascript:void(0)" id="drop1" aria-expanded="false">
                <div class="d-flex align-items-center">
                  <div class="user-profile-img">
                    <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/profile/user-1.jpg" class="rounded-circle" width="30" height="30" alt="" />
                  </div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end content-dd dropdown-menu-animate-up user-dd animated flipInY" aria-labelledby="drop1">
                <div class="profile-dropdown position-relative" data-simplebar>
                  <div class="py-3 px-7 pb-0">
                    <h5 class="mb-0 fs-5">User Profile</h5>
                  </div>
                  <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                    <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/profile/user-1.jpg" class="rounded-circle" width="80" height="80" alt="" />
                    <div class="ms-3">
                      <h5 class="mb-1 fs-4">Markarn Doe</h5>
                      <span class="mb-1 d-block">Designer</span>
                      <p class="mb-0 d-flex align-items-center gap-2">
                        <i class="ti ti-mail fs-4"></i> info@<?php echo base_url() ?>monster.com
                      </p>
                    </div>
                  </div>
                  <div class="message-body">
                    <a href="#" class="py-8 px-7 mt-8 d-flex align-items-center">
                      <span class="d-flex align-items-center justify-content-center bg-info-subtle rounded p-6 fs-7 text-info">
                        <iconify-icon icon="solar:user-circle-line-duotone"></iconify-icon>
                      </span>
                      <div class="w-75 d-inline-block v-middle ps-3">
                        <h6 class="mb-1 fs-3 lh-base">My Profile</h6>
                        <span class="fs-2 d-block text-body-secondary">Account Settings</span>
                      </div>
                    </a>
                    <a href="#" class="py-8 px-7 d-flex align-items-center">
                      <span class="d-flex align-items-center justify-content-center bg-info-subtle rounded p-6 fs-7 text-info">
                        <iconify-icon icon="solar:inbox-line-line-duotone"></iconify-icon>
                      </span>
                      <div class="w-75 d-inline-block v-middle ps-3">
                        <h6 class="mb-1 fs-3 lh-base">My Inbox</h6>
                        <span class="fs-2 d-block text-body-secondary">Messages & Emails</span>
                      </div>
                    </a>
                    <a href="#" class="py-8 px-7 d-flex align-items-center">
                      <span class="d-flex align-items-center justify-content-center bg-info-subtle rounded p-6 fs-7 text-info">
                        <iconify-icon icon="solar:checklist-minimalistic-line-duotone"></iconify-icon>
                      </span>
                      <div class="w-75 d-inline-block v-middle ps-3">
                        <h6 class="mb-1 fs-3 lh-base">My Task</h6>
                        <span class="fs-2 d-block text-body-secondary">To-do and Daily Tasks</span>
                      </div>
                    </a>
                  </div>
                  <div class="d-grid py-4 px-7 pt-8">
                    <a href="#" class="btn btn-info">Log Out</a>
                  </div>
                </div>
              </div>
            </li>
            <!-- ------------------------------- -->
            <!-- end profile Dropdown -->
            <!-- ------------------------------- -->

          </ul>
        </div>
      </div>
    </nav>
  </div>
</header>