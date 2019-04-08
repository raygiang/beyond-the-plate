<?php
    class ShoppingList extends Page
    {
        private $dbh;

        /* Constructor function for ShoppingList
           Parameters: $dbh the PDO for the database */
        public function __construct($dbh, $title, $custLinks=null) {
            parent::__construct($title, $custLinks);
            $this->dbh = $dbh;
        }

        public function getShoppingList($recipeList) {
            if(count($recipeList)) {
                $whereClause = " WHERE 1=0 ";
                foreach($recipeList as $recipeID) {
                    $whereClause .= "OR recipe_id = $recipeID ";
                }
            }
            else {
                $whereClause = ' ';
            }

            $sqlQuery = 'SELECT i.name, SUM(quantity) AS "qty", u.name AS "unit"
                FROM ingredients i
                JOIN units u
                ON i.unit_id = u.id'
                . $whereClause
                . 'GROUP BY i.name';

            $pdoStatement = $this->dbh->prepare($sqlQuery);
            $pdoStatement->execute();

            $resultList = $pdoStatement->fetchAll(PDO::FETCH_OBJ);

            return $resultList;
        }

        public function getSearchResults($searchTerm) {
            $sqlQuery = 'SELECT id, name, description FROM recipes WHERE LOWER(name) LIKE :name LIMIT 5';
            $searchTerm = '%' . strtolower($searchTerm) . '%';

            $pdoStatement = $this->dbh->prepare($sqlQuery);
            $pdoStatement->bindParam(':name', $searchTerm);
            $pdoStatement->execute();

            $resultList = $pdoStatement->fetchAll(PDO::FETCH_OBJ);

            return $resultList;
        }
    }
?>