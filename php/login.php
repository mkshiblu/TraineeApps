<?php

	require_once('dbconnectvars.php'); //server namde,db name etc constant
	require_once('logincheck.php'); //get the function that checks wheahter a user has logged in or not


	//Start this session
	session_start();

	//clear the error msg
	$error_msg = "";
	$steps = "";  //save the steps of this sript


	//if the user isnot logged in try to logged them in
	if(!isLoggedIn()){	//if(!isset($_SESSION['userid'])){  


		$steps = $steps."user is not logged in <br /> ";
		//check if the user has fillout the form and hit submit button
		if(isset($_POST['submit'])){
			
			
			//store the name and password data from the form
			$username = $_POST['username'];
			$password = $_POST['password'];

			$steps = $steps."user has submited the form  name = $username password = $password <br/>";
			//if username password both are validinput then query the db
			//====TODO===========================

			//query the db to check whether the user exists or not

			//connect db
			$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

			//create the user and password match query
			$query ="SELECT * FROM users WHERE username = '$username' AND password = '$password'";

			//excecute query
			$data = mysqli_query($dbc,$query);
			//echo "query excecuted <br/>";
		
			$steps = $steps."excecuted = SELECT * FROM users WHERE username = '$username' AND password = '$password'<br/>";
			//query will return only 1 row if the user exists
			if(mysqli_num_rows($data) == 1){

		//		echo 'user found';


				//get row
				$row = mysqli_fetch_array($data);

				//get user data i.e. userid,username and profile picture
				$userid = $row['userid'];
				$username = $row['username'];
			
				$steps = $steps."user found with userid=$userid <br/>";

				//set the session vars and also set the cookies 
				saveLogin($userid,$username);
			
				$steps = $steps."login saved <br/>";


				//redirect to the homepage OR TO DO PROFILE PAGE=======================
				$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
				$steps = $steps."Log in success.going home $home_url <br/>";

//				echo $steps;
//				echo $_SESSION['userid'];
				header('Location: ' . $home_url);
				
			}//if user exists
			else{ //user not found
			  	$error_msg = "You must enter valid username and password";
			  	$steps = $steps."user not found (row count!=1) EXIT<br/>";
			  }

		}//if user hit submit button
	}//if not logged in
	else $steps = $steps."logged in <br/>";
?>