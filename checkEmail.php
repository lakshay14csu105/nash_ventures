<?php 
	session_start();
	$_SESSION['emailcheck']=true;
	include "connection.php";
	$stmt=$conn->prepare("SELECT email FROM user WHERE email=?");
	$stmt->bind_param("s",$_POST["email"]);
	$stmt->execute();
	$result['exists']=2;
	if($stmt->fetch())
		$result['exists']=1;
	echo json_encode($result);
	$conn->close();
?>
