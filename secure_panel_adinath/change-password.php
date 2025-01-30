<?php include_once 'inc/header.php';include_once("../com/Admin.php");
include_once("../com/PS_Pagination.php");
include_once("inc/checksession.inc.php"); 

$sel_uname=$db->fetchAssoc($db->fireQuery("select * from `admin` where id=".$_SESSION["user_id"].""));
if(isset($_POST["change"]))
{
	$admin=new Admin();
	$admin->changePassword($_POST);
	
}
?>
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Change Password
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
                                    
                                    <form role="form" form name="frm1" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>User Name</label>
                                            <input class="form-control" type="text" name="username" id="username" readonly value="<?php echo $sel_uname[0]['username']?>"/>
                                           
                                        </div>
                                       
                                        <div class="form-group">
                                            <label>Old Password</label>
                                            <input class="form-control" type="password" name="old_password" id="old_password" value="" />
                                              <script type="text/javascript">
					 				var f2 = new LiveValidation('old_password');
					 				f2.add(Validate.Presence);
									</script>
                                        </div>
                                            <div class="form-group">
                                            <label>New Password</label>
                                            <input class="form-control" type="password" name="new_password" id="new_password" value=""/>
                                              <script type="text/javascript">
					 				var f3 = new LiveValidation('new_password');
					 				f3.add(Validate.Presence);
									</script>
                                        </div>  
                                         <div class="form-group">
                                            <label>Confirm Password </label>
                                            <input class="form-control" type="password" name="confirm_password" id="confirm_password"  value="" />
                                          <script type="text/javascript">
					 				var f1 = new LiveValidation('confirm_password');
									f1.add(Validate.Presence);
                                                                        f1.add( Validate.Confirmation, { match: 'new_password' } );
		          					</script>  </div>
                                     
           <input type="submit" name="change" id="change" class="btn btn-primary"  value="Submit"/>
                                       
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
