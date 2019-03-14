<?php
class Page
{
    private $title;
    private $navLinks;

    private const DEFAULT_LINKS = [
        'Home' => 'index.php',
        'Browse Recipes' => '#',
        'Log In' => '#',
        'Register' => '#'
    ];

    public function __construct($title, $custLinks=null)
    {
        $this->setTitle($title);
        $this->setNav($custLinks);
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setNav($custLinks) {
        if($custLinks) {
            $this->navLinks = array_merge(self::DEFAULT_LINKS, $custLinks);
        }
        else {
            $this->navLinks = self::DEFAULT_LINKS;
        }
    }

    public function getNav() {
        return $this->navLinks;
    }

    private function generateMenuLinks() {
        $returnString = '<ul class="menu">';

        foreach($this->navLinks as $linkName => $linkPath) {
            $returnString .= '<li><a href="' . $linkPath . '">';
            $returnString .= $linkName . '</a></li>';
        }

        $returnString .= '</ul>';

        return $returnString;
    }

    public function generateHeader() {
        require_once 'views/header.php';
    }

    public function generateFooter() {
        require_once 'views/footer.php';
    }
}
?>