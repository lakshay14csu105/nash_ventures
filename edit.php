<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php include "header.php"; ?>
<?php
session_start();

if(!(isset($_SESSION['admin']) && $_SESSION['admin']==true)){
	header("location: index.php");
}

include "connection.php";
$sql = "Select * from user where user_id=".$_GET['id'];
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>
<br>
<div class="panel panel-primary" style="width: 80%;margin-left: 10%">
	<div class="panel-heading"><b>User Id: </b><?php echo $_GET['id'];?>
	</div>
	<div class="panel-body">
		<?php if(isset($row['profile_picture'])) {
				echo "<img src='images/".$row['profile_picture']."' class='img-circle pull-right' width='150' height='150'>";
			}
			else {
				echo "<img src='images/temp.png' class='img-circle pull-right' width='150' height='150'>";
			}
			?>

				<form class="form-horizontal" onsubmit="return check()" action="edit_action.php" method="POST" enctype="multipart/form-data">   

					 <div class="form-group">
						<label class="control-label col-sm-2" for="id">User Id:</label>
						<div class="col-sm-6">
							<input type="text" required="required" class="form-control" id="id" name="id" readonly value="<?php echo $row['user_id']?>" placeholder="id">
						</div>
					</div>

					 <div class="form-group">
						<label class="control-label col-sm-2" for="firstname">First Name:</label>
						<div class="col-sm-6">
							<input type="text" required="required" class="form-control" id="firstname" name="firstname" value="<?php echo $row['firstname']?>" placeholder="Enter First Name">
						</div>
					</div>

					 <div class="form-group">
						<label class="control-label col-sm-2" for="lastname">Last Name:</label>
						<div class="col-sm-6">
							<input type="text" required="required" class="form-control" id="lastname" name="lastname" value="<?php echo $row['lastname']?>" placeholder="Enter Last Name">
						</div>
					</div>



					<div class="form-group">
						<label class="control-label col-sm-2" for="email">Email:</label>
						<div class="col-sm-6">
							<input type="text" required="required" class="form-control" id="email" value="<?php echo $row['email']?>" name="email" placeholder="Enter email">
						</div>
					</div>

					 <div class="form-group">
						<label class="control-label col-sm-2" for="phone">Contact Number :</label>
						<div class="col-sm-6">
							<input type="text" required="required" class="form-control" id="phone" name="phone" value="<?php echo $row['phone']?>" placeholder="Enter contact number">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2" for="name">Username:</label>
						<div class="col-sm-6">
							<input type="text" required="required" class="form-control" id="uname" name="uname" value="<?php echo $row['username']?>" placeholder="Enter username">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-6">
							<button type="submit" class="btn btn-default">Edit</button>
						</div>
					</div>
				</form>	
		<br>
	</div>
</div>
<?php include "footer.php"; ?>		

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#edit").addClass("active");
	});

res="";

function cb(exists){
	return exists;
}

	function checkUsername(username,id){
				$.ajax({
						url: 'checkUsernameEdit.php',
						type: 'POST',
						async: false,
						data: { username: username,
							id: id },
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
	function checkEmail(email,id){
	$.ajax({
				url: 'checkEmailEdit.php',
				type: 'POST',
				async: false,
				data: { email: email,
					id : id },
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
			var phone=$("#phone").val().trim();
			var id=$("#id").val().trim();
			res="";
			var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			var ph = /^(\d{7,15})$/;
			if(!re.test(email)){
					res=res+"\nEnter a valid email";
			}
			if(username.length<4)
					res=res+"\nMinimun length of username is 4";
			if(!ph.test(phone))
				res+="\nEnter Valid Contact Number";
			checkUsername(username,id);
			checkEmail(email,id);
			if(res.length!=0){
					alert(res);
					return false;
			}
			else
					return true;        
	}
</script>

