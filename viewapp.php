<?php

/*this script display only one app.when user clicks on an appname 
this page is displayed 
*/	
	//needs to set page title before including header template

//first place the login script
	require_once('php/login.php');

	require_once('templates/header.php');//includes stylesheets etc

	require_once('templates/navigation.php');
	require_once('templates/searchbar.php');
	require_once('templates/view.php');
	
	require_once('templates/loginform.php');
	require_once("templates/footer.php");

?>