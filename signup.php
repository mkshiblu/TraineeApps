<?php

///	require_once('php/startsession.php');
	//needs to set page title before including header template
	$page_title = 'Appstore For All';
	require_once('templates/header.php');//includes stylesheets etc
	require_once('templates/navigation.php');

//==================================
	//PERFORM SIGNUP OP
//=====================================
 require_once('php/dbconnectvars.php');
 require_once('php/appvariables.php');

  // Connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  if (isset($_POST['submit'])) {

    // Grab the profile data from the POST
    $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
    $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
    $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
    $userpic =  time() . '_' . $_FILES['userpic']['name'];
//echo $userpic;

    if (!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
      // Make sure someone isn't already registered using this username
      $query = "SELECT * FROM users WHERE username = '$username'";
      $data = mysqli_query($dbc, $query);

      if (mysqli_num_rows($data) == 0) {
        // The username is unique, so insert the data into the database
        $query = "INSERT INTO users (username, password, join_date, userpic) VALUES ('$username', SHA('$password1'), NOW(), '$userpic')";
        mysqli_query($dbc, $query);

         $target = USER_IMG_PATH.$userpic;
	    //move the uploaded file to iamges folder
      move_uploaded_file($_FILES['userpic']['tmp_name'],$target);
      //try to delete the uploaded file in the temporary folder
      @unlink($_FILES['userpic']['name']);   //@sign suppress the error
      //echo $target;
/*
          $userid = mysqli_insert_id($dbc);

          $_SESSION['userid'] = $userid;
          $_SESSION['username'] = $username;
          setcookie('userid', $userid, time() + (60 * 60 * 24 * 30));    // expires in 30 days
          setcookie('username', $username, time() + (60 * 60 * 24 * 30));  // expires in 30 days*/
        // Confirm success with the user
        echo '<p>Your new account has been successfully created. You\'re now ready to  .<a href="login.php">Log in</a>.</p>';

        mysqli_close($dbc);
        exit();
      }
      else {
        // An account already exists for this username, so display an error message
        echo '<p class="error">An account already exists for this username. Please use a different address.</p>';
        $username = "";
      }
    }
    else {
      echo '<p class="error">You must enter all of the sign-up data, including the desired password twice.</p>';
    }
  }

  mysqli_close($dbc);

?>

  <p>Please enter your username and desired password to sign up to Trainee Apps.</p>
  <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
      <legend>Registration Info</legend>
      <label for="userpic">Profile pic:</label>
       <input type="file" id="userpic" name="userpic" /><br>

      <label for="username">Username:</label>
      <input type="text" id="username" name="username" value="<?php if (!empty($username)) echo $username; ?>" /><br />
      <label for="password1">Password:</label>
      <input type="password" id="password1" name="password1" /><br />
      <label for="password2">Password (retype):</label>
      <input type="password" id="password2" name="password2" /><br />
    </fieldset>
    <input type="submit" value="Sign Up" name="submit" />
  </form>

  <?php
require_once("templates/footer.php");
  ?>