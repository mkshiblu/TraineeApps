<?php

	require_once('php/startsession.php');
	//needs to set page title before including header template
	$page_title = '|Search';
	require_once('templates/header.php');//includes stylesheets etc
	require_once('templates/navigation.php');

	$search= $_GET['search'];

	require_once('templates/searchbar.php');
	require_once ('php/dbconnectvars.php');
	require_once ('php/appvariables.php');
	require_once('templates/display.php');

	$dbc=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$query="SELECT * FROM apps WHERE app_name like '%$search%'";
	$data=mysqli_query($dbc,$query);


		if (empty($data)) {
			# code...
			echo 'no result found';

			$data;;
		}
		else
		{
			echo '' . mysqli_num_rows($data) . ' Result(s) found';
			while ($row = mysqli_fetch_array($data)) {
				displayApp($row);
				
			}//while
		}

	require_once("templates/footer.php");

?>