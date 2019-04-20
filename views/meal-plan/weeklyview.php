<?php
    session_start();
    date_default_timezone_set('Canada/Eastern');

    require_once '../../vendor/autoload.php';

    $dateInfo = explode(',', $_POST['refDate']);
    $monthStartRef = $dateInfo[1] . '-' . $dateInfo[0] . '-1';
    $monthStartDate = new DateTime($monthStartRef);
    $monthStart = getdate($monthStartDate->getTimestamp());

    $page = new Mealplan(Database::getDb(), 'Meal Plan', $monthStart, $_SESSION['userid']);

    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $dateInfo[0], $dateInfo[1]);
    $dayOffset = intval($monthStart['wday']);

    $resultsString = "<div class='week-view'>";
    for($i=1; $i<=$daysInMonth; $i++) {
        if(ceil(($dayOffset + $i) / 7) - 1 == $_POST['currWeek']) {
            $resultsString .= "<div class='day-info'>";
                
            $dayDetails = $page->getPlans($i);
            $currentCategory = '';

            $refDate = $page->getRefDate();
            $dateString = $refDate['weekday'] . ', ' . $refDate['month'] . ' ' . $i;
            $resultsString .= "<h3>$dateString</h3>";

            foreach($dayDetails as $plan) {
                if($plan->category !== $currentCategory) {
                    $currentCategory = $plan->category;
                    $resultsString .= "<div class='plan-category'>$currentCategory</div>";
                    $resultsString .= "<div><a href='recipedetails.php?id=$plan->rec_id'>$plan->name </a></div>";
                }
            }

            $resultsString .= "</div>";
        }
    }
    $resultsString .= "</div>";

    echo $resultsString;
?>