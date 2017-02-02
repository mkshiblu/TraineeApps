<?php
  require_once('php/dbconnectvars.php');
  require_once('php/appvariables.php');
  // Start the session
  session_start();

  // Clear the error message
  $error_msg = "";

  // If the user isn't logged in, try to log them in
  if (!isset($_SESSION['user_id'])) {
    if (isset($_POST['submit'])) {
      // Connect to the database
      $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

      // Grab the user-entered log-in data
      $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
      $password = mysqli_real_escape_string($dbc, trim($_POST['password']));

      if (!empty($username) && !empty($password)) {
        // Look up the username and password in the database
        $query = "SELECT userid, username FROM users WHERE username = '$username' AND password = SHA('$password')";
        $data = mysqli_query($dbc, $query);


        if (empty($data)) {
          # code...
          echo "No user found.please try again";
        }
        else if (mysqli_num_rows($data) == 1) {
          // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
          $row = mysqli_fetch_array($data);
          $_SESSION['userid'] = $row['userid'];
          $_SESSION['username'] = $row['username'];
          setcookie('userid', $row['userid'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
          setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
          //$home_url = 'http://' . $_SERVER['HTTP_HOST'] . /*dirname($_SERVER['PHP_SELF'])*/ '/v8' . '/index.php';

          header('Location: ' . HOME_URL);
        }
        else {
          // The username/password are incorrect so set an error message
          $error_msg = 'Sorry, you must enter a valid username and password to log in.';
        }
      }
      else {
        // The username/password weren't entered so set an error message
        $error_msg = 'Sorry, you must enter your username and password to log in.';
      }
    }
  }
?>

