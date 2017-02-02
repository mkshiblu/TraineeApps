<?php

	function displayApp($row){


	echo '<h3>' .$row['app_name'] . '</h3>';	
	echo '<h5>Rating :'. $row['rating'] . '</h5>';
	echo '<h5>Release Date :'. $row['upload_date'] . '</h5>';
	echo '<h5>total downloads :'. $row['total_downloads'] . '</h5>';
	echo '<h5>uploader :'. $row['username'] . '</h5>'; 
	echo '<p>'. $row['description'] . '</p>';
	if (is_file(APP_IMG_PATH . $row['image']) && filesize(APP_IMG_PATH . $row['image']) > 0) {
			echo '<img class="card" src="' . APP_IMG_PATH . $row['image'] . '" alt="' . $row['app_name'] .
			'" />';
		}
		else {
			echo '<tr><td><img src="' . APP_IMG_PATH . 'nopic.jpg' . '" alt="' . $row['app_name'] .
			'" /></td>';
		}

		$dlpath = APP_FILE_PATH. $row['file'];
		echo '<a href="'. $dlpath .'">Download</a>';


	}//fn



?>