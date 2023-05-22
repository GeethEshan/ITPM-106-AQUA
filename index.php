<!DOCTYPE html>
<html>
  <head>
  <script src="search.js"></script>

    <link rel="stylesheet" type="text/css" href="style.css">
    <title>AQUA</title>
  </head>
  <body style="background-image: url('images/home.webp');">
    <nav>
      <div class="logo">
        <a href="#"><img src="images/logo.jpg" alt="AQUA Logo"></a>
      </div>
      <ul class="nav-links">
        <li><a href="home.php">Home</a></li>
        <li><a href="products/index.php">Products</a></li>
        <li><a href="contact.php">Contact Us</a></li>
        
        <li><a href="logout.php">Logout</a></li>
        <li>
        <form class="search" action="search.php" method="post">
  <input type="text" name="search" placeholder="Search...">
  <button type="submit" name="submit">Search</button>
  
</form>

        </li>
      </ul>
    </nav>
    <div class="home-container">
      <div class="welcome">
        <h1>Welcome to Aqua.lk</h1>
      </div><!-- closing tag for welcome container -->
      <div class="intro-container">
        <div class="intro">
          <p>Aqua water distribution company provides a valuable service to the community by helping to distribute clean drinking water to those in need, particularly to impoverished communities who may not have access to clean water sources. The service provided by Aqua helps to alleviate the impact of waterborne diseases and illnesses that may arise from contaminated water sources, which can have significant health and economic impacts on individuals and communities. By providing access to clean water, Aqua is able to improve the quality of life for those who may otherwise be forced to drink unsafe water, and helps to promote better health outcomes and a more sustainable future for all. Overall, the service provided by Aqua has the potential to make a meaningful difference in the lives of individuals and communities who lack access to clean water.</p>
        </div><!-- closing tag for intro container -->
        <a href="blog.php" class="read-more">Read More</a>
      </div>
      <div class="button-container">
        <div class="button">
          <a href="blog.php">
            <h2>Blog</h2>
            <p>Improving the health and well-being of the community</p>
          </a>
        </div><!-- closing tag for button container -->
        <div class="button">
          <a href="Statistics.php">
            <h2>Statistics</h2>
            <p>Water related problems in impoverished areas</p>
          </a>
        </div><!-- closing tag for button container -->
        <div class="button">
  <a href="donate.php">
            <h2>Donate</h2>
            <p>You can also contribute to this social work</p>
          </a>
        </div><!-- closing tag for button container -->
      </div><!-- closing tag for button container -->
    </div><!-- closing tag for main container -->
    
    <footer>
  <div class="footer-container">
    <div class="footer-links">
      <h3>About Us</h3>
      <ul>
        <li><a href="#">Our Story</a></li>
        <li><a href="#">Our Team</a></li>
        
        
      </ul>
    </div>
    <div class="footer-links">
      <h3>Terms & Conditions</h3>
      <ul>
        <li><a href="#">Privacy Policy</a></li>
        <li><a href="#">Terms of Use</a></li>
        
      </ul>
    </div>
    <div class="footer-links">
      <h3>Contact Us</h3>
      <ul>
        <li><a href="#">Phone: 123-456-7890</a></li>
        <li><a href="#">Email: info@aqua.com</a></li>
        
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <p>&copy; 2023 Aqua.lk. All rights reserved.</p>
  </div>
</footer>
</body>
</html>
