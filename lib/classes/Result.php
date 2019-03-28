<?php 
    class Result extends Page {
        private $dbh;

        /* Constructor function for Result
           Parameters: $dbh the PDO for the database */
        public function __construct($dbh, $title, $custLinks=null) {
            parent::__construct($title, $custLinks);
            $this->dbh = $dbh;
        }

        /* Method that will return a list of all entries in the results_test table */
        public function listResults() {
            $sqlQuery = 'SELECT * FROM results';

            $pdoStatement = $this->dbh->prepare($sqlQuery);
            $pdoStatement->execute();

            $resultList = $pdoStatement->fetchAll(PDO::FETCH_OBJ);

            return $resultList;
        }

        /* Method that will return a specific entry from the results_test table
           Parameters: $id the id of the entry in question */
        public function getResult($id) {
            $sqlQuery = 'SELECT * FROM results WHERE id = :resultID';

            $pdoStatement = $this->dbh->prepare($sqlQuery);
            $pdoStatement->bindParam(':resultID', $id);
            $pdoStatement->execute();

            $resultList = $pdoStatement->fetch();

            return $resultList;
        }

        /* Method that will add a new result to the results_test table
           Parameters: $recipeID the id of the recipe that this result corresponds to
                       $userID the id of the user adding this result
                       $comment the comment for this result */
        public function addResult($recipeID, $userID, $comment) {
            $sqlQuery = 'INSERT INTO results(recipe_id, user_id, comment, created_date, modified_date)
                         VALUES (:recipeID, :userID, :comment, :createdDate, :modifiedDate)';

            $currTime = time();

            $pdoStatement = $this->dbh->prepare($sqlQuery);
            $pdoStatement->bindParam(':recipeID', $recipeID);
            $pdoStatement->bindParam(':userID', $userID);
            $pdoStatement->bindParam(':comment', $comment);
            $pdoStatement->bindParam(':createdDate', $currTime);
            $pdoStatement->bindParam(':modifiedDate', $currTime);

            return $pdoStatement->execute();
        }

        /* Method that will update an existing result in the results_test table
           Parameters: $resultID the id of the result being updated
                       $recipeID the id of the recipe that this result corresponds to
                       $userID the id of the user that added this result
                       $comment the comment for this result 
                       $currDate the date that this result was modified */
        public function updateResult($resultID, $recipeID, $userID, $comment, $currDate) {
            $sqlQuery = 'UPDATE results SET recipe_id = :recipeID, user_id = :userID, comment = :comment, modified_date = :currDate WHERE id = :resultID';

            $pdoStatement = $this->dbh->prepare($sqlQuery);
            $pdoStatement->bindParam(':recipeID', $recipeID);
            $pdoStatement->bindParam(':userID', $userID);
            $pdoStatement->bindParam(':comment', $comment);
            $pdoStatement->bindParam(':currDate', $currDate);
            $pdoStatement->bindParam(':resultID', $resultID);

            return $pdoStatement->execute();
        }

        /* Method that will delete (set is_deleted to 1) a result from the results_test table
           Parameters: $resultID the id of the result being deleted */
        public function deleteResult($resultID) {
            $sqlQuery = 'UPDATE results SET is_deleted = 1 WHERE id = :resultID';

            $pdoStatement = $this->dbh->prepare($sqlQuery);
            $pdoStatement->bindParam(':resultID', $resultID);

            return $pdoStatement->execute();
        }
    }
?>