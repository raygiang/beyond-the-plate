<?php
 require_once 'vendor/autoload.php';
 //require_once 'config.php';
 require_once 'lib/classes/Admin.php';
 require_once 'admin/charts/category-piechart.php';

$db = Database::getDb();
$admin = new Admin();
$adminView = $admin->getAdmin(Database::getDb());
$allUserRecipies = $admin->getAllUserRecipes(Database::getDb());
$newUsers = $admin->numberOfUsers(Database::getDb());
var_dump($newUsers);
//echo gettype($adminView);


?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg" style="background-color: #ed1c24;">
  <a class="navbar-brand" href="#" id="admheader" >Beyond the Plate</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link admtop" href="#">Admin Dashboard <i class="fas fa-tachometer-alt"></i><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link admtop" href="#">Log out</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-default my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
	<main>
	<div class="container-fluid">
  <div class="row">
    <nav class="col-md-3 d-none d-md-block bg-dark sidebar">
      <div class="sidebar-sticky">
      	<div class="text-center">

      	<div id="admimage" class="rounded-circle" alt=""></div>
      	 <?php foreach($adminView as $admin): ?>
      	 	<div id="admwelcome">
	      	<div class="text-center">Welcome back <?php echo $admin->first_name . " " . $admin->last_name; ?>!</div>
	      	<div class="text-center"><i class="far fa-envelope"></i><?php echo $admin->email; ?></div>
	      	</div>
      	<?php endforeach; ?>
      	</div>
        <ul class="nav flex-column">
					<li class="nav-item">
            <a class="nav-link" href="#">
              <i class="far fa-user"></i>
              Number of Users
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="mealplan.php">
              <i class="far fa-calendar-alt"></i>
              Meal Plan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="far fa-clock"></i>
              Recently Posted Recipies
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-fire-alt"></i>
              Popular Recipies
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="far fa-question-circle"></i>
              Requests
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="col-md-9 d-none d-md-block">
    	<div id="donutchart"></div>
    <table class="table" id="request-tbl">
      <thead>
        <tr>
          <th>User Name</th>
          <th>Email</th>
          <th>Number of Posted Recipies</th>
          <th>Last Login</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
			<?php foreach($allUserRecipies as $userrecipies): ?>
        <tr>

          <td><?php echo $userrecipies->first_name . " " . $userrecipies->last_name; ?></td>
          <td><?php echo $userrecipies->email; ?></td>
          <td><?php echo $userrecipies->number; ?></td>
          <td><?php echo date('m/d/Y H:i:s', $userrecipies->last_login); ?></td>
           <?php echo "<td><a href='views/reciperequest/editrequest.php?id=". $userrecipies->id . " class='btn btn-light btn-sm' >Edit</a></td>";?>
           <?php echo "<td><a href='views/reciperequest/deleterequest.php?id=". $userrecipies->id . " class='btn btn-light btn-sm' >Delete</a></td>"; ?>

        </tr>
      <?php endforeach; ?>

       </tbody>
      </table>
      </div>
    </div>
  </div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="
sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>