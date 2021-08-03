<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>iDonate | Add Centers</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../dashboard/vendors/feather/feather.css">
  <link rel="stylesheet" href="../dashboard/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../dashboard/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../dashboard/vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../dashboard/vendors/jquery-toast-plugin/jquery.toast.min.css">

  <!-- MATERIAL DESIGN ICONIC FONT -->
  <link rel="stylesheet" href="../register/fonts/material-design-iconic-font/css/material-design-iconic-font.css">

  		<script src="../register/js/jquery-3.3.1.min.js"></script>

  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <link rel="shortcut icon" href="../dashboard/images/favicon.ico" />
  <link rel="stylesheet" href="../register/vendor/date-picker/css/datepicker.min.css">

  <script src="../register/vendor/date-picker/js/datepicker.js"></script>
  <!-- STYLE CSS -->
  <link rel="stylesheet" href="../register/css/style.css">
</head>

<body>
		<div class="wrapper">
    <center>
      <img src="../dashboard/images/favicon.ico" alt="logo">
       <h2 class="text-primary">Add Facility</h2><br>
    </center>
            <form action="" id="wizard" method="post">

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
                            <input autocomplete="new-password" type="text" class="form-control" placeholder="Coordinates" id="coordinates" name="coordinates">
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
                    
                  <div class="mt-4">
                  <button type="submit" class="btn btn-block btn-primary btn-md font-weight-medium auth-form-btns" id="login"><i id="lodr"></i>&nbspSIGN IN&nbsp&nbsp<i class="fa fa-chevron-right"></i></button>
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
                var cod = latitude+","+ longitude;
                alert(place.geometry.location.A);
                //document.getElementById('address').value = address;
                 document.getElementById('coordinates').value = cod;
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
		<script src="../register/js/jquery.steps.js"></script>

		<script src="js/main.js"></script>
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
</body>
</html>
