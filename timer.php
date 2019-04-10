<?php
session_start();
  $_SESSION['recipe_id'] = 2;

	 require_once 'vendor/autoload.php';
	 require_once 'config.php';
	 require_once 'lib/classes/Timer.php';

	$db = Database::getDb();
	$timer = new Timer(Database::getDb(), $_SESSION['recipe_id']);
	$getTimer = $timer->getTime(Database::getDb());
	var_dump($getTimer);
	?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Timer</title>
</head>
<body>

</body>
</html>