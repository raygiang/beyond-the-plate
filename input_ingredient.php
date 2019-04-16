<div class="col-auto">
	<label class="sr-only" for="inlineFormInputGroup">Username</label>
	<div class="input-group mb-2">
		<div class="input-group-prepend">
			<div class="input-group-text"><input type="checkbox" name="ingredient_index" style="float:left;"/></div>
		</div>
		<input type="text" class="form-control" name="ingredient_text[]" readonly>
		<input type="text" class="form-control" placeholder='Quantity' name="ingredient_quantity[]">
		<select class="form-control" name="ingredient_unit[]">	
		<?php
		 	require_once('lib/classes/Recipe.php');
		 	require_once('lib/classes/database.php');
			$str="";
			$r=new Recipe();
			$db = Database::getDb();
			$units=$r->getUnits($db);
			foreach($units as $unit)
			{
				$str.="<option value='".$unit->id."'>".$unit->name."</option>";
			}
			echo $str;
		?>
		</select>
	</div>
</div>

