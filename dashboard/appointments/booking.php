<?php
  include '../db/db.php';
  include '../functions/appointments.php';
?>
<section>
    <div class="form-group row">
      <div class="form-holder col-md-9">
              <label for="type">Search Facility/Camp</label>
              <select name="facility" id="type" class="js-example-basic-single form-control" required>
                  <option value="">Select Facility</option>
                  <?php echo getFacilities($connect); ?>
              </select>
      </div>
    </div>
    <div class="form-group row">

      <div class="form-holder col-md-9">
        <label for="dob">Apponintment Date</label>
          <input type="date" class="form-control"  id="dob" placeholder="dd/mm/yyyy" name="date" autocomplete="new-password" required>
      </div>
    </div>
    <input type="text" name="userid" id="uid" value="<?php echo $_SESSION['userID']; ?>"hidden>
    <input type="text" name="booking" id="fac" hidden>

  <div class="mt-4">
    <span id="error_result"></span>
    <span id="loading" style="display: none"><i class='fa fa-spinner fa-pulse text-right'></i><span class='sr-only'>Loading...</span></span>
  </div>
</section>
<script>
$(function(){
  var dtToday = new Date();
  var dtMax = new Date();

  var month = dtToday.getMonth() + 1;
  var day = dtToday.getDate();
  var year = dtToday.getFullYear();
  if(month < 10)
      month = '0' + month.toString();
  if(day < 10)
      day = '0' + day.toString();

  var maxDate = year + '-' + month + '-' + day;

  dtMax.setDate(dtMax.getDate()+8);
  var dmonth = dtMax.getMonth() + 1;
  var dday = dtMax.getDate();
  var dyear = dtMax.getFullYear();
  if(dmonth < 10)
      dmonth = '0' + dmonth.toString();
  if(dday < 10)
      dday = '0' + dday.toString();

  var dmaxDate = dyear + '-' + dmonth + '-' + dday;
  $('#dob').attr('min', maxDate);
  $('#dob').attr('max', dmaxDate);
});
</script>
<style media="screen">
  label.error{
    color: red;
    display: block;
  }
  .datepicker{z-index:1151 !important;}
</style>
