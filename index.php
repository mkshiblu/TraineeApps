<?php

 	//session_destroy();//start session for the user
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
		<div class = " navbar-inverse navbar-static-top">    <!--navbar-fixed-bottom will place this as a footer -->
				<div class = "container">
					<!--<p class = "navbar-text pull-left"></p>-->

					<!--logo+appname -->
					<a href="index.php" class="navbar-brand" ><img src="images/logo.png" class="logo" >  Trainee Apps</a>

					<!--NEED SOLN NOT WORKING PROPERLY WHEN NAVBAR IS OPEN -->
					<div class = " pull-right">
					<div class="row=5">	
						<?php	
							//require_once('php/logincheck.php');
							//if user is logged in show his name and picture
							if(isLoggedIn()){ 
								echo'<img src="images/unverified.png" class="logo">';
								echo '<a href="" class="btn btn-success">'.$_SESSION['username'] .'</a>';	
								echo '<a href="php/logout.php" class="btn btn-danger">Logout<a>';
							}
							else{  //otherwise show login and signup button
								echo '<a  href = "#login-dialog" class = "btn btn-success navbar-btn" data-toggle = "modal">Login</a>';
								echo '<a href = "createaccount.php" class="btn btn-info navbar-btn">Register</a>';
							}//else
						?>

					</div>
					</div>

				</div>
		</div>

		
		<!--creating the navigation area -->
		<div class="navbar navbar-inverse navbar-static-top">
				<div class="container">
					
					<!--navbar toggle button-->
					<button class="navbar-toggle" data-toggle="collapse"  data-target=".navHeaderCollapse">
						<!--create three bars to create the toggle button-->
						<span class = "icon-bar"></span>
						<span class = "icon-bar"></span>
						<span class = "icon-bar"></span>
					</button>

					<!--actual navigations  navHeaderCollpase is needed to refer in the collapse btn -->
					<nav class="collapse navbar-collapse navHeaderCollapse">
							<ul class ="nav navbar-nav navbar-right">
								<li class="active"> <a href="" >Home</a></li>
								<li> <!--drop down menu for top 100 apps -->
									<a href="register.php" class="dropdown-toggle" data-toggle = "dropdown">Top 100 <b class = "caret"></b></a>
									<ul class = "dropdown-menu">
										<li><a href="" >Apps</a></li>
										<li><a href="" >Games</a></li>
										<li><a href="" >Mixed</a></li>	
									</ul>	
								</li>
								<li><a href="" >Developers</a></li>
								<li><a href="" >Contact</a></li>
							</ul>	
					</nav>	
				</div>	
		</div>	

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