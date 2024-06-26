<?php $this->load->view('stud_header');
$student_data = $this->session->userdata('student_data');
?>
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
                            <a href="#" class="dropdown-toggle link u-dropdown" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><?= $student_data['NAMA_PELAJAR'] ?> <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu animated flipInY dropdown-menu-end">
                                <a class="dropdown-item d-flex align-items-center gap-2" href="#">
                                    <iconify-icon icon="solar:user-linear" class="fs-5 text-info"></iconify-icon>
                                    My Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item d-flex align-items-center gap-2" href="<?php echo base_url('CodeIgniterTraining/index.php/logincontroller/logout') ?>">
                                    <iconify-icon icon="solar:login-2-linear" class="fs-5 text-danger"></iconify-icon>
                                    Logout
                                </a>
                                <div class="dropdown-divider"></div>
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
                    <a class="sidebar-link" href="<?php echo (base_url('CodeIgniterTraining/index.php/studcrud/viewPeraturan')); ?>">
                        <iconify-icon icon="solar:screencast-2-linear" class="aside-icon"></iconify-icon>
                        <span class="hide-menu">Rules</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?php echo (base_url('CodeIgniterTraining/index.php/studapplication')); ?>">
                        <iconify-icon icon="solar:screencast-2-linear" class="aside-icon"></iconify-icon>
                        <span class="hide-menu">Application</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?php echo (base_url('CodeIgniterTraining/index.php/cetak/index/')); ?><?= $student_data['STUD_MATRIC'] ?>">
                        <iconify-icon icon="solar:screencast-2-linear" class="aside-icon"></iconify-icon>
                        <span class="hide-menu">Print</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?php echo (base_url('CodeIgniterTraining/index.php/cetak/stud_status/')); ?><?= $student_data['STUD_MATRIC'] ?>">
                        <iconify-icon icon="solar:screencast-2-linear" class="aside-icon"></iconify-icon>
                        <span class="hide-menu">Application Status</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?php echo (base_url('CodeIgniterTraining/index.php/cetak/pengesahan/')); ?><?= $student_data['STUD_MATRIC'] ?>">
                        <iconify-icon icon="solar:screencast-2-linear" class="aside-icon"></iconify-icon>
                        <span class="hide-menu">Validation</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="sidebar-footer hide-menu">
            <a href="<?php echo base_url('CodeIgniterTraining/index.php/logincontroller/logout') ?>" class="link" data-bs-toggle="tooltip" data-bs-placement="top" title="Logout"><iconify-icon icon="solar:power-bold"></iconify-icon></a>
        </div>

        <!-- ---------------------------------- -->
        <!-- Start Vertical Layout Sidebar -->
        <!-- ---------------------------------- -->
    </div>
</aside>