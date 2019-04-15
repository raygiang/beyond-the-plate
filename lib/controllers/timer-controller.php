<?php
require_once 'vendor/autoload.php';
require_once 'config.php';
require_once 'lib/classes/Timer.php';

$timer = new Timer(Database::getDb(), $id);

/* Function that will print name and description of the meal
       Parameters: $timer, a Timer object */
function printName($timer) {

	echo "<h3>" . current($timer->getTime())['name']. "</h3>";
	echo "<p>" . current($timer->getTime())['description']. "</p>";
}

/* Function that will print table of instructions: steps, details and prep_time of the meal
       Parameters: $timer, a Timer object */
function printInstructions($timer) {

	$returnInstructions = "";
  foreach ($timer->getTime() as $time) {

          $returnInstructions .= "<tr>";
          $returnInstructions .= "<td>" .$time['step'] . "</td>";
          $returnInstructions .= "<td>" . $time['details'] . "</td>";
          $returnInstructions .= "<td class='timer-details'>" . $time['prep_time'] . "</td>";
          $returnInstructions .= "</tr>";
      }

  return $returnInstructions;
}

?>