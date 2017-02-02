<?php
  require_once('appvariables.php');
  require_once('dbconnectvars.php');

  if (isset($_POST['app_id'])) {
      // Delete the screen shot image file from the server
      //@unlink(GW_UPLOADPATH . $screenshot);

      // Connect to the database
      $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

      // Delete the score data from the database
      $query = "DELETE FROM apps WHERE app_id = " . $_POST['app_id'] . " LIMIT 1";
      mysqli_query($dbc, $query);
      mysqli_close($dbc);
      header('Location: ' . '../admin.php');
      }
    else 
      echo '<p class="error">The app was not removed.</p>';
       // give a link to go back admin page
  require_once('appvariables.php');
   echo '<a href="' . ADMIN_URL . '" >back Admin page</a>';
 // echo $_POST['app_id'];
?>