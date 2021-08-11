<form class="pt-3" id="wizardb" action="../../login/login_action.php">
<div class="form-row">
  <div class="form-holder">
    <i class="zmdi zmdi-email"></i>
    <input type="text" class="form-control" id="email2" name="email" placeholder="Username/Email">
  </div>
</div>

<div class="form-row">
  <div class="form-holder password">
    <i class="zmdi zmdi-eye toggle-password" id="eyepwd"></i>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    <input type="text" name="login" value="" hidden>
  </div>

</div>
<p id="divMayus" style="visibility:hidden;margin-top:5px;color:brown;">CapsLock is on!</p>

  <div class="mt-4">
    <button type="submit" class="btn btn-block btn-primary btn-md font-weight-medium auth-form-btns" id="login"><i id="lodr"></i>&nbspSIGN IN&nbsp&nbsp<i class="fa fa-chevron-right"></i></button>
  </div>
  <div class="align-items-right" style="align:right!important; margin-top:5px;">
    <a href="./reset.php" class="auth-link text-right text-muted">Forgot password?</a>
  </div>
  <div class="mb-2">
    <div class="wells">
      <center><p>or</p><div class="g-signin2" data-onsuccess="onSignIn" data-width="240" data-height="50" data-longtitle="true"></div></center>
    </div>
  </div>
  <div class="text-center mt-4 font-weight-light">
    Don't have an account? <a href="../register" class="text-primary">Register</a>
  </div>
</form>
