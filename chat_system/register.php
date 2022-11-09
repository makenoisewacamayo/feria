<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
  .errmsgtxt
	{
		color:red;
	}
 </style>
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="index.php"><b>Admin</b>LTE</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>
	    <div class="alert alert-success" role="alert" id="msg_div" style="display:none;">
		  register successfully.
		</div>
		<div class="alert alert-danger" id="err_div" style="display:none;" role="alert">
			<p id="err_msg"> </p>
		</div>

      <form  method="post" name="frm" id="frm">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Full name">
		
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
		  
        </div>
		 
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="telephone" id="telephone" placeholder="Telephone">
		  <span class="errmsgtxt" id="phone_err"></span>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
		<div class="input-group mb-3" style="display:none;">
          <input type="text" class="form-control" name="user_name" id="user_name" placeholder="user name">
		
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
		  
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="pass_word" id="pass_word" placeholder="Password">
		  <span class="errmsgtxt" id="pass_err"></span>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="conn_pass" id="conn_pass" class="form-control" placeholder="Retype password">
		  <span class="errmsgtxt" id="conpass_err"></span>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
           <!-- <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div> -->
          </div>
          <!-- /.col -->
          <div class="col-4">
		   <div class="spinner-border" role="status" id="loader_div" style="display:none;">
			<span class="sr-only">Loading...</span>
			</div>
            <button type="button" class="btn btn-primary btn-block submitBtn">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     

      <a href="index.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$( ".submitBtn" ).click(function() {
		
		$("#msg_div").hide();
		$("#err_div").hide();
		
		
	
		var full_name     =$("#full_name").val();
		var telephone     =$("#telephone").val();
		var username      =$("#user_name").val();
		var pass_word       =$("#pass_word").val();
		var conn_pass     =$("#conn_pass").val();
		
		 if(full_name=="")
		 {
			 $("#err_div").show();
			 $("#err_msg").html("Enter Your Name");
			 return false;
		 }
		 
		 if(telephone=="")
		 {
			 $("#err_div").show();
			 $("#err_msg").html("Enter Your Telephone No");
			 return false;
		 }
		 if($("#telephone").val().length!=9)
		 {
			 $("#err_div").show();
			 $("#err_msg").html("Enter Your 9 digit Telephone No");
			 return false;
		 }
		 
		/* if(username=="")
		 {
			 $("#err_div").show();
			 $("#err_msg").html("Enter Your user Name");
			 return false;
			 
		 }
		 */
		 
		 if(pass_word=="")
		 {
			 $("#err_div").show();
			 $("#err_msg").html("Enter Your Password");
			 return false;
		 }
		 if($("#pass_word").val().length<4 || $("#pass_word").val().length>9)
		 {
			 $("#err_div").show();
			 $("#err_msg").html("Enter password atleat min 4 digit max 9 digit");
			 return false;
		 }
		 
		  if(conn_pass=="")
		 {
			 $("#err_div").show();
			 $("#err_msg").html("Enter Your Confirm Password");
			 return false;
		 }
		 if(pass_word!=conn_pass)
		 {
			 $("#err_div").show();
			 $("#err_msg").html("Password does not match");
			 return false;
		 }
		
		
		 var Inputform_data = new FormData();
		 Inputform_data.append("post_name", $("#full_name").val());
		 Inputform_data.append("post_telephone", $("#telephone").val());
	     Inputform_data.append("post_password", $("#pass_word").val());
		 Inputform_data.append("post_username", $("#user_name").val());
		 
		 Inputform_data.append("action",'register');		
		
	     $('.submitBtn').hide();
	     $("#loader_div").show();
		
	 $.ajax({
                type: "POST",
                url: 'action.php',
                data: Inputform_data,
                contentType: false,
                processData: false,
                success: function(response) {
               
                 console.log(response);
				 var Res =JSON.parse(response);
				 if(Res.success==1);
				 {
					 $("#frm")[0].reset(); 
					 $("#msg_div").show();
					 $("#loader_div").hide();
		              $('.submitBtn').show();
					
				 }							
                },
                error: function(response) {
                    loaderoff();
                     alert("Failed..");
                    
                }
        });
	 });
	 </script>
</body>
</html>
