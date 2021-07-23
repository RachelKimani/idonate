<?php
ob_start();
if(!isset($_SESSION)) {
session_start();
session_destroy();
} else if (isset($_SESSION)) {
session_destroy();
}
//header("location:login.php");
echo '<script>
  window.localStorage.removeItem(\'prevUrl\');
  window.parent.location.href = "../login?lo";
</script>';
?>
