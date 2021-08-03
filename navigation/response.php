<?php header('Content-Type: application/json'); ?>
<?php
$res = array();
  if(isset($_POST['res'])){
    $res = $_POST['res'];
    print_r($res);
  }

 ?>
