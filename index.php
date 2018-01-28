<?php session_start(); ?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SPL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
  </head>

  <body>
    <?php include "header.php"; ?>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1><font face="Rockwell">Programming Event At Nash</font></h1>
        <p><font face='Sitka Subheading'>"Quick As A Rabbit, Sharp As Knife Ninja Coder Is Always Ready For The Fight"</font></p>
        <p><a class="btn btn-primary btn-lg" href="https://www.cocubes.com/student/lakshayc23291" role="button">My Profile &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Early Schooling</h2>
          <p> Blue Bells Model School is a pioneer co-educational English medium school located in the heart of the city of Gurgaon (Haryana). Founded on Nov. 10, 1980, the school is a rare blend of tradition and modernity.
          </p>
          <p><a class="btn btn-default" href="http://bluebells.org/" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>College life</h2>
          <p>The NorthCap University was founded in 1996, to promote excellence in Technical and Management education by Educate India Society. The University was conceived as Institute of Technology and Management in response to the need to develop relevant human capital to meet the technology and management challenges of the 21st century.</p>
          <p><a class="btn btn-default" href="http://www.ncuindia.edu/" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>About Myself</h2>
          <p>A techie, a developer and computer science engineer looking to secure a job in the IT industry where I can utilize my knowledge for the organization’s growth.</p>
          <p><a class="btn btn-default" href="https://in.linkedin.com/in/lakshay-chaudhary-4b6838139" role="button">View details &raquo;</a></p>
        </div>
      </div>
    </div> <!-- /container -->
     <?php include "footer.php"; ?>
  </body>
</html> 

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#home").addClass("active");
	});
</script>
