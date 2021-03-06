<?php
if(!isset($_SESSION)) {session_start();}
if(isset($_SESSION['log']))
{
  unset($_SESSION['log']);
  $_SESSION['log']='locked';

} else {
  echo '<script>window.top.location.href = "/idonate/login?se";</script>';
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>iDonate | Locked</title>
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
    .round-img{
      border-radius: 100% !important;
      width: 70px !important;
      height: 70px !important;
      border: 1px solid brown;
      padding: 5px;
    }
    .content-wrapper{
      background-image: url("../dashboard/../assets/img/donatebg.png");
      background-repeat: no-repeat;
      background-size: cover;
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
                <center><img class="round-img" src="<?php if(isset($_SESSION['img'])){
                  if($_SESSION['img']!=''){
                    echo $_SESSION['img'];
                  }else {
                    echo "../assets/img/user.png";
                  }
                }else {
                  echo "../assets/img/user.png";
                }
                 ?>" alt="user"></center>
              </div>
              <h3 class="text-center"><?php if(isset($_SESSION['fullName'])){
               echo $_SESSION['fullName'];
             }else {
               echo "Guest";
             }?></h3>
              <h5 class="text-center text-primary font-weight-light">Account Locked!</h5>
              <p class="font-weight-light text-center">Enter password or private key to continue.</p>
              <form method="post" id="wizardc" class="pt-3">
                  <div class="form-row">
                <div class="form-holder password">
                  <input type="text" id="email" value="<?php if(isset($_SESSION['email'])){
                   echo $_SESSION['email'];
                 }?>" hidden>
                  <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
                </div>
                </div>
                <div class="mt-3">
                  <button type="submit" id="loginx" class="btn btn-block btn-primary btn-sm font-weight-medium auth-form-btn" href=""><i id='lodrc'></i><i class="ti-unlock">&nbsp</i>Unlock</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Not you? <a href="../logout" class="text-primary">Sign in using a different account</a>
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
  <script src="../dashboard/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->

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

  <script src="js/main.js"></script>
  <script type="text/javascript">
  function checkLoginStatus(){
     $.get("/idonate/dashboard/functions/updateStat.php", function(data){
       if(data=='1'){
         window.top.location.href = "/idonate/dashboard/index.php";
       } else if(data=='2'){

       } else if(data=='3'){
         window.top.location.href = "/idonate/login?se";
       }
        setTimeout(function(){  checkLoginStatus(); }, 3000);
        });
  }
  checkLoginStatus();
  </script>

</body>

</html>
