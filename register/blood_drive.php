<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>iDonate | Blood Drive</title>
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
       <h2 class="text-primary">HOST A BLOOD DRIVE</h2><br>
       <p id="error" style="display:none; color:#d9232d;">Please complete the fields highlighted in red</p>
    </center>
            <form action="" id="wizard" method="post">

            <!-- SECTION 1 -->
                <h4></h4>
                <section>
                    <h3>Fill In the Form Below</h3>
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
                            <input type="text" class="form-control" placeholder="Email Address" id="email" name="email" autocomplete="new-password" required>
                        </div>
                        <div class="form-holder">
                            <i class="zmdi zmdi-smartphone-android"></i>
                            <input type="phone" class="form-control" placeholder="Phone Number" id="phone" name="phone" autocomplete="new-password" required>
                        </div>
                    </div>
                    <div class="form-row">
                      <div class="form-holder">
                          <input type="text" class="form-control"  id="org" placeholder="Organization" name="org" required>
                      </div>
                      <div class="form-holder">
                          <input type="text" class="form-control"  id="pop" placeholder="Population" name="pop" required>
                      </div>

                      <div class="form-holder">
                          <input type="text" class="form-control"  id="date" placeholder="Date" name="date" autocomplete="new-password" required>
                          <script>
                          var dates = new Date();
                          dates.setFullYear(dates.getFullYear() - 16)
                          $("#dob").datepicker(
                              {
                                //minDate: new Date(1900,1-1,1),
                                maxDate: dates,
                                dateFormat: 'dd/mm/yyyy',
                                //endDate: new Date(),
                                changeMonth: true,
                                changeYear: true,
                                yearRange: ''
                              }
                            );
                          </script>
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="form-holder">
                            <i class="zmdi zmdi-map"></i>
                            <input autocomplete="new-password" type="text" class="form-control" placeholder="Address" id="address" name="address">
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
                     <div class="form-holder">
                          <textarea name="comment" placeholder="Additional Comments" rows="5" cols="100"></textarea></br></br>
                      </div>
                  </section>
                </form>
                
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
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="../dashboard/vendors/jquery-toast-plugin/jquery.toast.min.js"></script>
    <!-- End plugin js for this page-->
    <!-- Custom js for this page-->
    <script src="../dashboard/js/toastDemo.js"></script>
    <script src="../dashboard/js/desktop-notification.js"></script>
</body>
</html>