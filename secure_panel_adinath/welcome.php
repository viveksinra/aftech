<?php 
include_once 'inc/header.php';//print_r($_SESSION);?>
                <div class="row">
				
							<div class="col-md-5 widget widget1" style="border:0px solid #444333;border-radius:10px;margin-right:10px;width: 47%;">
<div id="piechart1"></div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
    <?php $string='';
  $sel_am=$db->fetchAssoc($db->fireQuery("select * from category "));
      for($i=0 ; $i < count($sel_am); $i++) {
      $catid=$sel_am[$i]['id'];  
      $cat=$sel_am[$i]['category'];  
      $count=$db->fetchAssoc($db->fireQuery("select * from product where `category` = '".$catid."'"));
	  if(!empty($count)){$count1=count($count);}else{$count1=0;}
    echo $string = "['".$cat."-".$count1."', ".$count1."],";
	 }	 
 ?> ['-', 0]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':' Category Wise Service Detail', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
  chart.draw(data, options);
}
</script>

</div>


		<div class="col-md-5 widget widget1" style="border:0px solid #444333;border-radius:10px;margin-right:10px;width: 47%;">
<div id="piechart2"></div>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
    <?php $string='';
  $sel_am=$db->fetchAssoc($db->fireQuery("select * from product "));
      for($i=0 ; $i < count($sel_am); $i++) {
      $catid=$sel_am[$i]['id'];  
      $cat=$sel_am[$i]['name'];  
      $count=$db->fetchAssoc($db->fireQuery("select * from clicks where `service_id` = '".$catid."'"));
	  if(!empty($count)){$count1=count($count);}else{$count1=0;}
    echo $string = "['".$cat."-".$count1."', ".$count1."],";
	 }	 
 ?> ['-', 0]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':' ', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
  chart.draw(data, options);
}
</script>

</div>


			<div class="clearfix"></div>	
				<br/><br/><br/>
		<?php if($_SESSION['admin-type'] =='Admin'){?>		
                <!-- <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <?php $sel=$db->fetchAssoc($db->fireQuery("select * from clicks"));
					if(!empty($sel)){echo count($sel);}else{echo "0";}
					?>
                </span>
                <div class="text-box" >
                   
                    <p class="text-muted"><a href="click.php"> <h3>Clicks</h3></a></p>
                </div>
             </div>
		     </div>  -->  
                <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-key"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"></p>
                    <p class="text-muted"><a href="change-password.php">Change<br/> Password</a></p>
                </div>
             </div>
		     </div> 
			 
			           <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-cubes"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"></p>
                    <p class="text-muted"><a href="category-mgmt.php">Category<br/>Management</a></p>
                </div>
             </div>
		     </div>
			         <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-cubes"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"></p>
                    <p class="text-muted"><a href="subcategory-mgmt.php">Sub Category<br/>Management</a></p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-cubes"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"></p>
                    <p class="text-muted"><a href="service-mgmt.php">Service<br/>Management</a></p>
                </div>
             </div>
		     </div>
                    
			                      <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-cubes"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"></p>
                    <p class="text-muted"><a href="user-mgmt.php">Register <br/>Management</a></p>
                </div>
             </div>
		     </div>
   			                      <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-cubes"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"></p>
                    <p class="text-muted"><a href="caller-mgmt.php">Caller <br/>Management</a></p>
                </div>
             </div>
		     </div>
			 
			              <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-cubes"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"></p>
                    <p class="text-muted"><a href="content-mgmt.php">Content <br/>Management</a></p>
                </div>
             </div>
		     </div>
			 
			 			              <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-cubes"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"></p>
                    <p class="text-muted"><a href="partner-mgmt.php">Clients <br/>Management</a></p>
                </div>
             </div>
		     </div>
			 
		<!--<div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-cubes"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"></p>
                    <p class="text-muted"><a href="membership-mgmt.php">Membership <br/>Management</a></p>
                </div>
             </div>
		     </div>	-->

		<!--<div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-cubes"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"></p>
                    <p class="text-muted"><a href="ads-mgmt.php">Similar Products <br/>Management</a></p>
                </div>
             </div>
		     </div>	-->
	<div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-cubes"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"></p>
                    <p class="text-muted"><a href="advert-mgmt.php">Ads <br/>Management</a></p>
                </div>
             </div>
		     </div>	
	<div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-cubes"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"></p>
                    <p class="text-muted"><a href="testimonial-mgmt.php">Testimonial <br/>Management</a></p>
                </div>
             </div>
		     </div>	
	<div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-cubes"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"></p>
                    <p class="text-muted"><a href="blog-mgmt.php">Blog <br/>Management</a></p>
                </div>
             </div>
		     </div>	
	<!--<div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-cubes"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"></p>
                    <p class="text-muted"><a href="offers-mgmt.php">Offers <br/>Management</a></p>
                </div>
             </div>
		     </div>	-->
	<div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-cubes"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"></p>
                    <p class="text-muted"><a href="slider-mgmt.php">Slider <br/>Management</a></p>
                </div>
             </div>
		     </div>				 
		<?php } ?>
			</div>

 <!-- /. ROW  -->
                <hr />                
             
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
