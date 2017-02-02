<?php
//this script is called when the user click on the showusers button
//the purpose of this script is to display the user table from appstore database
	
	//first connect to the appstore database  if failed show error msg and exit (die());
	$dbc = mysqli_connect ('localhost','root','','appstore') or die ('error connection database appstore');	

	//now build a query 
	$query = "SELECT * FROM users"; //select all the column's

	//submit the query and store the id to iterate over the rows later
	$result = mysqli_query ($dbc,$query);

	///for debug
//	echo $result; NOT WORKING WHY?

	//echo column names
	echo "userName password  email <br>";//extra spaces not working WHY?
	//iterate over all the rows and print the rows

	while ($row = mysqli_fetch_array($result)) {
		# code...
		echo $row['userName'].'  ' . $row['password'].'  ' . $row['email'].'  ' . '<br>';
	}

	//close the database
	mysql_close($dbc);

?>


