<?php include_once 'includes/header.php';?>
<?php if(isset($_REQUEST["action"]) && $_REQUEST["action"] == 'detail' )
{
	$sel=$db->fetchAssoc($db->fireQuery("select * from product where id='".$_REQUEST['id']."'"));?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Services</li>
        </ol>
        <h2><?php echo $sel[0]['name'];?></h2>

      </div>
    </section><!-- End Breadcrumbs -->
	    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">
     
            <article class="entry">
			    <div class="entry-img">
                <img src="<?php echo constant("LINK").'uploads/product/'.$sel[0]['photo'];?>" style="height:350px;width:100%;" alt="" class="img-fluid">
              </div>
              <h2 class="entry-title">
                <a href=""><?php echo $sel[0]['name'];?></a>
              </h2>

              <div class="entry-content">
                <p>
                 <?php echo $sel[0]['detail'];?>
                </p>
             
              </div>
    <section id="services" class="services">



      <div class="container" data-aos="fade-up">



        <header class="section-header">

          <h2>Other Releated Services</h2>
        </header>



        <div class="row gy-4">

<?php $arr=array('blue','orange','green','red','purple','pink');?>
<?php $sell=$db->fetchAssoc($db->fireQuery("select * from product where `id`!='".$_REQUEST['id']."' AND `category`='".$sel[0]['category']."' order by id desc "));
for($j=0;$j<count($sell);$j++){?>  
          <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="200">

            <div class="service-box <?php echo $arr[$j];?>">

             <img src="<?php echo constant("LINK").'uploads/product/'.$sell[$j]['photo'];?>"   style="height:150px;width:150px;padding:15px;margin: 0px auto;" alt="Image">

              <h3><?php echo $sell[$j]['name'];?></h3>

              <a href="services.php?action=detail&id=<?php echo $sell[$j]['id'];?>" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>

            </div>

          </div>


<?php } ?>
        </div>



      </div>



    </section><!-- End Services Section -->

	
	
	
	<h3>Enquire Now</h3>
	 <form action="forms/contact.php" method="post" id="contact" class="contact">

              <div class="row gy-4">



                <div class="col-md-6">

                  <input type="text" name="name" class="form-control" placeholder="Your Name" required>

                </div>



                <div class="col-md-6 ">

                  <input type="email" class="form-control" name="email" placeholder="Your Email" required>

                </div>



                <div class="col-md-12">

                  <input type="text" class="form-control" name="phone" placeholder="Phone No" required>

                </div>



                <div class="col-md-12">

                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>

                </div>



                <div class="col-md-12 text-center">

                  <button type="submit" class="btn btn-primary getstarted " style="background: #43A03E;">Enquire Now</button>
                </div>
              </div>
            </form>
	
     



          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar"> <h3 class="sidebar-title">Loan Calculator</h3>
                  	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <!-- EMI Calculator Widget START --><script src="https://emicalculator.net/widget/2.0/js/emicalc-loader.min.js" type="text/javascript"></script><div id="ecww-widgetwrapper" style="min-width:250px;width:100%;"><div id="ecww-widget" style="position:relative;padding-top:0;padding-bottom:280px;height:0;overflow:hidden;"></div><div id="ecww-more" style="background:#333;font:normal 13px/1 Helvetica, Arial, Verdana, Sans-serif;padding:10px 0;color:#FFF;text-align:center;width:100%;clear:both;margin:0;clear:both;float:left;"><a style="background:#333;color:#FFF;text-decoration:none;border-bottom:1px dotted #ccc;" href="https://emicalculator.net/" title="Loan EMI Calculator" rel="nofollow" target="_blank">emicalculator.net</a></div></div><!-- EMI Calculator Widget END --></div>



            <div class="sidebar">

              <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                <ul>
				<?php $sel=$db->fetchAssoc($db->fireQuery("select * from category order by id asc"));
for($i=0;$i<count($sel);$i++){?>
                  <li><a href="category.php?action=category&id=<?php echo $sel[$i]['id'];?>"><?php echo $sel[$i]['category'];?></a></li>
<?php } ?>
                </ul>
              </div><!-- End sidebar categories-->

            </div><!-- End sidebar -->
			 <div class="sidebar">

              <h3 class="sidebar-title">Enquiry Form</h3>
              <div class="sidebar-item categories">
               <form action="forms/contact.php" method="post" id="contact" class="contact">

              <div class="row gy-4">



                <div class="col-md-12">

                  <input type="text" name="name" class="form-control" placeholder="Your Name" required>

                </div>



                <div class="col-md-12 ">

                  <input type="email" class="form-control" name="email" placeholder="Your Email" required>

                </div>



                <div class="col-md-12">

                  <input type="text" class="form-control" name="phone" placeholder="Phone No" required>

                </div>



                <div class="col-md-12">

                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>

                </div>



                <div class="col-md-12 text-center">

                  <button type="submit" class="btn btn-primary getstarted " style="background: #43A03E;">Enquire Now</button>
                </div>
              </div>
            </form>
              </div><!-- End sidebar categories-->

            </div><!-- End sidebar -->
		


		
          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  
</main>


<?php } include_once 'includes/footer.php';?>