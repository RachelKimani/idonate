<?php include 'header.php'; ?>

  <?php
  if($_SESSION['userType']=='admin'){
    include 'admin.php';
  }else {
    include 'dashboard.php';
  }
   ?>

<?php include 'footer.php'; ?>
