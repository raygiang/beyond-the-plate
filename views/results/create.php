<h2>Add a Result</h2>

<form action="../../results.php" method="post">
    <div>
        <label for="recipe-id">Recipe ID: </label>
        <input type="text" id="recipe-id" name="recipe_id">
    </div>

    <div>
        <label for="comment">Comment: </label>
        <textarea id="comment" name="comment"></textarea>
    </div>

    <input type="submit" name="create_submit" value="Submit">
</form>
