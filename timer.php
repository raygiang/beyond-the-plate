<?php
 require_once 'vendor/autoload.php';
 require_once 'config.php';
 require_once 'lib/classes/Timer.php';

$db = Database::getDb();
$timer = new Timer(Database::getDb());
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