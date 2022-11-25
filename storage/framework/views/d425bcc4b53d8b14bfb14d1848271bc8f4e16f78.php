<!DOCTYPE html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('assets/img/apple-icon.png')); ?>"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="<?php echo e(asset('assets/css/nucleo-icons.css')); ?>" rel="stylesheet" />
  <link href="<?php echo e(asset('assets/css/nucleo-svg.css')); ?>" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?php echo e(asset('assets/css/nucleo-svg.css')); ?>" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?php echo e(asset('assets/css/soft-ui-dashboard.css?v=1.0.3')); ?>" rel="stylesheet" />

  <style>
    *{
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    .card-header {
      padding: 0px !important;
    }

    .card-footer {
      padding: 0px !important;
    }

    .form-switch {
      padding-left: 0rem !important;
    }

    .form-switch .form-check-input {
      margin-left: 0rem !important;
    }

    .social-icons {
      width: 50px;
      height: 50px;
      line-height: 30px;
      display: flex;
      justify-content: center !important;
      align-items: center !important;
      background: transparent !important;
      border: 2px solid white;
    }

    .social-icons svg {
      height: 25px;
      /* padding: 2rem; */
    }

    .card {
      background-color: transparent !important;
      box-shadow: none !important;
    }

    svg{
      top: 13px!important;
      right: 25px!important;
    }
  </style>
</head>

<body class="g-sidenav-show  bg-gray-100 <?php echo e((\Request::is('rtl') ? 'rtl' : (Request::is('virtual-reality') ? 'virtual-reality' : ''))); ?> ">
  <div class="container-fluid m-0 p-0">
    <section class="" style="background-color: #ffffff;
background-image: linear-gradient(315deg, #ffffff 0%, #d7e1ec 74%); height:100vh;">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-xl-10">
            <div class="card" style="border-radius:50px; border:5px solid #fff">
              <div class="row g-0">
                <div class="col-md-6 col-lg-5 d-none d-md-block">
                  <img src="<?php echo e(asset('/assets/img/login.png')); ?>" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                </div>
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                  <div class="card-body p-md-4 p-lg-5 text-black">

                    <form action="<?php echo e(url('/')); ?>/login" method="post">
                      <?php echo csrf_field(); ?>

                      <div class="card-header text-left mb-4 mt-5 bg-transparent">
                        <h3 class="font-weight-bolder text-info text-gradient text-center">Hello Admin!</h3>
                        <h5 class="fw-normal text-center" style="letter-spacing: 1px;">Welcome back you've been missed</h5>
                      </div>
                      <?php if($message = Session::get('error')): ?>
                      <div class="alert alert-danger alert-block">
                          <strong><?php echo e($message); ?></strong>
                      </div>
                      <?php endif; ?>
                      <div class="form-outline mb-4">
                        <!-- <label class="form-label" for="form2Example17">Email address</label> -->
                        <input type="text" class="form-control" placeholder="Enter Emailaddress" name="email" id="email" required class="">
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-danger text-xs mt-2"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>

                      <div class="form-outline mb-2 position-relative">
                        <!-- <label class="form-label" for="form2Example27">Password</label> -->
                        <input type="password" class="form-control position-relative" placeholder="Enter Password" name="password" id="id_password" required>
                        <i class="fa-solid fa fa-eye position-absolute cursor-pointer d-block" id="togglePassword" onclick="eyeEnableOrDisable()"></i>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-danger text-xs mt-2"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                      
                      <button class="btn btn-dark btn-lg btn-block w-100 mt-3" type="submit" style="background-color: #fd6b68;box-shadow: 5px 10px 110px 10px rgba(253,107,104,0.34);">Sign in</button>

                      <div class="m-3 mb-4">
                        <div class="text-center text-dark">
                          Or continue withh
                        </div>
                        <div class=" row d-flex justify-content-evenly my-4">

                          <div class="col-2 social-icons rounded">
                            <i class="fa-brands fa-apple" style="color: #393839; box-shadow: 0px 5px 5px 2px #fff "></i>
                          </div>

                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!--   Core JS Files   -->
  <script src="<?php echo e(asset('assets/js/core/popper.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/core/bootstrap.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/plugins/perfect-scrollbar.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/plugins/smooth-scrollbar.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/plugins/fullcalendar.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/plugins/chartjs.min.js')); ?>"></script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo e(asset('assets/js/soft-ui-dashboard.min.js?v=1.0.3')); ?>"></script>
  <script>
  function eyeEnableOrDisable() 
	{
	  var x = document.getElementById("id_password"); //getting the password field element
	  var y = document.getElementById("togglePassword"); //getting the eye button element
	  if (x.type === "password") 
	  {
	    x.type = "text";
	    y.classList.remove("fa-eye");
	    y.classList.add("fa-eye-slash");
	  } 
	  else 
	  {
	    x.type = "password";
	    y.classList.remove("fa-eye-slash");
	    y.classList.add("fa-eye");
	  }
	}
</script>
</body>

</html><?php /**PATH /Users/chiraggupta/Sites/localhost/chirag/srchout/infospeed_admin/resources/views/Admin/admin-auth/login.blade.php ENDPATH**/ ?>