<?php
require_once '../../vendor/autoload.php';

if(isset($_POST['searchReq'])) {
	$requestList = new Requestrecipe(Database::getDb(), 'Request');

	$searchRequests = $requestList->getSearchRequest($_POST['searchReq']);
	$result = '';

	foreach($searchRequests as $request) {

		$result .= '<div>' . $request->title . '</div>';
		$result .= '<div>' . $request->description . '</div>';
	}

	echo $result;

}

?>