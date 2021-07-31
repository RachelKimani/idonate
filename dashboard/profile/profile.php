<div class="containers light-style flex-grow-1 container-p-y">

    <div class="card overflow-hidden">

      <div class="row no-gutters row-bordered row-border-light container">

        <div class="col-md-12 container" style="margin-bottom: 25px;" >
          <div class="head card-headenr" style="position:relative;margin:auto">
            <h2 class="font-weight-bold py-3 mb-4 text-center">
              Account settings
            </h2>

              <ul class="nav nav-tabs row-bordered row-border-light">
                <li><a class="list-group-item list-group-item-action active" data-toggle="tab" href="#account-general">General</a></li>
                <li><a class="list-group-item list-group-item-action" data-toggle="tab" href="#account-info">Info</a></li>
                <li><a class="list-group-item list-group-item-action" data-toggle="tab" href="#account-change-password">Change password</a></li>
                <li><a class="list-group-item list-group-item-action" data-toggle="tab" href="#account-social-links">Medical Records</a></li>
                <li><a class="list-group-item list-group-item-action" data-toggle="tab" href="#account-connections">Connections</a></li>
                <li><a class="list-group-item list-group-item-action" data-toggle="tab" href="#account-notifications">Notifications</a></li>
                <li><a class="list-group-item list-group-item-action" data-toggle="tab" href="#appear">Appearance</a></li>
              </ul>
          </div>
          <div class="tab-content" id="tab-content" style="overflow-y: auto; height:450px;">
            <div class="tab-pane fade active show" id="account-general">
          <center><h6 class="mb-4">Profile Picture</h6>
            <form id="upload-image-form" action="" method="post" enctype="multipart/form-data">
              <input type="text" name="uid" value="<?php echo $details['userID']; ?>" hidden>
              <div class="card-body mediam align-items-center">
                  <div id="image-preview-div">
                <img id="preview-img" src="<?php if(isset($_SESSION['img'])){
                  if($_SESSION['img']!=''){
                    echo $_SESSION['img'];
                  }else {
                    echo "../../assets/img/user.png";
                  }
                }else {
                  echo "../../assets/img/user.png";
                }
                 ?>" alt="" class="d-block ui-w-80">
               </div>

              </div>
              <div class="card-body media align-items-center">
                <div class="media-body ml-4" >
                  <label class="btn btn-outline-primary">
                    Upload new photo
                    <input type="file" name="file" id="file" required class="account-settings-fileinput">
                  </label> &nbsp;
                    <button class="btn btn-primary" id="upload-button" type="submit" disabled>Save</button>

                  <div class="text-muted small mt-1">Allowed JPEG, PNG, JPG, GIF, WEBP, TIFF, JFIF, APNG,AVIF or SVG+XML. Max size of <span id="max-size"></span> KB.</div>

                  <div class="alert alert-info" id="loading" style="display: none;" role="alert">
                    Uploading image...
                    <div class="progress">
                      <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                      </div>
                    </div>
                  </div>
                  <div id="message"></div>
                </div>
              </div>
              <hr class="border-light m-0">
            </form></center>
            <h6 class="mb-4">Details</h6>
              <form id="general" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-holder form-group">
                  <i class="zmdi zmdi-account"></i>
                  <label class="form-label">Username</label>
                  <input type="text" class="form-control mb-1" value="<?php echo $details['username']; ?>">
                </div>
                <div class="rrow">

                      <div class="form-holder form-group">
                        <label class="form-label">First Name</label>
                          <i class="zmdi zmdi-account"></i>
                          <input type="text" class="form-control  mb-1" placeholder="First Name" id="firstName" name="firstName" value="<?php echo $details['firstName']; ?>" required readonly>
                      </div>
                      <div class="form-holder form-group">
                        <label class="form-label">Last Name</label>
                          <i class="zmdi zmdi-account"></i>
                          <input type="text" class="form-control  mb-1" placeholder="Last Name" id="lastName" name="lastName" value="<?php echo $details['lastName']; ?>" required readonly>
                      </div>
                </div>
                <div class="form-holder form-group">
                  <i class="zmdi zmdi-account"></i>
                  <label class="form-label">E-mail</label>
                  <input type="text" class="form-control mb-1" value="<?php echo $details['email']; ?>" readonly>
                  <input type="text" name="suinfo" value="" hidden>

                </div>
              </div>
              <input type="text" name="uid" id="uid1" value="<?php echo $details['userID']; ?>" hidden>
              <div id="message1"></div>
              <div class="text-left mt-3">
                <button type="submit" id='submitGen' name="submitGen" class="btn btn-primary">Save changes &nbsp <i class='fa fa-save'></i></button>&nbsp;
                <button type="button" class="btn btn-default">Cancel</button>
              </div>
            </form>
            </div>
            <div class="tab-pane fade" id="account-change-password">
              <form method="post" id="chpwd">
                <input type="text" name="uid" id="uid" value="<?php echo $details['userID']; ?>" hidden>
              <div class="card-body pb-2">

                <div class="form-holder form-group">
                  <i class="zmdi zmdi-eye"></i>
                  <label class="form-label">Current password</label>
                  <input type="password" name='currPwd' id="currPwd" class="form-control" placeholder="Current Password">
                </div>

                <div class="form-holder form-group">
                  <i class="zmdi zmdi-eye"></i>
                  <label class="form-label">New password</label>
                  <input type="password" name="pwd" id="pwd" class="form-control" placeholder="New Password">
                </div>

                <div class="form-holder form-group">
                  <i class="zmdi zmdi-eye"></i>
                  <label class="form-label">Repeat new password</label>
                  <input type="password" name='cpwd' id='cpwd' class="form-control" placeholder="Confirm Password">
                  <input type="text" name="npwd" value="" hidden>
                </div>

              </div>
              <div id="message3"></div>
              <div class="text-left mt-3">
                <button type="submit" id='changePwd' name="changePwd" class="btn btn-primary">Save changes &nbsp <i class='fa fa-save'></i></button>&nbsp;
                <button type="button" class="btn btn-default">Cancel</button>
              </div>
            </form>
            </div>
            <div class="tab-pane fade" id="account-info">
              <form method="post" id="acInfo">
              <div class="card-body pb-2">
                <div class="form-holder form-group">
                  <i class="zmdi zmdi-calender"></i>
                  <label class="form-label">Dob</label>
                  <input type="text" class="form-control" name="dob" id="dob" value="<?php echo $details['dob']; ?>" placeholder="Enter dob" <?php //if($details['dob']!='0000-00-00'){ echo "readonly";} ?>>
                  <script>
                  var dates = new Date();
                  dates.setFullYear(dates.getFullYear() - 16)
                  $("#dob").datepicker(
                      {
                        //minDate: new Date(1900,1-1,1),
                        maxDate: dates,
                        dateFormat: 'yyyy-mm-dd',
                        //endDate: new Date(),
                        changeMonth: true,
                        changeYear: true,
                        yearRange: '-110:-16'
                      }
                    );
                  </script>
                </div>

                <div class="form-holder form-group">
                  <i class="zmdi zmdi-account"></i>
                  <label class="form-label">Gender</label>
                  <select class="custom-select" name="gender" disabled>
                    <?php if(isset($_SESSION['gender'])){
                      if ($_SESSION['gender']=='male') {
                        echo "<option  value='male' selected=''>Male</option>
                        <option value='female'>Female</option>";
                      } else {
                        echo "<option value='male' >Male</option>
                        <option  value='female' selected=''>Female</option>";
                      }
                    } ?>
                  </select>
                </div>


              </div>
              <hr class="border-light m-0">
              <div class="card-body pb-2">

                <h6 class="mb-4">Contacts</h6>
                <div class="form-holder form-group">
                  <i class="zmdi zmdi-account"></i>
                  <label class="form-label">Phone</label>
                  <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $details['phone']; ?>" placeholder="Enter phone number">
                  <div class="alert alert-warning mt-3">
                    Your number is not verified.<br>
                    <a href="javascript:void(0)" class="text-primary">Verify Now</a>
                  </div>
                </div>

              </div>
              <hr class="border-light m-0">
              <div class="card-body pb-2">

                <h6 class="mb-4">Address</h6>
                <div class="form-holder form-group">
                  <i class="zmdi zmdi-account"></i>
                  <i class="zmdi zmdi-map"></i>
                  <input autocomplete="new-password" type="text" class="form-control" placeholder="Address" id="address" name="address" value="<?php echo $details['address']; ?>" placeholder="Enter Address">


                </div>

                <input type="text" name="uid" id="uid2" value="<?php echo $details['userID']; ?>" hidden>
                <input type="text" name="sinfo" value="" hidden>
                <div id="message2"></div>
              </div>
              <div class="text-left mt-3">
                <button type="submit" id='submitInfo' name="submitInfo" class="btn btn-primary">Save changes &nbsp <i class='fa fa-save'></i></button>&nbsp;
                <button type="button" class="btn btn-default">Cancel</button>
              </div>
            </form>
            </div>
            <div class="tab-pane fade" id="account-social-links">

              <div class="card-body pb-2">
                  <div class="rrow">
                <form method="post" id="bloodGroup">
                  <h6 class="mb-4">Medical Information</h6>
                <div class="form-holder form-group">
                  <label for="id_label_single">Blood Group
                  </label>
                  </diV>
                  <div class="form-holder form-group">
                  <select class="js-example-basic-single w-100" id="id_label_single" name="bloodtype">
                    <option value="A+">A+ (A RhD positive)</option>
                    <option value="A-">A- (A RhD negative)</option>
                    <option value="B+">B+ (B RhD positive)</option>
                    <option value="B-">B- (B RhD negative)</option>
                    <option value="O+">O+ (O RhD positive)</option>
                    <option value="O-">O- (O RhD negative)</option>
                    <option value="AB+">AB+ (AB RhD positive)</option>
                    <option value="AB-">AB- (AB RhD negative)</option>
                  </select>
                </diV>


                      <div class="form-holder form-group">
                        <label class="form-label">Weigtht(KG(s))</label>
                          <i class="zmdi zmdi-account"></i>
                          <input type="text" class="form-control  mb-1" placeholder="Weigtht(KG(s))" id="weight" name="weight" value="<?php echo $medic['weight']; ?>" required>
                      </div>
                      <div class="form-holder form-group">
                        <label class="form-label">Heigtht(Metres)</label>
                          <i class="zmdi zmdi-account"></i>
                          <input type="text" class="form-control  mb-1" placeholder="Heigtht(Metres)" id="height" name="height" value="<?php echo $medic['height']; ?>" required>
                      </div>
                      <input type="text" name="uid" id="uid4" value="<?php echo $details['userID']; ?>" hidden>
                      <input type="text" name="bgrp" value="" hidden>
                      <div id="message4"></div>
                      <div class="text-left mt-3">
                        <button type="submit" id='submitGrp' name="submitGrp" class="btn btn-primary">Save changes &nbsp <i class='fa fa-save'></i></button>&nbsp;
                        <button type="button" class="btn btn-default">Cancel</button>
                      </div>
                    </form><p></p><br>
                    <hr class="border-light m-0"><br>
                      <div class="form-holder form-group">
                        <center><h6 class="mb-4">Medical Report</h6>
                        <label class="form-label">Special Notes</label></center>
                          <i class="zmdi zmdi-account"></i>
                          <textarea class="form-control  mb-1" placeholder="Notes" id="specialNotes" name="specialNotes"required>
                            <?php   ob_start();                      // start capturing output
                              include('medtemplate.php');   // execute the file
                              $bod = ob_get_contents();    // get the contents from the buffer
                              ob_end_clean();
                              echo $bod;
                               ?>
                          </textarea>
                      </div>
                </div>
                </div>

              </div>
            <div class="tab-pane fade" id="account-connections">
              <div class="card-body">
                <h5 class="mb-2">
                  <a href="javascript:void(0)" class="float-right text-muted text-tiny"><i class="ion ion-md-close"></i> Remove</a>
                  <i class="ion ion-logo-google text-google"></i>
                  You are connected to Google:
                </h5><?php echo $details['email']; ?>
              </div>
              <hr class="border-light m-0">
              <div class="card-body">
                <button type="button" class="btn btn-facebook">Connect to <strong>Facebook</strong></button>
              </div>
            </div>
            <div class="tab-pane fade" id="account-notifications">
              <form method="post" id='notifications'>
              <div class="card-body pb-2">

                <h6 class="mb-4">Activity</h6>
                <div class="form-holder form-group">
                  <i class="zmdi zmdi-account"></i>
                  <label class=form-check-label custom-control-label>
                    <input type="checkbox" class=""form-check-input"" checked="">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">Email me when someone logs into my account</span>
                  </label>
                </div>
                <div class="form-holder form-group">
                  <i class="zmdi zmdi-account"></i>
                  <label class=form-check-label custom-control-label>
                    <input type="checkbox" class=""form-check-input"">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">Email me when I change my password</span>
                  </label>
                </div>
              </div>
              <hr class="border-light m-0">
              <div class="card-body pb-2">

                <h6 class="mb-4">Application</h6>

                <div class="form-holder form-group">
                  <i class="zmdi zmdi-account"></i>
                  <label class=form-check-label custom-control-label>
                    <input type="checkbox" class=""form-check-input"" checked="">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">Alert me of blood drives near me.</span>
                  </label>
                </div>
                <div class="form-holder form-group">
                  <i class="zmdi zmdi-account"></i>
                  <label class=form-check-label custom-control-label>
                    <input type="checkbox" class=""form-check-input"">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">Alert me when there's urgent blood needed for my group</span>
                  </label>
                </div>
                <div class="form-holder form-group">
                  <i class="zmdi zmdi-account"></i>
                  <label class=form-check-label custom-control-label>
                    <input type="checkbox" class=""form-check-input"" checked="">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">Alert me when my donation is used</span>
                  </label>
                </div>
                <div class="form-holder form-group">
                  <i class="zmdi zmdi-account"></i>
                  <label class=form-check-label custom-control-label>
                    <input type="checkbox" class=""form-check-input"" checked="">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">Allow receipients to view my details</span>
                  </label>
                </div>

              </div>
              <div class="text-left mt-3">
                <button type="submit" id='submitNot' name="submitNot" class="btn btn-primary">Save changes &nbsp <i class='fa fa-save'></i></button>&nbsp;
                <button type="button" class="btn btn-default">Cancel</button>
              </div>
            </form>
            </div>
            <div class="tab-pane fade" id="appear">
              <form method="post" id='appForm'>
              <div class="card-body pb-2">

                <h6 class="mb-4">Appearance</h6>

                <div class="custom-control custom-switch">
                  <span style="margin-right:8px;"><i class="fa fa-sun-o"></i>&nbsp</span>
                  <input style="position:relative;" type="checkbox" class="custom-control-input" id="customSwitch1" onclick="toggle()">
                  <label class="custom-control-label" for="customSwitch1"><i class="fa fa-moon-o"></i>Toggle Dark Mode</label>
                </div>
              </div>
            </form>
            </div>

          </div>
        </div>
      </div>
    </div>



  </div>
  <style media="screen">
  div#image-preview-div {
    display: flex;
    justify-content: center;
  }

  #preview-img {
    width: 200px;
  }
  input.form-check-input{
    position: relative !important;
    z-index: 12;
    background-color: #d9232d;
    border-color: #d9232d;
    color: white;
  }
  .custom-control-input:checked ~ .custom-control-label::before {
    background-color: #d9232d;
    border-color: #d9232d;
}
.list-group-item.active {
    border-color: white !important;
}
  </style>
