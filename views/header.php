<header id="header">
  <div class="page-wrapper flex-container">
    <div id="site-info" class="flex-container">
      <a href="index.php">
        <div id="logo-container">
          <img src="images/logo3.png" alt="Beyond the Plate Logo">
        </div>
      </a>
    </div>
    <div id="responsive-menu" class="hide"><img src="images/menu.png"></div>
    <div id="search-and-nav" class="flex-container">
      <nav id="main-nav">
        <h2 class="hidden">Main Navigation</h2>
        <?php
          echo $this->generateMenuLinks();
        ?>
      </nav>

      <form action="recipes.php" method='GET' id="search-form">
        <input id="search-bar" type="text" name="q">
        <input class="main-button" type="submit" name="searchBtn" value="Search">
      </form>
    </div>
  </div>
</header>