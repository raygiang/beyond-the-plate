<?php
    require_once '../../vendor/autoload.php';
    require_once '../../config.php';
    $result = new Result(Database::getDb(), 'Update a Result');

    // Get the information about the result being updated
    if(isset($_POST['id'])) {
        $resultToEdit = $result->getResult($_POST['id']);
    }
?>


<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../../css/cookbook.css">
    </head>
    <body>
        <main id="main">
            <div class="page-wrapper">
                <h2 class="sub-head">Update a Result</h2>
                <div class="col-12 col-md-4">
                    <form action="../../results.php" method="post">
                        <input type="hidden" name="id" value="<?= $resultToEdit['id']; ?>" />

                        <div class="form-group">
                            <label class="col-form-label" for="recipe-id">Recipe ID: </label>
                            <input class="form-control" type="text" id="recipe-id" name="recipe_id"
                                value="<?= $resultToEdit['recipe_id']; ?>">
                        </div>

                        <div class="form-group">
                            <label class="col-form-label" for="user-id">User ID: </label>
                            <input class="form-control" type="text" id="user-id" name="user_id"
                                value="<?= $resultToEdit['user_id']; ?>">
                        </div>

                        <div class="form-group">
                            <label class="col-form-label" for="comment">Comment: </label>
                            <textarea class="form-control" id="comment" name="comment"><?= $resultToEdit['comment']; ?></textarea>
                        </div>

                        <input class="btn btn-secondary" type="submit" name="update_submit" value="Submit">
                    </form>
                </div>
            </div>
        </main>
    </body>
</html>