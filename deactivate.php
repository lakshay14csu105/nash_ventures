<?php
include "connection.php";
$sql = "UPDATE user SET active=0 where user_id=".$_GET['id'];

if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'>
			alert('User Deactivated');
			window.location.href='adminDashboard.php';
			</script>";
} else {
    echo "<script type='text/javascript'>
			alert('User not Deactivated');
			window.location.href='adminDashboard.php';
			</script>";;
}

$conn->close();
?>