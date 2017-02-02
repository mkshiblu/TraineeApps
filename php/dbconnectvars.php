<?php

//connection constants	
	define(DB_HOST, 'localhost');
	define(DB_USER, 'root');
	define(DB_PASSWORD,'');
	define(DB_NAME,'appstore');



//==================================
	//********QUERIES
//=============================

	//define(DISPLAY_APP, "SELECT app_id, app_name, rating, total_downloads, upload_date, description, file, image FROM apps " .
	//"ORDER BY upload_date DESC LIMIT 5");



//users table's column names

	define (userid,'userID');
	define(username, 'userName');
	define(email,'email');
	define(password,'password');	
?>