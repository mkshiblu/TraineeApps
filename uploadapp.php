<?php
	require_once('templates/startsession.php');
	//needs to set page title before including header template
	$page_title = 'Appstore | upload Apps';
	require_once('templates/header.php');//includes stylesheets etc
	require_once('templates/navigation.php');
	require_once('templates/searchbar.php');



	//===================================
	//  	RENDER UPLOAD FORM for APPS
	//========================================
  require_once('php/appvariables.php');
  require_once('php/dbconnectvars.php');
  $userid = $_SESSION['userid'];




  if (isset($_POST['submit'])) {
    // Grab the score data from the POST
    $appname = $_POST['appname'];
    $description = $_POST['description'];
    $appimage = time() . '_' . $_FILES['appimage']['name'];
    $appfile = time() . '_' . $_FILES['appfile']['name'];
    $image_type = $_FILES['appimage']['type'];
    $image_size = $_FILES['appimage']['size']; 

    if (!empty($appname) && !empty($appimage) && !empty($description)) {
      if ((($image_type == 'image/gif') || ($image_type == 'image/jpeg') || ($image_type == 'image/pjpeg') || ($image_type == 'image/png'))
        && ($image_size > 0) && ($image_size <= MAX_UPLOAD_SIZE)) {
        if ($_FILES['appimage']['error'] == 0) {
          
          // Move the file to the target upload folder
          $img_target = APP_IMG_PATH . $appimage;
          $file_target = APP_FILE_PATH . $appfile;


          if (move_uploaded_file($_FILES['appimage']['tmp_name'], $img_target))  {
          
              if(move_uploaded_file($_FILES['appfile']['tmp_name'], $file_target)){
              
                // Connect to the database
                $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

                // Write the data to the database
                $query = "INSERT INTO apps (app_name, userid, upload_date, description, image, file )" . 
                		" VALUES ('$appname', '$userid', NOW(), '$description', '$appimage', '$appfile' )";
            
                mysqli_query($dbc, $query);

                // Confirm success with the user
                echo '<p>Thanks for uploading your new App!</p>';
                echo '<p><strong>App Name:</strong> ' . $appname . '<br />';
                echo '<strong>Description :</strong> ' . $description . '<br />';
                echo '<img src="' . APP_IMG_PATH . $appimage . '" alt="Score image" /></p>';
                echo '<p><a href="index.php">&lt;&lt; Back to Home</a></p>';

                // Clear the score data to clear the form
                $appname = "";
                $description = "";
                $appimage = "";

                mysqli_close($dbc);
                require_once("templates/footer.php");
                exit();

              }//if file upload

          else 
            echo '<p class="error">Sorry, there was a problem uploading your app  FILE.</p>';
          }//if img upload
          else 
            echo '<p class="error">Sorry, there was a problem uploading your app  image.</p>';
          
        }
      }
      else {
        echo '<p class="error">The Image must be a GIF, JPEG, or PNG image file no greater than ' . (MAX_UPLOAD_SIZE / 1024) . ' KB in size.</p>';
      }

      // Try to delete the temporary screen shot image file
      @unlink($_FILES['appimage']['tmp_name']);
      @unlink($_FILES['appfile']['tmp_name']);
    }
    else {
      echo '<p class="error">Please enter all of the information to upload your app.</p>';
    }
  }
?>
<?php
  if (empty($userid)) {
    # code...
    echo "you have to be logged in, to upload an app ";
    exit();
  }
?>
  <hr />
  <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    
    <label for="image">App image:</label>
    <input type="file"  name="appimage" /><br>

    <label for="appfile">Installation file:</label>
    <input type="file"  name="appfile" /><br>

    <label for="appname">App name:</label>
    <input type="text" name="appname" value="<?php if (!empty($appname)) echo $appname; ?>" /><br />
    
    <label for="description">Description:</label>
    <input type="textarea" id="score" name="description" value="<?php if (!empty($description)) echo $description; ?>" /><br />
    
   <hr />
    <input type="submit" value="Upload" name="submit" />
  </form>

<?php

	require_once("templates/footer.php");
?>