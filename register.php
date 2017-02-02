<?php

	//connect to the appstore database
	$dbc = mysqli_connect('localhost','root','','appstore') //no semicolon if we use die() built in php fn
	or die("error connection  database appstore ");//stop the program with an error message if connection fails

	//the following blocks of code will be excecuted if connection to the database is succesful
	//check if the fields have vaild and non-empty inputs.also look for injections
		//first find the corresponding field variables of username,password email etc

		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email']; 

	//to do later check for correct inputs SHALL WE USE JAVASCRIPT INSTEAD?
	//build an sql query STRING to insert the 'users' tabale of database pointed by $dbc i.e. appstore
	$query = "INSERT INTO users (username, password, email) ".
						  "VALUES ('$username', '$password', '$email')";
	//now call php fn for inserting to do this query
	$result = mysqli_query ($dbc, $query) or die ("Error in inserting data");

	//close the db connection
	mysqli_close ($dbc);

	//show the user that he has succesfully created an account and logged in
	echo 'Registration complete with..<br/>';
	echo "username: $username <br />";
	echo "password: $password <br/>";
	echo 'use the above value to login <br />';
	echo '<a href="index.html" > Go back </a>';
?>