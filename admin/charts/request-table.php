<?php
require_once 'lib/controllers/request-controller.php';
require_once 'lib/classes/Admin.php';

 $request = new Requestrecipe(Database::getDb(), 'Request a Recipe');

  function printRequest($request) {
        $returnRequest = "";

        foreach ($request->getAllRequests() as $request) {
            if(!$request->is_deleted) {
                $returnRequest .= "<li class='list-group-item'>" . $request->title . "</li>";
                }
            }


        echo $returnRequest;
    }
?>