<?php
require_once 'vendor/autoload.php';
require_once 'config.php';
require_once 'lib/classes/Admin.php';


$admin = new Admin(Database::getDb());

/* Function that is used to print a table of all active users from users table
Parametr: $admin - object of Admin class */

function printUsers($admin) {
  $returnUser = "";


  foreach ($admin->getAllUsers() as $users) {
      if(!$users->is_deleted) {
          $returnUser .= "<tr>";
          $returnUser .= "<td>" .$users->first_name . " " . $users->last_name. "</td>";
          $returnUser .= "<td>" . $users->email . "</td>";
          $returnUser .= "<td>" . $users->number . "</td>";
          $returnUser .= "<td>" . date('m/d/Y H:i:s', $users->last_login) . "</td>";
          $returnUser .= "<td>" .
              "<form action='#' method='post'>" .
                  "<input type='hidden' name = 'id' value='$users->id' />" .
                  "<input type='submit' name='delete' value='Delete' class='btn btn-secondary' />" .
              "</form>" .
              "</td>";
          $returnUser .= "<td>" .
              "<form action='#' method='post'>" .
                  "<input type='hidden' name = 'id' value='$users->id' />" .
                  "<input type='submit' name='details' value='Details' class='btn btn-secondary' />" .
              "</form>" .
              "</td>";
          $returnUser .= "</tr>";
      }
  }

  return $returnUser;
}

/*To enable Delete functionality */
if(isset($_POST['delete'])) {
        $count = $admin->deleteUser($_POST['id']);

        if($count) {
            echo "User has been deleted.";
        } else {
            echo "Problem deleting the user.";
        }
    }


/*To enable Details functionality */
if(isset($_POST['details'])) {

  $count = $admin->getUser($_POST['id']);
  if($count) {
            header('Location: userdash.php?id=$id');
        }
}


/* Function that is used to print admin greeting message
Parametr: $admin - object of Admin class */

function printAdmin($admin){
$returnAdmin = "";

  foreach ($admin->getAdmin() as $admin) {
          $returnAdmin .= "<div id='admwelcome'>";
          $returnAdmin .= "<div class='text-center'>" ."Welcome back ".$admin->first_name . " " . $admin->last_name. "</div>";
          $returnAdmin .= "<div class='text-center'>" . "<i class='far fa-envelope'></i>".$admin->email . "</div>";
          $returnAdmin .= "</div>";

  }

  return $returnAdmin;
}

 //var_dump(printAdmin($admin));
?>