<!DOCTYPE html>
<html>
  <!-- Header -->
<header>
  <nav>
  <link rel="stylesheet" type="text/css" href="style.css">
    <div class="logo">
      <a href="#"><img src="images/logo.jpg" alt="AQUA Logo"></a>
    </div>
    <ul class="nav-links">
      <li><a href="index.php">Home</a></li>
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
  </header>



  <title>Donate</title>
  <style>
    .container {
      width: 100%;
      height: 100%;
      display: flex;
      flex-direction: row;
      justify-content: center;
      align-items: center;
    }
    .left-side {
      width: 50%;
     
    }
    .right-side {
      width: 50%;
    }
    .image {
      width: 100%;
      height: 100%;
      margin: 20px;
      
    }
    .dummy-text {
      text-align: center;
    }
    
    .form {
      background-color: #ffffff;
      padding: 20px;
      border-radius: 10px;
      outline: 2px solid black;
      margin: 50px;
      margin-left:50px;
    }
    
    .form input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    
    .form label {
      font-size: 16px;
      font-weight: bold;
    }
    
    .form button {
      background-color: #000000;
      color: #ffffff;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .form-group {
      display: flex;
      flex-direction: column;
    }


    .form input {
      margin-bottom: 10px;
      width: 200px;
      margin-left:0px;
    }
    
    .form-group {
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
<body style="background-image: url('images/donate.jpg');">
  <div class="container">
  
        
    <div class="left-side">
    <h1><br>Donate</br> to Aqua.lk</h1>
    </div>
    <div class="right-side">
      <form class="form" method="POST" action="process-donation.php">
        <div class="form-group">
          <label for="donor_name">Donor Name:</label>
          <input type="text" name="donor_name" required>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="phone">Phone:</label>
          <input type="tel" name="phone" required>
        </div>
        <div class="form-group">
          <label for="address">Address:</label>
          <textarea name="address" required></textarea>
        </div>
        <div class="form-group">
        <label for="amount">Amount:</label>
<input type="number" name="amount" required>
<div class="form-group">
  <label for="currency">Currency:</label>
  <select name="currency" required>
    <option value="LKR">LKR</option>
    <option value="USD">USD</option>
    <option value="EUR">EUR</option>
  </select>
</div>
<div class="form-group">
  <label for="payment_method">Payment Method:</label>
  <select name="payment_method" required>
    <option value="Credit Card">Credit Card</option>
    <option value="PayPal">PayPal</option>
    <option value="Bank Transfer">Bank Transfer</option>
  </select>
</div>
<div class="form-group">
  <label for="donation_date">Donation Date:</label>
  <input type="date" name="donation_date" id="donation_date" required>
</div>
<input type="submit" value="Donate">
<?php if (!empty($error)): ?>
  <div class="error"><?php echo $error; ?></div>
<?php endif; ?>
</form>
    </div>
  </div>


</body>



</html> 
