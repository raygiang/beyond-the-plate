<?php
class Requestrecipe extends Page
{
    public function __construct($title, $custLinks=null)
    {
        parent::__construct($title, $custLinks);
    }

    public function displayRequestRecipe() {
        require_once 'views/requestrecipe.php';
    }
}
?>