<?php include '../../inner/header2.php'; ?>
<?php
if(!isset($_SESSION)) {session_start();}
if($_SESSION['userType']=='admin'){
  ?>
  <nav class="sidebar sidebar-offcanvas" id="sidebar" style="position:fixed">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="../../">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../profile">
          <i class="fa fa-user menu-icon"></i>
          <span class="menu-title">Profile</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../users">
          <i class="fa fa-users menu-icon"></i>
          <span class="menu-title">Users</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../centers">
          <i class="fa fa-building menu-icon"></i>
          <span class="menu-title">Facilities</span>
        </a>
      </li>
      <li class="nav-item  active">
        <a class="nav-link" href="./">
          <i class="icon-location menu-icon"></i>
          <span class="menu-title">Blood Drives</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../appointments/">
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
        <a class="nav-link" href="../../">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../profile">
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
        <a class="nav-link" href="../../appointments/">
          <i class="fa fa-calendar menu-icon"></i>
          <span class="menu-title">Appointments</span>
        </a>
      </li>
      <li class="nav-item  active">
        <a class="nav-link" href="./">
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
      <center><h3>Blood drives (within 100km radius)</h3></center>
      <br>
    </div>
    <br>
    <div class="row" style="height:100%;width:100%;margin-bottom:20px">
      <iframe id="idonatecenters" src="navm.php" width="100%" height="100%"></iframe>
    </div>
    <br><br>
  </div>
<!-- content-wrapper ends -->
<!-- partial:partials/_footer.php -->
<footer class="footer">
  <div class="d-sm-flex justify-content-center justify-content-sm-between">
    <center><span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  iDonate</span></center>
  </div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<script>
$(document).ready(function() {

var a = document.getElementById("style1");
if(localStorage.getItem("mode")!=null){
if(localStorage.getItem("mode")=='dark'){
$("#customSwitch1").prop("checked", true);
}

a.href = '../../css/vertical-layout-' + localStorage.getItem("mode") + '/style.css';
}

idonatecenters = localStorage.idonatecenters || 'navm.php';
$('#idonatecenters').attr('src', idonatecenters);
$('#idonatecenters').on('load', function(){
    localStorage.idonatecenters = $(this)[0].contentWindow.location.href;
});
});
</script>

<!-- plugins:js -->
<script src="../../vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="../../vendors/chart.js/Chart.min.js"></script>
<script src="../../vendors/datatables.net/jquery.dataTables.js"></script>
<script src="../../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="../../js/dataTables.select.min.js"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="../../js/off-canvas.js"></script>
<script src="../../js/hoverable-collapse.js"></script>
<script src="../../js/template.js"></script>
<script src="../../js/settings.js"></script>
<script src="../../js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="../../js/dashboard.js"></script>
<script src="../../js/Chart.roundedBarCharts.js"></script>
<!-- End custom js for this page-->
<?php include '../../functions/check_stats.php'; ?>
</body>

</html>
