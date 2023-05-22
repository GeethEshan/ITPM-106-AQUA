<!DOCTYPE html>
<html>
  <head>
  
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
    .success-container {
            text-align: center;
            margin-top: 20px;
            margin-left:50px;
        }

        .success-message {
            font-weight: bold;
            color: #4CAF50;
        }

        .btn-primary {
            display: block;
            margin: 20px auto;
            background-color: #40ff00;
            transition: background-color 0.3s ease;
            width: 120px;
        }

        .btn-primary:hover {
            background-color: #3367d6;
        }
        </style>
    <title>AQUA</title>
  </head>
  
    <nav>
      <div class="logo">
        <a href="#"><img src="images/logo.jpg" alt="AQUA Logo"></a>
      </div>
      <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="products/index.php">Products</a></li>
        <li><a href="contact.php">Contact Us</a></li>
        
        <li><a href="logout.php">Logout</a></li>
        <li>
          <form class="search" action="#" method="post">
            <input type="text" placeholder="Search...">
            <button type="submit">Search</button>
          </form>
        </li>
      </ul>
    </nav>

<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Validate the form data
    $errors = array();
    
    if (empty($_POST["donor_name"])) {
        $errors[] = "Donor name is required";
    }
    
    if (empty($_POST["email"])) {
        $errors[] = "Email is required";
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }
    
    if (empty($_POST["phone"])) {
        $errors[] = "Phone number is required";
    } else if (!preg_match("/^[0-9]{10}$/", $_POST["phone"])) {
        $errors[] = "Invalid phone number format";
    }
    
    if (empty($_POST["address"])) {
        $errors[] = "Address is required";
    }
    
    if (empty($_POST["amount"])) {
        $errors[] = "Donation amount is required";
    } else if (!preg_match("/^\d+(\.\d{1,2})?$/", $_POST["amount"])) {
        $errors[] = "Invalid donation amount format";
    }
    
    if (empty($_POST["currency"])) {
        $errors[] = "Currency is required";
    }
    
    if (empty($_POST["payment_method"])) {
        $errors[] = "Payment method is required";
    }
    
    if (empty($_POST["donation_date"])) {
        $errors[] = "Donation date is required";
    } else if (!preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $_POST["donation_date"])) {
        $errors[] = "Invalid donation date format";
    }
    
    // If there are no validation errors, insert the data into the database
    if (count($errors) == 0) {
        // Connect to the database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "aqua";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        // Prepare the SQL statement
        $sql = "INSERT INTO donations (donor_name, email, phone, address, amount, currency, payment_method, donation_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        
        // Bind the parameters
        mysqli_stmt_bind_param($stmt, "ssssdsss", $_POST["donor_name"], $_POST["email"], $_POST["phone"], $_POST["address"], $_POST["amount"], $_POST["currency"], $_POST["payment_method"], $_POST["donation_date"]);
        
        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo "Donation added successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        
        // Close the statement and the connection
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } else {
        // If there are validation errors, display them
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>
<a href="donate-history.php" class="btn btn-primary">Donate History</a>

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
