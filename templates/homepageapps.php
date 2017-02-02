<!--<div class="container">
    <div class="row">
        <div class="row">
            <div class="col-md-9">
                <h3> Lates apps</h3>
            </div>
            <div class="col-md-3">
                
                <div class="controls pull-right hidden-xs">
                    <a class="left fa fa-chevron-left btn btn-success" href="#carousel-example"
                        data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-success" href="#carousel-example"
                            data-slide="next"></a>
                </div>
            </div>
        </div>
-->
<?php
	//include the database variables and other constant
	require_once('php/dbconnectvars.php');
	require_once('php/appvariables.php');
	require_once('php/SQLS.php');
	require_once('templates/display.php');

	//connect to the database and render the top apps
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
	// Retrieve the Latest app data from MySQL	
	$data = mysqli_query($dbc, LATEST_APPS);
	
	?>
	
	<div>
		<br><br><br><br>
	</div>
<?php
//showInCarousel($data);
	displayAppsByTable($data);


	// Retrieve the TOP app data from MySQL
	$data = mysqli_query($dbc, TOP_APPS);
	echo '<h2>Top Downloads:</h2>';
	displayAppsByTable($data);

	//close the db connection
	mysqli_close($dbc);
	
?>

  </div>
</div>
