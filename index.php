<?php

	//first place the login script
	require_once('php/login.php');
	//needs to set page title before including header template
	$page_title = 'Appstore For All';
	require_once('templates/header.php');//includes stylesheets etc


//echo '<a href="admin.php">Temp admin</a>'	;
	require_once('templates/navigation.php');
	//require_once('templates/searchbar.php');
	//require_once('templates/slider/slider.php');
	require_once("templates/homepageapps.php");
		require_once('templates/loginform.php');

	require_once("templates/footer.php");

?>