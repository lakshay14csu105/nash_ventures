<?php 
session_start();
if(isset($_SESSION['userid']))
	header("location: index.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>SPL</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/custom.css" rel="stylesheet">
	</head>

	<body>
		<?php include "header.php"; ?>

 
		<div class="center-container">
			<div class="container" id="sign_up_form">
				<h3>Sign Up Form</h3>
				<form class="form-horizontal" onsubmit="return check()" action="signup_action.php" method="POST" enctype="multipart/form-data">   

					 <div class="form-group">
						<label class="control-label col-sm-2" for="firstname">First Name:</label>
						<div class="col-sm-10">
							<input type="text" required="required" class="form-control" id="firstname" name="firstname" placeholder="Enter First Name">
						</div>
					</div>

					 <div class="form-group">
						<label class="control-label col-sm-2" for="lastname">Last Name:</label>
						<div class="col-sm-10">
							<input type="text" required="required" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name">
						</div>
					</div>



					<div class="form-group">
						<label class="control-label col-sm-2" for="email">Email:</label>
						<div class="col-sm-10">
							<input type="text" required="required" class="form-control" id="email" name="email" placeholder="Enter email">
						</div>
					</div>

					 <div class="form-group">
						<label class="control-label col-sm-2" for="phone">Contact Number :</label>
						<div class="col-sm-10">
							<input type="text" required="required" class="form-control" id="phone" name="phone" placeholder="Enter contact number">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2" for="name">Username:</label>
						<div class="col-sm-10">
							<input type="text" required="required" class="form-control" id="uname" name="uname" placeholder="Enter username">
						</div>
					</div>
						
						
						<div class="form-group">
						<label class="control-label col-sm-2" for="pwd">Password:</label>
						<div class="col-sm-10">
							<input type="password" required="required" class="form-control" id="pwd" name="password" placeholder="Enter password">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="cpwd">Confirm Password:</label>
						<div class="col-sm-10">
							<input type="password" required="required" class="form-control" id="cpwd" name="cpassword" placeholder="Confirm password">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="profile_pic">Upload Profile Pic:</label>
						<div class="col-sm-10">
							<input type="file" required="required" class="form-control" id="profile_pic" name="profile_pic" placeholder="Upload Profile Picture">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-default">Submit</button>
						</div>
					</div>
				</form>
								</div>
	</div>


		<?php include "footer.php"; ?> 
	</body>
</html> 

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#signup").addClass("active");
	});

res="";

function cb(exists){
	return exists;
}

	function checkUsername(username){
				$.ajax({
							url: 'checkUsername.php',
							type: 'POST',
							async: false,
							data: { username: username },
							 success: function(data){
									var obj=$.parseJSON(data);
								 if(obj.exists==1)
											res+="\nUsername already in use"; 
							 },
							error: function(textStatus, errorThrown){
								alert(errorThrown);
							 }
						});  
			}
	function checkEmail(email){
	$.ajax({
				url: 'checkEmail.php',
				type: 'POST',
				async: false,
				data: { email: email },
				 success: function(data){
					var obj=$.parseJSON(data);
					 if(obj.exists==1)
						res=res+"\nEmail already in use"   
				 },
				error: function(textStatus, errorThrown){
					alert(errorThrown);
				 }
			});  
}
	function check(){
			var email=$("#email").val().trim();
			var username=$("#uname").val().trim();
			var pass=$("#pwd").val();
			var cpass=$("#cpwd").val();
			var phone=$("#phone").val().trim();
			res="";
			var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			var ph = /^(\d{7,15})$/;
			if(!re.test(email)){
					res=res+"\nEnter a valid email";
			}
			if(pass.length<8){
					res=res+"\nMinimum password length is 8";
			}
			if(username.length<4)
					res=res+"\nMinimun length of username is 4";
			if(cpass!=pass)
					res=res+"\nConfirm password does not match";
			if(!ph.test(phone))
				res+="\nEnter Valid Contact Number";
			checkUsername(username);
			checkEmail(email);
			if(res.length!=0){
					alert(res);
					return false;
			}
			else
					return true;        
	}
</script>

