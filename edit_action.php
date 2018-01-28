<?php
	session_start();

	if(!(isset($_SESSION['admin']) && $_SESSION['admin']==true)){
	header("location: index.php");
	}

	$input=true;
	if(!isset($_SESSION['emailcheck']) || !isset($_SESSION['namecheck']))
		$input=false;
	else if(strlen($_POST['uname'])<4)
		$input=false;
	else if($_POST['firstname']==NULL)
		$input=false;
	else if($_POST['lastname']==NULL)
		$input=false;
	else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
		$input=false;
	else if(!isset($_POST['id']))
		$input=false;
	unset($_SESSION['emailcheck']);
	unset($_SESSION['namecheck']);
	if(!$input){
		echo "<script type='text/javascript'>
				alert('Bad Input!');
				window.location.href='index.php';
				</script>";

	}
	else{
		include "connection.php";
		$stmt=$conn->prepare("UPDATE user SET username=?, lastname=?, firstname=?, email=?, phone=? WHERE user_id=?");
		$stmt->bind_param("ssssss",$_POST['uname'],$_POST['lastname'],$_POST['firstname'],$_POST['email'],$_POST['phone'],$_POST['id']);
		
		if ($stmt->execute()) {
			echo "<script type='text/javascript'>
				alert('User edited Successfully!!');
				window.location.href='adminDashboard.php';
				</script>";
		} 
		else {
			echo "<script type='text/javascript'>
				alert('User not edited!!');
				window.location.href='adminDashboard.php';
				</script>";
		}
	
		$conn->close();		
		
	}
?>