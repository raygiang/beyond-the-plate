<?php
session_start();
require_once '../vendor/autoload.php';

if(isset($_POST['searchTerm'])) {
	$shoppingList = new ShoppingList(Database::getDb(), 'Shopping List');

	$searchSuggestions = $shoppingList->getSearchResults($_POST['searchTerm']);

	$resultString = '';

	foreach($searchSuggestions as $suggestion) {
		$resultString .= '<div class="search-results" id="' . $suggestion->id . '" recipe="' . $suggestion->name . '">';
		$resultString .= '<div>' . $suggestion->name . '</div>';
		$resultString .= '<div>' . $suggestion->description . '</div>';
		$resultString .= '</div>';
	}

	echo $resultString;
}
?>