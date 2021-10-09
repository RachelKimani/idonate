<!--Section: Register Form-->
<section class="mt-4 mb-5 register-form container">

  <form method="post" autocomplete="off" id="donateform">

    <div class="form-row">
      <div class="col">
        <div class="md-form md-outline mt-0">
          <label for="bag_number">Enter/Scan Blood Bag Number</label>
          <input type="text" name="bag_number" id="bag_number" class="form-control" required>
        </div>
      </div>
    </div>
    <input type="text" name="appointment_id" id="appointment_id" class="form-control" hidden required>
    <br>
    <div class="form-row">
      <div class="col">
        <div class="md-form md-outline mt-0">
          <label for="donation_type">Select Donation Type</label>
          <select class="form-control" id="donation_type" name="donation_type" required>
            <option value="1">Red Blood Cells</option>
            <option value="2">Whole Blood</option>
            <option value="other">Other</option>
          </select>
          <div class="invalid-feedback">
            Select Type
          </div>
        </div>
      </div>
      <div class="col">
        <div class="md-form md-outline mt-0">
          <label for="quantity">Enter Bag Capacity in ML(s)</label>
          <input type="text" name="quantity" id="quantity" class="form-control" value="450" required>
        </div>
      </div>
    </div>
    <input type="text" name="addDonation" hidden>

    <div class="form-row">
      <p id="error_result"></p>
    </div>
    <div class="form-row">
      <button type="button" name="button" class="btn btn-secondary btn-sm cp">Cancel</button>&nbsp&nbsp
      <button type="submit" class="btn btn-primary" id="btn" name="adddon"><i id="lodr"></i>&nbsp Assign&nbsp&nbsp<i class="fa fa-chevron-right"></i></button>
    </div>
</section>
<!--Section: Register Form-->
</form>
<style media="screen">
.skin-light .register-form,
.skin-light .logout-form {
max-width: 30rem;
margin-right: auto;
margin-left: auto;
}

.skin-light .logout-form {
display: none;
}

.skin-light .register-form .form-check {
padding-left: 0;
}

.skin-light .md-form.md-outline .form-control.is-valid,
.skin-light .md-form.md-outline .form-control.is-invalid {
background-position: right calc(.375em + .1875rem) center !important;
}
</style>
