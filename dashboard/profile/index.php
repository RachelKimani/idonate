<?php include '../functions/check_session.php';
include '../db/db.php';
include '../functions/auth.php';
$details = fetchUser($_SESSION['userID'],$connect);
$medic = fetchMeds($_SESSION['userID'],$connect);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>iDonate | Settings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="assets/styles.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="../js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <link rel="stylesheet" href="../vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <link rel="stylesheet" href="../vendors/tinymce/skins/ui/oxide/skin.min.css">
  <!-- inject:css -->
  <link id="style1" rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <script>

// Retrieve
//document.getElementById("result").innerHTML = localStorage.getItem("mode");
  function toggle() {
    var a = document.getElementById("style1");
    if(localStorage.getItem("mode")!=null){
      if(localStorage.getItem("mode")=='dark'){
        a.x ='light';
      } else {
        a.x = 'dark';
      }
    } else {
        a.x = 'dark' == a.x ? 'light' : 'dark'; // short if
    }
    a.href = '../css/vertical-layout-' + a.x + '/style.css';
    localStorage.setItem("mode", a.x);
  }

  </script>
  <!-- endinject -->
  <link href="../../assets/img/favicon.ico" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

      <script src="../../register/js/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="../../register/vendor/date-picker/css/datepicker.min.css">
  <script src="../../register/vendor/date-picker/js/datepicker.js"></script>
  <script src="assets/upload-image.js"></script>
</head>
<body>

<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo mr-5" href="index.php"><img src="../../assets/img/idonate_logo.png" class="mr-2" alt="logo"/> iDonate</a>
    <a class="navbar-brand brand-logo-mini" href="index.php"><img src="../../assets/img/idonate_logo.png" alt="logo"/></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="icon-menu"></span>
    </button>
    <ul class="navbar-nav mr-lg-2">
      <li class="nav-item nav-search d-none d-lg-block">
        <div class="input-group">
          <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
            <span class="input-group-text" id="search">
              <i class="icon-search"></i>
            </span>
          </div>
          <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
        </div>
      </li>
    </ul>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown">
          <a class="nav-link" href="../"><i class="ti-home"></i></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
          <i class="icon-bell mx-0"></i>
          <span class="count"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
          <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-success">
                <i class="ti-info-alt mx-0"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <h6 class="preview-subject font-weight-normal">Test results</h6>
              <p class="font-weight-light small-text mb-0 text-muted">
                Just now
              </p>
            </div>
          </a>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-warning">
                <i class="ti-settings mx-0"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <h6 class="preview-subject font-weight-normal">Thank you for donating</h6>
              <p class="font-weight-light small-text mb-0 text-muted">
                Private message
              </p>
            </div>
          </a>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-info">
                <i class="ti-user mx-0"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <h6 class="preview-subject font-weight-normal">New device detected</h6>
              <p class="font-weight-light small-text mb-0 text-muted">
                2 days ago
              </p>
            </div>
          </a>
        </div>
      </li>
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
          <img id="imageprev" src="<?php if(isset($_SESSION['img'])){
            if($_SESSION['img']!=''){
              echo $_SESSION['img'];
            }else {
              echo "../../assets/img/user.png";
            }
          }else {
            echo "../../assets/img/user.png";
          }
           ?>" alt="profile"/>&nbsp<?php if(isset($_SESSION['fullName'])){
            echo $_SESSION['fullName'];
          }else {
            echo "Guest";
          }
           ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item" href="./">
            <i class="ti-settings text-primary"></i>
            Settings
          </a>
          <a class="dropdown-item">
            <i class="ti-help text-primary"></i>
            Help
          </a>
          <a class="dropdown-item" href="../../login/lock.php">
            <i class="ti-lock text-primary"></i>
            Lock
          </a>
          <a class="dropdown-item" href="../../logout/">
            <i class="ti-power-off text-primary"></i>
            Logout
          </a>
        </div>
      </li>
      <li class="nav-item nav-settings d-none d-lg-flex">
        <a class="nav-link" href="#">
          <i class="icon-ellipsis"></i>
        </a>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="icon-menu"></span>
    </button>
  </div>
</nav>
<!-- partial -->
<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <div id="right-sidebar" class="settings-panel">
    <i class="settings-close ti-close"></i>
    <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
      </li>
    </ul>
    <div class="tab-content" id="setting-content">
      <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
        <div class="add-items d-flex px-3 mb-0">
          <form class="form w-100">
            <div class="form-group d-flex">
              <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
              <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
            </div>
          </form>
        </div>
        <div class="list-wrapper px-3">
          <ul class="d-flex flex-column-reverse todo-list">
            <li>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" type="checkbox">
                  Team review meeting at 3.00 PM
                </label>
              </div>
              <i class="remove ti-close"></i>
            </li>
            <li>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" type="checkbox">
                  Prepare for presentation
                </label>
              </div>
              <i class="remove ti-close"></i>
            </li>
            <li>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" type="checkbox">
                  Resolve all the low priority tickets due today
                </label>
              </div>
              <i class="remove ti-close"></i>
            </li>
            <li class="completed">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" type="checkbox" checked>
                  Schedule meeting for next week
                </label>
              </div>
              <i class="remove ti-close"></i>
            </li>
            <li class="completed">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" type="checkbox" checked>
                  Project review
                </label>
              </div>
              <i class="remove ti-close"></i>
            </li>
          </ul>
        </div>
        <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
        <div class="events pt-4 px-3">
          <div class="wrapper d-flex mb-2">
            <i class="ti-control-record text-primary mr-2"></i>
            <span>Feb 11 2018</span>
          </div>
          <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
          <p class="text-gray mb-0">The total number of sessions</p>
        </div>
        <div class="events pt-4 px-3">
          <div class="wrapper d-flex mb-2">
            <i class="ti-control-record text-primary mr-2"></i>
            <span>Feb 7 2018</span>
          </div>
          <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
          <p class="text-gray mb-0 ">Call Sarah Graves</p>
        </div>
      </div>
      <!-- To do section tab ends -->
      <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
        <div class="d-flex align-items-center justify-content-between border-bottom">
          <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
          <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
        </div>
        <ul class="chat-list">
          <li class="list active">
            <div class="profile"><img src="../images/faces/face1.jpg" alt="image"><span class="online"></span></div>
            <div class="info">
              <p>Thomas Douglas</p>
              <p>Available</p>
            </div>
            <small class="text-muted my-auto">19 min</small>
          </li>
          <li class="list">
            <div class="profile"><img src="../images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
            <div class="info">
              <div class="wrapper d-flex">
                <p>Catherine</p>
              </div>
              <p>Away</p>
            </div>
            <div class="badge badge-success badge-pill my-auto mx-2">4</div>
            <small class="text-muted my-auto">23 min</small>
          </li>
          <li class="list">
            <div class="profile"><img src="../images/faces/face3.jpg" alt="image"><span class="online"></span></div>
            <div class="info">
              <p>Daniel Russell</p>
              <p>Available</p>
            </div>
            <small class="text-muted my-auto">14 min</small>
          </li>
          <li class="list">
            <div class="profile"><img src="../images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
            <div class="info">
              <p>James Richardson</p>
              <p>Away</p>
            </div>
            <small class="text-muted my-auto">2 min</small>
          </li>
          <li class="list">
            <div class="profile"><img src="../images/faces/face5.jpg" alt="image"><span class="online"></span></div>
            <div class="info">
              <p>Madeline Kennedy</p>
              <p>Available</p>
            </div>
            <small class="text-muted my-auto">5 min</small>
          </li>
          <li class="list">
            <div class="profile"><img src="../images/faces/face6.jpg" alt="image"><span class="online"></span></div>
            <div class="info">
              <p>Sarah Graves</p>
              <p>Available</p>
            </div>
            <small class="text-muted my-auto">47 min</small>
          </li>
        </ul>
      </div>
      <!-- chat tab ends -->
    </div>
  </div>
  <!-- partial -->
  <!-- partial:partials/_sidebar.php -->
  <?php
  if(!isset($_SESSION)) {session_start();}
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
        <li class="nav-item  active">
          <a class="nav-link" href="#">
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
        <li class="nav-item">
          <a class="nav-link" href="../appointments/">
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
        <li class="nav-item active">
          <a class="nav-link" href="#">
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
        <li class="nav-item">
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



      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <?php include 'profile.php'; ?>
          </div>
        </div>
        <style type="text/css">
        .ui-w-80 {
            width: 150px !important;
            height: 150px;
            border-radius: 100%;
            align:center !important;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-default {
            border-color: rgba(24,28,33,0.1);
            background: rgba(0,0,0,0);
            color: #4E5155;
        }


        .card {
            background-clip: padding-box;
            box-shadow: 0 1px 4px rgba(24,28,33,0.012);
        }

        .row-bordered {
            overflow: hidden;
        }

        .w-100,.select2-container{
          width: 100%!important;
        }
        @media only screen and (min-width: 768px) {
        #p3{
          position: fixed !important;
          padding-right: 10px;
        }
        #p9{
          margin-left: 25%;
        }
        }
        @media only screen and (min-width: 992px) {
        #p3{
          padding-right: 52px;
        }
        }
        .account-settings-fileinput {
            position: absolute;
            visibility: hidden;
            width: 1px;
            height: 1px;
            opacity: 0;
        }
        .account-settings-links .list-group-item.active {
            font-weight: bold !important;
        }
        .account-settings-multiselect ~ .select2-container {
            width: 100% !important;
        }
        .light-style .account-settings-links .list-group-item {
            padding: 0.85rem 1.5rem;
            border-color: rgba(24, 28, 33, 0.03) !important;
        }
        .light-style .account-settings-links .list-group-item.active {
            color: #fff !important;
        }
        .material-style .account-settings-links .list-group-item {
            padding: 0.85rem 1.5rem;
            border-color: rgba(24, 28, 33, 0.03) !important;
        }
        .material-style .account-settings-links .list-group-item.active {
            color: #fff !important;
        }
        .dark-style .account-settings-links .list-group-item {
            padding: 0.85rem 1.5rem;
            border-color: rgba(255, 255, 255, 0.03) !important;
        }
        .dark-style .account-settings-links .list-group-item.active {
            color: #fff !important;
        }
        .light-style .account-settings-links .list-group-item.active {
            color: #fff !important;
        }
        .light-style .account-settings-links .list-group-item {
            padding: 0.85rem 1.5rem;
            border-color: rgba(24,28,33,0.03) !important;
        }
        .list-group-item.active {
            z-index: 2 !important;
            color: #fff !important;
            background-color: #d9232d !important;
            border-color: #d9232d !important;
        }



        </style>

        <script src="../vendors/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBHpAmimxTn6JfSP_-1PavnZ9WvAE6eCtc&libraries=places"></script>
        <script type="text/javascript">
        //tabs
        $('a[data-toggle="tab"]').click(function (e) {
                e.preventDefault();
                $(this).show();
            });

            $('a[data-toggle="tab"]').on("shown.bs.tab", function (e) {
                var id = $(e.target).attr("href");
                localStorage.setItem('selectedTab', id)
            });

            var selectedTab = localStorage.getItem('selectedTab');

            if (selectedTab != null) {
                $('a[data-toggle="tab"][href="' + selectedTab + '"]').show();
            }
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
                    //document.getElementById('city').value = city;
                    //document.getElementById('country').value = country;
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
            $(document).ready(function() {
              var a = document.getElementById("style1");
              if(localStorage.getItem("mode")!=null){
                if(localStorage.getItem("mode")=='dark'){
                  $("#customSwitch1").prop("checked", true);
                }

                a.href = '../css/vertical-layout-' + localStorage.getItem("mode") + '/style.css';
              }
            $('.js-example-basic-single').select2();
            <?php if( $medic['bloodType']!=''){ ?>
            $('.js-example-basic-single').val('<?php echo $medic['bloodType']; ?>').trigger('change')
              //$(".js-example-basic-single").select2("val", "");
              <?php } ?>
        });
        $(window).on('load', function() {

        });
        tinymce.init({
          selector: 'textarea#specialNotes',
          height: 500,
          menubar: false,
          plugins: 'print preview  importcss  searchreplace autolink autosave save directionality  visualblocks visualchars fullscreen image link media  template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount  imagetools textpattern noneditable help    charmap   quickbars  emoticons ',
          mobile: {
            plugins: 'print preview  importcss  searchreplace autolink autosave save directionality  visualblocks visualchars fullscreen image link media  template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount  textpattern noneditable help   charmap  quickbars  emoticons '
          },
          menubar: 'file edit view insert format tools table tc help',
         toolbar: 'save | undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor casechange   removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media  template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
         //readonly : 1,
         noneditable_regexp: /\[\]/g,
          toolbar: 'undo redo | formatselect | ' +
          'bold italic backcolor | alignleft aligncenter ' +
          'alignright alignjustify | bullist numlist outdent indent | ' +
          'removeformat | help',
          //noneditable_noneditable_class: 'mceNonEditable',
          autosave_retention: '30s'
        });

        </script>

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
        <script src="../vendors/typeahead.js/typeahead.bundle.min.js"></script>
        <script src="../vendors/select2/select2.min.js"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="../js/off-canvas.js"></script>
        <script src="../js/hoverable-collapse.js"></script>
        <!-- Custom js for this page-->
        <script src="../js/file-upload.js"></script>
        <script src="../js/typeahead.js"></script>
        <script src="../js/select2.js"></script>
        </body>
        </html>
