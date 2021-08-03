<!DOCTYPE html>
<html lang="en" >
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>iDonate | Users</title>
<!-- plugins:css -->
<link rel="stylesheet" href="../vendors/feather/feather.css">
<link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
<link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
<link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script r>

</script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/boxicons@2.0.0/css/boxicons.min.css'>
<!-- endinject -->
<!-- Plugin css for this page -->
<link rel="stylesheet" href="../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
<link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
<link rel="stylesheet" type="text/css" href="../js/select.dataTables.min.css">
<!-- End plugin css for this page -->
<!-- inject:css -->
<link id="style1" rel="stylesheet" href="../css/vertical-layout-light/style.css">
<!-- endinject -->
<link href="../../assets/img/favicon.ico" rel="icon">
<link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
<link rel="shortcut icon" href="../../assets/img/apple-touch-icon.png" />
<link rel="stylesheet" href="./style.css">
</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">
  <div class="row py-5">
    <div class="col-12">
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
<script  src="./script.js"></script>
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
