<?php include '../inner/header.php'; ?>
<!-- partial -->
<link href="src/popupwindow.css" rel="stylesheet" type="text/css">
<style>
.example_content {
    display : none;
}
iframe {
    height: 100vh;
    width: 100%;
}
div.popupwindow_container{
  z-index: 1052!important;
}
</style>
<!-- partial:partials/_sidebar.php -->
<?php if(!isset($_SESSION)) {session_start();}
if($_SESSION['userType']=='admin'){
  ?>

  <nav class="sidebar sidebar-offcanvas" id="sidebar" style="position:fixed">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="../index.php">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../profile">
          <i class="fa fa-user menu-icon"></i>
          <span class="menu-title">Profile</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../users">
          <i class="fa fa-users menu-icon"></i>
          <span class="menu-title">Users</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../centers">
          <i class="fa fa-building menu-icon"></i>
          <span class="menu-title">Facilities</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../centers/map">
          <i class="icon-location menu-icon"></i>
          <span class="menu-title">Blood Drives</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">
          <i class="fa fa-tint menu-icon"></i>
          <span class="menu-title">Donations</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
          <i class="fa fa-medkit menu-icon"></i>
          <span class="menu-title">Transfusion</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="charts">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="#">Requisition</a></li>
            <li class="nav-item"> <a class="nav-link" href="#">Transfusion History</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fa fa-whatsapp menu-icon"></i>
          <span class="menu-title">Chat</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="icon-paper menu-icon"></i>
          <span class="menu-title">User Manual</span>
        </a>
      </li>
    </ul>
  </nav>
  <?php
}else {
  ?>
  <nav class="sidebar sidebar-offcanvas" id="sidebar" style="position:fixed">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="../">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="../profile">
          <i class="fa fa-user menu-icon"></i>
          <span class="menu-title">Profile</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fa fa-trophy menu-icon"></i>
          <span class="menu-title">Achievements</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">
          <i class="fa fa-calendar menu-icon"></i>
          <span class="menu-title">Appointments</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../centers/map">
          <i class="icon-location menu-icon"></i>
          <span class="menu-title">Blood Drives</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
          <i class="fa fa-tint menu-icon"></i>
          <span class="menu-title">Donation</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="tables">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="#">Rapid Test</a></li>
            <li class="nav-item"> <a class="nav-link" href="#">Donation History</a></li>
            <li class="nav-item"> <a class="nav-link" href="#">Results</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
          <i class="fa fa-medkit menu-icon"></i>
          <span class="menu-title">Transfusion</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="charts">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="#">Rapid Test</a></li>
            <li class="nav-item"> <a class="nav-link" href="#">Transfusion History</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fa fa-whatsapp menu-icon"></i>
          <span class="menu-title">Chat</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="icon-paper menu-icon"></i>
          <span class="menu-title">User Manual</span>
        </a>
      </li>
    </ul>
  </nav>
  <?php
}
 ?>
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
<!-- partial:index.partial.html -->
<div class="container">

  <div class="row py-5">
    <div class="col-12">
      <div class="row">
        <div class="col-md-12">
          <center><h2>Appoinments</h2></center>
        </div>

      </div>
      <style media="screen">
          @media only screen and (min-width: 800px) {
            .modal-dialog{
              position: relative;
              display: table !important; /* This is important */
              overflow-y: auto;
              overflow-x: auto;
              width: auto;
              min-width: 800px;
            }
          }
            .form-holder{
              margin-bottom: 5px;
            }

      </style>
      <?php

     ?>
     <?php if($_SESSION['userType']=='user'){?>
       <?php} else {
         ?>
         <div class="row">
             <button type="button" name="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>&nbspCreate New</button>
         </div>
         <?php
       } ?>

      <p></p>
      <table id="appointments" class="table table-hover responsive nowrap" style="width:100%">
        <thead>
          <tr>
            <?php
            if($_SESSION['userType']=='user'){
              $vald = "Facility";
            }else {
              $vald = "Donor";
            }
            ?>
            <th><?php echo $vald; ?></th>
            <th>Appointment Status</th>
            <th>Appoinment Date</th>
            <th>Blood Bag</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</div>

<style media="screen">
  div#address{
    max-width: 200px;
    height: auto;
    word-wrap: break-word;
    white-space: pre-line;

  }
  a{
    cursor: pointer !important;
  }
  .pac-container {
        z-index: 10000 !important;
    }
</style>
<!-- partial -->
<script src='../vendors/datatables.net/jquery.dataTables.js'></script>
<script src='../vendors/datatables.net-bs4/dataTables.bootstrap4.js'></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js'></script>
<script src='https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js'></script>

<script>
$(document).ready(function() {

var a = document.getElementById("style1");
if(localStorage.getItem("mode")!=null){
if(localStorage.getItem("mode")=='dark'){
$("#customSwitch1").prop("checked", true);
}

a.href = '../css/vertical-layout-' + localStorage.getItem("mode") + '/style.css';
}
});
</script>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <form class="form-sample" id="facility1" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Facility</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <?php include 'booking.php'; ?>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="btn2" ><i id="lodr"></i>&nbsp Save changes&nbsp&nbsp<i class="fa fa-chevron-right"></i></button>
      </div>

    </div>
    </form>
  </div>
</div>

<div id="basic-demo" class="example_content">
  <iframe id="iframeModal" src="../donate/rapidtest.php" width="100%" height="520px"></iframe>
</div>
<div id="basic-demo1" class="example_content">
  <?php include 'donation.php'; ?>
</div>

    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBHpAmimxTn6JfSP_-1PavnZ9WvAE6eCtc&libraries=places"></script>
    <script type="text/javascript">
    //maps
        google.maps.event.addDomListener(window, 'load', function () {
            var places = new google.maps.places.Autocomplete(document.getElementById('addressa'));
            google.maps.event.addListener(places, 'place_changed', function () {
                var place = places.getPlace();
                var locs = getCityAndCountry(place);
                var city = locs[0];
                var country = locs[1];
                var address = place.formatted_address;
                var latitude = place.geometry.location.lat();
                var longitude = place.geometry.location.lng();
                var cod = latitude+","+ longitude;

                //document.getElementById('address').value = address;
                 document.getElementById('cordinates').value = cod;
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
        window.closeModal = function(){
          $('#iframeModal').modal('hide');
        };
    </script>

		<!-- JQUERY STEP -->
		<script src="../../register/js/jquery.steps.js"></script>
    <script src="src/popupwindow.js"></script>
		<script src="js/main.js"></script>
    <script src="../../register/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="../../register/vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="../../register/vendor/jquery-steps/jquery.steps.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="../vendors/jquery-toast-plugin/jquery.toast.min.js"></script>
    <!-- End plugin js for this page-->
    <!-- Custom js for this page-->
    <script src="../js/toastDemo.js"></script>
    <script src="../js/desktop-notification.js"></script>
  <script src="../appointments/src/popupwindow.js"></script>
  <script src="../vendors/sweetalert/sweetalert.min.js"></script>
  <script>
  $(document).ready(function() {

  var a = document.getElementById("style1");
  if(localStorage.getItem("mode")!=null){
  if(localStorage.getItem("mode")=='dark'){
  $("#customSwitch1").prop("checked", true);
  }

  a.href = '../css/vertical-layout-' + localStorage.getItem("mode") + '/style.css';
  }
  });
  </script>

  <script src="../js/select2.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
</body>
</html>
