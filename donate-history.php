<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <header>
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
          <form class="search" action="search.php" method="post">
            <input type="text" name="search" placeholder="Search...">
            <button type="submit" name="submit">Search</button>
          </form>
        </li>
      </ul>
    </nav>
  </header>

<?php
// Establish a database connection
$host = "localhost";
$username = "root";
$password = "";
$database = "aqua";
$conn = mysqli_connect($host, $username, $password, $database);

// Check for connection errors
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

// Define the SELECT query
$query = "SELECT id, donor_name, email, phone, address, amount, currency, payment_method, created_at, donation_date 
          FROM donations 
          ORDER BY donation_date DESC";

// Execute the SELECT query
$result = mysqli_query($conn, $query);

// Check for query errors
if (!$result) {
    die("Error retrieving donations: " . mysqli_error($conn));
}

// Display the donations in a table
echo "<table style='border-collapse: collapse;'>";
echo "<tr style='background-color: #f2f2f2;'>
        <th>ID</th>
        <th>Donor Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Amount</th>
        <th>Currency</th>
        <th>Payment Method</th>
        
      </tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . $row['id'] . "</td>";
    echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . $row['donor_name'] . "</td>";
    echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . $row['email'] . "</td>";
    echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . $row['phone'] . "</td>";
    echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . $row['address'] . "</td>";
    echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . $row['amount'] . "</td>";
    echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . $row['currency'] . "</td";
    echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . $row['payment_method'] . "</td>";
    echo "<td style='border: 1px solid #ddd; padding: 8px;'>" . $row['donation_date'] . "</td>";
    
    echo "</tr>";
}
echo "</table>";

// Close the database connection
mysqli_close($conn);
?>

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