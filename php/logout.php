<?php
///this script logged out a user by deleting sessions and deleting cookies
	session_start();

	if(isset($_SESSION['userid'])){

		// Delete the session vars by clearing the $_SESSION array
	    $_SESSION = array();

	 // Delete the session cookie by setting its expiration to an hour ago (3600)
    if (isset($_COOKIE[session_name()])) 
      setcookie(session_name(), '', time() - 500);
    
	
	}//if
    

    // Destroy the session
    session_destroy();
	
	//NOW DELETE COOKIE
	  
	// Delete the userid and username cookies by setting their expirations to an hour ago (3600)
  setcookie('userid', '', time() - 3600);
  setcookie('username', '', time() - 3600);

  // Redirect to the home page
  $home_url = 'http://' . $_SERVER['HTTP_HOST'] .'/v7/index.php';
//  echo $home_url;
 header('Location: ' . $home_url);
?>