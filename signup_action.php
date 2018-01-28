<?php
	session_start();
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
	else if(strlen($_POST['password'])<8)
		$input=false;

	if(!empty($_FILES['profile_pic']['name'])) {
		$filename = $_FILES["profile_pic"]["name"];
		$file_basename = substr($filename, 0, strripos($filename, '.'));
		$file_ext = substr($filename, strripos($filename, '.'));
		$filesize = $_FILES["profile_pic"]["size"];
		$allowed_file_types = array('.jpeg','.png','.jpg');

		if (in_array($file_ext,$allowed_file_types) && ($filesize < 200000)){
			$newfilename = $_POST['uname']."(1)". $file_ext;
			if(move_uploaded_file($_FILES["profile_pic"]["tmp_name"], "images/" . $newfilename)) {
			}
			else {	
				$input=false;
				echo "<script>alert('Image not uploaded!!');
						window.location.href='index.php';</script>";
			}
						
			
		}
		else if ($filesize > 200000){
			$input=false;
			echo "<script>alert('File too large!!');
						window.location.href='index.php';</script>";
		}
		else{	
			$input=false;
			echo "<script>alert('Only these file types are allowed for upload:" . implode(', ',$allowed_file_types)."');
						window.location.href='index.php';</script>";
			unlink($_FILES["image1"]["tmp_name"]);
		}
	}

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
		$stmt=$conn->prepare("INSERT INTO user(username,firstname,lastname,email,phone,password,profile_picture) VALUES(?,?,?,?,?,?,?)");
		$pass=password_hash($_POST['password'],PASSWORD_DEFAULT);
		$stmt->bind_param("sssssss",$_POST['uname'],$_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['phone'],$pass,$newfilename);
		$stmt->execute();
		$conn->close();
		echo "<script type='text/javascript'>
				alert('Account created successfully!!');
				window.location.href='index.php';
				</script>";
		
	}
?>