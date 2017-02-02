<?php
/*
this page outputs the top portion of the website which remain consistant across
all the page.The header portion contains logo,name,navigation bar
profile picture sign in and logout button*/?>
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




