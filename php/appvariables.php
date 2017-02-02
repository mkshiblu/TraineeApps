<?php
//mov this into other file
	define(HOME_URL , 'http://' . $_SERVER['HTTP_HOST'] . '/v10/index.php');
	define(ADMIN_URL , 'http://' . $_SERVER['HTTP_HOST'] . '/v10/admin.php');
	define(APP_IMG_PATH,'images/apps/'); //the uploaded images will be saved in this path
	define(APP_FILE_PATH, 'appfiles/');
	define(USER_IMG_PATH,'images/users/'); //the uploaded images will be saved in this path
	define(MAX_UPLOAD_SIZE, 32768);
?>