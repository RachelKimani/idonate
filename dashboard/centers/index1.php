<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>iDonate | Add Centers</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../vendors/jquery-toast-plugin/jquery.toast.min.css">

  <!-- MATERIAL DESIGN ICONIC FONT -->
  <link rel="stylesheet" href="../../register/fonts/material-design-iconic-font/css/material-design-iconic-font.css">

  		<script src="../../register/js/jquery-3.3.1.min.js"></script>

  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.ico" />
  <link rel="stylesheet" href="../../register/vendor/date-picker/css/datepicker.min.css">

  <script src="../../register/vendor/date-picker/js/datepicker.js"></script>
  <!-- STYLE CSS -->
  <link rel="stylesheet" href="../../register/css/style.css">
</head>

<body>
		<div class="wrapper">
    <center>
      <img src="../images/favicon.ico" alt="logo">
       <h2 class="text-primary">Add Facility</h2><br>
    </center>
            <form id="facility" method="post">

        		<!-- SECTION 1 -->
                <h4></h4>
                <section>
                	<div class="form-row">
                        <div class="form-holder">
                            <i class="zmdi zmdi-account"></i>
                            <input type="text" class="form-control" placeholder="Facility Name" id="fName" name="fName" required>
                        </div>
                        <div class="form-holder">
                            <i class="zmdi zmdi-smartphone-android"></i>
                            <input type="phone" class="form-control" placeholder="Phone Number" id="phone" name="phone" autocomplete="new-password" required>
                        </div>
                	</div>

                    <div class="form-row">
                      <div class="form-holder">

                              <select name="type" id="type" class="form-control" required>
                                  <option value="">Type</option>
                                  <option value="hospital">Hospital</option>
                                  <option value="regional">Regional</option>
                                  <option value="satellite">Satellite</option>
                                  <option value="camp">Camp</option>
                              </select>
                      </div>
                       <div class="form-holder">
                            <i class="zmdi zmdi-map"></i>
                            <input autocomplete="new-password" type="text" class="form-control" placeholder="Address" id="address" name="address">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-holder">
                            <i class="zmdi zmdi-map"></i>
                            <input autocomplete="new-password" type="text" class="form-control" placeholder="Cordinates" id="cordinates" name="cordinates" required>
                        </div>
                        <div class="form-group">

                          <div class="form-holder">
                              <i class="zmdi zmdi-pin-drop"></i>
                              <input type="text" class="form-control" placeholder="City" id="city" name="city" required>
                          </div>
                            <div class="form-holder">
                                <i class="zmdi zmdi-pin"></i>
                                <input type="text" class="form-control" placeholder="Country" id="country" name="country" required>
                            </div>
                        </div>
                    </div>
                    <input type="text" name="facility" hidden>

                  <div class="mt-4">
                    <span id="error_result"></span>
                <span id="loading" style="display: none">Loading Please Wait...</span>

                  <button type="submit"id="btn" class="btn btn-block btn-primary btn-md font-weight-medium auth-form-btns" id="login"><i id="lodr"></i>&nbsp SUBMIT&nbsp&nbsp<i class="fa fa-chevron-right"></i></button>
                </div>
                </section>
            </form>
		</div>
