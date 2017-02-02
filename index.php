<?php

	require_once('templates/startsession.php');
	//needs to set page title before including header template
	$page_title = 'Appstore For All';
	require_once('templates/header.php');//includes stylesheets etc
	
	require_once('templates/navigation.php');
	require_once('templates/searchbar.php');

	require_once("templates/homepageapps.php");
	require_once("templates/footer.php");

?>