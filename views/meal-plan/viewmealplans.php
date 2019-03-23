<?php
	session_start();
	date_default_timezone_set('Canada/Eastern');
	require_once '../../vendor/autoload.php';

	$date = getdate(intval($_POST['date']));
	$page = new Mealplan(Database::getDb(), 'Meal Plan', $date, $_SESSION['user_id']);

	$dayDetails = $page->getPlans($page->getRefDate()['mday']);

	$currentCategory = '';

	$planString = "";

	foreach($dayDetails as $plan) {
		if($plan->name !== $currentCategory) {
			$currentCategory = $plan->category;
			$planString .= "<div class='plan-category'>$currentCategory</div>";
		}
		$planString .= "<div><a href='#'>$plan->name </a>";
		$planString .= 
			"<form action='#' method='POST'>" .
			"<input type='hidden' name='plan_id' value='$plan->id'>" .
			"<input type='date' name='new_date'>" .
			"<input type='submit' name='move_submit' value='Change Day'>" .
			"<input type='submit' name='delete_plan' value='Delete Plan'>";
		$planString .= "</form></div>";
	};

	echo $planString;
?>