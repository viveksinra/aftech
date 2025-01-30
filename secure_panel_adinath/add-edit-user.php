<?php
include_once("inc/header.php");
include_once("com/User.php");
include_once("com/PS_Pagination.php");
include_once("inc/checksession.inc.php");
if(isset($_REQUEST["action"]) && $_REQUEST["action"] == 'edit' )
{
$rec_id=siteDecrypt($_REQUEST["id"]);
$sel_adm=$db->fetchAssoc($db->fireQuery("select * from `user` where id='$rec_id'"));
}
if(isset($_POST["update"])){
$temp = new User();
$temp->updatePhoto( $_POST );
$temp->Resize($_POST);
}
?>

               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           User Management
                        </div>
                             <div class="errordiv">
<?php
if ($_SESSION['msg']){echo '<div class="msg" style="cursor:pointer">'.$_SESSION['msg'].'</div>';$_SESSION['msg']='';unset($_SESSION['msg']);}
if ($_SESSION['errormsg']){echo '<div class="errormsg" style="cursor:pointer">'.$_SESSION['errormsg'].'</div>';$_SESSION['errormsg']='';unset($_SESSION['errormsg']);
}	
?>
</div>
                       
                              <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>                                           
                                            <th>Name</th>
                                            <th><?php echo $sel_adm[0]['name'];?></th>                                          
                                        </tr>
										 <tr>                                           
                                            <th>Email</th>
                                            <th><?php echo $sel_adm[0]['email'];?></th>                                          
                                        </tr>
										 <tr>                                           
                                            <th>Phone</th>
                                            <th><?php echo $sel_adm[0]['phone'];?></th>                                          
                                        </tr>
										 <tr>                                           
                                            <th>Age</th>
                                            <th><?php echo $sel_adm[0]['age'];?></th>             
                                             										
                                        </tr>
										 <tr>                                           
                                            <th>DOB</th>
                                            <th><?php echo $sel_adm[0]['dob'];?></th>             
                                             										
                                        </tr>
										 <tr>                                           
                                            <th>Gender</th>
                                            <th><?php echo $sel_adm[0]['gender'];?></th>             
                                             										
                                        </tr>
										 <tr>                                           
                                            <th>Address</th>
                                            <th><?php echo $sel_adm[0]['address'];?></th>  
                                         </tr>											
                                           <tr>   <th>City</th>
                                            <th><?php echo $sel_adm[0]['city'];?> <?php echo $sel_adm[0]['pincode'];?></th> 
											</tr>
                                           <tr>   <th>State</th>
                                            <th><?php echo $sel_adm[0]['state'];?></th> </tr>
                                           <tr>  <th>Country</th>
                                            <th><?php echo $sel_adm[0]['country'];?></th> 											
                                        </tr>
										<tr>                                           
                                            <th>Sum Insured</th>
                                            <th><?php echo $sel_adm[0]['sum_insured'];?></th>                                          
                                        </tr>
										 <tr>                                           
                                            <th>Pan No</th>
                                            <th><?php echo $sel_adm[0]['panno'];?></th>                                          
                                        </tr>
										 <tr>                                           
                                            <th>Aadhar No</th>
                                            <th><?php echo $sel_adm[0]['aadharno'];?></th>                                          
                                        </tr>
										
										 <tr>                                           
                                            <th>Password</th>
                                            <th class="showpass">******** &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="show" id="showbtn"/></th>                                          
                                            <th class="hidepass" style="display:none;"><?php echo $sel_adm[0]['password'];?>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<input type="button" value="hide" id="hidebtn"/> </th>                                          
                                        </tr>
										 <tr>                                           
                                            <th>pan photo</th>
                                            <th>      <img style="width:150px;height:150px;" src="<?php echo 'uploads/user/'.$sel_adm[0]['pan'];?>" alt=""></th>                                          
                                        </tr>
										 <tr>                                           
                                            <th>Aadhar Front</th>
                                            <th>   <img style="width:150px;height:150px;" src="<?php echo 'uploads/user/'.$sel_adm[0]['aadhar'];?>" alt=""></th>                                          
                                        </tr>
										 <tr>                                           
                                            <th>Aadhar Back</th>
                                            <th>   <img style="width:150px;height:150px;" src="<?php echo 'uploads/user/'.$sel_adm[0]['aadharback'];?>" alt=""></th>                                          
                                        </tr>
                                    </thead>
                                
                                </table>
							                   <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th scope="col">S no.</th>
                <th scope="col">Plan Name</th>
                <th scope="col">Date</th>
                <th scope="col">Amount</th>
                <th scope="col">Tax</th>
                <th scope="col">Total</th>
                <th scope="col">Detail</th>
                <th scope="col">Invoice</th>
                <th scope="col">Cartificate</th>
              </tr>
            </thead>
            <tbody>
			
			  <?php 
			  $sel=$db->fetchAssoc($db->fireQuery("select b.*,m.name as pname from booking as b join membership as m on b.serviceid=m.id where b.userid='".$sel_adm[0]['id']."' order by b.id desc"));
			  for($i=0;$i<count($sel);$i++){
			  ?>
              <tr>
                <th scope="row"><?php echo $i+1;?></th>
                <td><?php echo $sel[$i]['pname'];?></td>
                <td><?php echo $sel[$i]['date'];?></td>
                <td>₹ <?php echo $sel[$i]['amount'];?></td>
                <td>₹ <?php echo $sel[$i]['tax'];?></td>
                <td>₹ <?php echo ($sel[$i]['amount']+$sel[$i]['tax']);?></td>
			  <td><?php echo $sel[$i]['method_type'];?> || <?php echo $sel[$i]['promocode'];?></td>
				<td><a href="bill.php?action=view&id=<?php echo $sel[$i]['id'];?>">Invoice</a></td>
				<td><a href="certificate.php?action=view&id=<?php echo $sel[$i]['id'];?>">Certificate</a></td>
              </tr>
			  <?php } ?>
              
            </tbody>
          </table>
		  <h5>Refered By Me.</h5>
		              <table class="table table-striped table-bordered table-hover">
            <thead>
			<?php $select = $db->fetchAssoc($db->fireQuery("select * from `user` where `refereal`='".$sel_adm[0]['phone']."' order by id desc"));

            for($i=0;$i<count($select);$i++) {?>
              <tr>
                <th scope="col">Name</th>
                <th scope="col"><?php echo $select[$i]['name'];?></th>
               
                <th scope="col">Phone</th>
                <th scope="col"><?php echo $select[$i]['phone'];?></th>
                <th scope="col"> <a href="add-edit-user.php?action=edit&&id=<?php echo siteEncrypt($select[$i]["id"]);?>" style="background-image: none;float: left;"><img src="images/edit_icon.png" alt="Edit" title="Edit" /></a></th>
                </tr>	
			<?php } ?>
            </thead>

          </table>
           	
                            </div>
                            
                        </div>
                   
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
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
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <script>
	$(document).ready(function(){
		$("#showbtn").click(function(){
		$(".showpass").hide();	
		$(".hidepass").show();	
		})
			$("#hidebtn").click(function(){
		$(".showpass").show();	
		$(".hidepass").hide();	
		})
	})
	</script>
   
</body>
</html>
