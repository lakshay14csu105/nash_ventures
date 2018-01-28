<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<style>
	#myInput {
	  background-position: 10px 12px;
	  background-repeat: no-repeat;
	  width: 100%;
	  font-size: 16px;
	  padding: 12px 20px 12px 40px;
	  border: 1px solid #ddd;
	  margin-bottom: 12px;
	}
</style>
 <script type="text/javascript">
    function submitform()
     {
    	document.forms["myform"].submit();
     }
    </script>
<body>
<?php include "header.php"; ?>
<br>
<form id="myform" action="adminSearchIndex.php" method="post">

	<input type="text" name="username" id="myInput" style="width: 70%;margin-left: 10%;" placeholder="Search by username.." title="Type in a name">
	<button type="button" style="margin-bottom:5px;margin-left: 10px" onclick="submitform();" class="btn btn-primary btn-lg">Search</button>

</form>
<?php
	session_start();
	include "connection.php";
	$username = $_POST['username'];
	if(isset($_SESSION['admin']) && $_SESSION['admin']==true){
		$sql = "SELECT * FROM user where username LIKE '%".$username."%' AND admin=0";
		$result = $conn->query($sql);
		include "adminAll.php";
	}
	else {
		header("location: index.php");
	}		
?>
<?php include "footer.php"; ?>
</body>