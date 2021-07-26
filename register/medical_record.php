<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>iDonate | Medical Records</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../dashboard/vendors/feather/feather.css">
  <link rel="stylesheet" href="../dashboard/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../dashboard/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../dashboard/vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../dashboard/vendors/jquery-toast-plugin/jquery.toast.min.css">
  <!-- MATERIAL DESIGN ICONIC FONT -->
  <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.css">

      <script src="js/jquery-3.3.1.min.js"></script>

  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <link rel="shortcut icon" href="../dashboard/images/favicon.ico" />
  <link rel="stylesheet" href="vendor/date-picker/css/datepicker.min.css">

  <script src="vendor/date-picker/js/datepicker.js"></script>
  <!-- STYLE CSS -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="wrapper">
    <center>
      <img src="../dashboard/images/favicon.ico" alt="logo">
       <h2 class="text-primary">MEDICAL RECORDS</h2><br>
       <p id="error" style="display:none; color:#d9232d;">Please complete the fields highlighted in red</p>
    </center>
            <form action="" id="wizard" method="post">

            <!-- SECTION 1 -->
                <h4></h4>
                <section>
                  <h3>(By the Doctor)</h3>
                  <div class="form-row">
                  <div class="form-holder">
                              <select name="Blood_type" id="blood_type" class="form-control" required>
                                <option value="">Blood Type</option>
                                  <option value="A">A</option>
                                  <option value="B">B</option>
                                  <option value="AB">AB</option>
                                  <option value="O">O</option>
                              </select>
                      </div>
                    </div>
                      <div>
                    <div class="form-row">
                      <div class="form-holder">
                          <input type="text" class="form-control"  id="wgt" placeholder="Weight(kg)" name="wgt" required>
                      </div>
                      <div class="form-holder">
                          <input type="text" class="form-control"  id="hgt" placeholder="Height(inches)" name="hgt" required>
                      </div>
                    </div>
                     <div class="form-holder">
                          <textarea name="comment" placeholder="Medical History  E.g allergies, special conditions e.t.c" rows="5" cols="100"></textarea></br></br>
                      </div>
                  </section>
                </form>
    
    <!-- JQUERY STEP -->
    <script src="js/jquery.steps.js"></script>

    <script src="js/main.js"></script>
    <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="vendor/jquery-steps/jquery.steps.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="../dashboard/vendors/jquery-toast-plugin/jquery.toast.min.js"></script>
    <!-- End plugin js for this page-->
    <!-- Custom js for this page-->
    <script src="../dashboard/js/toastDemo.js"></script>
    <script src="../dashboard/js/desktop-notification.js"></script>
</body>
</html>