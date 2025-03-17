<?php header("Content-Type:application/json");
//include_once("sqlConnection.php");
//$db=new sqlConnection();
//print_r($db);

if (isset($_GET['action']) && $_GET['action']=="test") {
    $msg->message="Coaching Found";
	$msg->status="1";
    echo json_encode($msg);
}
?>

<?php /*
include_once("../com/sqlConnection.php");
$db=new sqlConnection();
if(isset($_REQUEST["action"]) && $_REQUEST["action"] == 'register' )
{
$msg=array();	
$name=$_REQUEST['name'];	
$email=$_REQUEST['email'];	
$phone=$_REQUEST['phone'];	
$address=$_REQUEST['address'];	
$age=$_REQUEST['age'];	
$password=$_REQUEST['password'];	
$password1=$_REQUEST['confirmpassword'];	
if($password!=$password1){
	$msg['status']=0;
	$msg['msg']="Password and confirm password are not same";
}else{
$select=$db->fetchAssoc($db->fireQuery("select * from `user` where `email`='".$email."' OR `phone`='".$phone."'"));
if(!empty($select)){
	$msg['status']=0;
	$msg['msg']="Email Id Or Phone NO already exists";
}else{	
 $insert=$db->fireQuery("insert into user(`pan`,`name`,`phone`,`email`,`address`,`age`,`password`,`status`,`added_on`) values
		 ('$photo','$name','$phone','$email','$address','$age','$password','Active',NOW())");
	if($insert){
	$msg['status']=1;
	$msg['msg']="Registered Successful";	
	}	else{
	$msg['status']=0;
	$msg['msg']="Error occured while registering";	
	} 
}
}
echo json_encode($msg);		 
}
https://www.tenacioushub.in/cms/api/api.php?action=register&email=puja@gmail.com&password=111&name=puja&phone=9999999999&address=abcnagar&age=30&confirmpassword=111

if(isset($_REQUEST["action"]) && $_REQUEST["action"] == 'login' )
{
$msg=array();		
$email=$_REQUEST['email'];
$password=$_REQUEST['password'];		
if($email=='' && $password==''){
	$msg['status']=0;
	$msg['msg']="Email and password cannot be blank";
}
else if($email=='' && $password!=''){
	$msg['status']=0;
	$msg['msg']="Email cannot be blank";
}
else if($email!='' && $password==''){
	$msg['status']=0;
	$msg['msg']="Password cannot be blank";
}

else{
$select=$db->fetchAssoc($db->fireQuery("select * from `user` where `email`='".$email."' AND `password`='".$password."'"));
if(!empty($select)){
	$msg['status']=1;
	$msg['msg']="User Found";
	$msg['id']=$select[0]['id'];
	$msg['name']=$select[0]['name'];
	$msg['email']=$select[0]['email'];
	$msg['phone']=$select[0]['phone'];
	$msg['address']=$select[0]['address'];
	$msg['age']=$select[0]['age'];
}else{
	$msg['status']=0;
	$msg['msg']="User Not Found";
}
}
echo json_encode($msg);		 
}

//https://www.tenacioushub.in/cms/api/api.php?action=login&email=puja@gmail.com&password=111

if(isset($_REQUEST["action"]) && $_REQUEST["action"] == 'servicelist' )
{echo "asdsad";
$msg=array();	
$msgs=array();	
$id=$_REQUEST['id'];		
if($id!=''){
$select=$db->fetchAssoc($db->fireQuery("select * from `product` where `id`='".$id."' order by id desc"));
}else{echo "dfsd";
$select=$db->fetchAssoc($db->fireQuery("select * from `product` order by id desc"));	
}
print_r($select);
if(!empty($select)){
	$msg->status=1;
	$msg->msg="Service Found";
	for($i=1;$i<count($select);$i++){
	echo $msgs->service[$i]['id']=$select[$i]['id'];
	$msgs->service[$i]['category']=$select[$i]['category'];
	$msgs->service[$i]['subcategory']=$select[$i]['subcategory'];
	$msgs->service[$i]['name']=$select[$i]['name'];
	$msgs->service[$i]['url']=$select[$i]['url'];
	$msgs->service[$i]['photo']="https://www.tenacioushub.in/cms/uploads/product/".$select[$i]['photo'];
	}
	$msg->servicelist=$msgs->service
}else{
	$msg->status=0;
	//$msg['service']=$msgs;
	$msg->msg="service Not Found";
}

echo json_encode($msg);		 
}
//https://www.tenacioushub.in/cms/api/api.php?action=servicelist
//https://www.tenacioushub.in/cms/api/api.php?action=servicelist&id=1

if(isset($_REQUEST["action"]) && $_REQUEST["action"] == 'category' )
{
$msg=array();	
$id=$_REQUEST['id'];		
if($id!=''){
$select=$db->fetchAssoc($db->fireQuery("select * from `category` where `id`='".$id."' order by id desc"));
}else{
$select=$db->fetchAssoc($db->fireQuery("select * from `category` order by id desc"));	
}
if(!empty($select)){
	$msg['status']=1;
	$msg['msg']="category Found";
	for($i=0;$i<count($select);$i++){
	$msg[$i]['id']=$select[$i]['id'];
	$msg[$i]['category']=$select[$i]['category'];
	}
}else{
	$msg['status']=0;
	$msg['msg']="category Not Found";
}

echo json_encode($msg);		 
}
//https://www.tenacioushub.in/cms/api/api.php?action=category
//https://www.tenacioushub.in/cms/api/api.php?action=category&id=1

if(isset($_REQUEST["action"]) && $_REQUEST["action"] == 'subcategory' )
{
$msg=array();	
$id=$_REQUEST['id'];		
if($id!=''){
$select=$db->fetchAssoc($db->fireQuery("select * from `subcategory` where `id`='".$id."' order by id desc"));
}else{
$select=$db->fetchAssoc($db->fireQuery("select * from `subcategory` order by id desc"));	
}
if(!empty($select)){
	$msg['status']=1;
	$msg['msg']="subcategory Found";
	for($i=0;$i<count($select);$i++){
	$msg[$i]['id']=$select[$i]['id'];
	$msg[$i]['category']=$select[$i]['category'];
	$msg[$i]['subcategory']=$select[$i]['subcategory'];
	}
}else{
	$msg['status']=0;
	$msg['msg']="subcategory Not Found";
}

echo json_encode($msg);		 
}
//https://www.tenacioushub.in/cms/api/api.php?action=subcategory
//https://www.tenacioushub.in/cms/api/api.php?action=subcategory&id=1

if(isset($_REQUEST["action"]) && $_REQUEST["action"] == 'clicks' )
{
$msg=array();	
 $sid=$_REQUEST['service_id'];		
$uid=$_REQUEST['user_id'];	

if($sid=='' && $uid==''){
	$msg['status']=0;
	$msg['msg']="service id  and user id cannot be blank";
}
else if($sid=='' && $uid!=''){
	$msg['status']=0;
	$msg['msg']="service id cannot be blank";
}
else if($sid!='' && $uid==''){
	$msg['status']=0;
	$msg['msg']="user id cannot be blank";
}
//echo "insert into `clicks` (`service_id`,`user_id`,`date`) values ('".$sid."','".$uid."',NOW())";
$insert=$db->fireQuery("insert into `clicks` (`service_id`,`user_id`,`date`) values ('".$sid."','".$uid."',NOW())");
if($insert){
	$msg['status']=1;
	$msg['msg']="click saved";	
}
echo json_encode($msg);		 
}
//https://www.tenacioushub.in/cms/api/api.php?action=clicks&service_id=1&user_id=1*/

?>