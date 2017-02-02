<?php
/*
this script can remove newly uploaded apps waiting for approval from dababase
*/
require_once('php/authorize.php');
	require_once('templates/header.php');
	require_once('php/dbconnectvars.php');
	require_once('php/SQLS.php');

	//conncet to the database
	$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

	//submit the query
	$result = mysqli_query( $dbc ,ADMIN_APP_DATA);

	echo '<table border = "2">';

	echo '<tr>';
	echo '<th>ID</th>';
	echo '<th>Name</th>';
	echo '<th>rating</th>';
	echo '<th>Uploader ID</th>';
	echo '<th>Downloads</th>';
	echo '<th>description</th>';
	echo '<th>file</th>';
	echo '<th colspan = "2">Action</th>';
	echo '</tr>';
	//iterates the row and format output as HTML
	while ($row = mysqli_fetch_array($result)) {
		# code...
		// Display the score data
		echo '<tr><td><strong>' . $row['app_id'] . '</strong></td>';
		echo '<td>' . $row['app_name'] . '</td>';
		echo '<td>' . $row['rating'] . '</td>';
		echo '<td>' . $row['userid'] . '</td>';
		echo '<td>' . $row['total_downloads'] . '</td>';
		echo '<td>' . $row['description'] . '</td>';
		echo '<td>' . $row['file'] . '</td>';
	//	echo '<td>' . $row['Approved'] . '</td>';
		
		?>
	    	<td><form method = "POST" action = "php/removeapp.php">
	    		 <input class="btn" type="submit" value="Remove" name="remove" />
    			 <input type="hidden" name="app_id" value="<?php echo  $row['app_id']; ?>" />
	    	</form></td>

	    	<?php

	    		if( $row['Approved'] == false ){

	    	?>
	    	<td><form method = "POST" action = "php/approveapp.php">
	    		 <input class="btn btn-success" type="submit" value="Approve" name="approve" />
    			 <input type="hidden" name="app_id" value="<?php echo  $row['app_id']; ?>" />
	    	</form></td>

	    	<?php

	    		}//if not approved
	echo '</tr>';
}

	echo '</table>';
	mysqli_close($dbc);
	   // give a link to go back home page
  require_once('php/appvariables.php');
  echo '<a href="' . HOME_URL . '" > Go to homepage</a>';
?>