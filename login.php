<?php include_once 'includes/header.php';?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Sign In/Sign Up</li>
        </ol>
        <h2>Sign In/Sign Up</h2>

      </div>
    </section><!-- End Breadcrumbs -->
   <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
 $(document).ready(function(){
	$("#login").click(function(){
	var form_email=$("#form_email").val();	
	var form_password=$("#form_password").val();
	if($("#form_id").val()!=''){
	var form_id=$("#form_id").val();
	}else{var form_id='';}
var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;   	
	if(form_email==''){
	$("#form_email").focus();
    $("#msg").html("<p class='alert alert-danger'>Email id cannot be blank</p>");	
    return false;
	}
	
	else if(!regex.test(form_email)){
	$("#form_email").focus();
    $("#msg").html("<p class='alert alert-danger'>Enter Email id in correct Format</p>");	
    return false;
	}
	else if(form_password==''){
	$("#form_password").focus();
    $("#msg").html("<p class='alert alert-danger'>Password cannot be blank</p>");	
    return false;
	}
	else{
	 $.ajax({
                    url: "api.php?action=login&email="+form_email+"&password="+form_password,
                    success: function (result) {
                     var res = result.length;
					 if(res>5){
					 $("#msg").html(result);		 
					 }
					 else{//alert(form_id);						 
					window.location.href = "profile.php";
				
					 }
                    }
                });
	}
	});
	
	$("#register").click(function(){
	var form_name=$("#form_name").val();	
	var form_email=$("#form_email1").val();	
	var form_phone=$("#form_phone").val();	
	var form_age=$("#form_age").val();	
	var form_address=$("#form_address").val();	
	var form_re_enter_password=$("#form_re_enter_password").val();	
	var form_choose_password=$("#form_choose_password").val();	
	

var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;   	
var regex1 = /^\d*(?:\.\d{1,2})?$/; 	
	if(form_name==''){
	$("#form_name").focus();
    $("#msg1").html("<p class='alert alert-danger'>Name cannot be blank</p>");	
    return false;
	}

	if(form_email==''){
	$("#form_email1").focus();
    $("#msg1").html("<p class='alert alert-danger'>Email id cannot be blank</p>");	
    return false;
	}
	
	else if(!regex.test(form_email)){
	$("#form_email1").focus();
    $("#msg1").html("<p class='alert alert-danger'>Enter Email id in correct Format</p>");	
    return false;
	}
	
	else if(form_phone==''){
	$("#form_phone").focus();
    $("#msg1").html("<p class='alert alert-danger'>Phone cannot be blank</p>");	
    return false;
	}
	
	else if(form_phone.length!=10){
	$("#form_phone").focus();
    $("#msg1").html("<p class='alert alert-danger'>Enter Phone of 10 digit</p>");	
    return false;
	}
	else if(!regex1.test(form_phone)){
	$("#form_phone").focus();
    $("#msg1").html("<p class='alert alert-danger'>Enter Phone in correct Format</p>");	
    return false;
	}
	else if(form_age==''){
	$("#form_age").focus();
    $("#msg1").html("<p class='alert alert-danger'>Age cannot be blank</p>");	
    return false;
	}
	else if(form_address==''){
	$("#form_address").focus();
    $("#msg1").html("<p class='alert alert-danger'>Address cannot be blank</p>");	
    return false;
	}
	else if(form_choose_password==''){
	$("#form_choose_password").focus();
    $("#msg1").html("<p class='alert alert-danger'>Password cannot be blank</p>");	
    return false;
	}
	else if(form_choose_password!=form_re_enter_password){
	$("#form_choose_password").focus();
    $("#msg1").html("<p class='alert alert-danger'>Password And reentered password not matched</p>");	
    return false;
	}
	else if(login_type==''){
	$("#login_type").focus();
    $("#msg1").html("<p class='alert alert-danger'>login_type cannot be blank</p>");	
    return false;
	}
	else{
	 $.ajax({
   url: "api.php?action=register&email="+form_email+"&refereal="+refereal+"&password="+form_choose_password+"&name="+form_name+"&phone="+form_phone+"&address="+form_address+"&age="+form_age+"&confirmpassword="+form_re_enter_password+"&login_type="+login_type,
                    success: function (result) {
                     var res = result.length;
					 if(res>5){
					 $("#msg1").html(result);	
	$("#form_name").val("");	
	$("#form_email1").val("");	
	$("#form_phone").val("");	
	$("#form_age").val("");	
	$("#form_address").val("");	
	$("#form_re_enter_password").val("");	
	$("#form_choose_password").val("");						 
					 }
					 else{
					window.location.href = "login.php";
					 }
                    }
                });
	}			
	});	
	
	
	
	
	
 });
 
 </script>

                  

        <div class="row gy-4">

  <div class="col-lg-6"> <div id="msg"></div>
 <h4> Already Registered ? Login Now</h4>
            <form action="" method="post" class="php-email-form">

              <div class="row gy-4">



                <div class="col-md-12">
				   <input id="form_email" name="form_email" class="form-control" type="email" placeholder="Your Email ID" required="">

                </div>



                <div class="col-md-12">
   <input id="form_password" name="form_password" class="form-control" type="password" placeholder="Your Password" required="">

                </div>




                <div class="col-md-12 text-center">

                  <button type="button" name="login" id="login" class="btn btn-primary getstarted " style="background: #43A03E;">Login</button>
                </div>
				   <div class="clear text-center pt-20">
                  <a class="text-theme-colored1 font-weight-600 font-size-12" href="forgot.php">Forgot Your Password?</a>
                </div>
              </div>
            </form>
          </div>
          <div class="col-lg-6"> <div id="msg1"></div>
      <h4> New Here ? Please Register Here!</h4>
            <form  method="post" class="php-email-form">

              <div class="row gy-4">



                <div class="col-md-6">

                  <input name="form_name" id="form_name" class="form-control" placeholder="Your Name" type="text" required="">

                </div>
                <div class="col-md-6 ">
              <input name="form_email" id="form_email1" class="form-control" type="email" placeholder="Your Email ID" required="">

                </div>

                <div class="col-md-6 ">
                 <input name="form_phone" id="form_phone" class="form-control" type="text" placeholder="Your Phone No" required="">

                </div>
               <div class="col-md-6 ">
                <input name="form_age" id="form_age"  class="form-control" type="number" placeholder="Your Age" required="">

                </div>
				
				 <div class="col-md-12">
                   <textarea name="form_address" id="form_address" class="form-control" rows="3" required=""></textarea>

                </div>
              <div class="col-md-6 ">
			   <label for="form_choose_password">Choose Password</label>
               <input id="form_choose_password" name="form_choose_password" class="form-control" type="password" required="">

                </div>
				
		      <div class="col-md-6 ">
              <label>Re-enter Password</label>
             <input id="form_re_enter_password" name="form_re_enter_password"  class="form-control" type="password" required="">

                </div>
                <div class="col-md-12 text-center">

                  <button type="button" class="btn btn-primary getstarted " id="register" style="background: #43A03E;">Register</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
	  
	  
    </section><!-- End Portfolio Details Section -->


  </main><!-- End #main -->

<?php include_once 'includes/footer.php';?>