<?php
if(!isset($_SESSION)) {session_start();}
if(isset($_SESSION['log']))
{
  if($_SESSION['log']=='unlocked'){
    echo '<script>window.top.location.href = "../dashboard";</script>';
    die();
  } else {
    echo '<script>window.top.location.href = "lock.php";</script>';
    die();
  }

} else {
  //echo '<script>window.top.location.href = "/idonate/login?se";</script>';
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>iDonate | Login</title>
  <!-- google login -->
  <meta name="google-signin-scope" content="profile email">
	<meta name="google-signin-client_id" content="166549592874-0kmld8i1uplm48o9ndrliek3qug2q5nb.apps.googleusercontent.com">
	<script src="https://apis.google.com/js/platform.js" async defer></script>
  <script>
		function onSignIn(googleUser) {
			// Useful data for your client-side scripts:
			var profile = googleUser.getBasicProfile();
			//console.log("Image URL: " + profile.getImageUrl());
			//console.log("Email: " + profile.getEmail());
			window.location.href = "index.php?g_l="+profile.getEmail()+"&g_img="+profile.getImageUrl()+"";
			// The ID token you need to pass to your backend:
			var id_token = googleUser.getAuthResponse().id_token;
			console.log("ID Token: " + id_token);
			var auth2 = gapi.auth2.getAuthInstance();
			auth2.signOut().then(function () {
				console.log('User signed out.');
			});
		}
	</script>
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
              <h4 class="text-center">iDonate Login</h4>
              <h6 class="font-weight-light text-center">Sign in to continue.</h6>
              <?php if(isset($_GET['rs'])){ ?>
              <h6 class="font-weight-light text-center" style="color:green">Registration Successful!Check your email for activation link.</h6>
              <script type="text/javascript">
                window.history.pushState("", "", './');
              </script>
            <?php } ?>
            <?php if(isset($_GET['lo'])){ ?>
            <h6 class="font-weight-light text-center" style="color:green">You are now logged out</h6>
            <script type="text/javascript">
              window.history.pushState("", "", './');
            </script>
          <?php } ?>
          <?php if(isset($_GET['se'])){ ?>
          <h6 class="font-weight-light text-center" style="color:tomato">Session Expired.</h6>
          <script type="text/javascript">
            window.history.pushState("", "", './');
          </script>
        <?php } ?>
            </center>
              <form class="pt-3" id="wizardb">
              <div class="form-row">
                <div class="form-holder">
                  <i class="zmdi zmdi-email"></i>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Username/Email">
                </div>
              </div>

              <div class="form-row">
                <div class="form-holder password">
                  <i class="zmdi zmdi-eye"></i>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                  <input type="text" name="login" value="" hidden>
                </div>
              </div>
                <div class="mt-4">
                  <button type="submit" class="btn btn-block btn-primary btn-md font-weight-medium auth-form-btns" id="login"><i id="lodr"></i>&nbspSIGN IN&nbsp&nbsp<i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="align-items-right" style="align:right!important; margin-top:5px;">
                  <a href="..dashboard/auth/reset.php" class="auth-link text-right text-muted">Forgot password?</a>
                </div>
                <div class="mb-2">
                  <div class="wells">
						        <center><p>or</p><div class="g-signin2" data-onsuccess="onSignIn" data-width="240" data-height="50" data-longtitle="true"></div></center>
					        </div>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="../register" class="text-primary">Register</a>
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

  <script src="js/main.js"></script>
  <!-- endinject -->
</body>

</html>
