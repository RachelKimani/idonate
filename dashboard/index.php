<?php include 'header.php'; ?>

  <?php
  if($_SESSION['userType']=='adminw'){
    include 'admin.php';
  } else if($_SESSION['userType']='hospitalagent'){
    include 'hospitalagent.php';
  } else if($_SESSION['userType']=='bankagent'){
    include 'bankagent.php';
  }
  else {
    include 'dashboard.php';
  }
   ?>

<?php include 'footer.php'; ?>
