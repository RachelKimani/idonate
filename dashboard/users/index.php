<?php include '../inner/header.php'; ?>
<link href="../appointments/src/popupwindow.css" rel="stylesheet" type="text/css">
<style>
.example_content {
    display : none;
}
div.popupwindow_container{
  z-index: 1052!important;
}
</style>
<!-- partial:index.partial.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar" style="position:fixed">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="../index.php">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../profile/">
        <i class="fa fa-user menu-icon"></i>
        <span class="menu-title">Profile</span>
      </a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="#">
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
      <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
        <i class="fa fa-tint menu-icon"></i>
        <span class="menu-title">Donation</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="tables">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="#">View Donations</a></li>
          <li class="nav-item"> <a class="nav-link" href="#">Dispatch</a></li>
          <li class="nav-item"> <a class="nav-link" href="#">Tests</a></li>
          <li class="nav-item"> <a class="nav-link" href="#">Reports</a></li>
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
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
<div class="container">
  <div class="row py-5">
    <div class="col-12">
      <div class="row">
        <div class="col-md-12">
          <center><h2>Users</h2></center>
        </div>

      </div>
      <div class="row">
          <button type="button" name="button" class="btn btn-primary test" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>&nbspAdd New</button>
      </div>
      <br><br>
      <div class="row">
        <div class="col-md-3">
          <input type="checkbox" class="filter" value="Deleted"/>&nbspShow Deleted Users</label>
          <label>
        </div>
        <div class="col-md-3">
          <input type="checkbox" class="filter" value="Enabled" checked/>&nbspShow Active Users</label>
        </div>
        <div class="col-md-3">
          <input type="checkbox" class="filter" value="Disabled"/>&nbspShow Disabled Users</label>
        </div>


      </div>
      <p></p>
      <table id="example" class="table table-hover responsive nowrap" style="width:100%">
        <thead>
          <tr>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Role</th>
            <th>Date of Birth</th>
            <th>App Access</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>
  </div>
</div>
<div id="basic-demo" class="example_content">
          <?php include '../adduser.php'; ?>
</div>
<style media="screen">
  div#address{
    max-width: 200px;
    height: auto;
    word-wrap: break-word;
    white-space: pre-line;
  }
</style>
<!-- partial -->
<script src='../vendors/datatables.net/jquery.dataTables.js'></script>
<script src='../vendors/datatables.net-bs4/dataTables.bootstrap4.js'></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js'></script>
<script src='https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js'></script>
<script src="../../register/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
<script  src="./script.js"></script>
<script  src="./main.js"></script>
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
</body>
</html>
