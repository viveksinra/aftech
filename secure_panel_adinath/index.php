<?php ob_start();
session_start();

include_once 'com/sqlConnection.php';
$db=new sqlConnection();
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2></h2>
               
                <h5>( Login yourself to get access )</h5>
                 <br />
            </div>
        </div>
         <div class="row ">
               
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>   Enter Details To Login </strong>  
                            </div><?php
if (isset($_POST['login'])) {
    $username = trim($_POST['email']);
    $password = (trim($_POST['password']));
    if ($username == "" && $password == "") {
        $_SESSION['msg'] = "Email & Password must Not Be Blank";
    } else {
            $result = $db->fireQuery("select * from `admin` where `username`='".$username."' and `password`='".$password."' ");
            if ($rows = $db->fetchAssoc($result)){
            echo $_SESSION['user_id'] = $rows[0]['id'];
            echo $_SESSION['category'] = $rows[0]['category'];
            echo $_SESSION['username'] = $rows[0]['username'];
            echo $_SESSION['admin-type'] = $rows[0]['admin_type'];
            echo $_SESSION['email'] = $rows[0]['email'];
            header("Location:welcome.php");
        }else {
            $_SESSION['msg'] = "Wrong Email or Password";
        }
    }
  }
  
?><div class="errordiv">
<?php if ($_SESSION['msg']) {
    echo '<div class="errormsg" style="cursor:pointer">' . $_SESSION['msg'] . '</div>';
    $_SESSION['msg'] = '';
    unset($_SESSION['msg']);
} ?>
</div>
                            <div class="panel-body">
                                <form role="form" method="post" action="">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" name="email" class="form-control" placeholder="Your Email " />
                                        </div>
                                                                              <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" name="password" class="form-control"  placeholder="Your Password" />
                                        </div>
                                    <div class="form-group">
                                            
                                        </div>
                                     
                                     <input type="submit" name="login" value="Login Now" class="btn btn-primary "/>
                                    <hr />
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>


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
