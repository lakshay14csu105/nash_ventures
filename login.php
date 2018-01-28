<?php
	session_start();
	include "connection.php";
	$stmt=$conn->prepare("SELECT admin,firstname,password from user where username=? and active=1");
	$stmt->bind_param("s",$_POST['username']);
	$stmt->execute();
	$stmt->bind_result($admin,$name,$pass);
	if($stmt->fetch()){
		if(password_verify($_POST['password'],$pass)){
			$_SESSION['login']=$_POST['username'];
			$_SESSION['name']=$name;
			if($admin==1)
				$_SESSION['admin']=true;
			header("location: index.php");
		}
		else echo "<script>alert('Invalid Username or Password');
							window.location.href='index.php'</script>";
	}
	else echo "<script>alert('Invalid Username or Password');
							window.location.href='index.php'</script>";
?>