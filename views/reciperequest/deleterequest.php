<?php

require_once '../../vendor/autoload.php';
require_once('../../lib/classes/Database.php');

	if(isset($_GET['id'])){
		$id = $_GET['id'];

		$db = Database::getDb();
		$r = new Requestrecipe('Delete Request');
		$deleteReq = $r->deleteRequest($id, $db);
		// var_dump($id);
		if($deleteReq){
			header("Location: ../../request.php");
		}else{
			echo 'something went wrong';
		}
	}

?>