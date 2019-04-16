<?php
    require_once '../../vendor/autoload.php';
    require_once '../../config.php';
    $result = new Result(Database::getDb(), 'Update a Result');
?>

<h2>Update a Result</h2>

<form action="../../results.php" method="post">
    <input type="hidden" name="id" value="<?= $_POST['id'] ?>" />
    <input type='hidden' name='rec_id' value='<?= $_POST['rec_id'] ?>' />

    <div>
        <label for="comment">Comment: </label>
        <textarea id="comment" name="comment"><?= $_POST['comment'] ?></textarea>
    </div>

    <input type="submit" name="update_submit" value="Submit">
</form>
