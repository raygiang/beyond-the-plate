<?php
	require_once('lib/classes/User.php');
	require_once('lib/classes/Database.php');

	if(isset($_POST["registerBtn"]))
	{
		$firstname=$_POST["firstname"];
		$lastname=$_POST["lastname"];
		$email=$_POST["email"];
		$password=$_POST["password"];
		$db = Database::getDb();
		
		$u = new User();
		$user=$u->addUser($email,$password,$firstname,$lastname,$db);
		header("location:login.php");
	}
?>
<div class="row">
	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<div id="register">
			<form method="POST" action="#">
				<div class="col-auto">
					<label class="sr-only" for="firstname">First Name</label>
					<div class="input-group mb-2">
						<div class="input-group-prepend">
							<div class="input-group-text">First Name</div>
						</div>
						<input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter First Name">
					</div>
				</div>
				<div class="col-auto">
					<label class="sr-only" for="lastname">Last Name</label>
					<div class="input-group mb-2">
						<div class="input-group-prepend">
							<div class="input-group-text">Last Name</div>
						</div>
						<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name">
					</div>
				</div>
				<div class="col-auto">
					<label class="sr-only" for="email">Email</label>
					<div class="input-group mb-2">
						<div class="input-group-prepend">
							<div class="input-group-text">Email</div>
						</div>
						<input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
					</div>
				</div>
				<div class="col-auto">
					<label class="sr-only" for="password">Password</label>
					<div class="input-group mb-2">
						<div class="input-group-prepend">
							<div class="input-group-text">Password</div>
						</div>
						<input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
					</div>
				</div>
				<div class="col-auto">
					<div class="input-group mb-2">						
						<input type="checkbox" class="form-control" id="agreeCheckbox" name="agreeCheckbox" >I am 13 years of age or older and agree to the Terms of Service and Privacy Policy
					</div>
				</div>
				<input type="submit" name="registerBtn" value="Create my profile" class="btn btn-danger">
			</form>
		</div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>
</div>