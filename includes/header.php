<?php include_once 'config.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title></title>
  <meta content="" name="description">
  <meta content="" name="keywords"> <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
      </a>
      <nav id="navbar" class="navbar">

        <ul>

          <li><a class="nav-link scrollto active" href="index.php">Home</a></li>      
 <?php $cat=$db->fetchAssoc($db->fireQuery("select * from `category` order by id asc limit 0,4"));
				  for($h=0;$h<count($cat);$h++){?>
      <li class="dropdown megamenu"><a href="#"><span><?php echo $cat[$h]['category'];?></span> <i class="bi bi-chevron-down"></i></a>

            <ul>
<?php $sell=$db->fetchAssoc($db->fireQuery("select * from product where `category`='".$cat[$h]['id']."' order by id desc "));
if(!empty($sell)){
for($j=0;$j<count($sell);$j++){?>
              <li>

                <a href="services.php?action=detail&id=<?php echo $sell[$j]['id'];?>"><?php echo $sell[$j]['name'];?></a>

              </li>
<?php }} ?>
         </ul>

          </li>


				  <?php } ?>
          <li><a class="nav-link scrollto" href="about-us.php">About Us</a></li>
          <li><a class="nav-link scrollto" href="contact-us.php">Contact Us</a></li>
<?php if(empty($_SESSION['userdetail'])){?>
          <li><a class="getstarted scrollto" href="login.php">Sign In/Sign Up</a></li>
<?php }else{ ?>
<li><a href="profile.php" class="getstarted scrollto"> <?php echo $_SESSION['userdetail'][0]['name'];?></a></li>
					<li> <a href="logout.php" class="getstarted scrollto">Logout</a></li>
<?php } ?>
        </ul>

        <i class="bi bi-list mobile-nav-toggle"></i>

      </nav><!-- .navbar -->



    </div>

  </header><!-- End Header -->

