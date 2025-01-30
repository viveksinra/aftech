<?php include_once 'includes/header.php';?>
<?php if(isset($_REQUEST["action"]) && $_REQUEST["action"] == 'category' )
{
	$sel=$db->fetchAssoc($db->fireQuery("select * from category where id='".$_REQUEST['id']."'"));?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Category</li>
        </ol>
        <h2><?php echo $sel[0]['category'];?></h2>

      </div>
    </section><!-- End Breadcrumbs -->
	    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-9 entries">

            <article class="entry">
              <h2 class="entry-title">
                <a href=""><?php echo $sel[0]['category'];?></a>
              </h2>

              <div class="entry-content">
                <p>
                 <?php echo $sel[0]['detail'];?>
                </p>
             
              </div>
    <section id="services" class="services">



      <div class="container" data-aos="fade-up">



        <header class="section-header">

          <h2>Services</h2>
        </header>



        <div class="row gy-4">

<?php $arr=array('blue','orange','green','red','purple','pink');?>
<?php $sell=$db->fetchAssoc($db->fireQuery("select * from product where `category`='".$_REQUEST['id']."' order by id desc "));
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
            </article><!-- End blog entry -->

     



          </div><!-- End blog entries list -->

          <div class="col-lg-3">

            <div class="sidebar">

              <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                <ul>
				<?php $sel=$db->fetchAssoc($db->fireQuery("select * from category where `id`!='".$_REQUEST['id']."' order by id asc"));
for($i=0;$i<count($sel);$i++){?>
                  <li><a href="category.php?action=category&id=<?php echo $sel[$i]['id'];?>"><?php echo $sel[$i]['category'];?></a></li>
<?php } ?>
                </ul>
              </div><!-- End sidebar categories-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  
</main>


<?php } include_once 'includes/footer.php';?>