<?php
    require_once '../../vendor/autoload.php';
    require_once '../../config.php';
    $result = new Result(Database::getDb(), 'Update a Result');

    // Get the information about the result being updated
    if(isset($_POST['id'])) {
        $resultToEdit = $result->getResult($_POST['id']);
    }
?>

<h2>Update a Result</h2>

<form action="../../results.php" method="post">
    <input type="hidden" name="id" value="<?= $resultToEdit['id']; ?>" />

    <div>
        <label for="recipe-id">Recipe ID: </label>
        <input type="text" id="recipe-id" name="recipe_id"
            value="<?= $resultToEdit['recipe_id']; ?>">
    </div>

    <div>
        <label for="user-id">User ID: </label>
        <input type="text" id="user-id" name="user_id"
            value="<?= $resultToEdit['user_id']; ?>">
    </div>

    <div>
        <label for="comment">Comment: </label>
        <textarea id="comment" name="comment"><?= $resultToEdit['comment']; ?></textarea>
    </div>

    <input type="submit" name="update_submit" value="Submit">
</form>
