<?php
class Page
{
    private $title;
    private $navLinks;
	
	const DEFAULT_LINKS = [
        'Home' => 'index.php',
        'Browse Recipes' => '#',
        'Log In' => 'login.php',
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
        $returnString ='<ul class="menu">';
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        foreach($this->navLinks as $linkName => $linkPath) 
        {
            if(isset($_SESSION["user"]))
            {				
				if($linkName=="Log In")
                {
                    $returnString .= '<li><a href="userdash.php">Dashboard</a></li><li><a href="logout.php">Logout</a></li>';
                }else if($linkName=="Register")
                {
                    //for removing Register menu in log in status
					
                } else {
                    $returnString .= '<li><a href="' . $linkPath . '">';
                    $returnString .= $linkName . '</a></li>';
                }
            }
            else
            {
                $returnString .= '<li><a href="' . $linkPath . '">';
                $returnString .= $linkName . '</a></li>';
            }
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