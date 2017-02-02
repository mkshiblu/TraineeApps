<!--THIS IS THE ACTUAL SCRIPT FOR VALIDATING REGISTRATIONS AND CREATING
	NEW PROFILE.THIS SCRIPT IS ASSUMED TO BE CALLED FROM CREATEACCOUNT.PHP.
	TO KEEP THE CODE MORE CLEANER WE'VE SEPARATED THIS CODE 

IF THE NEW USER HAS BEEN SUCCESSFULLY INSERTED INTO THE DATABSE
THEN isRegSuccessfull will be set to true.SO THE CALLING SCRIPT CAN 
SHOW A SUCCESSFUL MESSAGE TO THE USER AND HIDE THE REGISTRATION FORM
-->


<?php

//include the necessaray files
require_once('dbconnectvars.php');

//this variable is used to show the user that registration has been successful
$isRegSuccessfull = false;

//first check if user has clicked the submit button
 if (isset($_POST['submit'])){

   //save the data inserted by the user
	$userName = $_POST['username'];
	$password = $_POST['password'];
//	$userPicName =  $_FILES['userpic']['name']; //abc.gif, bdc.png?

	//TO DO some check for porifle picture file type,size etc
  //  $userPic = '' . time() .$userPicName; //avoid replacement of same name img by add time() 
	//if image is not valid then $userPicName = NULL;

	echo $userName;
	echo $password;
	//echo $userPic;

//create codes for form validations

//================================================
		//FORM VALIDATION CODE WILL BE HERE	 TO DO	
//================================================


//if the form is properly validated then add the user in the databse

//connect to the database 
	  $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	  if(mysqli_connect_errno()){
			echo "error in connecting db appstore ".mysqli_connect_errno();
			exit;
		}

	//create insert query
	 // 		 "INSERT INTO guitarwars VALUES (0, NOW(), '$name', '$score', '$screenshot')";
	$query = "INSERT INTO  users (userName, password/* ,userPic*/) 
						  VALUES ('$userName', '$password'/*, '$userPic'*/)";
	
	//query
	$result = mysqli_query($dbc,$query);
/*
	//===========TODO if result query is successfull then 
	 $target = ''.IMG_PATH.$userPic;

    //move the uploaded file to iamges folder
     move_uploaded_file($_FILES['userpic']['tmp_name'],$target);

	//try to delete the uploaded file in the temporary folder
      @unlink($_FILES['screenshot']['name']);   //@sign suppress the error
      echo $target;
*/

	$isRegSuccessfull = true;	
	$userID = mysqli_insert_id($dbc); //this function return last inserted row's id i.e. userID


	mysqli_close($dbc);

   }//if
?>