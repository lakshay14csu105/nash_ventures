<?php 
	session_start();
	$_SESSION['namecheck']=true;
	include "connection.php";
	$stmt=$conn->prepare("SELECT username FROM user WHERE username=? AND user_id !=?");
	$stmt->bind_param("ss",$_POST["username"],$_POST['id']);
	$stmt->execute();
	$result['exists']=2;
	if($stmt->fetch())
		$result['exists']=1;
	echo json_encode($result);
	$conn->close();
?>
