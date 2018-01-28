<?php 
	session_start();
	$_SESSION['namecheck']=true;
	include "connection.php";
	$stmt=$conn->prepare("SELECT username FROM user WHERE username=?");
	$stmt->bind_param("s",$_POST["username"]);
	$stmt->execute();
	$result['exists']=2;
	if($stmt->fetch())
		$result['exists']=1;
	echo json_encode($result);
	$conn->close();
?>
