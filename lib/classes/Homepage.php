<?php 
class Homepage extends Page 
{
    public function __construct($title, $custLinks=null)
    {
        parent::__construct($title, $custLinks);
    }

    public function displayHomepageContent() {
        require_once 'views/homepage.php';
    }
}
?>