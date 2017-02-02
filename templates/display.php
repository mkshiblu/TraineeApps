<?php

	function displayApp($row){


	echo '<a href = "'.$row['app_name'].'" ><h3>' .$row['app_name'] . '</h3></a>';	
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

		//echo '<a  class="btn btn-primary " href="'. $dlpath .'">Download</a>';
		?>

		<form method="post" action="php/downloadapp.php">
			 <input type="hidden" name="app_id" value="<?php echo  $row['app_id']; ?>" />
			 <input type="hidden" name="file" value="<?php echo  $dlpath; ?>" />

			<input type="submit" value="Download" name="Download">

		</form>

		<?php


	}//fn

	function displayAppsByTable($data){
		?>
		<table>
		 <tr>	
		
		<?php
		if (empty($data)) {
		# code...
		echo 'no result found';
		}
		else
		// Loop through the array of app data, formatting it as HTML
		while ($row = mysqli_fetch_array($data)) {
			echo '<td>';
			displayApp($row);
			echo '</td>';
			
		}//while
		echo '</tr>';
		echo '</table>';

	}

?>