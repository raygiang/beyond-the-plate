<?php
    require_once 'vendor/autoload.php';
    require_once 'config.php';


    $request = new Requestrecipe(Database::getDb(), 'Request a Recipe');


    /*  When the form on the request page is successfully submitted the entered data
      inserts into the recipe_requests table and "Request has been added." message pops up,
      if something goes wrong "Problem adding the request." message is displayed */

    if(isset($_POST['add'])){
        $title = filter_var($_POST['requestTitle'], FILTER_SANITIZE_STRING);
        $content = filter_var($_POST['requestContent'], FILTER_SANITIZE_STRING);

        $count = $request->addRequest($_SESSION['userid'], $title, $content);

        if($count) {
            echo "Request has been added.";
        } else {
            echo "Problem adding the request.";
        }
    }



//echo $_SESSION['userid'];

    /* When edit form is successfully submitted, updated data inserts into the recipe_requests table */

    if(isset($_POST['edit'])) {
        echo $_POST['id'];
        $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
        $content = filter_var($_POST['description'], FILTER_SANITIZE_STRING);

        $count = $request->editRequest($_POST['id'], $title, $content);

        if($count) {
            echo "Request has been updated.";
        } else {
            echo "Problem updating the request.";
        }
    }


    /* When a user wants to delete a result they've posted */

    if(isset($_POST['delete'])) {
        $count = $request->deleteRequest($_POST['id']);

        if($count) {
            echo "Request has been deleted.";
        } else {
            echo "Problem deleting the request.";
        }
    }

    /* Function that displayes a list of all posted requests from the recipe_requests table
       Parameter: $request (a Requestrecipe object)
       If user_id is not equal to SESSION user_id then REPLY button is displayed,
       otherwise DELETE and UPDATE functionality are available */
    function printTable($request) {
        $returnRequest = "";

        foreach ($request->getAllRequests() as $request) {
            if(!$request->is_deleted) {
                $returnRequest .= "<tr>";
                $returnRequest .= "<td>" . $request->first_name . " " . $request->last_name . "</td>";
                $returnRequest .= "<td>" . $request->title . "</td>";
                $returnRequest .= "<td>" . $request->description . "</td>";
                if(isset($_SESSION['userid']) === $request->user_id || $request->role === 1){
                $returnRequest .= "<td>" .
                    "<form action='views/reciperequest/editrequest.php' method='post'>" .
                        "<input type='hidden' name = 'id' value='$request->id' />" .
                        "<input type='submit' name='edit' value='Edit' class='main-button' />" .
                    "</form>" .
                    "</td>";
                $returnRequest .= "<td>" .
                    "<form action='#' method='post'>" .
                        "<input type='hidden' name = 'id' value='$request->id' />" .
                        "<input type='submit' name='delete' value='Delete' class='main-button' />" .
                    "</form>" .
                    "</td>";

                $returnRequest .= "</tr>";
                }else{
                    $returnRequest .= "<td>" .
                    "<form action='userdash.php' method='post'>" .
                        "<input type='submit' name='reply' value='Reply' class='main-button' />" .
                    "</form>" .
                    "</td>";

                $returnRequest .= "</tr>";
                }
            }
        }

        return $returnRequest;
    }
?>