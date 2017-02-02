<?php

$dbc = mysqli_connect('localhost', 'root', '', 'appstore');

//$q="SELECT * FROM apps WHERE app_id =".$_GET['id']." ";
$q="SELECT apps.*, username FROM apps JOIN users ON users.userid = apps.userid WHERE app_id =".$_GET['id']." ";

$data = mysqli_query($dbc, $q);

$row= mysqli_fetch_array($data);
$dlpath = APP_FILE_PATH. $row['file'];



//comment query
require_once("php/SQLS.php");
//echo VIEW_COMMENT;
$comments = mysqli_query($dbc, VIEW_COMMENT);

?>



<div class="container shadow">
	<div class="row">
		<div class="pad-md col-md-4">
		  <img class="big-img" 	src="<?php echo APP_IMG_PATH . $row['image']   ?>" >
		</div>
		<div class="col-lg-4">
			<h2 class="grad-text-blue"> <?php echo $row['app_name']; ?></h2>
			<h3><?php echo $row['username']; ?></h3>
			<p><?php echo $row['description']; ?></p>
			<p>Rating: <?php echo $row['rating']; ?></p>


			<form method="post" action="php/downloadapp.php">
				 <input type="hidden" name="app_id" value="<?php echo  $row['app_id']; ?>" />
				 <input type="hidden" name="file" value="<?php echo  $dlpath; ?>" />
				<input type="submit" value="Download" name="Download" class="btn btn-primary">
			</form>
			
			<br><br>
		</div>
	</div>

	<!--==========================================================
				THE COMMENTS SECTION
	=================================================================-->

	<div class="">
		<h3 class="blue">Reviews <h3>
		<?php
			if(empty($comments)){
				echo "No Reviews";
			}
			else
			{
				echo '<ul class="list-group checked-list-box">';
				while ($cmnt=mysqli_fetch_array($comments)) {
				# code...
				echo '<li class="list-group-item alert alert-info"> <h5>'.$cmnt['comment'].'  <strong>'. $cmnt['username'].'</strong></h5></li>';
		
				}//while

				echo '</ul>';
			}
		?>
	</div>
	<!---GIVING COMMENT -->
		<?php  if(!isset($_SESSION['userid'])) {?>
			<div class="alert alert-warning">Please <a  href = "#login-dialog" class = "" data-toggle = "modal"><strong>Login</strong></a> To give a review</div>
		<?php }else { ?>

			<div>
				<form method="POST" action="">
					<input type="textarea" name="comment" placeholder="Your Review">
					<input type="submit" value="Send">
				</form>
			</div>	
		<?php } ?>
</div>

