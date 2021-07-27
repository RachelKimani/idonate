<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Reset Password</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../dashboard/vendors/feather/feather.css">
  <link rel="stylesheet" href="../dashboard/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../dashboard/vendors/css/vendor.bundle.base.css">

  <link rel="stylesheet" href="../dashboard/vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../dashboard/vendors/jquery-toast-plugin/jquery.toast.min.css">
  <!-- MATERIAL DESIGN ICONIC FONT -->
  <link rel="stylesheet" href="../register/fonts/material-design-iconic-font/css/material-design-iconic-font.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../dashboard/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="../dashboard/images/favicon.ico" />
  <script src="../register/js/jquery-3.3.1.min.js"></script>
  <style media="screen">
  .content-wrapper{
    background-image: url("../dashboard/../assets/img/donatebg.png");
    background-repeat: no-repeat;
    background-size: cover;
  }
  .form-holder i {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    right: 20px;
    font-size: 16px;
  }
  </style>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <center><img src="../dashboard/images/idonate_logo.png" alt="logo"></center>
              </div>
              <h4 class="text-center">Forgot Password</h4>
              <h6 class="font-weight-light text-center">Enter Your Email</h6>
              <form class="pt-3" method="post" id="wizardd">
                <div class="form-row">
                  <div class="form-holder">
                    <i class="zmdi zmdi-email"></i>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Username/Email">
                  </div>
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-sm font-weight-medium auth-form-btn" id='reset' name="reset" type="submit"><i id="lodrc"></i>NEXT</button>
                </div>

                <div class="text-center mt-4 font-weight-light">
                  <a href="../register" class="text-primary">Create account</a> or <a href="./" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->

  <script src="../register/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
  <script src="../register/vendor/jquery-validation/dist/additional-methods.min.js"></script>
  <script src="../register/vendor/jquery-steps/jquery.steps.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="../dashboard/vendors/jquery-toast-plugin/jquery.toast.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- Custom js for this page-->
  <script src="../dashboard/js/toastDemo.js"></script>
  <script src="../dashboard/js/desktop-notification.js"></script>
  <script src="js/jquery.capslockstate.js"></script>
  <script src="  ../dashboard/vendors/sweetalert/sweetalert.min.js"></script>
  <script src="js/main.js"></script>
  <!-- endinject -->
</body>

</html>
