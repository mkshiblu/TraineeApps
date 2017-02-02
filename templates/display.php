<?php

	function displayApp($row){
if (is_file(APP_IMG_PATH . $row['image']) && filesize(APP_IMG_PATH . $row['image']) > 0) {
			echo '<img class="card" src="' . APP_IMG_PATH . $row['image'] . '" alt="' . $row['app_name'] .
			'" />';
		}
		else {
			echo '<tr><td><img src="' . APP_IMG_PATH . 'nopic.jpg' . '" alt="' . $row['app_name'] .
			'" /></td>';
		}


	echo '<a class="app-title" href = "viewapp.php?id='.$row['app_id'].'" ><h3>' .$row['app_name'] . '</h3></a>';	
	echo '<h5  class="app-rating" >Rating :'. $row['rating'] . '</h5>';
	echo '<h5 class="app-releasedate">Release Date :'. $row['upload_date'] . '</h5>';
	echo '<h5 class="app-downloads">total downloads :'. $row['total_downloads'] . '</h5>';
	echo '<h5 class="app-uploader">uploader :'. $row['username'] . '</h5>'; 
	echo '<p class="app-description">'. $row['description'] . '</p>';

	
		$dlpath = APP_FILE_PATH. $row['file'];

		//echo '<a  class="btn btn-primary " href="'. $dlpath .'">Download</a>';
		?>
		

		<form method="post" action="php/downloadapp.php">
			 <input type="hidden" name="app_id" value="<?php echo  $row['app_id']; ?>" />
			 <input type="hidden" name="file" value="<?php echo  $dlpath; ?>" />

			<input type="submit" value="Download" name="Download" class="btn btn-primary">

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
			echo '<td class="app grad-blue shadow">';
			displayApp($row);
			echo '</td>';
			
		}//while
		?>
		</tr>
		</table>

		<?php
	}

/*
	function showInCarousel($data){
		
		if (empty($data)) {
		# code...
		echo 'no result found';
		}
		else{	?>
		

        <div id="carousel-example" class="carousel slide hidden-xs" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="row">
                        
<?php
		// Loop through the array of app data, formatting it as HTML
		while ($row = mysqli_fetch_array($data)) {
			require_once('templates/Carousel.php');	
		}//while

		?>

                   	</div>
                </div>

                <div class="item">
                    <div class="row">
                        
                        <!--do the same four times-->


                      </div>
                </div>
            </div>
        </div>
  
		<?php }
	
	}*/

?>