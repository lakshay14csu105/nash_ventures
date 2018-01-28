  <head>
    <title>SPL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
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
  </head>

  <?php include "header.php"; ?>
  <br>
  <form id="myform" action="userSearchIndex.php" method="post">

	<input type="text" name="tweets" id="myInput" style="width: 70%;margin-left: 10%;" placeholder="Search for tweets" title="Type in a keyweord">
	<button type="button" style="margin-bottom:5px;margin-left: 10px" onclick="submitform();" class="btn btn-primary btn-lg">Search</button>

</form>

<?php include "footer.php"; ?>
  </body>
</html> 

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#userDashboard").addClass("active");
	});
</script>
