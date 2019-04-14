<?php
 require_once('lib/controllers/admin-controller.php');
?>




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
        <a class="nav-link admtop" href="logout.php">Log out</a>
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
      	<?php echo printAdmin($admin) ?>
      	</div>
        <ul class="nav flex-column" id="side">
					<li class="nav-item">
            <a class="nav-link" href="#" id="categories">
              <i class="far fa-user"></i>
              Categories
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" id="recipes" >
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
            <a class="nav-link" href="#" id="listrequest">
              <i class="far fa-question-circle"></i>
              Requests
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="col-md-9 d-none d-md-block">
      <table class="columns">
      <tr>
        <td><div id="piechart_div"></div></td>
        <td><div id="barchart_div"></div></td>
      </tr>
    </table>
      <span id="table"></span>
      <div id="request" class="row">
        <h6>List of Requests</h6>
        <div class="col-3">
      <ul class='list-group list-group-flush' id="test"><?php require_once 'admin/charts/request-table.php';
      printRequest($request)?>
      </ul>
        </div>
      </div>
    <table class="table">
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
			<?php echo printUsers($admin);?>
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
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<!-- script for loading google charts -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script src="js/admin.js"></script>
</body>
</html>