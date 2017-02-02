<?php

/*this function first checks if this session has a user id set i.e. logged in **/
	function isLoggedIn(){
		session_start();
		return isset($_SESSION['userid']);
	}//islogged

	//set sessions with username,user id and profile picture
	function saveLogin($userid, $username){
		$_SESSION['userid'] = $userid;
		$_SESSION['username'] = $username;
		//also save the cookie and  set 7 days expiration            SEC*MIN*HOUR*DAY
	@setcookie('userid', "'$userid'", time()+(60*60*24*7)); //cookie cannot save int thats y single quote WARNIG SHOWS WITHOUT @
	@setcookie('username', $username, time()+(60*60*24*7));
	}
?>