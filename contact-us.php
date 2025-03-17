<?php include_once 'includes/header.php';?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Contact Us</li>
        </ol>
        <h2>Contact Us</h2>

      </div>
    </section><!-- End Breadcrumbs -->
<?php $about=$db->fetchAssoc($db->fireQuery("select * from `content` where `category`='Contact Us' order by id desc"));?>
   <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">
  <iframe title="template google map" style="width:100%;height:300px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4562.753041141002!2d-118.80123790098536!3d34.152323469614075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80e82469c2162619%3A0xba03efb7998eef6d!2sCostco+Wholesale!5e0!3m2!1sbn!2sbd!4v1562518641290!5m2!1sbn!2sbd" class="map__default" allowfullscreen></iframe>
      
        </div>

      </div>
	  
	  
    </section><!-- End Portfolio Details Section -->

  <!-- ======= Contact Section ======= -->

    <section id="contact" class="contact">



      <div class="container" data-aos="fade-up">



        <header class="section-header">

          <h2>Contact</h2>

          <p>Contact Us</p>

        </header>



        <div class="row gy-4">



          <div class="col-lg-6">



            <div class="row gy-4">

              <div class="col-md-6">

                <div class="info-box">

                  <i class="bi bi-geo-alt"></i>

                  <h3>Address</h3>

                  <p>Sco-133 Second floor Omaxe<br/>
World Street, Ashray Bhavan<br/>
Road, Sector 79, Faridabad,<br/>
Haryana 121004</p>

                </div>

              </div>

              <div class="col-md-6">

                <div class="info-box">

                  <i class="bi bi-telephone"></i>

                  <h3>Call Us</h3>

                  <p> 9810325157, <br/>9319983890</p>

                </div>

              </div>

              <div class="col-md-6">

                <div class="info-box">

                  <i class="bi bi-envelope"></i>

                  <h3>Email Us</h3>

                  <p>info@insofy.in</p>

                </div>

              </div>

              <div class="col-md-6">

                <div class="info-box">

                  <i class="bi bi-clock"></i>

                  <h3>Open Hours</h3>

                  <p>Monday - Friday<br>9:00AM - 05:00PM</p>

                </div>

              </div>

            </div>



          </div>



          <div class="col-lg-6">

            <form action="forms/contact.php" method="post" class="php-email-form">

              <div class="row gy-4">



                <div class="col-md-6">

                  <input type="text" name="name" class="form-control" placeholder="Your Name" required>

                </div>



                <div class="col-md-6 ">

                  <input type="email" class="form-control" name="email" placeholder="Your Email" required>

                </div>



                <div class="col-md-12">

                  <input type="text" class="form-control" name="subject" placeholder="Subject" required>

                </div>



                <div class="col-md-12">

                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>

                </div>



                <div class="col-md-12 text-center">

                  <div class="loading">Loading</div>

                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                  <button type="submit">Send Message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->




  </main><!-- End #main -->

<?php include_once 'includes/footer.php';?>