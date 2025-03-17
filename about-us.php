<?php include_once 'includes/header.php';?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php">Home</a></li>
          <li>About Us</li>
        </ol>
        <h2>About Us</h2>

      </div>
    </section><!-- End Breadcrumbs -->
<?php $about=$db->fetchAssoc($db->fireQuery("select * from `content` where `category`='About Us' order by id desc"));?>
   <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-5">
      <img class="" src="<?php echo constant("LINK").'uploads/content/'.$about[0]['photo'];?>" alt="Image" style="width:100%;height:450px">
          </div>

          <div class="col-lg-7">
       
            <div class="portfolio-description">
              <h2>  <?php echo $about[0]['heading'];?></h2>
              <p>
              <?php echo $about[0]['detail'];?>
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->
<?php $about=$db->fetchAssoc($db->fireQuery("select * from `content` where `category`='Mission' order by id desc"));?>
   <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-7">
       
            <div class="portfolio-description">
              <h2>  <?php echo $about[0]['heading'];?></h2>
              <p>
              <?php echo $about[0]['detail'];?>
              </p>
            </div>
          </div>
          <div class="col-lg-5">
      <img class="" src="<?php echo constant("LINK").'uploads/content/'.$about[0]['photo'];?>" alt="Image" style="width:100%;height:450px">
          </div>


        </div>

      </div>
    </section><!-- End Portfolio Details Section -->
	<?php $about=$db->fetchAssoc($db->fireQuery("select * from `content` where `category`='Vision' order by id desc"));?>
   <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-5">
      <img class="" src="<?php echo constant("LINK").'uploads/content/'.$about[0]['photo'];?>" alt="Image" style="width:100%;height:450px">
          </div>

          <div class="col-lg-7">
       
            <div class="portfolio-description">
              <h2>  <?php echo $about[0]['heading'];?></h2>
              <p>
              <?php echo $about[0]['detail'];?>
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->
 

  </main><!-- End #main -->

<?php include_once 'includes/footer.php';?>