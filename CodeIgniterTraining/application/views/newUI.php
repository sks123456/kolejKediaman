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
  <title><?php echo base_url() ?>monster Bootstrap Admin</title>
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
    <?php $this->load->view('newSide'); ?>

    <!--  Sidebar End -->
    <div class="page-wrapper">
      <!--  Header Start -->
      <?php $this->load->view('newTopBar'); ?>

      <!--  Header End -->
      <div class="body-wrapper">
        <div class="container-fluid">
          <div class="d-md-flex align-items-center justify-content-between mb-7">
  <div class="mb-4 mb-md-0">
    <h4 class="fs-6 mb-0">Dashboard</h4>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item">
          <a class="text-muted text-decoration-none" href="<?php echo base_url() ?>monster-bt5-v8/dist/main/index.html">Home</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
      </ol>
    </nav>
  </div>
  <div class="d-flex align-items-center justify-content-between gap-6">
    <select class="form-select border fs-3" aria-label="Default select example">
      <option selected>November 2023</option>
      <option value="1">February 2023</option>
      <option value="2">March 2023</option>
      <option value="3">April 2023</option>
    </select>
    <button class="btn btn-success d-flex align-items-center gap-1 fs-3 py-2 px-9">
      <i class="ti ti-plus fs-4"></i>
      Create
    </button>
  </div>
</div>
          <!-- Row -->
          <div class="row">
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title fs-4 fw-normal mb-3">Daily Sales</h4>
                  <h2 class="mb-3 fs-9 fw-light">$56,908</h2>
                  <div class="d-flex align-items-center gap-2 mb-3">
                    <i class="fas fa-caret-down text-warning fs-5"></i>
                    <span class="text-muted fs-3 fw-bold">$45,987</span>
                  </div>
                  <div class="progress bg-warning-subtle" style="height: 4px">
                    <div class="progress-bar w-70 text-bg-warning" role="progressbar" aria-valuenow="70"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title fs-4 fw-normal mb-3">Electric Usage</h4>
                  <h2 class="mb-3 fs-9 fw-light">10.578 <span class="fs-5 fw-bold">Kwh</span></h2>
                  <div class="d-flex align-items-center gap-2 mb-3">
                    <i class="fas fa-caret-up text-indigo fs-5"></i>
                    <span class="text-muted fs-3 fw-bold">567 Kwh</span>
                  </div>
                  <div class="progress bg-indigo-subtle" style="height: 4px">
                    <div class="progress-bar w-70 text-bg-secondary" role="progressbar" aria-valuenow="70"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title fs-4 fw-normal mb-3">Internet Bandwidth</h4>
                  <h2 class="mb-3 fs-9 fw-light">14.897 <span class="fs-5 fw-bold">Gb</span></h2>
                  <div class="d-flex align-items-center gap-2 mb-3">
                    <i class="fas fa-caret-down text-danger fs-5"></i>
                    <span class="text-muted fs-3 fw-bold">467 Gb</span>
                  </div>
                  <div class="progress bg-danger-subtle" style="height: 4px">
                    <div class="progress-bar w-70 text-bg-danger" role="progressbar" aria-valuenow="70"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title fs-4 fw-normal mb-3">Total Profit</h4>
                  <h2 class="mb-3 fs-9 fw-light">$995,204</h2>
                  <div class="d-flex align-items-center gap-2 mb-3">
                    <i class="fas fa-caret-up text-success fs-5"></i>
                    <span class="text-muted fs-3 fw-bold">$45,987</span>
                  </div>
                  <div class="progress bg-success-subtle" style="height: 4px">
                    <div class="progress-bar w-70 text-bg-success" role="progressbar" aria-valuenow="70"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
          </div>
          <!-- Row -->
          <!-- Row -->
          <div class="row">
            <!-- Column -->
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <div class="d-flex align-items-center flex-wrap">
                        <div>
                          <h4 class="card-title">Revenue Statistics</h3>
                            <h6 class="card-subtitle">January 2023</h6>
                        </div>
                        <div class="ms-auto">

                          <ul class="list-unstyled mb-0 hstack gap-3">
                            <li>
                              <h6 class="text-muted mb-0 hstack gap-2 fw-bold">
                                <span class="text-bg-success round-10 rounded-circle"></span>Product A
                              </h6>
                            </li>
                            <li>
                              <h6 class="text-muted mb-0 hstack gap-2 fw-bold">
                                <span class="text-bg-info round-10 rounded-circle"></span>Product B
                              </h6>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div id="revenue-statistics" style="height: 300px"></div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mt-3 text-center">
                      <h2 class="fw-bold">$54,578</h2>
                      <p class="text-muted mb-0 fs-3">Total Revenue</p>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mt-3 text-center">
                      <h2 class="fw-bold">$43,451</h2>
                      <p class="text-muted mb-0 fs-3">Online Revenue</p>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mt-3 text-center">
                      <h2 class="fw-bold">$44,578</h2>
                      <p class="text-muted mb-0 fs-3">Product A</p>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mt-3 text-center">
                      <h2 class="fw-bold">$12,578</h2>
                      <p class="text-muted mb-0 fs-3">Product B</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Row -->
          <!-- Row -->
          <div class="row">
            <div class="col-lg-4">
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title">Customer Support</h4>
                  <h6 class="card-subtitle fw-normal">24 new support ticket request generate</h6>
                  <div id="sales-of-the-month" class="mt-4 mx-auto"></div>
                  <ul class="list-unstyled mb-0 hstack justify-content-center gap-3 pt-4">
                    <li>
                      <h6 class="text-muted mb-0 hstack gap-2 fw-bold">
                        <span class="text-bg-info round-10 rounded-circle"></span>Item A
                      </h6>
                    </li>
                    <li>
                      <h6 class="text-muted mb-0 hstack gap-2 fw-bold">
                        <span class="text-bg-danger round-10 rounded-circle"></span>Item B
                      </h6>
                    </li>
                    <li>
                      <h6 class="text-muted mb-0 hstack gap-2 fw-bold">
                        <span class="text-bg-warning round-10 rounded-circle"></span>Item C
                      </h6>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-6 col-lg-6 col-xl-7">
                          <h4 class="card-title mb-7">Sales Prediction</h4>
                          <div>
                            <h2 class="fs-9 fw-light">$3,528</h2>
                            <h6 class="text-muted fw-normal mb-0">(150-165 Sales)</h6>
                          </div>
                        </div>
                        <div class="col-6 col-lg-6 col-xl-5">
                          <div id="sales-prediction"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-6 col-lg-6 col-xl-7">
                          <h4 class="card-title mb-7">Sales Difference</h4>
                          <div>
                            <h2 class="fs-9 fw-light">$4316</h2>
                            <h6 class="text-muted fw-normal">(150-165 Sales)</h6>
                          </div>
                        </div>
                        <div class="col-6 col-lg-6 col-xl-5">
                          <div id="sales-difference"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card w-100">
                <div class="card-body">
                  <div class="d-flex flex-row">
                    <div class="">
                      <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/profile/user-6.jpg" alt="user" class="rounded-circle"
                        width="96" />
                    </div>
                    <div class="ps-9">
                      <h3 class="fs-6">Michael Jordan</h3>
                      <h6 class="text-muted fw-normal">UIUX Designer</h6>
                      <button class="btn bg-success-subtle text-success">
                        Follow
                      </button>
                    </div>
                  </div>
                  <div class="row mt-4 pt-3 pb-0">
                    <div class="col text-center border-end">
                      <h2 class="">14</h2>
                      <h6 class="text-muted fw-bold mb-0">Photos</h6>
                    </div>
                    <div class="col text-center border-end">
                      <h2 class="">54</h2>
                      <h6 class="text-muted fw-bold mb-0">Videos</h6>
                    </div>
                    <div class="col text-center">
                      <h2 class="">145</h2>
                      <h6 class="text-muted fw-bold mb-0">Tasks</h6>
                    </div>
                  </div>
                </div>
                <div class="card-body border-top">
                  <p class="text-center text-muted mb-9 fs-3" data-simplebar style="height: 62px">
                    Lorem Ipsum is simply dummy text of the printing and type setting industry.
                    Lorem Ipsum has beenorem Ipsum is simply dummy text of the printing
                    and type setting industry.
                  </p>
                  <ul class="list-unstyled hstack justify-content-center gap-9 mb-0">
                    <li>
                      <a class="text-muted" href="javascript:void(0)"><i class="ti ti-brand-facebook fs-6"></i></a>
                    </li>
                    <li>
                      <a class="text-muted" href="javascript:void(0)"><i class="ti ti-brand-twitter fs-6"></i></a>
                    </li>
                    <li>
                      <a class="text-muted" href="javascript:void(0)"><i class="ti ti-brand-linkedin fs-6"></i></a>
                    </li>
                    <li>
                      <a class="text-muted" href="javascript:void(0)"><i class="ti ti-brand-youtube fs-6"></i></a>
                    </li>
                    <li>
                      <a class="text-muted" href="javascript:void(0)"><i class="ti ti-world fs-6"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- Row -->
          <!-- Row -->
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body border-bottom">
                  <h4 class="card-title">Customer Support</h4>
                  <h6 class="card-subtitle fw-normal mb-0">24 new support ticket request generate</h6>
                </div>
                <div class="card-body">
                  <div class="chat-box w-100" data-simplebar="" style="height: 392px">
                    <!--chat Row -->
                    <ul class="chat-list m-0 p-0">
                      <!--chat Row -->
                      <li class="pb-9 border-bottom">
                        <div class="chat-img d-inline-block align-top">
                          <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/profile/user-5.jpg" alt="user" class="rounded-circle" />
                        </div>
                        <div class="chat-content ps-6 d-inline-block">
                          <h6 class="text-muted text-nowrap fw-bold">James Anderson</h6>
                          <div class="box d-inline-block message fs-3 bg-secondary-subtle">
                            <h6 class="mb-2 fw-bold">It’s Great opportunity to work. I would loveto join the team. 🎉
                            </h6>
                            <h6 class="chat-time text-end mb-0 fw-bold d-block w-100">
                              10:56 am
                            </h6>
                          </div>
                        </div>
                      </li>
                      <!--chat Row -->
                      <li class="py-9 border-bottom">
                        <div class="chat-img d-inline-block align-top">
                          <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/profile/user-7.jpg" alt="user" class="rounded-circle" />
                        </div>
                        <div class="chat-content ps-6 d-inline-block">
                          <h6 class="text-muted text-nowrap fw-bold">Hritik Roshan</h6>
                          <div class="box d-inline-block message fs-3 bg-warning-subtle">
                            <h6 class="mb-2 fw-bold">Sed sed eros quis libero 😆Well we have good budget for the project
                            </h6>
                            <h6 class="chat-time text-end mb-0 fw-bold d-block w-100">
                              10:56 am
                            </h6>
                          </div>
                        </div>
                      </li>
                      <!--chat Row -->
                      <li class="py-9 border-bottom text-end">
                        <div class="chat-content ps-6 d-inline-block">
                          <div class="box d-inline-block message fs-3 bg-info-subtle">
                            <h6 class="mb-2 fw-bold">Whats budget of the new project. Looking forward to hear back</h6>
                            <h6 class="chat-time text-end mb-0 fw-bold d-block w-100">
                              10:58 am
                            </h6>
                          </div>
                        </div>
                      </li>
                      <!--chat Row -->
                      <li class="pt-9">
                        <div class="chat-img d-inline-block align-top">
                          <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/profile/user-2.jpg" alt="user" class="rounded-circle" />
                        </div>
                        <div class="chat-content ps-6 d-inline-block">
                          <h6 class="text-muted text-nowrap fw-bold">Sonu Nigam</h6>
                          <div class="box d-inline-block message fs-3 bg-success-subtle">
                            <h6 class="mb-2 fw-bold">Sed sed eros quis libero Well we have good budget for the project
                            </h6>
                            <h6 class="chat-time text-end m-0 fw-bold d-block w-100">
                              11:00 am
                            </h6>
                          </div>
                        </div>
                      </li>
                      <!--chat Row -->
                    </ul>
                  </div>
                </div>
                <div class="card-body border-top">
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-6 w-85">
                      <a class="position-relative" href="javascript:void(0)"> <i class="ti ti-paperclip fs-6"></i></a>
                      <input type="text" class="bg-transparent form-control fw-bold text-muted border-0 p-0 shadow-none"
                        placeholder="Write a message">
                    </div>
                    <ul class="list-unstyled mb-0 d-flex align-items-center gap-6">
                      <li><a class="fs-6" href="javascript:void(0)"><i class="ti ti-mood-smile"></i></a></li>
                      <li><a class="fs-6" href="javascript:void(0)"><i class="ti ti-microphone"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-0">Recent Messages</h4>
                </div>
                <div class="message-box" data-simplebar="" style="height: 545px">
                  <div class="message-widget message-scroll">
                    <a href="javascript:void(0)" class="d-flex align-items-center border-bottom gap-3 p-3">
                      <span class="round-48 user-img position-relative d-block flex-shrink-0">
                        <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/profile/user-2.jpg" alt="user" class="rounded-circle w-100" />
                        <span class="profile-status bg-success position-absolute rounded-circle"></span>
                      </span>
                      <div class="w-100 d-inline-block v-middle">
                        <div class="d-flex align-items-center justify-content-between">
                          <h6 class="mb-0 lh-base">Mathew Anderson</h6>
                          <span class="fs-2 text-nowrap d-block fw-bold text-muted">9:30 AM</span>
                        </div>
                        <span class="fs-2 d-block text-truncate fw-bold text-muted">Just see the my new admin!</span>
                      </div>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center border-bottom gap-3 p-3">
                      <span class="round-48 user-img position-relative d-block flex-shrink-0">
                        <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/profile/user-3.jpg" alt="user" class="rounded-circle w-100" />
                        <span class="profile-status bg-success position-absolute rounded-circle"></span>
                      </span>
                      <div class="w-100 d-inline-block v-middle">
                        <div class="d-flex align-items-center justify-content-between">
                          <h6 class="mb-0 lh-base">Bianca Anderson</h6>
                          <span class="fs-2 text-nowrap d-block fw-bold text-muted">9:10 AM</span>
                        </div>
                        <span class="fs-2 d-block text-truncate fw-bold text-muted">Just a reminder that you have
                          event</span>
                      </div>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center border-bottom gap-3 p-3">
                      <span class="round-48 user-img position-relative d-block flex-shrink-0">
                        <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/profile/user-4.jpg" alt="user" class="rounded-circle w-100" />
                        <span class="profile-status bg-success position-absolute rounded-circle"></span>
                      </span>
                      <div class="w-100 d-inline-block v-middle">
                        <div class="d-flex align-items-center justify-content-between">
                          <h6 class="mb-0 lh-base">Andrew Johnson</h6>
                          <span class="fs-2 text-nowrap d-block fw-bold text-muted">9:08 AM</span>
                        </div>
                        <span class="fs-2 d-block text-truncate fw-bold text-muted">You can customize this template as
                          you want</span>
                      </div>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center border-bottom gap-3 p-3">
                      <span class="round-48 user-img position-relative d-block flex-shrink-0">
                        <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/profile/user-5.jpg" alt="user" class="rounded-circle w-100" />
                        <span class="profile-status bg-success position-absolute rounded-circle"></span>
                      </span>
                      <div class="w-100 d-inline-block v-middle">
                        <div class="d-flex align-items-center justify-content-between">
                          <h6 class="mb-0 lh-base">Mark Strokes</h6>
                          <span class="fs-2 text-nowrap d-block fw-bold text-muted">9:30 AM</span>
                        </div>
                        <span class="fs-2 d-block text-truncate fw-bold text-muted">Just see the my new admin!</span>
                      </div>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center border-bottom gap-3 p-3">
                      <span class="round-48 user-img position-relative d-block flex-shrink-0">
                        <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/profile/user-6.jpg" alt="user" class="rounded-circle w-100" />
                        <span class="profile-status bg-success position-absolute rounded-circle"></span>
                      </span>
                      <div class="w-100 d-inline-block v-middle">
                        <div class="d-flex align-items-center justify-content-between">
                          <h6 class="mb-0 lh-base">Mark, Stoinus & Rishvi..</h6>
                          <span class="fs-2 text-nowrap d-block fw-bold text-muted">9:10 AM</span>
                        </div>
                        <span class="fs-2 d-block text-truncate fw-bold text-muted">Just a reminder that you have
                          event</span>
                      </div>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center border-bottom gap-3 p-3">
                      <span class="round-48 user-img position-relative d-block flex-shrink-0">
                        <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/profile/user-7.jpg" alt="user" class="rounded-circle w-100" />
                        <span class="profile-status bg-success position-absolute rounded-circle"></span>
                      </span>
                      <div class="w-100 d-inline-block v-middle">
                        <div class="d-flex align-items-center justify-content-between">
                          <h6 class="mb-0 lh-base">Daniel Kristeen</h6>
                          <span class="fs-2 text-nowrap d-block fw-bold text-muted">9:30 AM</span>
                        </div>
                        <span class="fs-2 d-block text-truncate fw-bold text-muted">Just see the my new admin!</span>
                      </div>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center border-bottom gap-3 p-3">
                      <span class="round-48 user-img position-relative d-block flex-shrink-0">
                        <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/profile/user-8.jpg" alt="user" class="rounded-circle w-100" />
                        <span class="profile-status bg-success position-absolute rounded-circle"></span>
                      </span>
                      <div class="w-100 d-inline-block v-middle">
                        <div class="d-flex align-items-center justify-content-between">
                          <h6 class="mb-0 lh-base">Emma Smith</h6>
                          <span class="fs-2 text-nowrap d-block fw-bold text-muted">9:10 AM</span>
                        </div>
                        <span class="fs-2 d-block text-truncate fw-bold text-muted">Just a reminder that you have
                          event</span>
                      </div>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center border-bottom gap-3 p-3">
                      <span class="round-48 user-img position-relative d-block flex-shrink-0">
                        <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/profile/user-9.jpg" alt="user" class="rounded-circle w-100" />
                        <span class="profile-status bg-success position-absolute rounded-circle"></span>
                      </span>
                      <div class="w-100 d-inline-block v-middle">
                        <div class="d-flex align-items-center justify-content-between">
                          <h6 class="mb-0 lh-base">Olivia Johnson</h6>
                          <span class="fs-2 text-nowrap d-block fw-bold text-muted">9:08 AM</span>
                        </div>
                        <span class="fs-2 d-block text-truncate fw-bold text-muted">You can customize this template as
                          you want</span>
                      </div>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center border-bottom gap-3 p-3">
                      <span class="round-48 user-img position-relative d-block flex-shrink-0">
                        <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/profile/user-10.jpg" alt="user" class="rounded-circle w-100" />
                        <span class="profile-status bg-success position-absolute rounded-circle"></span>
                      </span>
                      <div class="w-100 d-inline-block v-middle">
                        <div class="d-flex align-items-center justify-content-between">
                          <h6 class="mb-0 lh-base">Isabella Williams</h6>
                          <span class="fs-2 text-nowrap d-block fw-bold text-muted">9:30 AM</span>
                        </div>
                        <span class="fs-2 d-block text-truncate fw-bold text-muted">Just see the my new admin!</span>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Row -->
          <!-- Row -->
          <div class="row">
            <div class="col-lg-8">
              <div class="card w-100 overflow-hidden">
                <div class="card-body pb-8">
                  <div class="d-md-flex no-block align-items-center">
                    <h4 class="card-title mb-0">Projects of the Month</h4>
                    <div class="ms-auto">
                      <select class="form-select">
                        <option selected>November</option>
                        <option value="1">February</option>
                        <option value="2">March</option>
                        <option value="3">April</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table stylish-table align-middle text-nowrap">
                    <thead>
                      <tr>
                        <th class="border-bottom fs-3 ps-4">
                          Assigned
                        </th>
                        <th class="border-bottom fs-3">
                          Name
                        </th>
                        <th class="border-bottom fs-3">
                          Posts
                        </th>
                        <th class="border-bottom fs-3 pe-4">
                          Budget
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <div class="hstack gap-3">
                            <span
                              class="round-48 rounded-circle overflow-hidden bg-danger-subtle flex-shrink-0 hstack justify-content-center">
                              <h6 class="mb-0 fw-bold text-danger fs-4">S</h6>
                            </span>
                            <div>
                              <h6 class="mb-0 fw-bold fs-4">Sunil Joshi</h6>
                              <p class="mb-0 fs-3 text-body">Web Designer</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="mb-0 fs-3 text-body">Elite Admin</p>
                        </td>
                        <td><span class="badge bg-danger-subtle text-danger rounded-pill">Low</span></td>
                        <td>
                          <p class="mb-0 fs-3 text-body">$2.4K</p>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="hstack gap-3">
                            <span
                              class="round-48 rounded-circle overflow-hidden bg-warning-subtle flex-shrink-0 hstack justify-content-center">
                              <h6 class="mb-0 fw-bold text-warning fs-4">A</h6>
                            </span>
                            <div>
                              <h6 class="mb-0 fw-bold fs-4">Andrew</h6>
                              <p class="mb-0 fs-3 text-body">Project Manager</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="mb-0 fs-3 text-body">Real Homes</p>
                        </td>
                        <td><span class="badge bg-warning-subtle text-warning rounded-pill">Medium</span></td>
                        <td>
                          <p class="mb-0 fs-3 text-body">$23.5K</p>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="hstack gap-3">
                            <span
                              class="round-48 rounded-circle overflow-hidden bg-info-subtle flex-shrink-0 hstack justify-content-center">
                              <h6 class="mb-0 fw-bold text-info fs-4">N</h6>
                            </span>
                            <div>
                              <h6 class="mb-0 fw-bold fs-4">Nirav Joshi</h6>
                              <p class="mb-0 fs-3 text-body">Frontend Eng</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="mb-0 fs-3 text-body">MedicalPro Theme</p>
                        </td>
                        <td><span class="badge bg-success-subtle text-success rounded-pill">High</span></td>
                        <td>
                          <p class="mb-0 fs-3 text-body">$10.3K</p>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="hstack gap-3">
                            <span
                              class="round-48 rounded-circle overflow-hidden bg-danger-subtle flex-shrink-0 hstack justify-content-center">
                              <img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/profile/user-7.jpg" alt="" class="img-fluid">
                            </span>
                            <div>
                              <h6 class="mb-0 fw-bold fs-4">Johnathan</h6>
                              <p class="mb-0 fs-3 text-body">Content Writter</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="mb-0 fs-3 text-body">Helping Hands</p>
                        </td>
                        <td><span class="badge bg-danger-subtle text-danger rounded-pill">Low</span></td>
                        <td>
                          <p class="mb-0 fs-3 text-body">$2.6K</p>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="hstack gap-3">
                            <span
                              class="round-48 rounded-circle overflow-hidden bg-secondary-subtle flex-shrink-0 hstack justify-content-center">
                              <h6 class="mb-0 fw-bold text-secondary fs-4">M</h6>
                            </span>
                            <div>
                              <h6 class="mb-0 fw-bold fs-4">Michael Doe</h6>
                              <p class="mb-0 fs-3 text-body">Graphic Designer</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="mb-0 fs-3 text-body">Digital Agency</p>
                        </td>
                        <td><span class="badge bg-secondary-subtle text-secondary rounded-pill">Very High</span></td>
                        <td>
                          <p class="mb-0 fs-3 text-body">$12.4K</p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card widget-weather-report w-100">
                <div class="card-body">
                  <div class="d-md-flex align-items-center no-block mb-4">
                    <h4 class="card-title mb-0 text-white">Weather Report</h4>
                    <div class="ms-auto">
                      <div class="dropdown">
                        <button
                          class="btn border-white border-opacity-10 text-white shadow-none dropdown-toggle fs-3 py-2 px-3"
                          type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Today
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end fs-3">
                          <li><a class="dropdown-item" href="#">Today</a></li>
                          <li><a class="dropdown-item" href="#">Weekly</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div
                    class="hstack justify-content-between align-items-end pb-4 border-white border-bottom border-opacity-10">
                    <div>
                      <i class="ti ti-cloud-rain fs-10 mb-2 text-white d-block"></i>
                      <h2 class="mb-0 text-white fs-10 fw-light">18° C</h2>
                    </div>
                    <h4 class="mb-0 fs-6 text-white fw-normal text-end">Dramatic</br> Cloudy</h4>
                  </div>
                  <div class="my-3">
                    <h5 class="mb-3 text-white fw-bold">Chance of rain</h5>
                    <div class="hstack gap-6 mb-3">
                      <h6 class="mb-0 text-white flex-shrink-0 fw-normal">7 PM</h6>
                      <div class="progress bg-white bg-opacity-05 w-100 rounded-3" style="height: 16px;">
                        <div class="progress-bar bg-info rounded-3" role="progressbar" style="width: 44%"
                          aria-valuenow="44" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <h6 class="mb-0 text-white flex-shrink-0 fw-normal">44%</h6>
                    </div>
                    <div class="hstack gap-6 mb-3">
                      <h6 class="mb-0 text-white flex-shrink-0 fw-normal">8 PM</h6>
                      <div class="progress bg-white bg-opacity-05 w-100 rounded-3" style="height: 16px;">
                        <div class="progress-bar bg-info rounded-3" role="progressbar" style="width: 30%"
                          aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <h6 class="mb-0 text-white flex-shrink-0 fw-normal">30%</h6>
                    </div>
                    <div class="hstack gap-6">
                      <h6 class="mb-0 text-white flex-shrink-0 fw-normal">9 PM</h6>
                      <div class="progress bg-white bg-opacity-05 w-100 rounded-3" style="height: 16px;">
                        <div class="progress-bar bg-info rounded-3" role="progressbar" style="width: 67%"
                          aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <h6 class="mb-0 text-white flex-shrink-0 fw-normal">67%</h6>
                    </div>
                  </div>
                  <div class="sunrise-bg rounded-1 p-3 hstack justify-content-between gap-9 mt-4">
                    <i class="ti ti-sun-high text-white fs-10"></i>
                    <div>
                      <h5 class="text-white mb-8 fw-normal">Sunrise</h5>
                      <h2 class="mb-0 text-white fw-bold">4:20 AM</h2>
                    </div>
                    <h6 class="mb-0 text-white fw-normal">4 hours ago</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Row -->
          <!-- Row -->
          <div class="row">
            <!-- Column -->
            <div class="col-lg-4">
              <div class="card">
                <a href="#"><img class="card-img-top img-responsive" src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/blog/blog-img1.jpg"
                    alt="Card" /></a>
                <div class="card-body">
                  <div class="hstack mb-6">
                    <span class="fs-3 fw-normal">20 May 2023</span>
                    <div class="ms-auto">
                      <a href="javascript:void(0)" class="link hstack gap-1 lh-1 fw-light fs-3 fw-normal text-muted"><i
                          class="ti ti-message-circle-2 fs-5"></i>3 Comments</a>
                    </div>
                  </div>
                  <h4 class="mb-0">
                    Featured Hydroflora Pots Garden & Outdoors
                  </h4>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-4">
              <div class="card">
                <a href="#"><img class="card-img-top img-responsive" src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/blog/blog-img2.jpg"
                    alt="Card" /></a>
                <div class="card-body">
                  <div class="hstack mb-6">
                    <span class="fs-3 fw-normal">20 May 2023</span>
                    <div class="ms-auto">
                      <a href="javascript:void(0)" class="link hstack gap-1 lh-1 fw-light fs-3 fw-normal text-muted"><i
                          class="ti ti-message-circle-2 fs-5"></i>3 Comments</a>
                    </div>
                  </div>
                  <h4 class="mb-0">
                    Featured Hydroflora Pots Garden & Outdoors
                  </h4>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-4">
              <div class="card">
                <a href="#"><img class="card-img-top img-responsive" src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/blog/blog-img3.jpg"
                    alt="Card" /></a>
                <div class="card-body">
                  <div class="hstack mb-6">
                    <span class="fs-3 fw-normal">20 May 2023</span>
                    <div class="ms-auto">
                      <a href="javascript:void(0)" class="link hstack gap-1 lh-1 fw-light fs-3 fw-normal text-muted"><i
                          class="ti ti-message-circle-2 fs-5"></i>3 Comments</a>
                    </div>
                  </div>
                  <h4 class="mb-0">
                    Featured Hydroflora Pots Garden & Outdoors
                  </h4>
                </div>
              </div>
            </div>
            <!-- Column -->
          </div>
          <!-- Row -->
          <!-- Row -->
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-7">Recent Comments</h4>
                  <!-- ============================================================== -->
                  <!-- Comment widgets -->
                  <!-- ============================================================== -->
                  <div class="comment-widgets position-relative mb-2" data-simplebar="" style="height: 450px">
                    <!-- Comment Row -->
                    <div class="d-flex gap-9 comment-row mb-5">
                      <span class="flex-shrink-0"><img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/profile/user-2.jpg" alt="user"
                          width="56" height="56" class="rounded-circle" /></span>
                      <div class="comment-text">
                        <div class="hstack justify-content-between gap-6 mb-6">
                          <div class="hstack gap-6">
                            <h5 class="mb-0">Michael Jorden</h5>
                            <p class="mb-0 fs-3 text-muted">April 14, 2023</p>
                          </div>
                          <span class="badge bg-success-subtle text-success rounded-pill">Approved</span>
                        </div>
                        <p class="comment-details mb-6">
                          Lorem Ipsum is simply dummy text of the printing and type setting industry.
                          Lorem Ipsum has beenorem Ipsum is simply dummy text of the printing
                          and type setting industry.
                        </p>
                        <ul class="list-unstyled mb-0 hstack gap-3 lh-1">
                          <li><a class="fs-6 text-muted" href="javascript:void(0)"><i class="ti ti-edit"></i></a></li>
                          <li><a class="fs-6 text-muted" href="javascript:void(0)"><i
                                class="ti ti-square-check"></i></a></li>
                          <li><a class="fs-6 text-muted" href="javascript:void(0)"><i class="ti ti-heart"></i></a></li>
                        </ul>
                      </div>
                    </div>
                    <!-- Comment Row -->
                    <div class="d-flex gap-9 comment-row mb-5">
                      <span class="flex-shrink-0"><img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/profile/user-3.jpg" alt="user"
                          width="56" height="56" class="rounded-circle" /></span>
                      <div class="comment-text">
                        <div class="hstack justify-content-between gap-6 mb-6">
                          <div class="hstack gap-6">
                            <h5 class="mb-0">Johnathan Doeting</h5>
                            <p class="mb-0 fs-3 text-muted">April 14, 2023</p>
                          </div>
                          <span class="badge bg-danger-subtle text-danger rounded-pill">Rejected</span>
                        </div>
                        <p class="comment-details mb-6">
                          Lorem Ipsum is simply dummy text of the printing and type setting industry.
                          Lorem Ipsum has beenorem Ipsum is simply dummy text of the printing
                          and type setting industry.
                        </p>
                        <ul class="list-unstyled mb-0 hstack gap-3 lh-1">
                          <li><a class="fs-6 text-muted" href="javascript:void(0)"><i class="ti ti-edit"></i></a></li>
                          <li><a class="fs-6 text-muted" href="javascript:void(0)"><i
                                class="ti ti-square-check"></i></a></li>
                          <li><a class="fs-6 text-muted" href="javascript:void(0)"><i class="ti ti-heart"></i></a></li>
                        </ul>
                      </div>
                    </div>
                    <!-- Comment Row -->
                    <div class="d-flex gap-9 comment-row mb-5">
                      <span class="flex-shrink-0"><img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/profile/user-4.jpg" alt="user"
                          width="56" height="56" class="rounded-circle" /></span>
                      <div class="comment-text">
                        <div class="hstack justify-content-between gap-6 mb-6">
                          <div class="hstack gap-6">
                            <h5 class="mb-0">James Anderson</h5>
                            <p class="mb-0 fs-3 text-muted">April 14, 2023</p>
                          </div>
                          <span class="badge bg-info-subtle text-info rounded-pill">Pending</span>
                        </div>
                        <p class="comment-details mb-6">
                          Lorem Ipsum is simply dummy text of the printing and type setting industry.
                          Lorem Ipsum has beenorem Ipsum is simply dummy text of the printing
                          and type setting industry.
                        </p>
                        <ul class="list-unstyled mb-0 hstack gap-3 lh-1">
                          <li><a class="fs-6 text-muted" href="javascript:void(0)"><i class="ti ti-edit"></i></a></li>
                          <li><a class="fs-6 text-muted" href="javascript:void(0)"><i
                                class="ti ti-square-check"></i></a></li>
                          <li><a class="fs-6 text-muted" href="javascript:void(0)"><i class="ti ti-heart"></i></a></li>
                        </ul>
                      </div>
                    </div>
                    <!-- Comment Row -->
                    <div class="d-flex gap-9 comment-row mb-5">
                      <span class="flex-shrink-0"><img src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/profile/user-5.jpg" alt="user"
                          width="56" height="56" class="rounded-circle" /></span>
                      <div class="comment-text">
                        <div class="hstack justify-content-between gap-6 mb-6">
                          <div class="hstack gap-6">
                            <h5 class="mb-0">Daniel Kristeen</h5>
                            <p class="mb-0 fs-3 text-muted">April 14, 2023</p>
                          </div>
                          <span class="badge bg-success-subtle text-success rounded-pill">Approved</span>
                        </div>
                        <p class="comment-details mb-6">
                          Lorem Ipsum is simply dummy text of the printing and type setting industry.
                          Lorem Ipsum has beenorem Ipsum is simply dummy text of the printing
                          and type setting industry.
                        </p>
                        <ul class="list-unstyled mb-0 hstack gap-3 lh-1">
                          <li><a class="fs-6 text-muted" href="javascript:void(0)"><i class="ti ti-edit"></i></a></li>
                          <li><a class="fs-6 text-muted" href="javascript:void(0)"><i
                                class="ti ti-square-check"></i></a></li>
                          <li><a class="fs-6 text-muted" href="javascript:void(0)"><i class="ti ti-heart"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center mb-7">
                    <h4 class="card-title mb-0">To Do list</h4>
                    <div class="ms-auto">
                      <button class="btn btn-rounded btn-success hstack gap-1" data-bs-toggle="modal"
                        data-bs-target="#myModal">
                        <i class="ti ti-plus fs-6"></i>
                        Add Task
                      </button>
                    </div>
                  </div>
                  <!-- .modal for add task -->
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header d-flex align-items-center">
                          <h4 class="modal-title">Add Task</h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form>
                            <div class="mb-3">
                              <label>Name</label>
                              <input type="text" class="form-control" placeholder="Enter Your Name" />
                            </div>
                            <div class="mb-3">
                              <label>Email address</label>
                              <input type="email" class="form-control" placeholder="Enter email" />
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                          </button>
                          <button type="button" class="btn btn-success" data-bs-dismiss="modal">
                            Submit
                          </button>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                  <!-- ============================================================== -->
                  <!-- To do list widgets -->
                  <!-- ============================================================== -->
                  <div class="to-do-widget mt-3" data-simplebar="" style="height: 450px">
                    <ul class="list-task todo-list mb-0" data-role="tasklist">
                      <li class="border-0 p-0 mb-4" data-role="task">
                        <div class="form-check border-start border-3 border-info ps-9">
                          <input type="checkbox" class="form-check-input ms-0" id="inputSchedule"
                            name="inputCheckboxesSchedule" />
                          <label for="inputSchedule" class="form-check-label ps-3 gap-3 hstack">
                            <h5 class="mb-0 fw-bold">Schedule meeting with</h5>
                          </label>
                        </div>
                        <ul class="assignedto list-inline m-0 ps-5 ms-2 mt-1">
                          <li class="list-inline-item">
                            <img class="rounded-circle" src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/profile/user-3.jpg" alt="user"
                              data-bs-toggle="tooltip" data-bs-placement="top" title="" data-original-title="Steave" />
                          </li>
                          <li class="list-inline-item">
                            <img class="rounded-circle" src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/profile/user-4.jpg" alt="user"
                              data-bs-toggle="tooltip" data-bs-placement="top" title="" data-original-title="Jessica" />
                          </li>
                          <li class="list-inline-item">
                            <img class="rounded-circle" src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/profile/user-6.jpg" alt="user"
                              data-bs-toggle="tooltip" data-bs-placement="top" title=""
                              data-original-title="Priyanka" />
                          </li>
                          <li class="list-inline-item">
                            <img class="rounded-circle" src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/profile/user-2.jpg" alt="user"
                              data-bs-toggle="tooltip" data-bs-placement="top" title="" data-original-title="Selina" />
                          </li>
                        </ul>
                      </li>
                      <li class="border-0 p-0 mb-4" data-role="task">
                        <div class="form-check border-start border-3 border-danger ps-9 d-flex">
                          <input type="checkbox" class="form-check-input ms-0" id="inputCall"
                            name="inputCheckboxesCall" />
                          <label for="inputCall" class="form-check-label ps-3 gap-3 hstack">
                            <h5 class="mb-0 fw-bold opacity-50 text-decoration-line-through">Give Purchase report to
                            </h5>
                            <span class="badge bg-danger-subtle text-danger rounded-pill">Today</span>
                          </label>
                        </div>
                        <ul class="assignedto list-inline m-0 ps-5 ms-2 mt-1 opacity-50">
                          <li class="list-inline-item">
                            <img class="rounded-circle" src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/profile/user-8.jpg" alt="user"
                              data-bs-toggle="tooltip" data-bs-placement="top" title=""
                              data-original-title="Priyanka" />
                          </li>
                          <li class="list-inline-item">
                            <img class="rounded-circle" src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/profile/user-7.jpg" alt="user"
                              data-bs-toggle="tooltip" data-bs-placement="top" title="" data-original-title="Selina" />
                          </li>
                        </ul>
                      </li>
                      <li class="border-0 p-0 mb-4" data-role="task">
                        <div class="form-check border-start border-3 border-secondary ps-9">
                          <input type="checkbox" class="form-check-input ms-0" id="inputBook"
                            name="inputCheckboxesBook" />
                          <label for="inputBook" class="form-check-label ps-3 gap-3 hstack">
                            <h5 class="mb-0 fw-bold opacity-50 text-decoration-line-through">Book flight for holiday
                            </h5>
                          </label>
                        </div>
                        <div class="item-date fs-2 ps-5 ms-2 mt-1 opacity-50 text-muted d-inline-block">
                          26 jun 2023
                        </div>
                      </li>
                      <li class="border-0 p-0 mb-4" data-role="task">
                        <div class="form-check border-start border-3 border-warning ps-9">
                          <input type="checkbox" class="form-check-input ms-0" id="inputForward"
                            name="inputCheckboxesForward" />
                          <label for="inputForward" class="form-check-label ps-3 gap-3 hstack">
                            <h5 class="mb-0 fw-bold">Forward all tasks</h5>
                            <span class="badge bg-warning-subtle text-warning rounded-pill">2 weeks</span>
                          </label>
                        </div>
                        <div class="item-date fs-2 ps-5 ms-2 mt-1 text-muted d-inline-block">
                          26 jun 2023
                        </div>
                      </li>
                      <li class="border-0 p-0 mb-4" data-role="task">
                        <div class="form-check border-start border-3 border-secondary ps-9">
                          <input type="checkbox" class="form-check-input ms-0" id="inputRecieve"
                            name="inputCheckboxesRecieve" />
                          <label for="inputRecieve" class="form-check-label ps-3 gap-3 hstack">
                            <h5 class="mb-0 fw-bold">Recieve shipment</h5>
                          </label>
                        </div>
                        <div class="item-date fs-2 ps-5 ms-2 mt-1 text-muted d-inline-block">
                          26 jun 2023
                        </div>
                      </li>
                      <li class="border-0 p-0 mb-4" data-role="task">
                        <div class="form-check border-start border-3 border-success ps-9">
                          <input type="checkbox" class="form-check-input ms-0" id="inputForward2"
                            name="inputCheckboxesd" />
                          <label for="inputForward2" class="form-check-label ps-3 gap-3 hstack">
                            <h5 class="mb-0 fw-bold">Send payment today</h5>
                            <span class="badge bg-success-subtle text-success rounded-pill">3 weeks</span>
                          </label>
                        </div>
                        <ul class="assignedto list-inline m-0 ps-5 ms-2 mt-1">
                          <li class="list-inline-item">
                            <img class="rounded-circle" src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/profile/user-3.jpg" alt="user"
                              data-bs-toggle="tooltip" data-bs-placement="top" title=""
                              data-original-title="Assign to Steave" />
                          </li>
                          <li class="list-inline-item">
                            <img class="rounded-circle" src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/profile/user-6.jpg" alt="user"
                              data-bs-toggle="tooltip" data-bs-placement="top" title=""
                              data-original-title="Assign to Jessica" />
                          </li>
                          <li class="list-inline-item">
                            <img class="rounded-circle" src="<?php echo base_url() ?>monster-bt5-v8/dist/assets/images/profile/user-7.jpg" alt="user"
                              data-bs-toggle="tooltip" data-bs-placement="top" title=""
                              data-original-title="Assign to Selina" />
                          </li>
                        </ul>
                      </li>
                      <li class="border-0 p-0 mb-4" data-role="task">
                        <div class="form-check border-start border-3 border-primary ps-9">
                          <input type="checkbox" class="form-check-input ms-0" id="inputRecieve2"
                            name="inputCheckboxesRecieve" />
                          <label for="inputRecieve2" class="form-check-label ps-3 gap-3 hstack">
                            <h5 class="mb-0 fw-bold">Recieve shipment</h5>
                          </label>
                        </div>
                        <div class="item-date fs-2 ps-5 ms-2 mt-1 text-muted d-inline-block">
                          26 jun 2023
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Row -->
        </div>
      </div>
      <script>
  function handleColorTheme(e) {
    $("html").attr("data-color-theme", e);
    $(e).prop("checked", !0);
  }
</script>
<button class="btn btn-info p-3 rounded-circle d-flex align-items-center justify-content-center customizer-btn"
  type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
  <iconify-icon icon="solar:settings-linear" class="fs-7"></iconify-icon>
</button>

<div class="offcanvas customizer offcanvas-end" tabindex="-1" id="offcanvasExample"
  aria-labelledby="offcanvasExampleLabel">
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
      <label class="btn p-9 btn-outline-primary" for="dark-layout"><iconify-icon icon="solar:moon-linear"
          class="icon fs-7 me-2"></iconify-icon>Dark</label>
    </div>

    <h6 class="mt-5 fw-semibold fs-4 mb-2">Theme Direction</h6>
    <div class="d-flex flex-row gap-3 customizer-box" role="group">
      <input type="radio" class="btn-check" name="direction-l" id="ltr-layout" autocomplete="off" />
      <label class="btn p-9 btn-outline-primary" for="ltr-layout">
        <iconify-icon icon="solar:align-left-linear" class="icon fs-7 me-2"></iconify-icon>LTR</label>

      <input type="radio" class="btn-check" name="direction-l" id="rtl-layout" autocomplete="off" />
      <label class="btn p-9 btn-outline-primary" for="rtl-layout"><iconify-icon icon="solar:align-right-linear"
          class="icon fs-7 me-2"></iconify-icon>RTL</label>
    </div>

    <h6 class="mt-5 fw-semibold fs-4 mb-2">Theme Colors</h6>

    <div class="d-flex flex-row flex-wrap gap-3 customizer-box color-pallete" role="group">
      <input type="radio" class="btn-check" name="color-theme-layout" id="Blue_Theme" autocomplete="off" />
      <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
        onclick="handleColorTheme('Blue_Theme')" for="Blue_Theme" data-bs-toggle="tooltip" data-bs-placement="top"
        data-bs-title="BLUE_THEME">
        <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-1">
          <iconify-icon icon="tabler:check" class="text-white d-flex icon fs-5"></iconify-icon>
        </div>
      </label>

      <input type="radio" class="btn-check" name="color-theme-layout" id="Aqua_Theme" autocomplete="off" />
      <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
        onclick="handleColorTheme('Aqua_Theme')" for="Aqua_Theme" data-bs-toggle="tooltip" data-bs-placement="top"
        data-bs-title="AQUA_THEME">
        <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-2">
          <iconify-icon icon="tabler:check" class="text-white d-flex icon fs-5"></iconify-icon>
        </div>
      </label>

      <input type="radio" class="btn-check" name="color-theme-layout" id="Purple_Theme" autocomplete="off" />
      <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
        onclick="handleColorTheme('Purple_Theme')" for="Purple_Theme" data-bs-toggle="tooltip" data-bs-placement="top"
        data-bs-title="PURPLE_THEME">
        <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-3">
          <iconify-icon icon="tabler:check" class="text-white d-flex icon fs-5"></iconify-icon>
        </div>
      </label>

      <input type="radio" class="btn-check" name="color-theme-layout" id="green-theme-layout" autocomplete="off" />
      <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
        onclick="handleColorTheme('Green_Theme')" for="green-theme-layout" data-bs-toggle="tooltip"
        data-bs-placement="top" data-bs-title="GREEN_THEME">
        <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-4">
          <iconify-icon icon="tabler:check" class="text-white d-flex icon fs-5"></iconify-icon>
        </div>
      </label>

      <input type="radio" class="btn-check" name="color-theme-layout" id="cyan-theme-layout" autocomplete="off" />
      <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
        onclick="handleColorTheme('Cyan_Theme')" for="cyan-theme-layout" data-bs-toggle="tooltip"
        data-bs-placement="top" data-bs-title="CYAN_THEME">
        <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-5">
          <iconify-icon icon="tabler:check" class="text-white d-flex icon fs-5"></iconify-icon>
        </div>
      </label>

      <input type="radio" class="btn-check" name="color-theme-layout" id="orange-theme-layout" autocomplete="off" />
      <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
        onclick="handleColorTheme('Orange_Theme')" for="orange-theme-layout" data-bs-toggle="tooltip"
        data-bs-placement="top" data-bs-title="ORANGE_THEME">
        <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-6">
          <iconify-icon icon="tabler:check" class="text-white d-flex icon fs-5"></iconify-icon>
        </div>
      </label>
    </div>

    <h6 class="mt-5 fw-semibold fs-4 mb-2">Layout Type</h6>
    <div class="d-flex flex-row gap-3 customizer-box" role="group">
      <div>
        <input type="radio" class="btn-check" name="page-layout" id="vertical-layout" autocomplete="off" />
        <label class="btn p-9 btn-outline-primary" for="vertical-layout"><iconify-icon
            icon="solar:sidebar-minimalistic-linear" class="icon fs-7 me-2"></iconify-icon>Vertical</label>
      </div>
      <div>
        <input type="radio" class="btn-check" name="page-layout" id="horizontal-layout" autocomplete="off" />
        <label class="btn p-9 btn-outline-primary" for="horizontal-layout"><iconify-icon
            icon="solar:airbuds-case-minimalistic-linear" class="icon fs-7 me-2"></iconify-icon>Horizontal</label>
      </div>
    </div>

    <h6 class="mt-5 fw-semibold fs-4 mb-2">Container Option</h6>

    <div class="d-flex flex-row gap-3 customizer-box" role="group">
      <input type="radio" class="btn-check" name="layout" id="boxed-layout" autocomplete="off" />
      <label class="btn p-9 btn-outline-primary" for="boxed-layout"><iconify-icon
          icon="solar:align-horizonta-spacing-linear" class="icon fs-7 me-2"></iconify-icon>Boxed</label>

      <input type="radio" class="btn-check" name="layout" id="full-layout" autocomplete="off" />
      <label class="btn p-9 btn-outline-primary" for="full-layout"><iconify-icon
          icon="solar:align-vertical-spacing-linear" class="icon fs-7 me-2"></iconify-icon>Full</label>
    </div>

    <h6 class="fw-semibold fs-4 mb-2 mt-5">Sidebar Type</h6>
    <div class="d-flex flex-row gap-3 customizer-box" role="group">
      <a href="javascript:void(0)" class="fullsidebar">
        <input type="radio" class="btn-check" name="sidebar-type" id="full-sidebar" autocomplete="off" />
        <label class="btn p-9 btn-outline-primary" for="full-sidebar"><iconify-icon icon="solar:mirror-left-linear"
            class="icon fs-7 me-2"></iconify-icon>Full</label>
      </a>
      <div>
        <input type="radio" class="btn-check " name="sidebar-type" id="mini-sidebar" autocomplete="off" />
        <label class="btn p-9 btn-outline-primary" for="mini-sidebar"><iconify-icon icon="solar:mirror-right-linear"
            class="icon fs-7 me-2"></iconify-icon>Collapse</label>
      </div>
    </div>

    <h6 class="mt-5 fw-semibold fs-4 mb-2">Card With</h6>

    <div class="d-flex flex-row gap-3 customizer-box" role="group">
      <input type="radio" class="btn-check" name="card-layout" id="card-with-border" autocomplete="off" />
      <label class="btn p-9 btn-outline-primary" for="card-with-border"><iconify-icon
          icon="solar:quit-full-screen-square-linear" class="icon fs-7 me-2"></iconify-icon>Border</label>

      <input type="radio" class="btn-check" name="card-layout" id="card-without-border" autocomplete="off" />
      <label class="btn p-9 btn-outline-primary" for="card-without-border"><iconify-icon
          icon="solar:minimize-square-2-linear" class="icon fs-7 me-2"></iconify-icon>Shadow</label>
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