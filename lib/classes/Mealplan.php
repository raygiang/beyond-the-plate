<?php 
class Mealplan extends Page 
{
    private $dbh;
    private $refDate;
    private $userID;

    public function __construct($dbh, $title, $date, $id, $custLinks=null)
    {
        parent::__construct($title, $custLinks);
        $this->dbh = $dbh;
        $this->setRefDate($date);
        $this->setUserID($id);
    }

    public function setRefDate($date) {
        $this->refDate = $date;
    }

    public function getRefDate() {
        return $this->refDate;
    }

    public function setUserID($id) {
        $this->userID = $id;
    }

    public function getUserID() {
        return $this->userID;
    }

    public function displayMealPlanContent() {
        require_once 'views/meal-plan/getcalendar.php';
    }

    public function addPlan($recipeID, $date, $category) {
        $currTime = time();
        $user = $this->getUserID();

        $sqlQuery = 'INSERT INTO meal_plans(recipe_id, date, user_id, created_date, modified_date, plan_category_id)
            VALUES (:recipeID, :date, :user_id, :cdate, :mdate, :category)';

        $pdoStatement = $this->dbh->prepare($sqlQuery);
        $pdoStatement->bindParam(':recipeID', $recipeID);
        $pdoStatement->bindParam(':date', $date);
        $pdoStatement->bindParam(':user_id', $user);
        $pdoStatement->bindParam(':cdate', $currTime);
        $pdoStatement->bindParam(':mdate', $currTime);
        $pdoStatement->bindParam(':category', $category);

        return $pdoStatement->execute();
    }

    public function movePlan($planID, $date) {
        $currDate = time();

        $sqlQuery = 'UPDATE meal_plans SET date = :date, modified_date = :modDate WHERE id = :planID';

        $pdoStatement = $this->dbh->prepare($sqlQuery);
        $pdoStatement->bindParam(':date', $date);
        $pdoStatement->bindParam(':modDate', $currDate);
        $pdoStatement->bindParam(':planID', $planID);

        return $pdoStatement->execute();
    }

    public function deletePlan($planID) {
        $sqlQuery = 'UPDATE meal_plans SET is_deleted = 1 WHERE id = :planID';

        $pdoStatement = $this->dbh->prepare($sqlQuery);
        $pdoStatement->bindParam(':planID', $planID);

        return $pdoStatement->execute();
    }

    public function generateCalendar() {
        $baseDate = $this->getRefDate();
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
        $calendarArray = array_fill(0, $calRows, [null, null, null, null, null, null, null]);

        while($currentDay <= $daysInMonth) {
            while($dayCounter < 7) {
                if($currentDay > $daysInMonth) {
                    $calendarArray[$weekCounter][$dayCounter] = null;
                }
                else {
                    if($this->getPlans($currentDay) != null) {
                        $calendarArray[$weekCounter][$dayCounter] = [$currentDay, true];
                    }
                    else {
                        $calendarArray[$weekCounter][$dayCounter] = [$currentDay, false];
                    }
                }
                $currentDay++;
                $dayCounter++;
            }
            $weekCounter++;
            $dayCounter = 0;
        }

        return $calendarArray;
    }

    public function getPlans($currentDay) {
        $currentMonth = $this->getRefDate()['mon'];
        $currentYear = $this->getRefDate()['year'];
        $user = $this->getUserID();

        $sqlQuery = "SELECT mp.id, r.name, pc.category from meal_plans mp
            JOIN recipes r
            ON r.id = mp.recipe_id
            JOIN plan_categories pc
            ON pc.id = mp.plan_category_id
            WHERE from_unixtime(date, '%d') = $currentDay 
            AND from_unixtime(date, '%m') = $currentMonth 
            AND from_unixtime(date, '%Y') = $currentYear 
            AND mp.is_deleted = 0
            AND mp.user_id = $user
            ORDER BY plan_category_id";

        $pdoStatement = $this->dbh->prepare($sqlQuery);
        $pdoStatement->execute();

        $planList = $pdoStatement->fetchAll(PDO::FETCH_OBJ);

        return $planList;
    }

    public function getCategories() {
        $sqlQuery = "SELECT * FROM plan_categories";

        $pdoStatement = $this->dbh->prepare($sqlQuery);
        $pdoStatement->execute();

        $categories = $pdoStatement->fetchAll(PDO::FETCH_OBJ);

        return $categories;
    }
}
?>