<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0  shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3 d-flex flex-nowrap">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-3 me-lg-5">

            <h6 class="font-weight-bolder mb-0 text-capitalize"><?php echo e(str_replace('-', ' ', Request::path())); ?></h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex justify-content-end" id="navbar"> 
            <div class="ms-md-3 pe-md-3 d-flex align-items-center w-100">
            <div class="input-group">
                <!-- <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span> -->
                <input type="text" class="form-control form-input ps-4" placeholder="Type here..." style="height: 36px;">
            </div>
            </div>
            <ul class="navbar-nav  justify-content-end">
            <!-- <li class="nav-item d-flex align-items-center">
                <a href="<?php echo e(url('/')); ?>/logout" class="nav-link text-body font-weight-bold px-0">
                    <i class="fa fa-user me-sm-1"></i>
                    <span class="d-sm-inline d-none">Sign Out</span>
                </a>
            </li> -->
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                </div>
                </a>
            </li>
            
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar --><?php /**PATH /Users/chiraggupta/Sites/localhost/chirag/srchout/infospeed_admin/resources/views/Admin/layouts/navbars/auth/nav.blade.php ENDPATH**/ ?>