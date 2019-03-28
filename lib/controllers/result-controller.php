<?php 
    require_once 'vendor/autoload.php';
    require_once 'config.php';
    date_default_timezone_set('Canada/Eastern');

    $result = new Result(Database::getDb(), 'Results');

    /* Runs when the form in the create view is submitted, inserts the entered info
       into the results_test table */
    if(isset($_POST['create_submit'])) {
        $recipeID = filter_var($_POST['recipe_id'], FILTER_SANITIZE_STRING);
        $comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);

        $count = $result->addResult($recipeID, $_SESSION['user_id'], $comment);

        if($count) {
            echo "Result has been added.";
        } else {
            echo "Problem adding the result.";
        }
    }

    /* Runs when the form in the update view is submitted, updates the result in question
       with the entered information */
    if(isset($_POST['update_submit'])) {
        $recipeID = filter_var($_POST['recipe_id'], FILTER_SANITIZE_STRING);
        $userID = filter_var($_POST['user_id'], FILTER_SANITIZE_STRING);
        $comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);

        $count = $result->updateResult($_POST['id'], $recipeID, $userID, $comment, time());

        if($count) {
            echo "Result has been updated.";
        } else {
            echo "Problem updating the result.";
        }
    }

    /* Runs when the user chooses to delete a result */
    if(isset($_POST['delete_submit'])) {
        $count = $result->deleteResult($_POST['id']);

        if($count) {
            echo "Result has been deleted.";
        } else {
            echo "Problem deleting the result.";
        }
    }

    /* Function that will print a list of all the entries in the results_test table
       Parameters: $result, a Result object */
    function printList($result) {
        $returnString = "";

        foreach ($result->listResults() as $result) {
            if(!$result->is_deleted) {
                $returnString .= "<tr>";
                $returnString .= "<td>" . $result->id . "</td>";
                $returnString .= "<td>" . $result->recipe_id . "</td>";
                $returnString .= "<td>" . $result->user_id . "</td>";
                $returnString .= "<td>" . $result->comment . "</td>";
                $returnString .= "<td>" . $result->created_date . "</td>";
                $returnString .= "<td>" . $result->modified_date . "</td>";
                $returnString .= "<td>" .
                    "<form action='views/results/update.php' method='post'>" .
                        "<input type='hidden' name = 'id' value='$result->id' />" .
                        "<input type='submit' name='edit_submit' value='Edit' />" .
                    "</form>" .
                    "</td>";
                $returnString .= "<td>" .
                    "<form action='#' method='post'>" .
                        "<input type='hidden' name = 'id' value='$result->id' />" .
                        "<input type='submit' name='delete_submit' value='Delete' />" .
                    "</form>" .
                    "</td>";
                $returnString .= "</tr>";
            }
        }

        return $returnString;
    }
?>