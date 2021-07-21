<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>iDonate | Register</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../dashboard/vendors/feather/feather.css">
  <link rel="stylesheet" href="../dashboard/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../dashboard/vendors/css/vendor.bundle.base.css">
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

  <!-- STYLE CSS -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
		<div class="wrapper">
    <center>
      <img src="../dashboard/images/favicon.ico" alt="logo">
       <h2 class="text-primary">iDonate Sign Up</h2><br>
       <p>Step <span id="cnt">1</span> of 3</p>
       <p id="error" style="display:none; color:#d9232d;">Please complete the fields highlighted in red</p>
    </center>
            <form action="" id="wizard" method="post">

        		<!-- SECTION 1 -->
                <h4></h4>
                <section>
                    <h3>Profile</h3>
                	<div class="form-row">
                        <div class="form-holder">
                            <i class="zmdi zmdi-account"></i>
                            <input type="text" class="form-control" placeholder="First Name" id="firstName" name="firstName" required>
                        </div>
                        <div class="form-holder">
                            <i class="zmdi zmdi-account"></i>
                            <input type="text" class="form-control" placeholder="Last Name" id="lastName" name="lastName" required>
                        </div>
                	</div>
                    <div class="form-row">
                        <div class="form-holder">
                            <i class="zmdi zmdi-email"></i>
                            <input type="text" class="form-control" placeholder="Email Address" id="email" name="email" required>
                        </div>
                        <div class="form-holder">
                            <i class="zmdi zmdi-smartphone-android"></i>
                            <input type="phone" class="form-control" placeholder="Phone Number" id="phone" name="phone" required>
                        </div>
                    </div>
                    <div class="form-row">
                      <div class="form-holder">
                          <input type="date" class="form-control"  id="datepiscker" placeholder="DOB" name="dob" required>
                      </div>
                      <div class="form-holder">

                              <select name="gender" id="gender" class="form-control" required>
                                  <option value="">Gender</option>
                                  <option value="male">Male</option>
                                  <option value="female">Female</option>
                              </select>
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="form-holder">
                            <i class="zmdi zmdi-map"></i>
                            <input type="text" class="form-control" placeholder="Address" id="address" name="address" autocomplete="new-password">
                        </div>
                        <div class="form-group">

                          <div class="form-holder">
                              <i class="zmdi zmdi-pin-drop"></i>
                              <input type="text" class="form-control" placeholder="City" id="city" disabled>
                          </div>
                            <div class="form-holder">
                                <i class="zmdi zmdi-pin"></i>
                                <input type="text" class="form-control" placeholder="Country" id="country" disabled>
                            </div>
                        </div>
                    </div>

                    <p>Already have an account?<a href="../login" class="text-primary"> Login</a></p>
                </section>

				<!-- SECTION 2 -->
                <h4></h4>
                <section>
                	<h3>Account</h3>
                  <div class="form-row ">
                      <div class="form-holder w-100">
                          <i class="zmdi zmdi-account-box-o"></i>
                          <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                      </div>
                  </div>
                    <div class="form-row">
                      <div class="form-holder password">
                          <i class="zmdi zmdi-eye"></i>
                          <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                      </div>
                        <div class="form-holder password">
                            <i class="zmdi zmdi-eye"></i>
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password">
                            <input type="text" name="register" hidden>
                        </div>
                        <div id="divMayus" style="visibility:hidden">Caps Lock is on.</div>
                    </div>
                </section>
                <!-- SECTION 4 -->
                <h4></h4>
                <section>
                    <h3>Submit</h3>
                    <p>Confirm the details below before submitting.</p>
                    <div class="cart_totals">
                        <table cellspacing="0" class="shop_table shop_table_responsive">
                            <tr class="cart-subtotal">
                                <th>Name</th>
                                <td data-title="Subtotal">
                                    <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol" id="name1"></span>
                                    </span>
                                </td>
                            </tr>
                            <tr class="cart-subtotal">
                                <th>Email</th>
                                <td data-title="Subtotal">
                                    <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol" id="email1"></span>
                                    </span>
                                </td>
                            </tr>
                            <tr class="cart-subtotal">
                                <th>Phone</th>
                                <td data-title="Subtotal">
                                    <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol"id="phone1"></span>
                                    </span>
                                </td>
                            </tr>
                            <tr class="cart-subtotal">
                                <th>Address</th>
                                <td data-title="Subtotal">
                                    <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol" id="address1"></span>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </section>
                <span id="error_result"></span>
            </form>
		</div>

    <script>
    /*(function() {
      ("#datepicker").datepicker(
        {
          minDate: new Date(1900,1-1,1), maxDate: '-15Y',
          dateFormat: 'dd/mm/yy',
          changeMonth: true,
          changeYear: true,
          yearRange: '-110:-15'
        }
      );
    });*/
    </script>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBHpAmimxTn6JfSP_-1PavnZ9WvAE6eCtc&libraries=places"></script>
    <script type="text/javascript">
    //maps
        google.maps.event.addDomListener(window, 'load', function () {
            var places = new google.maps.places.Autocomplete(document.getElementById('address'));
            google.maps.event.addListener(places, 'place_changed', function () {
                var place = places.getPlace();
                var locs = getCityAndCountry(place);
                var city = locs[0];
                var country = locs[1];
                var address = place.formatted_address;
                var latitude = place.geometry.location.A;
                var longitude = place.geometry.location.F;
                //document.getElementById('address').value = address;
                document.getElementById('city').value = city;
                document.getElementById('country').value = country;
                //var mesg = "Address: " + address;
                //mesg += "\ncity: " + city;
                //mesg += "\ncounty: " + county;
                  //mesg += "\ncountry: " + country;
                //document.getElementById("arrPrint").innerHTML = JSON.stringify(places, null, 2);
                //alert(mesg);
            });
            function getCityAndCountry(location) {
              var components = {};
              for(var i = 0; i < location.address_components.length; i++) {
                components[location.address_components[i].types[0]] = location.address_components[i].long_name;
              }

              if(!components['country']) {
                console.warn('Couldn\'t extract country');
                return false;
              }

              if(components['locality']) {
                return [components['locality'], components['country']];
              } else if(components['administrative_area_level_1']) {
                return [components['administrative_area_level_1'], components['country']];
              } else {
                console.warn('Couldn\'t extract city');
                return false;
              }
            }
        });
    </script>

		<!-- JQUERY STEP -->
		<script src="js/jquery.steps.js"></script>

		<script src="js/main.js"></script>
    <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="vendor/jquery-steps/jquery.steps.min.js"></script>
    <script src="vendor/date-picker/js/datepicker.js"></script>
</body>
</html>
