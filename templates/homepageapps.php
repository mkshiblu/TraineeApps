<?php
	//include the database variables and other constant
	require_once('php/dbconnectvars.php');
	require_once('php/appvariables.php');
	require_once('php/SQLS.php');
	require_once('templates/display.php');

	//connect to the database and render the top apps
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
	// Retrieve the Latest app data from MySQL	
	$data = mysqli_query($dbc, LATEST_APPS);
	echo '<h2>Latest Apps:</h2>';
	displayAppsByTable($data);

	// Retrieve the TOP app data from MySQL
	$data = mysqli_query($dbc, TOP_APPS);
	echo '<h2>Top Downloads:</h2>';
	displayAppsByTable($data);

	//close the db connection
	mysqli_close($dbc);
	
?>