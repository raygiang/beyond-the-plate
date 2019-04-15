<h2>Add a Result</h2>

<form action="../../results.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="recipe_id" value="<?=$_GET['id']?>"/>

	<div>
		<label for="result-images">Upload Result Images: </label>
		<input type="file" id="result-images" name="result_images">
	</div>
    
    <div>
        <label for="comment">Comment: </label>
        <textarea id="comment" name="comment"></textarea>
    </div>

    <input type="submit" name="create_submit" value="Submit">
</form>
