<?php
/*THIS SCRIPT CAN BE CALLED IN TWO WAYS.FIRST, CLICKING ON REGISTER  BUTTON IN HOMEPAGE 
AND SECONDLY CLICKING ON THE SUBMIT BUTTON  IN CREATEACCOUNT I.E. THIS PAGE
 WHICH ALSO GENERATES A 'POST' REQUEST*/
session_start();
//script for registering an account
 require_once('php/logincheck.php');
	require_once('php/registration.php');
	

	//if regsitration is successfull then remove the registration form and display successful msg
	if($isRegSuccessfull){
	//=============TODO REMOVE THE REGISTRATION FORM =====================
		//set sessions with username,user id and profile picture
	saveLogin($userid, $username);
	
//	echo $_SESSION['username'];
	//display success msg
	echo '<div class = "alert alert-success">You have successfully created an account.start uploading NOW!</div>';

	//provide a link to go back to homepage which sends username and picture using a GET request
	echo '<a class="btn btn-success" href="index.php">Go Back</a>';
  
		//necessaray?!
		$isRegSuccessfull = false;
	}//if
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


		<!--THE REGISTRATION FORM -->
		<div class = "container col-sm-8 col-sm-offset-2 col-md-7 col-md-offset-3 col-lg-5 col-lg-offset-3">
<!--================================================THE FORM AREA======================================-->
			<form class="well" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<!--profile picture upolad area -->
				<div class="form-group  ">
					<div class="form-group col-sm-4 col-sm-offset-1">
						<img class="img-thumbnail" src="images/unverified.png" alt="profile Picture">
					</div>
					<div class="form-group col-sm-7 ">
						<label class="control-label" for="ppFile">Upload Your profile picture.</label>
						<input type="file" id="ppFile" name = "userpic" value="Browse..">
						<p class="help-block">Upload JPG,JPEG,PNG,GIF file as a profile picture.Maximum File size is 1MB.
							Profile picture is publically visible.Any visitor/user can see and download it. </p>
					</div>
				</div>	

				<!--<div class="fileinput fileinput-new" data-provides="fileinput">
					  <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
					  <div>
					    <span class="btn btn-default btn-file">
					    	<span class="fileinput-new">Select image</span>
					    	<span class="fileinput-exists">Change</span>
					    	<input type="file" name="..."></span>
					    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
					  </div>
				</div> -->



 				<!--username and password areas-->
				<div class = "form-group">
					<label class = "control-label" for="username">Username</label>
					<input id="username" name="username" class = "form-control" type = "text" placeholder = "Enter your display name">
					<!--
					<p class="help-block">Username Must be unique and mustn't contain any whitespaces.You can login using this name. </p>
						-->
		 		</div>

		 		<!--Full name-->
			<!--	<div class = "form-group">
					<label class = "control-label" for="fullname">Full name</label>
					<input id="full" class = "form-control" type = "text" placeholder = "Enter your full name">
				
					<p class="help-block">Full name shoudn't be longer than 30 characters and may contain whitespaces.</p>
				
		 		</div> -->

		 		

		 		<div class = "form-group">
					<label class= "control-label" for ="password">Password</label>
					<input id = "password" name="password" class = "form-control" placeholder = "Enter not more than 10 characters" type = "password">
					<!--
					<p class="help-block">Don't use your username/email as your password.A combination of both numbers and 
						letters forms a strong password.</p>				
					-->
				</div>

				<div class = "form-group">	
					<label class = "control-label" for="confirmPassword">Confirm password</label>
					<input id="confirmPassword" class = "form-control" type = "password" placeholder = "Re-write your password">
				</div>

				<div class = "form-group">
					<label class="control-label" for="email">Email Address</label>
					<input id="email" class = "form-control" type = "email" placeholder = "Your email address">
				</div>

				<!--GENDER SELECT AREA -->
				<div class = "form-group">
					<label class="control-label" >Gender</label>
					<div class = "form-inline">
						<label class=" radio inline">
							<input type = "radio" name="optionsRadios" value = "1">
							Male
						</label>
						<label class="radio inline">
							<input type = "radio" name="optionsRadios" value = "2">
							Female
						</label>
					</div>
				</div>	

				<!--not required elements University,university ID,Country,Area-->


				<!--university-->
	<!--			<div class="form-group">
					<label class="control-label" for="university">University</label>
					<input id="o" class="form-control" type="text" placeholder="Enter your university/organization name">
				<div>
				
				<!--AREA-->
		<!--		<div class="form-group">
					<label class="control-label" for="area">Area</label>
					<input id="area" class="form-control" type="text" placeholder="temporary should use dropdown">
				<div>

				<div class="form-group">
					<label class="control-label" for="country">Country</label>
					<input id="country" class="form-control" type="text" placeholder="temporary should use dropdown">
				</div>
-->
				<footer class="form-group">	
				 	<button type="submit" class="btn btn-primary" name="submit">Create Account</button>	
				 	<button type="button" class="btn btn-default">Clear</button>
				</footer> 
				
			</form>
			<!--
			<div class = "alert alert-success">You have successfully created an acount start uploading apps NOW!</div>
			<div class = "alert alert-info">You have to insert all the value</div>
			<div class = "alert alert-warning">You have to insert all the value</div>
			<div class = "alert alert-danger alert-dismissable" >
				<button type="button" class = "close" data-dismiss="alert">&times;</button>
				You have to insert all the value
			</div>-->
		</div>


	<script src="js/jquery-2.0.3.min.js"></script> 
	<script type="text/javascript" src="js/bootstrap.js"></script>  <!--use min.js versions when in the actual server -->
	<script type="text/javascript" src="js/fileinput.js"></script>
	</body>	
</html>

