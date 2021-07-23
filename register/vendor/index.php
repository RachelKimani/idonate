<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>iDonate | Register</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../dashboard/vendors/feather/feather.css">
  <link rel="stylesheet" href="../dashboard/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../dashboard/vendors/css/vendor.bundle.base.css">
  <!-- MATERIAL DESIGN ICONIC FONT -->
  <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.css">

  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <link rel="shortcut icon" href="../dashboard/images/favicon.ico" />
  <link rel="stylesheet" href="vendor/date-picker/css/datepicker.min.css">

  <!-- STYLE CSS -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
		<div class="wrapper">
    <center>
      <img src="../dashboard/images/favicon.ico" alt="logo">
       <h2 class="text-primary">Sign Up</h2>
    </center>
            <form action="" id="wizard">
        		<!-- SECTION 1 -->
                <h4></h4>
                <section>
                    <h3>Profile</h3>
                	<div class="form-row">
                        <div class="form-holder">
                            <i class="zmdi zmdi-account"></i>
                            <input type="text" class="form-control" placeholder="First Name">
                        </div>
                        <div class="form-holder">
                            <i class="zmdi zmdi-account"></i>
                            <input type="text" class="form-control" placeholder="Last Name">
                        </div>
                	</div>
                    <div class="form-row">
                        <div class="form-holder">
                            <i class="zmdi zmdi-email"></i>
                            <input type="text" class="form-control" placeholder="Email Address">
                        </div>
                        <div class="form-holder">
                            <i class="zmdi zmdi-smartphone-android"></i>
                            <input type="text" class="form-control" placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="form-row">
                      <div class="form-holder">
                          <input type="date" class="form-control"  id="datepicker" placeholder="DOB">
                      </div>
                      <script>
                      $(function() {
                        $("#datepicker").datepicker(
                          {
                            minDate: new Date(1900,1-1,1), maxDate: '-15Y',
                            dateFormat: 'dd/mm/yy',
                            changeMonth: true,
                            changeYear: true,
                            yearRange: '-110:-15'
                          }
                        );
                        });
                      </script>
                        <div class="form-holder password">
                            <i class="zmdi zmdi-eye"></i>
                            <input type="password" class="form-control" placeholder="Gender">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-holder">
                            <i class="zmdi zmdi-map"></i>
                            <input type="text" class="form-control" placeholder="Address">
                        </div>
                        <div class="form-group">

                          <div class="form-holder">
                              <i class="zmdi zmdi-pin-drop"></i>
                              <input type="text" class="form-control" placeholder="City" disabled>
                          </div>
                            <div class="form-holder">
                                <i class="zmdi zmdi-pin"></i>
                                <input type="text" class="form-control" placeholder="Country" disabled>
                            </div>
                        </div>
                    </div>


                </section>

				<!-- SECTION 2 -->
                <h4></h4>
                <section>
                	<h3>Account</h3>
                  <div class="form-row">
                      <div class="form-holder">
                          <i class="zmdi zmdi-email"></i>
                          <input type="text" class="form-control" placeholder="Email Address">
                      </div>
                      <div class="form-holder">
                          <i class="zmdi zmdi-account-box-o"></i>
                          <input type="text" class="form-control" placeholder="Username">
                      </div>
                  </div>
                    <div class="form-row">
                      <div class="form-holder password">
                          <i class="zmdi zmdi-eye"></i>
                          <input type="password" class="form-control" placeholder="Enter Password">
                      </div>
                        <div class="form-holder password">
                            <i class="zmdi zmdi-eye"></i>
                            <input type="password" class="form-control" placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-holder w-100">
                            <input type="password" class="form-control" placeholder="Enter the Current Password">
                            <i class="zmdi zmdi-lock-open"></i>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-holder w-100">
                            <input type="password" class="form-control" placeholder="New Password">
                            <i class="zmdi zmdi-lock-open"></i>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-holder w-100">
                            <input type="password" class="form-control" placeholder="Confirm New Password">
                            <i class="zmdi zmdi-lock-open"></i>
                        </div>
                    </div>
                </section>

                <!-- SECTION 3 -->
                <h4></h4>
                <section>
                    <h3 style="margin-bottom: 16px;">My Cart</h3>
                    <table cellspacing="0" class="table-cart shop_table shop_table_responsive cart woocommerce-cart-form__contents table" id="shop_table">
                        <thead>
                            <th >&nbsp;</th>
                            <th style="text-align: left;">Product Detail</th>
                            <th >Quantity</th>
                            <th >Total Price</th>
                            <th >&nbsp;</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="product-thumb">
                                    <a href="#" class="item-thumb">
                                        <img src="images/item-1.jpg" alt="">
                                    </a>
                                </td>
                                <td class="product-detail" data-title="Product Detail">
                                    <div>
                                        <a href="#">Cherry</a>
                                        <span>$</span>
                                        <span>35</span>
                                    </div>
                                </td>
                                <td class="product-quantity" data-title="Quantity">
                                    <div class="quantity">
                                        <span class="plus">+</span>
                                        <input type="number" id="quantity_5b4f198d958e1" class="input-text qty text" step="1" min="0" max="" name="cart[5934c1ec0cd31e12bd9084d106bc2e32][qty]" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" />
                                        <span class="minus">-</span>
                                    </div>
                                </td>
                                <td class="total-price" data-title="Total Price">
                                    <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol">$</span>
                                        70
                                    </span>
                                </td>
                                <td class="product-remove">
                                    <a href="#">
                                        <i class="zmdi zmdi-close-circle-o"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="product-thumb">
                                    <a href="#" class="item-thumb">
                                        <img src="images/item-2.jpg" alt="">
                                    </a>
                                </td>
                                <td class="product-detail" data-title="Product Detail">
                                    <div>
                                         <a href="#">Mango</a>
                                        <span>$</span>
                                        <span>2035</span>
                                    </div>
                                </td>
                                <td class="product-quantity" data-title="Quantity">
                                    <div class="quantity">
                                        <span class="plus">+</span>
                                        <input type="number" id="quantity_5b4f198d958e1" class="input-text qty text" step="1" min="0" max="" name="cart[5934c1ec0cd31e12bd9084d106bc2e32][qty]" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" />
                                        <span class="minus">-</span>
                                    </div>
                                </td>
                                <td class="total-price" data-title="Total Price">
                                    <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol">$</span>
                                        20
                                    </span>
                                </td>
                                <td class="product-remove">
                                    <a href="#">
                                        <i class="zmdi zmdi-close-circle-o"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>

                <!-- SECTION 4 -->
                <h4></h4>
                <section>
                    <h3>Cart Totals</h3>
                    <div class="cart_totals">
                        <table cellspacing="0" class="shop_table shop_table_responsive">
                            <tr class="cart-subtotal">
                                <th>Subtotal</th>
                                <td data-title="Subtotal">
                                    <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol">$</span>110.00
                                    </span>
                                </td>
                            </tr>
                            <tr class="cart-subtotal shipping">
                                <th>Shipping:</th>
                                <td data-title="Subtotal">
                                    <div class="checkbox">
                                        <label>
                                            <input type="radio" name="shipping" checked> Free Shipping
                                            <span class="checkmark"></span>
                                        </label>
                                        <label>
                                            <input type="radio" name="shipping"> Local pickup: <span>$</span><span>0.00</span>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <span>Calculate shipping</span>
                                </td>
                            </tr>
                            <tr class="cart-subtotal">
                                <th>Service <span>(estimated for Vietnam)</span></th>
                                <td data-title="Subtotal">
                                    <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol">$</span>5.60
                                    </span>
                                </td>
                            </tr>
                            <tr class="order-total border-0">
                                <th>Total</th>
                                <td data-title="Total">
                                    <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol">$</span>64.69
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </div>

                </section>
            </form>
		</div>

		<script src="js/jquery-3.3.1.min.js"></script>

		<!-- JQUERY STEP -->
		<script src="js/jquery.steps.js"></script>

		<script src="js/main.js"></script>
    <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="vendor/jquery-steps/jquery.steps.min.js"></script>
    <script src="vendor/minimalist-picker/dobpicker.js"></script>
</body>
</html>
