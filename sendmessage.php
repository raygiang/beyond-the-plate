<?php
	session_start();
	require_once('lib/classes/UserMessages.php');
	require_once('lib/classes/database.php');
	$db = Database::getDb();
	
	if(isset($_POST))
	{
		$authorid=$_POST["authoruserid"];
		$currentuserid=$_SESSION["userid"];
		$usermessage=$_POST["usermessage"];
		$recipeid=$_POST["recipeid"];
		
		$um = new UserMessages();
		$count = $um->sendmessage($authorid,$currentuserid,$usermessage,$db);
		
		header("location:recipedetails.php?id=".$recipeid);
	}
	
	
?>