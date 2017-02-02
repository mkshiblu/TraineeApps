<?php
  require_once('appvariables.php');
  require_once('database.php');

  if (isset($_POST['app_id'])) {
      // Delete the screen shot image file from the server
      //@unlink(GW_UPLOADPATH . $screenshot);

      // Connect to the database
      $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

      // Delete the score data from the database
     
      mysqli_query($dbc, APPROVE_APP);
      mysqli_close($dbc);
      header('Location: ' . '../admin.php');
      }
    else 
      echo '<p class="error">The app was not approved.</p>';
    // give a link to go back admin page
  require_once('appvariables.php');
   echo '<a href="' . ADMIN_URL . '" >back to admin page</a>';
 // echo $_POST['app_id'];
?>