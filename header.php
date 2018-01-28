<link href="css/common.css" rel="stylesheet">
<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li id="home"><a href="index.php">Home</a></li>
						<?php
							session_start();
							if(isset($_SESSION['admin']) && $_SESSION['admin']==true){
								?>
						<li id="adminDashboard"><a href="adminDashboard.php">Dashboard</a></li>
						<?php } else if (isset($_SESSION['login']) && !isset($_SESSION['admin'])) {?>
						<li id="userDashboard"><a href="userDashboard.php">Dashboard</a></li>
						<?php } ?>		
					</ul>
					<ul class="nav pull-right navbar-nav">
					<?php if(!isset($_SESSION['login'])){ ?>
					<li class="dropdown">
						<a class="dropdown-toggle" href="#" data-toggle="dropdown">Login<strong class="caret"></strong></a>
						<div class="dropdown-menu">
							<form method="post" action="login.php" accept-charset="UTF-8">
								<input class="inp" type="text" placeholder="Username" id="username" name="username" required="required">
								<input class="inp" type="password" placeholder="Password" id="password" name="password" required="required">
								<input class="btn btn-primary inp" type="submit" id="login" value="Login">
							</form>
						</div>
					</li>

					<li id="signup"><a href="signup.php">Sign Up</a></li>
					<?php } else { ?>
					<li><p class="navbar-text">Welcome <?php echo $_SESSION['name']; ?></p></li>
					<li id="logout"><a href="logout.php">Logout</a></li>
					<?php } ?>

					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>