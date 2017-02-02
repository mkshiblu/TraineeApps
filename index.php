<?php

 	//start session for the user
 	require_once('php/login.php');
	//echo $steps;
?>
<!DOCTYPE HTML>
<html>
	
	<head>
		<title>Trainee Apps</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/styles.css">
	</head>
		
	<body>

		<!--header area containing logo,app name, log in form and regiser button -->
		<?php require_once('parts/header.php') ?>
		<form action="search.php" method="get">
			<input type="text" name="tahsin">
			<button type="submit">search</button>
		</form>
		<!--THE IMAGE SLIDESHOW AREA-->
		<div class = "container">   <!--puts element in the middle-->
			<div class = "jumbotron">
				<h3>Here the image slideshow </h3>
			</div>
		</div>
	
		<!--the search result area-->
		<div class = "row">
			<div class = "col-lg-9">
					<div class = "panel panel">
						<?php require_once('parts/middle.php') ?>
						
					</div>
			</div>

		</div>

		<!--the login form opened by the login button it's hidden-->
		<div class = "modal fade" id = "login-dialog" role = "dialog">
				<div class = "modal-dialog">
					<div class = "modal-content">
						<div class = "modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class = "text-center modal-title">Login Form </h3>
							
						</div>	<!--the login form consist of user name field,password field ,cancel and login button -->
						<div class = "modal-body">

							 <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
								<!--TO DO SHOW ERROR MSG IF USER NOT FOUND-->
								<input type="text" name ="username" placeholder = "Username">
								<input type = "text" name="password" placeholder = "password">
								<button type= "submit" name="submit" class = "btn btn-success" >Login</button>
							</form>
						</div>
						<div class = "modal-footer">

							<?php
								echo '<div class = "alert alert-info">'.$error_msg.'</div>';
							?>
							<!--TODOif login not successful echo the errors an re-ask the user else-->
							<p>Don't have an account? <a class = "btn btn-info" href = "createaccount.php">Register</a></p>
						</div>
					</div>
				</div>
		</div>	

		<script src="js/jquery-2.0.3.min.js"></script> 
		<script type="text/javascript" src="js/bootstrap.js"></script>  <!--use min.js versions when in the actual server -->

	</body>	
</html>