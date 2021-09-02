<!--Section: Register Form-->
<section class="mt-4 mb-5 register-form container">

  <form method="post" autocomplete="off" id="adminform">

    <div class="form-row">
      <div class="col">
        <div class="md-form md-outline mt-0">
          <label for="firstName">First Name</label>
          <input type="text" name="firstName" id="firstName" class="form-control">
          <div class="invalid-feedback">
            Enter 4 to 50 characters
          </div>
        </div>
      </div>
      <div class="col">
        <div class="md-form md-outline mt-0">
          <label for="lastName">Last Name</label>
          <input type="text" name="lastName" id="lastName" class="form-control">
          <div class="invalid-feedback">
            Enter 4 to 50 characters
          </div>
        </div>
      </div>
    </div>
    <div class="form-row">
      <div class="col">
        <div class="md-form md-outline mt-0">
          <label for="gender">Select Gender</label>
          <select class="form-control" id="gender" name="gender">
            <option value="" selected>Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
          </select>
          <div class="invalid-feedback">
            Select Gender
          </div>
        </div>
      </div>
      <div class="col">
        <div class="md-form md-outline mt-0">
          <label for="dob">DOB</label>
          <input type="date" name="dob" id="dob" class="form-control">

          <div class="invalid-feedback">
            DOB
          </div>
        </div>
      </div>
    </div>
    <div class="form-row">
      <div class="col">
        <div class="md-form md-outline mt-0">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control">

          <div class="invalid-feedback">
            Enter a valid email address
          </div>
        </div>
      </div>
      <div class="col">
        <div class="md-form md-outline mt-0">
          <label for="phone">Phone</label>
          <input type="text" name="phone" id="phone" class="form-control">

          <div class="invalid-feedback">
            Enter valid phone number
          </div>
        </div>
      </div>
    </div>
    <div class="form-row">
      <div class="col">
        <div class="md-form md-outline mt-0">
          <label for="username">Username</label>
          <input type="text" name="username" id="username" class="form-control">

          <div class="invalid-feedback">
            Enter username
          </div>
        </div>
      </div>
      <div class="col">
        <div class="md-form md-outline mt-0">
          <label for="type">Select User Role</label>
          <select class="form-control" id="type" name="type">
            <option value="user" selected>User</option>
            <option value="bankagent">Blood Bank Representative</option>
            <option value="hospitalagent">Facility Representative</option>
            <option value="admin">Admin</option>
          </select>

          <div class="invalid-feedback">
            Select user role
          </div>
        </div>
      </div>
    </div>
    <div class="form-row">
      <div class="col">
        <div class="md-form md-outline mt-0 mb-2">
          <label data-error="wrong" data-success="right" for="password">Your password</label>
          <input type="password" name="password" id="password" class="form-control">

          <small id="materialRegisterFormPasswordHelpBlock" class="form-text text-muted">
            At least 8 characters
          </small>
        </div>
      </div>
      <div class="col">
        <div class="md-form md-outline mt-0">
          <label data-error="wrong" data-success="right" for="confirmPassword">Confirm password</label>
          <input type="password" name="confirmPassword" id="confirmPassword" class="form-control">
          <input type="text" name="registerAdmin" hidden>

          <div class="invalid-feedback">
            Password confirmation is invalid
          </div>
        </div>
      </div>

    </div>
    <div class="form-row">
      <p id="error_result"></p>
    </div>
    <div class="form-row">
      <button type="button" name="button" class="btn btn-secondary btn-sm cp">Cancel</button>&nbsp&nbsp
      <button type="submit" class="btn btn-primary" id="btn" name="adduser"><i id="lodr"></i>&nbsp Submit&nbsp&nbsp<i class="fa fa-chevron-right"></i></button>
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
