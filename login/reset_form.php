<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>iDonate | Reset Password</title>
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
              <div class="brand-logos">
                <center><img src="../dashboard/images/favicon.ico" alt="logo">
              </div>
              <h4 class="text-center">iDonate Password Reset</h4>
              <h6 class="font-weight-light text-center">Enter New Password.</h6>
            </center>
              <form class="pt-3" id="wizardda" method="post" action="reset_action.php">
              <div class="form-row">
                <div class="form-holder password">
                  <i class="zmdi zmdi-eye toggle-password" id="eyepwd"></i>
                  <input type="password" class="form-control" id="password" name="password" placeholder="New Password">
                  <input type="text" name="email" value="<?php echo $email; ?>" hidden>
                  <input type="text" name="url" value="<?php echo $newurl; ?>" hidden>
                  <input type="text" name="reset" value="reset" hidden>
                </div>

              </div>
              <div class="form-row">
                <div class="form-holder password">
                  <i class="zmdi zmdi-eye toggle-password" id="eyepwd2"></i>
                  <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password">
                  <input type="text" name="login" value="" hidden>
                </div>

              </div>
              <p id="divMayus" style="visibility:hidden;margin-top:5px;color:brown;">CapsLock is on!</p>

                <div class="mt-4">
                  <button type="submit" class="btn btn-block btn-primary btn-md font-weight-medium auth-form-btns" id="login"><i id="lodrv"></i>&nbspNEXT&nbsp&nbsp<i class="fa fa-chevron-right"></i></button>
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
