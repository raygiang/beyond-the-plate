<?php 
class Mealplan extends Page 
{
	private $refDate;

    public function __construct($title, $date, $custLinks=null)
    {
        parent::__construct($title, $custLinks);
        $this->setRefDate($date);
    }

    public function setRefDate($date) {
        $this->refDate = $date;
    }

    public function getRefDate() {
        return $this->refDate;
    }

    public function displayMealPlanContent() {
    	echo '<h3>' . $this->refDate['month'] . ' ' 
    		. $this->refDate['year'] . '</h3>';
    	echo $this->generateCalendar($this->refDate);
    }

    public function generateCalendar($baseDate) {
    	$month = $baseDate['mon'];
    	$year = $baseDate['year'];

    	$monthStartRef = $baseDate['year'] . '-' 
    		. $baseDate['mon'] . '-1';
    	$monthStartDate = new DateTime($monthStartRef);
    	$monthStart = getdate($monthStartDate->getTimestamp());
    	$daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

    	$currentDay = 1;
    	$weekCounter = 0;
    	$dayCounter = intval($monthStart['wday']);

    	$calRows = floor(($dayCounter + $daysInMonth)/7);
    	$calendarArray = array_fill(0, 6, [null, null, null, null, null, null, null]);

    	while($currentDay <= $daysInMonth) {
    		while($dayCounter < 7) {
	    		$calendarArray[$weekCounter][$dayCounter] = $currentDay;
	    		$currentDay++;
	    		$dayCounter++;

	    		if($currentDay > $daysInMonth) {
	    			break 2;
	    		}
    		}
    		$weekCounter++;
    		$dayCounter = 0;
    	}

    	return $this->getCalendarString($calendarArray);
    }

    private function getCalendarString($calendarArray) {
    	$calendarString = '<table id="meal-plan-cal"><thead><tr>'
    		. '<th>Sunday</th>'
    		. '<th>Monday</th>'
    		. '<th>Tuesday</th>'
    		. '<th>Wednesday</th>'
    		. '<th>Thursday</th>'
    		. '<th>Friday</th>'
    		. '<th>Saturday</th>'
    		. '</tr></thead><tbody>';
    	foreach($calendarArray as $week) {
    		$calendarString .= '<tr>';
    		foreach($week as $day) {
    			if($day === null) {
    				$calendarString .= '<td></td>';
    			}
    			else {
    				$calendarString .= '<td class="calDay">' . $day . '</td>';
    			}
    		}
    		$calendarString .= '</tr>';
    	}
    	$calendarString .= '</tbody></table>';

    	return $calendarString;
    }
}
?>