<?php
  // If the session var is empty, show any error message and the log-in form; otherwise confirm the log-in
  if (empty($_SESSION['userid'])) {
    echo '<p class="error">' . $error_msg . '</p>';
?>


<!--the login form opened by the login button it's hidden-->
    <div class = "modal fade" id = "login-dialog" role = "dialog">
        <div class = "modal-dialog">
          <div class = "modal-content">
            <div class = "modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 class = "text-center modal-title">Login Form </h3>
              
            </div>  <!--the login form consist of user name field,password field ,cancel and login button -->
            <div class = "modal-body">

               <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <!--TO DO SHOW ERROR MSG IF USER NOT FOUND-->
                <input type="text" name ="username" placeholder = "Username" value="<?php if (!empty($username)) echo $username; ?>">
                <input type = "text" name="password" placeholder = "password">
                <button type= "submit" name="submit" class = "btn btn-success" >Login</button>
              </form>
            </div>
            <div class = "modal-footer">

              <?php
                echo '<div class = "alert alert-info">'.$error_msg.'</div>';
              ?>
              <!--TODOif login not successful echo the errors an re-ask the user else-->
              <p>Don't have an account? <a class = "btn btn-info" href = "signup.php">Sign Up</a></p>
            </div>
          </div>
        </div>
    </div>  
<!--
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
      <legend>Log In</legend>
      <label for="username">Username:</label>
      <input type="text" name="username" value="<?php if (!empty($username)) echo $username; ?>" /><br />
      <label for="password">Password:</label>
      <input type="password" name="password" />
    </fieldset>
    <input type="submit" value="Log In" name="submit" />
  </form>
  <h5> or </hp>
    <a href="signup.php">Sign Up</a>-->
<?php
  }
  else {
    // Confirm the successful log-in
    echo('<p class="login">You are logged in as ' . $_SESSION['username'] . '.</p>');
  }
?>