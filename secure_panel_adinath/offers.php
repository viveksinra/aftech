<?php include_once 'inc/header.php';
include_once("inc/checksession.inc.php");include_once("com/Offers.php");
include_once("com/PS_Pagination.php");
if(isset($_REQUEST["action"]) && $_REQUEST["action"] == 'view' )
{
 $rec_id=$_REQUEST["id"];
$sel_adm=$db->fetchAssoc($db->fireQuery("select * from `user` where id='$rec_id'"));
}
if(isset($_REQUEST["action"]) && $_REQUEST['action'] == 'status')
{   if($_REQUEST["st"]=='Inactive'){
	$temp = new Offers();
	$temp->checkActivate( $_POST );
      }else{
	 $temp = new Offers();
     $temp->checkDeactivate( $_POST );	  
	  }
}

if(isset($_REQUEST["action"]) && $_REQUEST['action'] == 'delete')
{
	$temp = new Offers();
	$temp->deletePhoto( $_POST );
}
if( isset( $_POST["deactivate"] ) ) {
   $temp = new Offers();
   $temp->checkDeactivate( $_POST );
}

if( isset( $_POST["delete"] ) ) {
   $temp = new Offers();
   $temp->deleteRecord( $_POST );
}
if(isset($_REQUEST["action"]) && $_REQUEST["action"] == 'assign' ){//echo "grr";
		  $id=$_REQUEST['offerid'];		
		  $userid=$_REQUEST['userid'];	//	echo "insert into assign_offer (`offerid`,`userid`,`date`) values ('$rec_id','$userid',NOW())";
	 	$insert=$db->fireQuery("insert into assign_offer (`offerid`,`userid`,`date`) values ('$id','$userid',NOW())");
		//die;
		if($insert)
		{
			$_SESSION['msg'] = "Record(s) assigned successfully!";
            header("location:offers.php?action=view&&id=".$_REQUEST['userid']);die();
		}
		else
		{
		$_SESSION['errormsg'] = "Record(s) Not assigned successfully!";
         header("location:offers.php?action=view&&id=".$_REQUEST['userid']);die();
		}
}
if(isset($_REQUEST["action"]) && $_REQUEST["action"] == 'unassign' ){//echo "grr";
		  $id=$_REQUEST['offerid'];		
		  $userid=$_REQUEST['userid'];	//	echo "insert into assign_offer (`offerid`,`userid`,`date`) values ('$rec_id','$userid',NOW())";
	 	$qry = $db->fireQuery("delete from `assign_offer` where offerid = '$id' AND `userid`='$userid'");
		//die;
		if($qry)
		{
			$_SESSION['msg'] = "Record(s) unassigned successfully!";
            header("location:offers.php?action=view&&id=".$_REQUEST['userid']);die();
		}
		else
		{
		$_SESSION['errormsg'] = "Record(s) Not unassigned successfully!";
         header("location:offers.php?action=view&&id=".$_REQUEST['userid']);die();
		}
}
?> <div class="quick" style=""><a href="add-edit-offers.php?action=add"  style="float:right; padding-right:10px;"><h3>Add New</h3></a></div>

               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Offers Management   For (<?php echo $sel_adm[0]['name'];?>)                        </div>
                        
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
                                            <th>S No.</th>
                                            
                                            <th>Name</th>
											<th>url</th>												
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
            $select = $db->fetchAssoc($db->fireQuery("select * from `offers` where `offertype`='exclusive' order by id desc"));
	  
            for($i=0;$i<count($select);$i++) {
	    ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $i+1;?></td>
                                           
                                            <td class="center"><?php echo $select[$i]['name']?></td>
											 <td class="center"><?php echo $select[$i]['url']?></td>
                                            <td class="center">
											<?php
            $selec = $db->fetchAssoc($db->fireQuery("select * from `assign_offer` where `offerid`='".$select[$i]['id']."' AND `userid`='".$rec_id."' order by id desc"));
			if(!empty($selec)){
			?><a href="offers.php?action=unassign&&offerid=<?php echo $select[$i]["id"];?>&&userid=<?php echo $sel_adm[0]["id"];?>" style="background-image: none;float: left;">Un assign Offer</a> 
											
			                           <?php }else{?>
			<a href="offers.php?action=assign&&offerid=<?php echo $select[$i]["id"];?>&&userid=<?php echo $sel_adm[0]["id"];?>" style="background-image: none;float: left;">Assign Offer</a>							  
									  <?php } ?>
                  </td>
                       
                                        </tr><?php } ?>
                                         </tbody>
                                </table>
                            </div>
                            
                        </div>
                         <?php   if(empty($select)){ echo '<div class="total-rez" align="center" style="font-weight:bold;width:898px;float:right; color:#090;">No Records Found</div>';} ?>
<!--<div class="total-rez">
<div class="total-rez">Showing results 1 - <?php echo count($select) ;?> of <?php echo count($select)?></div>-->
<div class="total-rez" ><?php //echo $pager->renderFullNav();  ?></div>
                    </div>
                    <!--End Advanced Tables -->
                     <script>
                      $(document).on("click",'.cancel',function(){
                         var id=$(this).attr('id');
                         var str=id.split('_');
                    if(confirm("Are you sure you want to delete this?")){
                        $(".cancel").attr("href", window.location.origin+'/cms/service-mgmt.php?action=delete&&id='+str[1]);
                    }
                    else{
                        return false;
                    }
                        }) ;
  
                        </script>
                </div>
            </div>
        </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
