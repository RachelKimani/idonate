<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>iDonate</title>
  <meta content="iDonate" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.ico" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <script src="../assets/js/jquery-3.3.1.min.js"></script>

  <!-- Google Fonts
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
-->
  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <style media="screen">
    .alt-color {
      background-color: transparent !important;
    }
    @media only screen and (min-width: 992px) {
      nav#navbar.navbar.acolor a.acl,nav#navbar.navbar.acolor .bi.mobile-nav-toggle.bi-list{
        color:white;
      }
    }
    nav#navbar.navbar.acolor i.bi.bi-list.mobile-nav-toggle{
      color:white;
    }

    nav#navbar.navbar.acolor a.acl.active{
      font-weight: bolder;
    }
    nav#navbar.navbar.acolor a.acl:hover{
      color:red;
    }
    a#acl.loga{
      color:white;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center navbars">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a class="loga" href="../index.php">iDonate</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="../index.php" class="logo me-auto"><img src="../assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="../index.php" class="nsd" class="acl" id="home">Home</a></li>

          <li class="dropdown"><a href="#" class="acl" class="nsd" id="about"><span>About</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="about.php" class="nsd" id="abt">About</a></li>

              <li><a href="testimonials.php" class="nsd" id="testimonials">Testimonials</a></li>
              <li><a href="locations.php" class="nsd" id="location">Locations</a></li>

              <li class="dropdown"><a href="#" ><span>Events</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Blood Drives</a></li>
                  <li><a href="#">Conferences</a></li>
                  <li><a href="#">Road Shows</a></li>
                  <li><a href="#">Campaigns</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="portfolio.php" class="acl" class="nsd" id="gallery">Gallery</a></li>
          <li><a href="faq.php" class="acl" class="nsd" id="faq">FAQs</a></li>
          <li><a href="blog.php" class="acl" class="nsd" id="blog">Blog</a></li>

          <li><a href="contact.php" class="acl" class="nsd" id="contact">Contact</a></li>
          <li><a href="../dashboard/index.php" class="getstarted" class="acl"><span class="bi bi-person-fill" data-icon="" data-inline="false"></span>&nbspLogin</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
