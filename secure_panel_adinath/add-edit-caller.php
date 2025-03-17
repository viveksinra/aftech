<?php
include_once("inc/header.php");
include_once("com/Admin.php");
include_once("com/PS_Pagination.php");
include_once("inc/checksession.inc.php");
if(isset($_REQUEST["action"]) && $_REQUEST["action"] == 'edit' )
{
$rec_id=siteDecrypt($_REQUEST["id"]);
$sel_adm=$db->fetchAssoc($db->fireQuery("select * from `caller` where id='$rec_id'"));
}
if(isset($_POST["update"])){
$temp = new Admin();
$temp->updateAdmin( $_POST );
$temp->Resize($_POST);
}
?>

               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Caller Management
                        </div>
                             <div class="errordiv">
<?php
if ($_SESSION['msg']){echo '<div class="msg" style="cursor:pointer">'.$_SESSION['msg'].'</div>';$_SESSION['msg']='';unset($_SESSION['msg']);}
if ($_SESSION['errormsg']){echo '<div class="errormsg" style="cursor:pointer">'.$_SESSION['errormsg'].'</div>';$_SESSION['errormsg']='';unset($_SESSION['errormsg']);
}	
?>
</div>
                       
                        <div class="panel-body">
                            <div class="row">
                                    
                                    <form  form name="frm1" method="post" enctype="multipart/form-data">
                                    
                                        
                                      <div class="form-group">
                                            <label>Name</label>
                               <input class="form-control" type="text" name="name" value="<?php echo $sel_adm[0]['name']?>"  required=""/>
                                        </div>
                              <div class="form-group">
                                            <label>Email</label>
                               <input class="form-control" type="text" name="email" value="<?php echo $sel_adm[0]['email']?>"  required=""/>
                                        </div>										
                              
                               <div class="form-group">
                                            <label>Password</label>
                               <input class="form-control" type="text" name="password" value="<?php echo $sel_adm[0]['password']?>"  required=""/>
                                        </div>											
                                 <div class="form-group">
                                            <label>Select Category</label>
                                            <select class="form-control" name="category">
                                                <option value="">Select option</option>
											<?php $sel=$db->fetchAssoc($db->fireQuery("select * from category"));
											for($i=0;$i<count($sel);$i++){
											?>	
                                                <option value="<?php echo $sel[$i]['id'];?>" <?php if($sel_adm[0]['category']==$sel[$i]['id']){echo "selected";}?>><?php echo $sel[$i]['category'];?></option>
                                           <?php } ?>
										   </select>
                                </div>
                               <div class="form-group">
                                            <label>Select Status</label>
                                            <select class="form-control" name="status">
                                                <option value="">Select option</option>    
												<option value="Active" <?php if($sel_adm[0]['status']=='Active'){echo "selected";}?>>Active</option>
												<option value="Inactive" <?php if($sel_adm[0]['status']=='Inactive'){echo "selected";}?>>Inactive</option>
                            
										   </select>
                                </div>  
								  <div class="form-group">
                                            <label>Select Type</label>
                                            <select class="form-control" name="admin_type">
                                                <option value="">Select option</option>    
												<option value="Admin" <?php if($sel_adm[0]['admin_type']=='Admin'){echo "selected";}?>>Admin</option>
												<option value="Editor" <?php if($sel_adm[0]['admin_type']=='Editor'){echo "selected";}?>>Editor</option>
                            
										   </select>
                                </div>  
                                           <?php if(isset($_REQUEST["action"]) && $_REQUEST["action"] == 'add' ){?>

                        <?php }else{?><?php }?>
						<input type="submit" name="update" class="btn btn-primary" id="Save"  value="Submit"/>
                                        
                                        <button type="reset" class="btn btn-primary">Reset Button</button>

                                    </form>
                                   
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
    
   
</body>
</html>
