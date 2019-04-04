<?php
	require_once('lib/classes/User.php');
	require_once('lib/classes/Database.php');

	if(isset($_POST["loginBtn"]))
	{
		$email=$_POST["email"];
		$password=$_POST["password"];
		if($email ==='' || $password === '')
		{
			header("location:login.php?e=1");
		}
		$db = Database::getDb();
		
		$u = new User();
		if($user=$u->verifyUser($email,$password,$db))
		{
			session_start();
			$_SESSION["user"]=$user->email;
			$_SESSION["role"]=$user->role;
			$_SESSION["userid"]=$user->id;
			$u->successfulLogin($email,$db);
			if($user->role==1)
			{
				header("location:admindashboard.php");
			}
			else
			{
				header("location:userdash.php");
			}
		}
		else
		{
			header("location:login.php?e=2");
		}
	}
?>
<div class="row">
	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>
	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
		<div id="login">
			<form method="POST" action="#">
				<div class="col-auto">
					<label class="sr-only" for="email">Email</label>
					<div class="input-group mb-2">
						<div class="input-group-prepend">
							<div class="input-group-text">Email</div>
						</div>
						<input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" required >
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
				<input type="submit" name="loginBtn" value="Log In" class="btn btn-danger">
				<input type="button" value="Forgot Password" class="btn btn-primary">
				<div>
					<?php 
						if(isset($_GET["e"]))
						{
							if($_GET["e"]==1)
							{
								echo '<div class="alert alert-danger" role="alert"> Enter Username & Password !!!</div>';
							}else if($_GET["e"]==2)
							{
								echo '<div class="alert alert-danger" role="alert"> Invalid Username & Password!!!</div>';
							}
						}
						
					?>
				</div>
			</form>
		</div>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>
</div>