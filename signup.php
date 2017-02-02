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
    $email = mysqli_real_escape_string($dbc, trim($_POST['email']));
    $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
    $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
    $userpic =  time() . '_' . $_FILES['userpic']['name'];
//echo $userpic;

    if (!empty($username) && !empty($email) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
      // Make sure someone isn't already registered using this username
      $query = "SELECT * FROM users WHERE username = '$username'";
      $data = mysqli_query($dbc, $query);

      if (mysqli_num_rows($data) == 0) {
        // The username is unique, so insert the data into the database
        $query = "INSERT INTO users (username, password,email, join_date, userpic) VALUES ('$username',SHA('$password1'),'$email', NOW(), '$userpic')";
        mysqli_query($dbc, $query);

         $target = USER_IMG_PATH.$userpic;
	    //move the uploaded file to iamges folder
      move_uploaded_file($_FILES['userpic']['tmp_name'],$target);
      //try to delete the uploaded file in the temporary folder
      @unlink($_FILES['userpic']['name']);   //@sign suppress the error
      //echo $target;

        echo '<p>Your new account has been successfully created. You\'re now ready to.</p>';

        mysqli_close($dbc);
        exit();
      }
      else {
        // An account already exists for this username, so display an error message
        $nameErr="An account already exists for this username. Please use a different address.";
        $username = "";
      }
    }
    else {
     $passErr1="You must enter all of the sign-up data, including the desired password twice";
    }
    if(empty($password1)) {
      $passErr="need password";
    }
    if(empty($email)){
$emailErr="need emial address";
    }
    if(empty($userpic)){
$picErr="select profile picture";
    }
  }

  mysqli_close($dbc);

?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h5 class="text-center"><span class="error">
                        SIGN UP</h5></span>
                    <form class="form form-signup" role="form" method="post">
                      <div class="form-group">
                        <div class="input-group">
                      <label for="userpic">Profile pic:</label>
                        <input type="file" id="userpic" name="userpic" /><br>
                         </div>
                        <span class="error">* <?php echo $picErr;?></span>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" class="form-control"name="username" placeholder="Username" value="<?php if (!empty($username)) echo $username; ?>" />
                            
                        </div>
                        <span class="error">* <?php echo $nameErr;?></span>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                            </span>
                            <input type="text" class="form-control" placeholder="Email Address" name="email" value="<?php if (!empty($email)) echo $emial; ?>"/>
                            
                        </div>
                        <span class="error">*<?php echo $emailErr;?></span>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            <input type="password" class="form-control" placeholder="Password" name="password1" value="<?php echo $password1; ?>"/>
                            
                        </div>
                        <span class="error">* <?php echo $passErr;?></span>
                    </div>
                     <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            <input type="password" class="form-control" placeholder="Password" name="password2" value="<?php echo $password2; ?>"/>
                            
                        </div>
                        <span class="error">* <?php echo $passErr1;?></span>
                    </div>


                </div>
               <button type= "submit" name="submit"  class="btn btn-sm btn-primary btn-block">Submit
                    </button> </form>
            </div>
        </div>
    </div>
</div>
</div> 
  <?php
require_once("templates/footer.php");
  ?>