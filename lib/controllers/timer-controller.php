<?php
require_once 'vendor/autoload.php';
require_once 'config.php';
require_once 'lib/classes/Timer.php';

$timer = new Timer(Database::getDb(), $id);

/* Function that will print name and description of the meal
       Parameters: $timer, a Timer object */
function printName($timer) {

	echo "<p class='sub-head'>" . current($timer->getTime())['name']. "</p>";
	// echo "<p>" . current($timer->getTime())['description']. "</p>";
}

/* Function that will print table of instructions: steps, details and prep_time of the meal
       Parameters: $timer, a Timer object */
function printInstructions($timer) {

	$returnInstructions = "";
  foreach ($timer->getTime() as $time) {

          $returnInstructions .= "<div class='timer-details hidden'>" . $time['prep_time'] . "</div>";
      }

  return $returnInstructions;
}

?>