<?php include 'header.php' ?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Contact</h2>
          <ol>
            <li><a href="../index.php">Home</a></li>
            <li>Contact</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p><b>Head Office: </b>Ngong Road, Nairobi, Kenya</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@idonate.org</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+254 7927 56008</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">
            <center>
              <h4>Contact Form</h4>
              <p>Fill this form to leave a message</p>
            </center>
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-left"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>


    </section><!-- End Contact Section -->
    <div class="container">
      <div><hr>
        <center><h4>Our Donation Centers</h4></center>
        <iframe style="border:0; width: 100%; height: 90vh;" src="https://www.google.com/maps/d/u/0/embed?mid=1xHnHoZUsiK6zDIAQhCiDOUxVg6hDtywo" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
    <p></p>
  </main><!-- End #main -->
  <script>
    document.title = "iDonate | Contact Us";
    $(".nsd").removeClass("active");
    $("#contact").addClass("active");
  </script>
  <!-- ======= Footer ======= -->
  <?php include 'footer.php'; ?>
