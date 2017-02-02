<?php

/*this script display only one app.when user clicks on an appname 
this page is displayed 
*/	
	//needs to set page title before including header template
	$page_title = 'Fruit ninja';
	require_once('templates/header.php');//includes stylesheets etc
//echo '<a href="admin.php">Temp admin</a>'	;
	require_once('templates/navigation.php');
	require_once('templates/searchbar.php');
	
	//require_once('templates/slider/slider.php');
	require_once("templates/homepageapps.php");
	require_once("templates/footer.php");

?>