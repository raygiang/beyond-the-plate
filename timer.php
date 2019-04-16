<?php
session_start();
	require_once('lib/controllers/timer-controller.php');

	// $timer = new Timer(Database::getDb(), $_SESSION['recipe_id']);
	// $getTimer = $timer->getTime();

	// print current($getTimer)['name'];
	// print current($getTimer)['description'];
	?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Timer</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/timer.css">
</head>
<body>
	<main>
<!-- <div class="container">
	<div class="row"> -->
		<div>
			<?php printName($timer);?>
		</div>
		<div>
			<?php echo	printInstructions($timer);?>
		</div>
		<div id="time"></div>
		<!-- BUTTON SET -->
		<span>
			<input id="btnStart" type="button" value="START" class="btn btn-secondary"/>
		</span>
		<span>
			<input id="btnStop" type="button" value="STOP" class="btn btn-secondary"/>
		</span>
	</main>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="js/timer.js"></script>
</html>