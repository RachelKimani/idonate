<script type="text/javascript">
function checkLoginStatus(){
   $.get("/idonate/dashboard/functions/updateStat.php", function(data){
     if(data=='1'){

     } else if(data=='2'){
       window.top.location.href = "/idonate/login/lock.php";
     } else if(data=='3'){
       window.top.location.href = "/idonate/login?se";
     }
      setTimeout(function(){  checkLoginStatus(); }, 3000);
      });
}
checkLoginStatus();
</script>
