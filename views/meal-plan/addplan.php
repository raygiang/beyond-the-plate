<?php
	session_start();
	date_default_timezone_set('Canada/Eastern');
	require_once '../../vendor/autoload.php';

	$date = getdate();
	$page = new Mealplan(Database::getDb(), 'Meal Plan', $date, $_SESSION['userid']);

	$formString = '';

	echo $formString;
?>