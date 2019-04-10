<?php
  session_start();
  require_once('lib/classes/User.php');
  require_once('lib/classes/database.php');
  $db = Database::getDb();
  
  if(isset($_GET['generalBtn']))
  {
	 //var_dump($_GET);
    $fname=$_GET["userFirstName"];
    $lname=$_GET["userLastName"];
    $user_id=$_GET["userid"];
	
    $u = new User();
    $count=$u->updateUserProfile($user_id,$fname,$lname,$db);
	if(!$count)
			echo "Error updating profile." ; //Database related error
   }
  
  if(isset($_GET['passwordBtn']))
  {
    $oldpwd=$_GET["oldPassword"];
    $newpwd=$_GET["newPassword"];
    $user_id=$_GET["userid"];
	
    $u = new User();
	$count = $u->verifyOldPassword($user_id,$oldpwd,$db);
	if($count)
	{
		$count=$u->updateUserPassword($user_id,$newpwd,$db);
		
		if($count)
			echo "Password Updated !!!"; //password updated
		else
			echo "Error updating password." ; //Database related error
	}
	else
	{
		echo "Old Password incorrect";//old password not correct
	} 
  }
  ?>