<?php
	//include the database variables and other constant
	require_once('php/dbconnectvars.php');
	require_once('php/appvariables.php');

	//connect to the database and render the top apps
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
	// Retrieve the Latest app data from MySQL
	$query = "SELECT app_id, app_name, rating, total_downloads, username, upload_date, description, file, image FROM apps " .
	"JOIN users ON apps.userid = users.userid " .
	"ORDER BY upload_date DESC LIMIT 5";
	$data = mysqli_query($dbc, $query);
	

	require_once('templates/display.php');
	// Loop through the array of app data, formatting it as HTML
	echo '<h4>Latest Apps:</h4>';
	echo '<table>';
	while ($row = mysqli_fetch_array($data)) {
		displayApp($row);
		
	}//while
	echo '</table>';

	// Retrieve the TOP app data from MySQL
	$query = "SELECT app_id, app_name, rating, total_downloads, upload_date, description, username, image FROM apps ".
			"JOIN users ON apps.userid = users.userid" .
	 " ORDER BY  total_downloads DESC LIMIT 5";
	$data = mysqli_query($dbc, $query);
	
	// Loop through the array of app data, formatting it as HTML
	echo '<h4>Top Downloads:</h4>';
	echo '<table>';

	if (empty($data)) {
		# code...
		echo 'no result found';
	}
	else
	while ($row = mysqli_fetch_array($data)) {
		displayApp($row);
		
	}//while
	echo '</table>';
	mysqli_close($dbc);
	
?>