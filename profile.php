<?php include_once 'includes/header.php';
//print_r($_SESSION['userdetail']);
if(empty($_SESSION['userdetail'])){
header("Location:login.php");	
}
?>

<main id="main">
<?php $sel=$db->fetchAssoc($db->fireQuery("select * from user where id='".$_SESSION['userdetail'][0]['id']."'"));?>
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Profile</li>
        </ol>
        <h2>Welcome <?php echo $_SESSION['userdetail'][0]['name'];?></h2>

      </div>
    </section><!-- End Breadcrumbs -->
    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">
     
       
   
          </div><!-- End blog entries list -->

          <div class="col-lg-4">
		  
		    <div class="sidebar">
              <?php if($sel[0]['photo']!=''){?>
              <img style="height:230px;width:90%;margin-left:5%;margin-bottom:5%;" src="<?php echo constant("LINK").'uploads/user/'.$sel[0]['photo'];?>" class="attachment-large mt-30" alt="">
			<?php }else{ ?>
			  <img style="height:230px;width:90%;margin-left:5%;margin-bottom:5%;" src="assets/img/user.png" class="attachment-large mt-30" alt="">
			<?php } ?><br/>
             <div class="sidebar-item categories">
                <ul>
		
                  <li><a ><i class="bi bi-person-circle"></i> <?php echo $sel[0]['name'];?></a></li>
                  <li><a ><i class="bi bi-envelope-check-fill"></i> <?php echo $sel[0]['email'];?></a></li>
                  <li><a ><i class="bi bi-phone"></i> <?php echo $sel[0]['phone'];?></a></li>

                </ul>
              </div><!-- End sidebar categories-->

            </div><!-- End sidebar -->
   <div class="sidebar">
              <h3 class="sidebar-title">Useful Links</h3>
              <div class="sidebar-item categories">
                <ul>
                  <li><a href="edit-profile.php">Edit Profile</a></li>
                  <li><a href="certificate.php">Cetificate</a></li>
                  <li><a href="change-password.php">Change Password</a></li>

                </ul>
              </div><!-- End sidebar categories-->

            </div><!-- End sidebar -->
			
          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  
</main>


  </main><!-- End #main -->

<?php include_once 'includes/footer.php';?>