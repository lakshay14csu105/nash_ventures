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
  <?php 
  	session_start();
  	include "header.php"; ?>
 <br>
  <form id="myform" action="userSearchIndex.php" method="post">

	<input type="text" name="tweets" id="myInput" style="width: 70%;margin-left: 10%;" placeholder="Search for tweets" title="Type in a keyweord">
	<button type="button" style="margin-bottom:5px;margin-left: 10px" onclick="submitform();" class="btn btn-primary btn-lg">Search</button>

</form>
<?php
require_once "twitteroauth-master/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

define('CONSUMER_KEY', 'enter yours here');
define('CONSUMER_SECRET', 'enter yours here');
define('ACCESS_TOKEN', 'enter yours here');
define('ACCESS_TOKEN_SECRET', 'enter yours here');
if(isset($_POST['tweets'])){
	$_SESSION['search'] = $_POST['tweets'];	
}
$search = $_SESSION['search'];
$obj_str = 'tweets_'.str_replace(' ', '_', $search);

	$conn = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
	$query = array(
		"q" => $search,
		"count" => 100,
		"result_type" => "recent"
	);
	$tweets = $conn->get('search/tweets', $query);
	if (!empty($tweets->statuses)) {
 }

$i=1;
$tweetsAll = array();
if (!empty($tweets->statuses)) {
	foreach ($tweets->statuses as $tweet) {
		$tweetsArr = array();
		$tweetsArr['sno'] = $i;
		$tweetsArr['text'] = $tweet->text;
		$tweetsArr['created'] = $tweet->created_at;
		$tweetsAll[] = $tweetsArr;
		$i++;
	} 
} 
?>
 <table class="table table-striped" style="width: 80%;margin-left: 10%">
 	<thead>
 		<tr>
 			<th>Tweet Count</th>
 			<th>Text</th>
 			<th>Created Date</th>
 		</tr>
 	</thead>
 	<tbody>
 	<?php 
 	if(!isset($_GET['offset'])){
 		$offset =1;
 	}
 	else {
 		$offset = $_GET['offset'];
 	}
 	if(isset($tweetsAll)){
 		for($i=$offset;$i<$offset+10;$i++){
 			echo "<tr>";
 			echo "<td>".$tweetsAll[$i-1]['sno']."</td>";
 			echo "<td>".$tweetsAll[$i-1]['text']."</td>";
 			echo "<td>".$tweetsAll[$i-1]['created']."</td>";
 			echo "</tr>";
 		}
 	} else {
 		echo "<p>No tweet found!</p>";
 	}?>
 	</tbody>
 </table>
 <center>
 <ul class="pagination">
  <li><a href="userSearchIndex.php?offset=1">1</a></li>
  <li><a href="userSearchIndex.php?offset=11">2</a></li>
  <li><a href="userSearchIndex.php?offset=21">3</a></li>
  <li><a href="userSearchIndex.php?offset=31">4</a></li>
  <li><a href="userSearchIndex.php?offset=41">5</a></li>
  <li><a href="userSearchIndex.php?offset=51">6</a></li>
  <li><a href="userSearchIndex.php?offset=61">7</a></li>
  <li><a href="userSearchIndex.php?offset=71">8</a></li>
  <li><a href="userSearchIndex.php?offset=81">9</a></li>
  <li><a href="userSearchIndex.php?offset=91">10</a></li>
</ul>
</center>
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