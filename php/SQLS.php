<?php

define(LATEST_APPS, "SELECT app_id, app_name, rating, total_downloads, username, upload_date, description, file, image FROM apps " .
	"JOIN users ON apps.userid = users.userid " .
	"WHERE approved = 1 " .		//dont display apps which isnot approved by admin yet
	"ORDER BY upload_date DESC LIMIT 5");

define(TOP_APPS, "SELECT app_id, app_name, rating, total_downloads, username, upload_date, description, file, image FROM apps " .
	"JOIN users ON apps.userid = users.userid " .
	"WHERE approved = 1 " .
	 " ORDER BY  total_downloads DESC LIMIT 5");

define(ADMIN_APP_DATA, "SELECT * FROM apps ORDER BY upload_date DESC");
define(APPROVE_APP, "UPDATE apps SET approved = 1 WHERE app_id = " . $_POST['app_id'] . " LIMIT 1");
define(DOWNLOAD_INC, "UPDATE apps SET total_downloads = 1+total_downloads WHERE app_id = " . $_POST['app_id'] . " LIMIT 1");
define(VIEW_COMMENT, "SELECT comment, username FROM comments JOIN users ON users.userid = comments.userid WHERE app_id= ". $row['app_id']." ");
?>