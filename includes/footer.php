

  <!-- ======= Footer ======= -->

  <footer id="footer" class="footer">

    <div class="footer-top">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-5 col-md-12 footer-info">

            <a href="index.html" class="logo d-flex align-items-center">

              <img src="assets/img/logo.png" alt="">

            </a>
<?php $about=$db->fetchAssoc($db->fireQuery("select * from `content` where `category`='About Us' order by id desc"));?>
            <p><?php echo substr(strip_tags($about[0]['detail']),0,250);?>...</p>

            <div class="social-links mt-3">

              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>

              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>

              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>

              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>

            </div>

          </div>



          <div class="col-lg-2 col-6 footer-links">

            <h4>Useful Links</h4>

            <ul>

              <li><i class="bi bi-chevron-right"></i> <a href="index.php">Home</a></li>

              <li><i class="bi bi-chevron-right"></i> <a href="about-us.php">About us</a></li>

              <li><i class="bi bi-chevron-right"></i> <a href="blog.php">Blog</a></li>

              <li><i class="bi bi-chevron-right"></i> <a href="terms.php">Terms of service</a></li>

              <li><i class="bi bi-chevron-right"></i> <a href="privacy.php">Privacy policy</a></li>

            </ul>

          </div>



          <div class="col-lg-2 col-6 footer-links">

            <h4>Our Services</h4>

            <ul>
 <?php $cat=$db->fetchAssoc($db->fireQuery("select * from `category` order by id asc limit 0,6"));
				  for($h=0;$h<count($cat);$h++){?>
              <li><i class="bi bi-chevron-right"></i> <a href="#"><?php echo $cat[$h]['category'];?></a></li>
<?php } ?>

            </ul>

          </div>



          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">

            <h4>Contact Us</h4>

            <p>Sco-133 Second floor Omaxe<br/>
World Street, Ashray Bhavan<br/>
Road, Sector 79, Faridabad,<br/>
Haryana 121004<br><br>

              <strong>Phone:</strong> 9810325157, 9319983890<br>

              <strong>Email:</strong> info@insofy.in<br>

            </p>



          </div>



        </div>

      </div>

    </div>



    <div class="container">

      <div class="copyright">

        &copy; Copyright <?php echo date('Y');?> <strong><span> Insofy</span></strong>. All Rights Reserved

      </div>

      <div class="credits">

        <!-- All the links in the footer should remain intact. -->

        <!-- You can delete the links only if you purchased the pro version. -->

        <!-- Licensing information: https://bootstrapmade.com/license/ -->

        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->

        <a href="https://bootstrapmade.com/"></a>

      </div>

    </div>

  </footer><!-- End Footer -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



  <!-- Vendor JS Files -->

  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>

  <script src="assets/vendor/aos/aos.js"></script>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>

  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <script src="assets/vendor/php-email-form/validate.js"></script>



  <!-- Template Main JS File -->

  <script src="assets/js/main.js"></script>



</body>



</html>