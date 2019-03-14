<header id="header">
  <div class="page-wrapper flex-container">
    <div id="site-info" class="flex-container">
      <a href="index.php">
        <div id="logo-container">
          <img src="images/logo3.png" alt="Beyond the Plate Logo">
        </div>
      </a>
    </div>

    <div id="search-and-nav" class="flex-container">
      <nav id="main-nav">
        <h2 class="hidden">Main Navigation</h2>
        <?php
          echo $this->generateMenuLinks();
        ?>
      </nav>

      <form id="search-form">
        <input id="search-bar" type="text" name="search_bar">
        <input id="submit-button" type="submit" name="submit_button" value="Search">
      </form>
    </div>
  </div>
</header>