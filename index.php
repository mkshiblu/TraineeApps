<?php

	//first place the login script
	require_once('php/login.php');
	//needs to set page title before including header template
	$page_title = 'Appstore For All';
	require_once('templates/header.php');//includes stylesheets etc



	require_once('templates/navigation.php');

	echo '<div class="">';
	
		
		require_once('templates/searchbar.php');
		require_once('templates/slider/slider.php');
		//carousel
		echo '<div class="container">';
		//require_once('templates/carousel.php');
		require_once("templates/homepageapps.php");
		
		//render the login modal
		require_once('templates/loginform.php');

		require_once("templates/footer.php");
		echo '</div>';

	echo '</div>';
	
?>