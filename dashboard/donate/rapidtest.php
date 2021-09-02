<?php include '../db/db.php';
  include '../functions/center.php';
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>iDonate | RapidTest</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../vendors/jquery-toast-plugin/jquery.toast.min.css">
  <!-- MATERIAL DESIGN ICONIC FONT -->

  <script src="../../register/js/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="../vendors/select2/select2.min.css">

  <script src="../vendors/select2/select2.min.js"></script>
  <link rel="shortcut icon" href="../images/favicon.ico" />
  <link rel="stylesheet" href="../../register/vendor/date-picker/css/datepicker.min.css">

  <script src="../../register/vendor/date-picker/js/datepicker.js"></script>
  <!-- STYLE CSS -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
		<div class="wrapper">
    <center>
      <img src="../images/favicon.ico" alt="logo">
       <h2 class="text-primary">iDonate Rapid Pass</h2><br>
       <p id="hdr" style="display:none">Step <span id="cnt">1</span> of 5</p>

    </center>
            <form action="submit.php" id="wizard" method="post">
              <!-- SECTION 1 -->
              <h4></h4>
              <section>
                <h2 id="error">Dear <?php echo $_SESSION['fullName']; ?>, Let's get you ready for donation by completing the steps below.</h2>
                <h3>Consent</h3>
                <div class="form-row">
                  <div class="form-holders">
                    <div class="form-check form-groupsa">
                      <input class="form-check-input" type="checkbox" value="yes" id="consent" name="consent[]">
                      <label class="form-check-label" for="consent">
                        I acknowledge that I am donating within 24 hours from now.
                      </label>
                    </div>
                  </div>
                </div>
              </section>
        		<!-- SECTION 2 -->
                <h4></h4>
                <section>
                    <h3>HEALTH QUESTIONNAIRE</h3>
                	<div class="form-row">
                        <div class="form-holder">
                          <p>1. Are you feeling well and in good health today?</p>
                        </div>
                        <div class="funkyradio-primary">
                           <input type="radio" name="qa1" id="ra1a" value="yes" required="required" />
                           <label for="ra1a">Yes</label>
                       </div>
                        <div class="funkyradio-primary">
                           <input type="radio" name="qa1" id="ra1b" value="no" required="required" />
                           <label for="ra1b">No</label>
                       </div>

                	</div>
                  <div class="form-row">
                        <div class="form-holder">
                          <p>2. Have you eaten in the last 6 hours?</p>
                        </div>
                        <div class="funkyradio-primary">
                           <input type="radio" name="qa2" id="ra2a" value="yes" required="required" />
                           <label for="ra2a">Yes</label>
                       </div>
                        <div class="funkyradio-primary">
                           <input type="radio" name="qa2" id="ra2b" value="no" required="required" />
                           <label for="ra2b">No</label>
                       </div>

                	</div>

                  <div class="form-row">
                        <div class="form-holder">
                          <p>3. Have you ever fainted?</p>
                        </div>
                        <div class="funkyradio-primary">
                           <input type="radio" name="qa3" id="ra3a" value="yes" required="required" />
                           <label for="ra3a">Yes</label>
                       </div>
                        <div class="funkyradio-primary">
                           <input type="radio" name="qa3" id="ra3b" value="no" required="required" />
                           <label for="ra3b">No</label>
                       </div>

                	</div>
                  <h3>In the past 6 months have you:</h3>
                  <div class="form-row">
                        <div class="form-holder">
                          <p>4. Been ill, received any treatment or any medication?</p>
                        </div>
                        <div class="funkyradio-primary">
                           <input type="radio" name="qa4" id="ra4a" value="yes" required="required" />
                           <label for="ra4a">Yes</label>
                       </div>
                        <div class="funkyradio-primary">
                           <input type="radio" name="qa4" id="ra4b" value="no" required="required" />
                           <label for="ra4b">No</label>
                       </div>

                	</div>
                  <div class="form-row">
                        <div class="form-holder">
                          <p>5. Had any injections or vaccinations (immunizations)?</p>
                        </div>
                        <div class="funkyradio-primary">
                           <input type="radio" name="qa5" id="ra5a" value="yes" required="required" />
                           <label for="ra5a">Yes</label>
                       </div>
                        <div class="funkyradio-primary">
                           <input type="radio" name="qa5" id="ra5b" value="no" required="required" />
                           <label for="ra5b">No</label>
                       </div>
                	</div>
                  <div class="form-row">
                        <div class="form-holder">
                          <p>6. Female Donors: Have you been pregnant or breast feeding?</p>
                        </div>
                        <div class="funkyradio-primary">
                           <input type="radio" name="qa6" value="yes" id="ra6a"/>
                           <label for="ra6a">Yes</label>
                       </div>
                        <div class="funkyradio-primary">
                           <input type="radio" name="qa6" value="no" id="ra6b"/>
                           <label for="ra6b">No</label>
                       </div>

                  </div>
              </section>

				<!-- SECTION 2 -->
                <h4></h4>
                <section>
                  <h3>In the past 12 months have you:</h3>
                  <div class="form-row">
                        <div class="form-holder">
                          <p>7. Any problems with your heart or lungs e.g. asthma?</p>
                        </div>
                        <div class="funkyradio-primary">
                           <input type="radio" name="qa7" id="ra7a" value="yes" required="required" />
                           <label for="ra7a">Yes</label>
                       </div>
                        <div class="funkyradio-primary">
                           <input type="radio" name="qa7" id="ra7b" value="no" required="required" />
                           <label for="ra7b">No</label>
                       </div>

                  </div>
                	<h3>Do you have or have you ever had:</h3>
                  <div class="form-row">
                        <div class="form-holder">
                          <p>8. Any problems with your heart or lungs e.g. asthma?</p>
                        </div>
                        <div class="funkyradio-primary">
                           <input type="radio" name="qa8" id="ra8a" value="yes" required="required" />
                           <label for="ra8a">Yes</label>
                       </div>
                        <div class="funkyradio-primary">
                           <input type="radio" name="qa8" id="ra8b" value="no" required="required" />
                           <label for="ra8b">No</label>
                       </div>

                  </div>
                  <div class="form-row">
                        <div class="form-holder">
                          <p>9. A bleeding condition or a blood disease?</p>
                        </div>
                        <div class="funkyradio-primary">
                           <input type="radio" name="qa9" id="ra9a" value="yes" required="required" />
                           <label for="ra9a">Yes</label>
                       </div>
                        <div class="funkyradio-primary">
                           <input type="radio" name="qa9" id="ra9b" value="no" required="required" />
                           <label for="ra9b">No</label>
                       </div>

                  </div>
                  <div class="form-row">
                        <div class="form-holder">
                          <p>10. Any type of cancer?</p>
                        </div>
                        <div class="funkyradio-primary">
                           <input type="radio" name="qa10" id="ra10a" value="yes" required="required" />
                           <label for="ra10a">Yes</label>
                       </div>
                        <div class="funkyradio-primary">
                           <input type="radio" name="qa10" id="ra10b" value="no" required="required" />
                           <label for="ra10b">No</label>
                       </div>

                  </div>
                  <div class="form-row">
                        <div class="form-holder">
                          <p>11. Diabetes, epilepsy or TB?</p>
                        </div>
                        <div class="funkyradio-primary">
                           <input type="radio" name="qa11" id="ra11a" value="yes" required="required" />
                           <label for="ra11a">Yes</label>
                       </div>
                        <div class="funkyradio-primary">
                           <input type="radio" name="qa11" id="ra11b" value="no" required="required" />
                           <label for="ra11b">No</label>
                       </div>

                  </div>
                  <div class="form-row">
                        <div class="form-holder">
                          <p>12. Any other long term illness?</p>
                        </div>
                        <div class="funkyradio-primary">
                           <input type="radio" name="qa12" id="ra12a" value="yes" required="required" />
                           <label for="ra12a">Yes</label>
                       </div>
                        <div class="funkyradio-primary">
                           <input type="radio" name="qa12" id="ra12b" value="no" required="required" />
                           <label for="ra12b">No</label>
                       </div>

                  </div>
                </section>
                <!-- SECTION 2 -->
                        <h4></h4>
                        <section>
                          <h3>RISK ASSESSMENT QUESTIONNAIRE</h3>
                          <h3>In the past 12 months have you:</h3>
                          <div class="form-row">
                                <div class="form-holder">
                                  <p>1. Received or given money, goods or favours in exchange for sexual activities?</p>
                                </div>
                                <div class="funkyradio-primary">
                                   <input type="radio" name="qb1" id="rb1a" value="yes" required="required" />
                                   <label for="rb1a">Yes</label>
                               </div>
                                <div class="funkyradio-primary">
                                   <input type="radio" name="qb1" id="rb1b" value="no" required="required" />
                                   <label for="rb1b">No</label>
                               </div>

                          </div>
                          <div class="form-row">
                                <div class="form-holder">
                                  <p>2. Had sexual activity with a person whose background you do not know?</p>
                                </div>
                                <div class="funkyradio-primary">
                                   <input type="radio" name="qb2" id="rb2a" value="yes" required="required" />
                                   <label for="rb2a">Yes</label>
                               </div>
                                <div class="funkyradio-primary">
                                   <input type="radio" name="qb2" id="rb2b" value="no" required="required" />
                                   <label for="rb2b">No</label>
                               </div>

                          </div>
                          <div class="form-row">
                                <div class="form-holder">
                                  <p>3. Been raped or sodomized?</p>
                                </div>
                                <div class="funkyradio-primary">
                                   <input type="radio" name="qb3" id="rb3a" value="yes" required="required" />
                                   <label for="rb3a">Yes</label>
                               </div>
                                <div class="funkyradio-primary">
                                   <input type="radio" name="qb3" id="rb3b" value="no" required="required" />
                                   <label for="rb3b">No</label>
                               </div>

                          </div>
                          <div class="form-row">
                                <div class="form-holder">
                                  <p>4. Had a stab wound or had an accidental needle stick injury e.g. injection needle?</p>
                                </div>
                                <div class="funkyradio-primary">
                                   <input type="radio" name="qb4" id="rb4a" value="yes" required="required" />
                                   <label for="rb4a">Yes</label>
                               </div>
                                <div class="funkyradio-primary">
                                   <input type="radio" name="qb4" id="rb4b" value="no" required="required" />
                                   <label for="rb4b">No</label>
                               </div>

                          </div>
                          <div class="form-row">
                                <div class="form-holder">
                                  <p>5. Had any tattooing or body piercing e.g. ear piercing?</p>
                                </div>
                                <div class="funkyradio-primary">
                                   <input type="radio" name="qb5" id="rb5a" value="yes" required="required" />
                                   <label for="rb5a">Yes</label>
                               </div>
                                <div class="funkyradio-primary">
                                   <input type="radio" name="qb5" id="rb5b" value="no" required="required" />
                                   <label for="rb5b">No</label>
                               </div>

                          </div>

                        </section>
                        <h4></h4>
                        <section>
                          <div class="form-row">
                                <div class="form-holder">
                                  <p>6. Had a sexually transmitted disease (STD)?</p>
                                </div>
                                <div class="funkyradio-primary">
                                   <input type="radio" name="qb6" id="rb6a" value="yes" required="required" />
                                   <label for="rb6a">Yes</label>
                               </div>
                                <div class="funkyradio-primary">
                                   <input type="radio" name="qb6" id="rb6b" value="no" required="required" />
                                   <label for="rb6b">No</label>
                               </div>

                          </div>
                          <div class="form-row">
                                <div class="form-holder">
                                  <p>7. Live with or had sexual contact with someone with yellow eyes or yellow skin?</p>
                                </div>
                                <div class="funkyradio-primary">
                                   <input type="radio" name="qb7" id="rb7a" value="yes" required="required" />
                                   <label for="rb7a">Yes</label>
                               </div>
                                <div class="funkyradio-primary">
                                   <input type="radio" name="qb7" id="rb7b" value="no" required="required" />
                                   <label for="rb7b">No</label>
                               </div>

                          </div>
                          <div class="form-row">
                                <div class="form-holder">
                                  <p>8. Had sexual activity with anyone besides your regular sex partner?</p>
                                </div>
                                <div class="funkyradio-primary">
                                   <input type="radio" name="qb8" id="rb8a" value="yes" required="required" />
                                   <label for="rb8a">Yes</label>
                               </div>
                                <div class="funkyradio-primary">
                                   <input type="radio" name="qb8" id="rb8b" value="no" required="required" />
                                   <label for="rb8b">No</label>
                               </div>

                          </div>
                          <h3>Have you ever:</h3>
                          <div class="form-row">
                                <div class="form-holder">
                                  <p>9. Had yellow eyes or yellow skin?</p>
                                </div>
                                <div class="funkyradio-primary">
                                   <input type="radio" name="qb9" id="rb9a" value="yes" required="required" />
                                   <label for="rb9a">Yes</label>
                               </div>
                                <div class="funkyradio-primary">
                                   <input type="radio" name="qb9" id="rb9b" value="no" required="required" />
                                   <label for="rb9b">No</label>
                               </div>

                          </div>
                          <div class="form-row">
                                <div class="form-holder">
                                  <p>10.  Injected yourself or been injected, besides in a health facility?</p>
                                </div>
                                <div class="funkyradio-primary">
                                   <input type="radio" name="qb10" id="rb10a" value="yes" required="required" />
                                   <label for="rb10a">Yes</label>
                               </div>
                                <div class="funkyradio-primary">
                                   <input type="radio" name="qb10" id="rb10b" value="no" required="required" />
                                   <label for="rb10b">No</label>
                               </div>

                          </div>
                          <div class="form-row">
                                <div class="form-holder">
                                  <p>11. Used non-medical drugs such as Marijuana, Cocaine etc?</p>
                                </div>
                                <div class="funkyradio-primary">
                                   <input type="radio" name="qb11" id="rb11a" value="yes" required="required" />
                                   <label for="rb11a">Yes</label>
                               </div>
                                <div class="funkyradio-primary">
                                   <input type="radio" name="qb11" id="rb11b" value="no" required="required" />
                                   <label for="rb11b">No</label>
                               </div>

                          </div>
                          <div class="form-row">
                                <div class="form-holder">
                                  <p>12. Have you or your partner been tested for HIV?</p>
                                </div>
                                <div class="funkyradio-primary">
                                   <input type="radio" name="qb12" id="rb12a" value="yes" required="required" />
                                   <label for="rb12a">Yes</label>
                               </div>
                                <div class="funkyradio-primary">
                                   <input type="radio" name="qb12" id="rb12b" value="no" required="required" />
                                   <label for="rb12b">No</label>
                               </div>

                          </div>
                        </section>
                <!-- SECTION 4 -->
                <h4></h4>
                <section>
                  <h3>Lastly,...</h3>
                    <h3>DECLARATION (Please read this before you submit the form)</h3>
                    <p>I hereby consent to the following</p><br><br>
                    <div class="const">
                        <ul id='cli'>
                          <li><img width="30px" height="30px" src="../images/clipboard.jpeg" >&nbspI declare that I have answered all the questions truthfully and accurately.
                        <br><br></li><li><img width="30px" height="30px" src="../images/clipboard.jpeg" >&nbspI understand that my blood will be tested for HIV, Hepatitis B & C, and Syphilis and the results of my tests may be obtained from my donations tab or the nearest center from the donation location.
                        <br><br></li><li><img width="30px" height="30px" src="../images/clipboard.jpeg" >&nbspI understand that should any of the screening tests give a reactive result, I will be contacted by use any communication medium(s) to send me <b>important information</b>. Such medium(s) shall include but not limited to e-mail, post office, mobile telephone and/or fixed telephone, and offered counselling to make an informed decision about further confirmatory testing and management.
                        <div class="form-row">
                          <div class="form-holders">
                            <div class="form-check form-groupsa">
                              <input class="form-check-input" type="checkbox" value="yes" id="consent2" name="consent2" required>
                              <label class="form-check-label" for="consent">
                                I agree to the above statements.
                              </label>
                            </div>
                          </div>
                        </div>


                        </div>
                      </section>
                      <span id="error_result"></span>
                  </form>
                    </div>

		</div>
  <p></p><br><br>
		<!-- JQUERY STEP -->
		<script src="../../register/js/jquery.steps.js"></script>

		<script src="js/main.js"></script>
    <script src="../../register/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="../../register/vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="../../register/vendor/jquery-steps/jquery.steps.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="../vendors/jquery-toast-plugin/jquery.toast.min.js"></script>
    <!-- End plugin js for this page-->
    <!-- Custom js for this page-->
    <script src="../js/toastDemo.js"></script>
    <script src="../js/desktop-notification.js"></script>
</body>
</html>
