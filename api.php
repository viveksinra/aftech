<?php ob_start();
session_start();
include_once("secure_panel_adinath/com/sqlConnection.php");
$db=new sqlConnection();


if(isset($_GET["action"]) && $_GET["action"] == 'login' )
{	//print_r($_GET);
 $email=$_GET['email'];
 $password=$_GET['password'];		
if($email=='' && $password==''){

	echo $msg="Email and password cannot be blank";
}
else if($email=='' && $password!=''){
	
echo	$msg="Email cannot be blank";
}
else if($email!='' && $password==''){
	
	echo $msg="Password cannot be blank"; 
}

else{
$select=$db->fetchAssoc($db->fireQuery("select * from `user` where `email`='".$email."' AND `password`='".$password."'"));
//$select=$db->fetchAssoc($sel);

if(!empty($select)){
	$_SESSION['userdetail']=$select;
	
	echo $select[0]['id'];
	
}else{
	
echo 	$msg="<p class='alert alert-danger'>Email ID Or password is wrong ,plz try with correct one.</p>";
}

}
	 
}

//https://www.tenacioushub.in/cms/api/api.php?action=login&email=puja@gmail.com&password=111


if(isset($_GET["action"]) && $_GET["action"] == 'register' )
{

$name=$_GET['name'];	
$email=$_GET['email'];	
$phone=$_GET['phone'];	
$address=$_GET['address'];	
$age=$_GET['age'];	
$password=$_GET['password'];	
$password1=$_GET['confirmpassword'];	
if($password!=$password1){

	echo $msg="<p class='alert alert-danger'>Password and confirm password are not same</p>";
}else{
$select=$db->fetchAssoc($db->fireQuery("select * from `user` where `email`='".$email."' OR `phone`='".$phone."'"));
if(!empty($select)){
	
	echo $msg="<p class='alert alert-danger'>Email Id Or Phone NO already exists</p>";
}else{	
 $insert=$db->fireQuery("insert into user(`name`,`phone`,`email`,`address`,`age`,`password`,`status`,`added_on`) values
		 ('$name','$phone','$email','$address','$age','$password','Active',NOW())");
	if($insert){

	echo $msg="<p class='alert alert-success'>Registered Successful</p>";	
	$select=$db->fetchAssoc($db->fireQuery("select * from `user` where `email`='".$email."' AND `password`='".$password."'"));
//print_r($select);
if(!empty($select)){
	$_SESSION['userdetail']=$select;
	
	 $select[0]['id'];
}
	}	else{
	
	echo $msg="<p class='alert alert-danger'>Error occured while registering</p>";	
	} 
}
}
	 
}
//https://www.tenacioushub.in/cms/api/api.php?action=register&email=puja@gmail.com&password=111&name=puja&phone=9999999999&address=abcnagar&age=30&confirmpassword=111

if($_GET['action']!='' && $_GET['action']=='forgotpass'){
	
        $email=$_REQUEST['email'];
	date_default_timezone_set('Asia/Calcutta');
	$date=date("Y-m-d G:i:s"); 
       if($email!=''){//echo "select * from `user` where `email`='".$email."'";
		$sele=$db->fetchAssoc($db->fireQuery("select count(id) as count,name from `user` where `email`='".$email."'"));
		//print_r($select);die;
if($sele[0]['count']==0){//echo "jg";
   echo $msg="Email Id Dose Not exists";
}else{ $pass=substr($email,0,3).rand(0,9999);
		$votes=$db->fireQuery("update user set password='".$pass."' where `email`='".$email."'");	   

       if($votes){
		 $to=$email;
        $subject="Forgot PassWord ";
		$msgs="The new password for ".$email." id <b><i>".$pass."</i></b>";
	$msgf .= '<!DOCTYPE html>
<html>
<body style="margin: 0; padding: 0;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%"> 
        <tr>
            <td style="padding: 10px 0 30px 0;">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
 
                    <tr>
                        <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
                                        <b>Dear '.$sele[0]['name'].'</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                   '.$msgs.'
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                     
                                                </td>
                                                <td style="font-size: 0; line-height: 0;" width="20">
                                                    &nbsp;
                                                </td>
                                                <td width="260" valign="top">
                                              
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ee4c50" style="padding: 30px 30px 30px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">
                                        &reg; Spectrum Insurance, India <br/>
                                        <a href="#" style="color: #ffffff;"><font color="#ffffff">Unsubscribe</font></a> to this newsletter instantly
                                    </td>
                                    <td align="right" width="25%">
                                
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>';

$uid = md5(uniqid(time()));
$from_name="Adeeshwara ";
$from_mail="support@insofy.in";
$mailto=$to;
$replyto="support@insofy.in";
$message="Adeeshwara Insurance Forgot Password";
// header
$header = "From: ".$from_name." <".$from_mail.">\r\n";
$header .= "Reply-To: ".$replyto."\r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
// message & attachment
$nmessage = "--".$uid."\r\n";
$nmessage .= "Content-type:text/html; charset=iso-8859-1\r\n";
$nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$nmessage .= $msgf."\r\n\r\n";
$nmessage .= "--".$uid."--";
if (mail($mailto, $subject, $nmessage, $header)) {
  echo   "mail sent"; // Or do something here
} else {
  echo "mail not sent";
}
   
      echo $msg="<p class='alert alert-success'>A New Password is Sent to your registered email id</p>";
	
	}else{
         echo $msg="Error Occured";    
	 
}}
       } 
       else{
         echo $msg="Email ID cannot Be blank";    
	
	}
 		
}


	if($_GET['action']!='' && $_GET['action']=='changepass'){
		
			$id=$_REQUEST['id'];
			$pass=$_REQUEST['pass'];
		date_default_timezone_set('Asia/Calcutta');
		$date=date("Y-m-d G:i:s"); 
		   if($email!=''){
			$select=$db->fetchAssoc($db->fireQuery("select * from `user` where `id`='".$id."'"));
	if(count($select) == 0){
		
	echo $msg="<p class='alert alert-danger'>User Dose Not exists</p>";
	}else{ 
			$votes=$db->fireQuery("update user set password='".$pass."' where `id`='".$id."'");	   
	}
		   if($votes){
		echo $msg="<p class='alert alert-success'>Password Updated</p>";
	
		}else{
			echo  $msg="Error";    
		 
		}
		   } 
		   else{
			echo  $msg="Email ID cannot Be blank";    
		 
		}
		
	}


?>