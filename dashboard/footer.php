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

a.href = 'css/vertical-layout-' + localStorage.getItem("mode") + '/style.css';
}
});
</script>

<!-- plugins:js -->
<script src="vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="vendors/chart.js/Chart.min.js"></script>
<script src="vendors/datatables.net/jquery.dataTables.js"></script>
<script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="js/dataTables.select.min.js"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="js/off-canvas.js"></script>
<script src="js/hoverable-collapse.js"></script>
<script src="js/template.js"></script>
<script src="js/settings.js"></script>
<script src="js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="js/dashboard.js"></script>
<script src="js/Chart.roundedBarCharts.js"></script>
<!-- End custom js for this page-->
<?php include 'functions/check_stats.php'; ?>
</body>

</html>
