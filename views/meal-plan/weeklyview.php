<?php
    date_default_timezone_set('Canada/Eastern');

    require_once 'vendor/autoload.php';
    $page = new Mealplan(Database::getDb(), 'Meal Plan', getdate(), $_SESSION['userid']);

    $calendarArray = $page->generateCalendar();

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
                if($day[1]) {
                    $calendarString .= '<td data-toggle="modal" data-target="#planModal" class="planDay">' . $day[0] . '</td>';
                }
                else {
                    $calendarString .= '<td class="calDay">' . $day[0] . '</td>';
                }
            }
        }
        $calendarString .= '</tr>';
    }
    $calendarString .= '</tbody></table>';

    echo $calendarString;
?>