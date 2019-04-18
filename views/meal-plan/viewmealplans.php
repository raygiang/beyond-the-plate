<?php
	session_start();
	date_default_timezone_set('Canada/Eastern');
	require_once '../../vendor/autoload.php';

	$date = getdate(intval($_POST['date']));
	$page = new Mealplan(Database::getDb(), 'Meal Plan', $date, $_SESSION['userid']);

	$dayDetails = $page->getPlans($page->getRefDate()['mday']);

	$currentCategory = '';

	$planString = "";

	foreach($dayDetails as $plan) {
		$strDate = date('Y-m-d', $plan->date);

		if($plan->name !== $currentCategory) {
			$currentCategory = $plan->category;
			$planString .= "<div class='plan-category'>$currentCategory</div>";
		}

		$planString .= "<div><a href='recipedetails.php?id=$plan->rec_id'>$plan->name </a>";
		$planString .= 
			"<form action='#' method='POST'>" .
			"<input type='hidden' name='plan_id' value='$plan->id'>" .
			"<input type='date' name='new_date' value='$strDate'>" .
			"<select name='pc-dropdown'>" . $page->getOptions($plan->pc_id) . "</select>" .
			"<input type='submit' name='move_submit' value='Modify Plan'>" .
			"<input type='submit' name='delete_plan' value='Delete Plan'>";
		$planString .= "</form></div>";
	};

	echo $planString;
?>