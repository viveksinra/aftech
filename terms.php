<?php include_once 'includes/header.php';?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Terms Of Use</li>
        </ol>
        <h2>Terms Of Use</h2>

      </div>
    </section><!-- End Breadcrumbs -->
<?php $about=$db->fetchAssoc($db->fireQuery("select * from `content` where `category`='Terms' order by id desc"));?>
   <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-12">
       
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